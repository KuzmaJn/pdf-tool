<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PdfToolsController extends Controller
{

    public function index()
    {
        return view('pdf-tools.index');
    }

    // AUXILIARY FUNCTIONS
    function extractPythonError($text) {
        if (preg_match('/=====\n(.*?)\n=====/s', $text, $matches)) {
            return trim($matches[1]);
        }
        return $text;
    }

    private function saveTmpFile($file, $prefix = '') {
        $tmpName = ($prefix ? $prefix . '_' : '') . Str::uuid() . ".pdf";
        $file->storeAs("tmp", $tmpName, 'public');
        return storage_path("app/public/tmp/{$tmpName}");
    }

    private function ensureOutputDirExists() {
        if (!Storage::disk('public')->exists('output')) {
            Storage::disk('public')->makeDirectory('output');
        }
    }

    private function cleanFiles(array $paths) {
        foreach ($paths as $file) {
            @unlink($file);
        }
    }

    /**
     * @group User authentication
     * @authenticated
     */

    public function merge(Request $request)
    {
        // Validácia na pole PDF súborov
        $request->validate([
            'pdf_files' => 'required|array|min:2',
            'pdf_files.*' => 'file|mimes:pdf'
        ]);

        // Uloženie všetkých PDF do temp adresára
        $pdfPaths = [];
        foreach ($request->file('pdf_files') as $idx => $file) {
            $pdfPaths[] = $this->saveTmpFile($file, $idx);
        }

        // Over a prípadne vytvor priečinok output v storage/app/public
        $this->ensureOutputDirExists();

        // Výstupný súbor
        $outputName = 'merged_' . Str::uuid() . '.pdf';
        $outputPath = storage_path("app/public/output/{$outputName}");

        // Priprav argumenty pre python: všetky PDF cesty + outputPath
        $pythonArgs = array_merge(
            ['python3', base_path('python/merge.py')],
            $pdfPaths,
            [$outputPath]
        );

        $process = new Process($pythonArgs);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            // Vymaž dočasné PDF ak zlyhá
            $this->cleanFiles($pdfPaths);

            $fullError = $exception->getMessage();
            $cleanError = extractPythonError($fullError);

            return response()->json([
                'status' => 'error',
                'message' => 'Merge failed',
                'error' => $fullError,
                'cleanError' => $cleanError
            ], 500);
        }

        // Odstránenie dočasných súborov po zlúčení
        $this->cleanFiles($pdfPaths);

        // Uloženie zlúčeného PDF do storage/output
        Storage::disk('public')->put("output/{$outputName}", file_get_contents($outputPath));

        $location = \App\Models\History::resolveLocation($request);
        \App\Models\History::record('merge', $location);

        return response()->json([
            'status' => 'success',
            'processed_file' => asset("storage/output/{$outputName}")
        ]);
    }

    /**
     * @group User authentication
     * @authenticated
     */

    public function split(Request $request) {
        // Validácia vstupu
        $request->validate([
            'pdf' => 'required|file|mimes:pdf',
            'split_page' => 'required|integer|min:1'
        ]);

        // Uloženie PDF do temp adresára
        $pdfPath = $this->saveTmpFile($request->file('pdf'), 'split');

        // Over a prípadne vytvor priečinok output v storage/app/public
        $this->ensureOutputDirExists();

        // Výstupné súbory
        $outputName1 = 'split1_' . Str::uuid() . '.pdf';
        $outputName2 = 'split2_' . Str::uuid() . '.pdf';
        $outputPath1 = storage_path("app/public/output/{$outputName1}");
        $outputPath2 = storage_path("app/public/output/{$outputName2}");

        // Priprav argumenty pre python: vstup, split_page, výstupy
        $pythonArgs = [
            'python3', base_path('python/split.py'),
            $pdfPath,
            $request->input('split_page'),
            $outputPath1,
            $outputPath2
        ];

        $process = new Process($pythonArgs);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            $this->cleanFiles([$pdfPath]);

            function extractPythonError($text) {
                if (preg_match('/=====\n(.*?)\n=====/s', $text, $matches)) {
                    return trim($matches[1]);
                }
                return $text;
            }

            $fullError = $exception->getMessage();
            $cleanError = extractPythonError($fullError);

            return response()->json([
                'status' => 'error',
                'message' => 'Split failed',
                'error' => $fullError,
                'cleanError' => $cleanError
            ], 500);
        }

        // Vymaž dočasný PDF
        $this->cleanFiles([$pdfPath]);

        // Ulož výstupy do storage/output
        Storage::disk('public')->put("output/{$outputName1}", file_get_contents($outputPath1));
        Storage::disk('public')->put("output/{$outputName2}", file_get_contents($outputPath2));

        // Uloženie do histórie
        $location = \App\Models\History::resolveLocation($request);
        \App\Models\History::record('split', $location);

        return response()->json([
            'status' => 'success',
            'processed_files' => [
                asset("storage/output/{$outputName1}"),
                asset("storage/output/{$outputName2}")
            ]
        ]);
    }

    /**
     * @group User authentication
     * @authenticated
     */

    public function unlock(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf',
            'password' => 'required|string'
        ]);

        // Uloženie dočasného PDF
        $pdfPath = $this->saveTmpFile($request->file('pdf'), 'unlock');
        $this->ensureOutputDirExists();

        $outputName = 'unlocked_' . Str::uuid() . '.pdf';
        $outputPath = storage_path("app/public/output/{$outputName}");

        $pythonArgs = [
            'python3', base_path('python/unlock.py'),
            $pdfPath,
            $request->input('password'),
            $outputPath
        ];

        $process = new Process($pythonArgs);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            $this->cleanFiles([$pdfPath]);
            $fullError = $exception->getMessage();
            $cleanError = $this->extractPythonError($fullError);

            return response()->json([
                'status' => 'error',
                'message' => 'Unlock failed',
                'error' => $fullError,
                'cleanError' => $cleanError
            ], 500);
        }

        // Odstránenie dočasného PDF po úspechu
        $this->cleanFiles([$pdfPath]);

        // Uloženie výsledného PDF do storage/output
        Storage::disk('public')->put("output/{$outputName}", file_get_contents($outputPath));

        // Uloženie do histórie
        $location = \App\Models\History::resolveLocation($request);
        \App\Models\History::record('unlock', $location);

        return response()->json([
            'status' => 'success',
            'processed_file' => asset("storage/output/{$outputName}")
        ]);
    }

    /**
     * @group User authentication
     * @authenticated
     */

    public function lock(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf',
            'password' => 'required|string'
        ]);

        // Uloženie dočasného PDF
        $pdfPath = $this->saveTmpFile($request->file('pdf'), 'unlock');
        $this->ensureOutputDirExists();

        $outputName = 'locked_' . Str::uuid() . '.pdf';
        $outputPath = storage_path("app/public/output/{$outputName}");

        $pythonArgs = [
            'python3', base_path('python/lock.py'),
            $pdfPath,
            $request->input('password'),
            $outputPath
        ];

        $process = new Process($pythonArgs);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            $this->cleanFiles([$pdfPath]);
            $fullError = $exception->getMessage();
            $cleanError = $this->extractPythonError($fullError);

            return response()->json([
                'status' => 'error',
                'message' => 'Lock failed',
                'error' => $fullError,
                'cleanError' => $cleanError
            ], 500);
        }

        $this->cleanFiles([$pdfPath]);

        Storage::disk('public')->put("output/{$outputName}", file_get_contents($outputPath));

        // Uloženie do histórie
        $location = \App\Models\History::resolveLocation($request);
        \App\Models\History::record('lock', $location);

        return response()->json([
            'status' => 'success',
            'processed_file' => asset("storage/output/{$outputName}")
        ]);
    }

    /**
     * @group User authentication
     * @authenticated
     */

    public function rotate(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf',
            'page_number' => 'required|integer|min:1',
            'rotation_angle' => 'required|integer|in:90,180,270'
        ]);

        $pdfPath = $this->saveTmpFile($request->file('pdf'), 'rotate');
        $this->ensureOutputDirExists();

        $outputName = 'rotated_' . Str::uuid() . '.pdf';
        $outputPath = storage_path("app/public/output/{$outputName}");

        $pythonArgs = [
            'python3', base_path('python/rotate.py'),
            $pdfPath,
            $request->input('page_number'),
            $request->input('rotation_angle'),
            $outputPath
        ];

        $process = new Process($pythonArgs);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            $this->cleanFiles([$pdfPath]);
            $fullError = $exception->getMessage();
            $cleanError = $this->extractPythonError($fullError);

            return response()->json([
                'status' => 'error',
                'message' => 'Rotate failed',
                'error' => $fullError,
                'cleanError' => $cleanError
            ], 500);
        }

        $this->cleanFiles([$pdfPath]);

        Storage::disk('public')->put("output/{$outputName}", file_get_contents($outputPath));

        // Uloženie do histórie
        $location = \App\Models\History::resolveLocation($request);
        \App\Models\History::record('rotate', $location);

        return response()->json([
            'status' => 'success',
            'processed_file' => asset("storage/output/{$outputName}")
        ]);
    }

    /**
     * @group User authentication
     * @authenticated
     */

    public function removePage(Request $request)
    {
        $request->validate([
            'pdf' => 'required|file|mimes:pdf',
            'page_number' => 'required|integer|min:1'
        ]);

        $pdfPath = $this->saveTmpFile($request->file('pdf'), 'remove');
        $this->ensureOutputDirExists();

        $outputName = 'removed' . $request->input('page_number') . '_' . \Illuminate\Support\Str::uuid() . '.pdf';
        $outputPath = storage_path("app/public/output/{$outputName}");

        $pythonArgs = [
            'python3', base_path('python/remove_page.py'),
            $pdfPath,
            $request->input('page_number'),
            $outputPath
        ];

        $process = new Process($pythonArgs);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            $this->cleanFiles([$pdfPath]);
            $fullError = $exception->getMessage();
            $cleanError = $this->extractPythonError($fullError);

            return response()->json([
                'status' => 'error',
                'message' => 'Remove page failed',
                'error' => $fullError,
                'cleanError' => $cleanError
            ], 500);
        }

        $this->cleanFiles([$pdfPath]);

        Storage::disk('public')->put("output/{$outputName}", file_get_contents($outputPath));

        // Uloženie do histórie
        $location = \App\Models\History::resolveLocation($request);
        \App\Models\History::record('remove_page', $location);

        return response()->json([
            'status' => 'success',
            'processed_file' => asset("storage/output/{$outputName}")
        ]);
    }

    /**
     * @group User authentication
     * @authenticated
     */

    public function extractPage(Request $request)
    {
        // Validácia vstupov
        $request->validate([
            'pdf' => 'required|file|mimes:pdf',
            'page_number' => 'required|integer|min:1'
        ]);

        // Uloženie PDF do dočasného súboru
        $pdfPath = $this->saveTmpFile($request->file('pdf'), 0);
        $pageNumber = $request->input('page_number');

        // Vytvorenie výstupného priečinka
        $this->ensureOutputDirExists();

        // Výstupný súbor
        $outputName = 'extracted_' . Str::uuid() . '.pdf';
        $outputPath = storage_path("app/public/output/{$outputName}");

        // Spustenie Python skriptu
        $process = new Process([
            'python3',
            base_path('python/extract.py'),
            $pdfPath,
            $pageNumber,
            $outputPath
        ]);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            $this->cleanFiles([$pdfPath]);
            $fullError = $exception->getMessage();
            $cleanError = $this->extractPythonError($fullError);

            return response()->json([
                'status' => 'error',
                'message' => 'Extraction failed',
                'error' => $fullError,
                'cleanError' => $cleanError
            ], 500);
        }

        // Vyčistenie dočasných súborov
        $this->cleanFiles([$pdfPath]);

        $location = \App\Models\History::resolveLocation($request);
        \App\Models\History::record('extract_page', $location);

        return response()->json([
            'status' => 'success',
            'processed_file' => asset("storage/output/{$outputName}")
        ]);
    }

    /**
     * @group User authentication
     * @authenticated
     */

    public function numberPages(Request $request)
    {
        $request->validate([
            'pdf'          => 'required|file|mimes:pdf',
            'position'     => 'required|in:bottom-center,bottom-right,bottom-left,top-center,top-right,top-left',
            'start_number' => 'nullable|integer|min:1',
        ]);

        // kde sa začne číslovať (default 1)
        $start = $request->input('start_number', 1);

        // uloženie uploadovaného PDF do tmp
        $pdfPath = $this->saveTmpFile($request->file('pdf'), 'pagenums');

        // výstupné nastavenia
        $this->ensureOutputDirExists();
        $outputName = 'numbered_' . Str::uuid() . '.pdf';
        $outputPath = storage_path("app/public/output/{$outputName}");

        // spustenie python skriptu
        $process = new Process([
            'python3',
            base_path('python/number_pages.py'),
            $pdfPath,
            $start,
            $request->input('position'),
            $outputPath,
        ]);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $e) {
            // vyčisti tmp a vráť chybu
            $this->cleanFiles([$pdfPath]);
            $fullError  = $e->getMessage();
            $cleanError = extractPythonError($fullError);

            return response()->json([
                'status'     => 'error',
                'message'    => 'Page numbering failed',
                'error'      => $fullError,
                'cleanError' => $cleanError,
            ], 500);
        }

        // odstránenie tmp
        $this->cleanFiles([$pdfPath]);

        // uloženie výsledku do public/output
        Storage::disk('public')->put("output/{$outputName}", file_get_contents($outputPath));

        // záznam do histórie
        $location = \App\Models\History::resolveLocation($request);
        \App\Models\History::record('add_page_numbers', $location);

        return response()->json([
            'status'         => 'success',
            'processed_file' => asset("storage/output/{$outputName}"),
        ]);
    }

    /**
     * @group User authentication
     * @authenticated
     */

    public function create(Request $request)
    {
        // Validácia vstupu
        $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required|string',
            'orientation' => 'required|in:portrait,landscape',
        ]);

        $title = $request->input('title');
        $content = $request->input('content');
        $orientation = $request->input('orientation');

        // Over a prípadne vytvor priečinok output v storage/app/public
        $this->ensureOutputDirExists();

        // Výstupný súbor
        $outputName = 'generated_' . Str::uuid() . '.pdf';
        $outputPath = storage_path("app/public/output/{$outputName}");

        // Priprav argumenty pre python: outputPath, orientation, title, content
        $pythonArgs = [
            'python3',
            base_path('python/create.py'),
            $outputPath,
            $orientation,
            $title,
            $content,
        ];

        $process = new Process($pythonArgs);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            $fullError  = $exception->getMessage();
            $cleanError = $this->extractPythonError($fullError);

            return response()->json([
                'status'     => 'error',
                'message'    => 'Create PDF failed',
                'error'      => $fullError,
                'cleanError' => $cleanError,
            ], 500);
        }

        // Záznam do histórie
        $location = \App\Models\History::resolveLocation($request);
        \App\Models\History::record('create', $location);

        return response()->json([
            'status'         => 'success',
            'processed_file' => asset("storage/output/{$outputName}"),
        ]);
    }

    /**
     * @group User authentication
     * @authenticated
     */

    public function addWatermark(Request $request)
    {
        // Validácia vstupu: PDF súbor + text watermarku
        $request->validate([
            'pdf'  => 'required|file|mimes:pdf',
            'text' => 'required|string|max:100',
        ]);

        // Uloženie PDF do temp adresára
        $pdfPath = $this->saveTmpFile($request->file('pdf'), 'watermark');

        // Over a prípadne vytvor priečinok output v storage/app/public
        $this->ensureOutputDirExists();

        // Výstupný súbor
        $outputName = 'watermark_' . Str::uuid() . '.pdf';
        $outputPath = storage_path("app/public/output/{$outputName}");

        // Priprav argumenty pre python: vstup, text watermarku, výstup
        $pythonArgs = [
            'python3',
            base_path('python/add_watermark.py'),
            $pdfPath,
            $request->input('text'),
            $outputPath,
        ];

        $process = new Process($pythonArgs);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            // Vymaž dočasný PDF ak zlyhá
            $this->cleanFiles([$pdfPath]);

            $fullError  = $exception->getMessage();
            $cleanError = extractPythonError($fullError);

            return response()->json([
                'status'    => 'error',
                'message'   => 'Watermark failed',
                'error'     => $fullError,
                'cleanError'=> $cleanError,
            ], 500);
        }

        // Odstránenie dočasného PDF po úspechu
        $this->cleanFiles([$pdfPath]);

        // Uloženie výsledného PDF do storage/output
        Storage::disk('public')->put("output/{$outputName}", file_get_contents($outputPath));

        // Záznam do histórie
        $location = \App\Models\History::resolveLocation($request);
        \App\Models\History::record('watermark', $location);

        return response()->json([
            'status'         => 'success',
            'processed_file' => asset("storage/output/{$outputName}"),
        ]);
    }

}
