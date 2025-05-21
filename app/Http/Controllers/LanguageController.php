<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function switch(\Illuminate\Http\Request $request)
    {
        $locale = $request->input('locale');
        if (array_key_exists($locale, config('app.available_locales'))) {
        Session::put('locale', $locale);
        }
        return Redirect::back();
    }
}
