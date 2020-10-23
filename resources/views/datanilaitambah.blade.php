@extends('navbar')
@section('heading')
    <h3 class="text-center">Data Nilai</h3>
    <div class="card card-body">
        <h1 class="h4 text-primary">Tambah Data Nilai</h1>
        <form action="{{url('datanilai/tambah')}}" method="post">
            <a href="{{ route('datanilai') }}" class="btn btn-primary float-right">Kembali</a><br/><br/>
            {{ csrf_field() }}
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mentor</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <select class="form-control" name="mentor">
                        <option value="null">== Pilih Mentor ==</option>
                        @foreach ($alternatif as $alteritem)
                            <option value={{ $alteritem->id }}> {{$alteritem->nama}} </option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            @foreach ($kriteria as $kriteriaitem)
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">{{ $kriteriaitem->nama_kriteria }}</label>
                <div class="col-sm-10">
                    <input type="text" name="{{str_replace(' ', '', $kriteriaitem->nama_kriteria)}}" placeholder="Masukkan Nilai {{ $kriteriaitem->nama_kriteria}}" class="form-control" value="{{ old('$kriteriaitem->nama_kriteria ') }}" required> 
                </div>
            </div>
            @endforeach
            <button type="submit" value="Simpan" class="btn btn-success float-right">Simpan</button>
        </form>
    </div>
@endsection