@extends('navbar')
@section('heading')
    <h3 class="text-center">Data Nilai</h3>
    <div class="card card-body">
        <h1 class="h4 text-primary">Tambah Data Nilai</h1>
        <form action="{{url('datanilai')}}" method="post">
            <a href="{{ route('datanilaitambah') }}" class="btn btn-primary float-right">Tambah Semua Data</a><br/><br/>
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
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kriteria</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <select class="form-control" name="kriteria">
                            
                        <option value="null">== Pilih Kriteria ==</option>
                        @foreach ($kriteria as $kriteriaitem)
                            <option value={{ $kriteriaitem->id }}> {{$kriteriaitem->nama_kriteria}} </option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai" name="nilai" value="{{ old('nilai') }}">
                    @error('nilai')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-success float-right">Simpan</button>
        </form>
    </div>

    <div class="card card-body mt-5">
        <h1 class="h4 text-primary">Data Nilai</h1>
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mentor</th>
                    <th scope="col">Kriteria</th>
                    <th scope="col">Nilai</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <input type="hidden" value="{{$no = ($skor_awal->currentPage()-1)*$skor_awal->perPage()}}">
            @foreach ($skor_awal as $item)
                <tr>
                    <th scope="row"> {{++$no}} </th>
                    <td>{{ $item->nama }}</td>
                    <td>{{$item->nama_kriteria}}</td>
                    <td>{{$item->nilai}}</td>
                    <td>
                        <a href="{{url('datanilai/edit')}}/{{$item->id}}" class="btn btn-warning">Edit</a>
                        |
                        <a href="{{url('datanilai/hapus')}}/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Menghapus data akan berpengaruh pada perhitungan, memungkinkan terjadi perubahan data !!')">Hapus</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        Halaman : {{ $skor_awal->currentPage() }} <br/>
        Jumlah Data : {{ $skor_awal->total() }} <br/>
        Data Per Halaman : {{ $skor_awal->perPage() }} <br/>
    
    
        {{ $skor_awal->links() }}
    </div>
@endsection