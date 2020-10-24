<?php

namespace App\Http\Controllers;

use App\Alternatif;
use App\DataNilai;
use App\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataNilaiController extends Controller
{
    public function __construct() {
        $this->middleware('auth');  
    }
    
    public function index()
    {
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        $skor_awal = DB::table('skor_awal')->join('alternatif', 'skor_awal.alternatif_id', '=', 'alternatif.id')->join('kriteria', 'skor_awal.kriteria_id', '=', 'kriteria.id')
        ->select('skor_awal.*', 'kriteria.nama_kriteria', 'alternatif.nama')
        ->paginate(5);

        return view('datanilai', [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria,
            'skor_awal' => $skor_awal
        ]);
    }

    public function index2()
    {
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();

        return view('datanilaitambah', [
            'alternatif' => $alternatif,
            'kriteria' => $kriteria
        ]);
    }

    public function create(Request $request)
    {
        $validateData = $request->validate([
            'nilai' => 'required|numeric|max:5'
        ]);
        
        $data = new DataNilai;

        $data->alternatif_id = $request->mentor;
        $data->kriteria_id = $request->kriteria;
        $data->nilai = $request->nilai;
        
        $data->save();

        return redirect()->route('datanilai');
    }

    public function createall(Request $request)
    {
        $kriteria = Kriteria::get();
        foreach($kriteria as $k){
            $alternatif_id = $request->mentor;
            $krit = str_replace(' ', '', $k->nama_kriteria);
                DataNilai::create([
                    'alternatif_id' => $alternatif_id,
                    'kriteria_id' => $k->id,
                    'nilai' => $request->$krit
                ]);
        }
        return redirect()->route('datanilai');
    }


    public function edit($id)
    {
        $datanilai = DataNilai::find($id);
        $skor_awal = DB::table('skor_awal')->join('alternatif', 'skor_awal.alternatif_id', '=', 'alternatif.id')->join('kriteria', 'skor_awal.kriteria_id', '=', 'kriteria.id')
        ->select('skor_awal.*', 'kriteria.nama_kriteria', 'alternatif.nama')
        ->where('skor_awal.id', "=", $id)
        ->first();
        return view('datanilai_edit', ['datanilai' => $datanilai, 'skor_awal' => $skor_awal
        ]);
    }


    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nilai' => 'required|numeric|max:5'
        ]);

        $data = DataNilai::find($id);
        $data->alternatif_id = $request->alternatif_id;
        $data->kriteria_id = $request->kriteria_id;
        $data->nilai = $request->nilai;
        
        $data->save();

        return redirect()->route('datanilai');
    }


    public function delete($id)
    {
        $datanilai = DataNilai::find($id);

        $datanilai->delete();

        return redirect()->route('datanilai');
    }
}
