<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class UserManualController extends Controller
{
    public function index()
    {
        return view('manual.index', [
            'title' => 'Používateľská príručka - IGA GUI'
        ]);

    }
    public function downloadPdf()
    {
        // 1. Nahraj view s dátami (napr. preklady)
        $data = [
            // sem môžeš poslať dynamické údaje, napr. now() atď.
            'updatedAt' => now()->format('d.m.Y'),
        ];

        // 2. Vygeneruj PDF
        $pdf = PDF::loadView('manual.pdf', $data)
            ->setPaper('a4', 'portrait');

        // 3. Vráť response na stiahnutie
        return $pdf->download('user-manual-'.$data['updatedAt'].'.pdf');
    }
}
