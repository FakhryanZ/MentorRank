@extends('navbar')
@section('heading')
    <h3 class="text-center">Alternatif</h3>

<div class="card card-body">
    <h1 class="h4 text-primary">Tambah Alternatif</h1>
    <form action="{{url('alternatif/tambah')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group row">
          <label for="nama" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
          <label for="pendidikan_terakhir" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
          <div class="col-sm-10">
          <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}">
            @error('pendidikan_terakhir')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
          </div>
        </div>
        <div class="form-group row">
            <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki" checked>
                    <label class="form-check-label" for="laki-laki">Laki - Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="no_telp" class="col-sm-2 col-form-label">No Telp</label>
            <div class="col-sm-10">
            <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') }}">
            @error('no_telp')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success float-right">Simpan</button>
    </form>
</div>

<div class="card card-body mt-5">
    <h1 class="h4 text-primary">Daftar Alternatif</h1>
    <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Pendidikan Terakhir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No Telp.</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($alternatif as $item)
            <tr>
                <th scope="row">1</th>
                <td>{{$item->nama}}</td>
                <td>{{$item->pendidikan_terakhir}}</td>
                <td>{{$item->jenis_kelamin}}</td>
                <td>{{$item->no_telp}}</td>
                <td>
					<a href="{{url('alternatif/edit')}}/{{$item->id}}" class="btn btn-warning">Edit</a>
					|
					<a href="{{url('alternatif/hapus')}}/{{$item->id}}" class="btn btn-danger" onclick="return confirm('Menghapus data akan berpengaruh pada perhitungan, memungkinkan terjadi perubahan data !!')">Hapus</a>
				</td>
          </tr> 
        @endforeach     
        </tbody>
      </table>
</div>

@endsection