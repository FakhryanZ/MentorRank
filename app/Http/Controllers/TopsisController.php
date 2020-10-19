<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topsis;
use App\Alternatif;
use App\Kriteria;
use Illuminate\Support\Facades\DB;

class TopsisController extends Controller
{
    public function index()
    {
        $topsis = Topsis::get();
        $alternatif = Alternatif::get();
        $kriteria = Kriteria::get();
        
        $tampil = DB::select("SELECT b.nama,c.nama_kriteria,a.nilai,c.bobot,c.status
        FROM skor_awal a
        JOIN alternatif b ON a.alternatif_id = b.id
        JOIN kriteria c ON a.kriteria_id = c.id");

        // var_dump($tampil);
        $data      =array();
        $kriterias =array();
        $status=array();

        foreach($tampil as $row){
          if(!isset($data[$row->nama])){
            $data[$row->nama]=array();
          }
          if(!isset($data[$row->nama][$row->nama_kriteria])){
            $data[$row->nama][$row->nama_kriteria]=array();
          }
          if(!isset($nilai_kuadrat[$row->nama_kriteria])){
            $nilai_kuadrat[$row->nama_kriteria]=0;
          }
          $bobot[$row->nama_kriteria]=$row->bobot;
          $data[$row->nama][$row->nama_kriteria]=$row->nilai;
          $nilai_kuadrat[$row->nama_kriteria]+=pow($row->nilai,2);
          $kriterias[]=$row->nama_kriteria;
          $status[$row->nama_kriteria]=$row->status;
        }

        $namakriteria =array_unique($kriterias);
        
        $index = 0;
        $x=1;
        $normalisasi=[];
        foreach($data as $nama=>$krit){
            foreach($namakriteria as $k){
              $normalisasi[$k][$index] = round(($krit[$k]/sqrt($nilai_kuadrat[$k])),6);
            }
            $index++;           
        }

        return view('topsis',['topsis'=>$topsis, 'alternatif'=>$alternatif, 'kriteria'=>$kriteria,
            'index'=>$index, 
            'data'=>$data, 'namakriteria' =>$namakriteria, 
            'bobot'=>$bobot,
            'normalisasi'=>$normalisasi]);
    }
}
