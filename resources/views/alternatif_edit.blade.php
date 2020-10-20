@extends('navbar')
@section('heading')
    <h3 class="text-center">Edit Alternatif</h3>
    <div class="card card-body">
        <form action="{{url('alternatif/update')}}/{{$alternatif->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
    
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $alternatif->nama }}">
                    @error('nama')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('pendidikan_terakhir') is-invalid @enderror" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{ $alternatif->pendidikan_terakhir }}">
                    @error('pendidikan_terakhir')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" {{ ($alternatif->jenis_kelamin=="Laki-laki")? "checked" : "" }}>
                        <label class="form-check-label" for="laki-laki">Laki - Laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" {{ ($alternatif->jenis_kelamin=="Perempuan")? "checked" : "" }}>
                        <label class="form-check-label" for="perempuan">Perempuan</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Tempat Tinggal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('tempat_tinggal') is-invalid @enderror" id="tempat_tinggal" name="tempat_tinggal" value="{{ $alternatif->tempat_tinggal }}">
                    @error('tempat_tinggal')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">No Telp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ $alternatif->no_telp }}">
                    @error('no_telp')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-success float-right">Update</button>
        </form>
    </div>
@endsection