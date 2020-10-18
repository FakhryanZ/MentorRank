<?php 

namespace App\Http\Controllers;

use App\Alternatif;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index()
    {
        $data = Alternatif::all();

        return view('alternatif', ['alternatif'=>$data]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:30',
            'pendidikan_terakhir' => 'required|max:5',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required|digits_between:11,13'
        ]);

        $data = new Alternatif;

        $data->nama = $request->nama;
        $data->pendidikan_terakhir = $request->pendidikan_terakhir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->no_telp = $request->no_telp;
        
        $data->save();

        return redirect()->route('alternatif');
    }

    public function edit($id)
    {
        $data = Alternatif::find($id);

        return view('alternatif_edit', ['alternatif'=>$data]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama' => 'required',
            'pendidikan_terakhir' => 'required',
            'no_telp' => 'required'
        ]);

        $alternatif = Alternatif::find($id);
        $alternatif->nama = $request->nama;
        $alternatif->pendidikan_terakhir = $request->pendidikan_terakhir;
        $alternatif->jenis_kelamin = $request->jenis_kelamin;
        $alternatif->no_telp = $request->no_telp;

        $alternatif->save();

        return redirect()->route('alternatif');
    }


    public function delete($id)
    {
        $data = Alternatif::find($id);
        $data->delete();

        return redirect()->route('alternatif');
    }
}


?>