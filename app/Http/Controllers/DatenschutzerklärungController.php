<?php

namespace App\Http\Controllers;

use App\Models\Instruction;
use Illuminate\Http\Request;

class DatenschutzerklärungController extends Controller

{
    public function getDatenschutzerklärungDaten()
    {
        $instructionSearch="Datenschutzerklärung";
        $search = str_replace('_' , ' ' , $instructionSearch);
        $instructions = instruction::where('ueberschrift' , $search)->get();

        return view('pages.datenschutzerkärung')->with([
            'instructions' => $instructions,
        ]);
    }
}
