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
        $pdf = Pdf::loadView('manual.pdf', [
            'title' => 'Používateľská príručka - IGA GUI'
        ]);

        return $pdf->download('používateľská-príručka-iga-gui.pdf');
    }
}
