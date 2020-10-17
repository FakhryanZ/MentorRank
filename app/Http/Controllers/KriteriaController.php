<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Kriteria;
 
class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::paginate(10);

    	// mengirim data kriteria ke view index
    	return view('kriteria',['kriteria' => $kriteria]);
    }
    
    // method untuk edit data kriteria
    public function edit($id)
    {
        // mengambil data kriteria berdasarkan id yang dipilih
        $kriteria = Kriteria::find($id);
        // passing data kriteria yang didapat ke view edit.blade.php
        return view('kriteria_edit',['kriteria' => $kriteria]);
    
    }
}