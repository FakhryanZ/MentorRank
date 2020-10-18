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
    
    //method untuk insert data ke table kriteria
    public function tambah(Request $request)
    {
        $this->validate($request,[
            'kriteria' => 'required',
            'bobot' => 'required',
            'status' => 'required'
        ]);

        if (Kriteria::count() < 1) {
            Kriteria::create([
                'id' => 1,
                'nama_kriteria' => $request->kriteria,
                'bobot' => $request->bobot,
                'status' => $request->status
            ]);
        }else{
            $last_id = Kriteria::orderBy('id', 'DESC')->first();
            Kriteria::create([
                'id' => (int)$last_id->id+1,
                'nama_kriteria' => $request->kriteria,
                'bobot' => $request->bobot,
                'status' => $request->status
            ]);
        }
        // alihkan halaman ke halaman kriteria
        return redirect()->route('kriteria');
    }

    // method untuk edit data kriteria
    public function edit($id)
    {
        // mengambil data kriteria berdasarkan id yang dipilih
        $kriteria = Kriteria::find($id);
        // passing data kriteria yang didapat ke view kriterian_edit.blade.php
        return view('kriteria_edit',['kriteria' => $kriteria]);
    
    }

    // update data kriteria
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'kriteria' => 'required',
            'bobot' => 'required',
            'status' => 'required'
        ]);

        // update data kriteria
        $kriteria = Kriteria::find($id);
        $kriteria->nama_kriteria = $request->kriteria;
        $kriteria->bobot = $request->bobot;
        $kriteria->status = $request->status;
        $kriteria->save();
        // alihkan halaman ke halaman kriteria
        return redirect()->route('kriteria');
    }
    
    // method untuk hapus data pegawai
    public function hapus($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
            
        // alihkan halaman ke halaman kriteria
        return redirect()->route('kriteria');
    }
}