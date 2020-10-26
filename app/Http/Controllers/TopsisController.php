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

        $data      =array();
        $kriterias =array();
        $status=array();

        $yplus=array();
        $ymin=array();

        $xbobotkrit=array();

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

        // dd($kriterias);
        // dd($namakriteria);  
        // dd($bobot);

        // $indexbobot = 0;
        // $arrnilaibobot = [];
        // foreach ($bobot as $bot => $nilaibobot) {
        //   $arrnilaibobot[$indexbobot] = $nilaibobot;
        //   $indexbobot++;
        // }
        
        $index = 0;
        $x=1;
        $normalisasi=[];
        foreach($data as $nama=>$krit){
            foreach($namakriteria as $k){
              $normalisasi[$k][$index] = round(($krit[$k]/sqrt($nilai_kuadrat[$k])),6);
              $arrnormalterbobot[$k][$index]= $normalisasi[$k][$index]*$bobot[$k];
              $xbobotkrit[$k][$index]= $normalisasi[$k][$index]*$bobot[$k];
              $yplus[$k]=($status[$k]=='Benefit' ? max($arrnormalterbobot[$k]) : min($arrnormalterbobot[$k]));
                $ymin[$k]=($status[$k]=='Cost' ? max($arrnormalterbobot[$k]) : min($arrnormalterbobot[$k]));
            }
            $index++;           
        }


        $index=0;
        foreach($data as $nama=>$krit){
          foreach($namakriteria as $k){
            if(!isset($dplus[$index])) {$dplus[$index]=0;}
                      $dplus[$index]+=pow($yplus[$k]-$xbobotkrit[$k][$index],2);

            if(!isset($dmin[$index])) {$dmin[$index]=0;}
                      $dmin[$index]+=pow($ymin[$k]-$xbobotkrit[$k][$index],2);
          }
          $dplusnormalisasi[$index] = round(sqrt($dplus[$index]),6);
          $dminnormalisasi[$index] = round(sqrt($dmin[$index]),6);
          $v_akhir[$index] = round($dminnormalisasi[$index] / ($dplusnormalisasi[$index] + $dminnormalisasi[$index]),6);
          // $sorting[$index] =$v_akhir[$index];
          $index++;
        }

        

        // dd($arrnormalterbobot);
        // // dd($normalisasi);

        // $indexnormalisasi = 0;
        // $arrnilainormalisasi = [];
        // foreach ($normalisasi as $normal => $nilainormal) {
        //   $arrnilainormalisasi[$indexnormalisasi] = $nilainormal;
        //   $indexnormalisasi++;
        // }

        // // dd($arrnilainormalisasi, $normalisasi);

        // $arrnormalterbobot=[];
        // for ($i=0; $i < count($arrnilainormalisasi); $i++) { 
        //   for ($j=0; $j < count($arrnilaibobot); $j++) {
        //     $arrnormalterbobot[$i][$j]=$arrnilainormalisasi[$i][$j]*$arrnilaibobot[$i];
        //   }
        // }
        
        // dd($arrnormalterbobot);


        // $idealpositif=[];
        // for ($i=0; $i < count($arrnormalterbobot); $i++) { 
        //   $idealpositif[$i]=max($arrnormalterbobot[$i]);
        // }

        // $idealpositif = [];
        // foreach ($namakriteria as $k) {
        //   for ($i=0; $i < count($arrnormalterbobot); $i++) { 
        //     # code...
        //     dd($idealpositif[$k][$i]);
        //     $idealpositif[$i][$k] = max($arrnormalterbobot[$i]);
        //   }
        // }


        // // dd($arrnormalterbobot, $idealpositif);
        
        // $idealnegatif=[];
        // for ($i=0; $i < count($arrnormalterbobot); $i++) { 
        //   $idealnegatif[$i]=min($arrnormalterbobot[$i]);
        // }

        // // dd($idealnegatif);

        // $jarakidealpositif=[];
        // $tampung=0;
        
        // for ($i=0; $i < count($arrnormalterbobot); $i++) { 
        //   for ($j=0; $j < count($yplus); $j++) { 
        //     dd($arrnormalterbobot);
        //     // $tampung += pow(($arrnormalterbobot[$j][$i]-$yplus[$j]), 2);
        //   }
        //   // dd(sqrt($tampung));
        //   $jarakidealpositif[$i]=sqrt($tampung);
        //   $tampung = 0;
        // }
        // dd($jarakidealpositif);


        // $jarakidealnegatif=[];
        // $tampung=0;
        // for ($i=0; $i < count($arrnormalterbobot); $i++) { 
        //   for ($j=0; $j < count($idealnegatif); $j++) { 
        //     $tampung += pow(($arrnormalterbobot[$j][$i]-$idealnegatif[$j]), 2);
        //   }
        //   // dd(sqrt($tampung));
        //   $jarakidealnegatif[$i]=sqrt($tampung);
        //   $tampung = 0;
        // }
        // dd($jarakidealnegatif);

        // $nilaiv=[];
        // for ($i=0; $i < count($jarakidealpositif); $i++) { 
        //   $nilaiv[$i]=$jarakidealnegatif[$i]/($jarakidealnegatif[$i]+$jarakidealpositif[$i]);
        // }

        // // dd($nilaiv);
        

        return view('topsis',['topsis'=>$topsis, 'alternatif'=>$alternatif, 'kriteria'=>$kriteria,
            'index'=>$index, 
            'data'=>$data,
            'namakriteria' =>$namakriteria, 
            'bobot'=>$bobot,
            'normalisasi'=>$normalisasi,
            'arrnormalterbobot' => $arrnormalterbobot,
            'idealpositif' => $yplus,
            'idealnegatif' => $ymin,
            'dplusnormalisasi' => $dplusnormalisasi,
            'dminnormalisasi' => $dminnormalisasi,
            ]);
    }
}
