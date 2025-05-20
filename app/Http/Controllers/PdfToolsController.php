<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PdfToolsController extends Controller
{
    public function index()
    {
        return view('pdf-tools.index');
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
            $tmpName = Str::uuid() . "_{$idx}.pdf";
            $file->storeAs("tmp", $tmpName, 'public');
            $pdfPaths[] = storage_path("app/public/tmp/{$tmpName}");
        }
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
            foreach ($pdfPaths as $pdf) {
                @unlink($pdf);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Merge failed',
                'error' => $exception->getMessage()
            ], 500);
        }

        // Odstránenie dočasných súborov po zlúčení
        foreach ($pdfPaths as $pdf) {
            @unlink($pdf);
        }

        // Uloženie zlúčeného PDF do storage/output
        Storage::disk('public')->put("output/{$outputName}", file_get_contents($outputPath));


        $ip = $request->ip();
        $city = null;
        $country = null;
        $location = 'private range';
        try {
            $response = Http::timeout(3)->get("https://ipinfo.io/{$ip}/json");
            $geo = $response->json();
            //Log::info('ipinfo.io raw response: ' . $response->body());
            $city = $geo['city'] ?? null;
            $country = $geo['country'] ?? null;
            $location = ($country ?? '') . ', ' . ($city ?? '');
        } catch (\Exception $e) {
            // ulozene v app/storage/log/laravel.log
            Log::error('Error fetching IP info: ' . $e->getMessage());
        }

        \App\Models\History::create([
            'user_id'    => auth()->id(),
            'service_id' => 'pdf_merge',
            'interface'  => 'web',
            'used_at'    => now(),
            'location'   => $location
        ]);

        return response()->json([
            'status' => 'success',
            'merged_file' => asset("storage/output/{$outputName}")
        ]);
    }
}
