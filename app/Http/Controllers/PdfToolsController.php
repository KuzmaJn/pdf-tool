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

        return response()->json([
            'status' => 'success',
            'processed_file' => asset("storage/output/{$outputName}")
        ]);
    }


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

    return response()->json([
        'status' => 'success',
        'processed_files' => [
            asset("storage/output/{$outputName1}"),
            asset("storage/output/{$outputName2}")
        ]
    ]);
    }
}
