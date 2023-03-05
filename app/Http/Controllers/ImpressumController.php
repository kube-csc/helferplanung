<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImpressumController extends Controller
{
    public function getImpressumDaten()
    {
        return view('pages.impressum');
    }
}
