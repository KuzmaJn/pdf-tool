<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PdfApiController extends Controller
{
    public function merge(Request $request)
    {
        // Overenie vstupov
        $request->validate([
            'pdf1' => 'required|file|mimes:pdf',
            'pdf2' => 'required|file|mimes:pdf',
        ]);

        // Uloženie do storage/tmp
        $pdf1Name = Str::uuid() . '_1.pdf';
        $pdf2Name = Str::uuid() . '_2.pdf';
        $pdf1RelativePath = $request->file('pdf1')->storeAs('tmp', $pdf1Name, 'public');
        $pdf2RelativePath = $request->file('pdf2')->storeAs('tmp', $pdf2Name, 'public');
        
        $outputName = Str::uuid() . '_merged.pdf';
        $outputPath = storage_path("app/public/output/{$outputName}");

        // Spustenie Python skriptu
        $process = new Process([
            'python3',
            base_path('python/merge.py'),
            storage_path("app/public/tmp/{$pdf1Name}"),
            storage_path("app/public/tmp/{$pdf2Name}"),
            $outputPath
        ]);

        try {
            $process->mustRun();
        } catch (ProcessFailedException $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Merge failed',
                'error' => $exception->getMessage()
            ], 500);
        }

        // Odstránenie dočasných súborov po zlúčení
        Storage::disk('public')->delete("tmp/{$pdf1Name}");
        Storage::disk('public')->delete("tmp/{$pdf2Name}");

        // Uloženie zlúčeného PDF do storage/output
        Storage::disk('public')->put("output/{$outputName}", file_get_contents($outputPath));

        return response()->json([
            'status' => 'success',
            'merged_file' => asset("storage/output/{$outputName}")
        ]);
    }

    public function download($filename)
    {
        $path = storage_path('app/public/output/' . $filename);
        if (!file_exists($path)) {
            abort(404);
        }
        return response()->download($path);
    }
}
