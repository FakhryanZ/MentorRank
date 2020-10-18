<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\Kriteria;
use Illuminate\Http\Request;

class DataNilaiController extends Controller
{
    public function index()
    {
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();

        return view('datanilai', [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria
        ]);
    }

    public function create(Request $request)
    {
        $validateData = $request->validate([
            'nilai' => 'required|numeric|max:10'
        ]);
    }
}
