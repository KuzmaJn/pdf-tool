<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfToolsController extends Controller
{
    public function index()
    {
        return view('pdf-tools');
    }
}
