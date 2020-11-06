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

        $i=0;                    
        $V=array();
        $Y=array();
        $Z=array();                        
        $hasilakhir=array();
        $label_alt = array();
        $nama_alt = array();
        $vi = array();
        foreach ($data as $nama => $krit) {
          $i = $i +1;
          array_push($nama_alt,$nama);
          $n = "A" . $i;
          array_push($label_alt,$n);  
          foreach($kriteria as $k){
            $V[$i-1]=$v_akhir[$i-1];
          }
        }
        $tampung = array();
        $vi = $V;
        $length = count($label_alt);
        for ($i=0; $i < $length; $i++) { 
          array_push($tampung,array($label_alt[$i],$nama_alt[$i],$vi[$i]));
        }
        array_multisort(array_map(function($element){
            return $element[2];
          }, $tampung),SORT_DESC, $tampung);
        $sorting = count($tampung);



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
            'v_akhir' =>$v_akhir,
            'sorting'=>$sorting, 'tampung'=>$tampung
            ]);
    }


    
    public function hasil_akhir()
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

        $i=0;                    
        $V=array();
        $Y=array();
        $Z=array();                        
        $hasilakhir=array();
        $label_alt = array();
        $nama_alt = array();
        $vi = array();
        foreach ($data as $nama => $krit) {
          $i = $i +1;
          array_push($nama_alt,$nama);
          $n = "A" . $i;
          array_push($label_alt,$n);  
          foreach($kriteria as $k){
            $V[$i-1]=$v_akhir[$i-1];
          }
        }
        $tampung = array();
        $vi = $V;
        $length = count($label_alt);
        for ($i=0; $i < $length; $i++) { 
          array_push($tampung,array($label_alt[$i],$nama_alt[$i],$vi[$i]));
        }
        array_multisort(array_map(function($element){
            return $element[2];
          }, $tampung),SORT_DESC, $tampung);
        $sorting = count($tampung);

        return view('home_original',[
            'sorting'=>$sorting, 'tampung'=>$tampung
        ]);
    }
}
