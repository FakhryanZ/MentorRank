@extends('navbar')
@section('heading')
    <h3 class="text-center">Edit Data Nilai</h3>
    <div class="card card-body">
        
        <form action="{{url('datanilai/update')}}/{{$datanilai->id}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mentor</label>
                <div class="col-sm-10">
                    <div class="form-group">
                    <input type="hidden" name="alternatif_id" value={{$datanilai->alternatif_id}}>
                    {{ $skor_awal->nama }}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kriteria</label>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input type="hidden" name="kriteria_id" value={{$datanilai->kriteria_id}}>
                        {{ $skor_awal->nama_kriteria }}
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="nilai" class="col-sm-2 col-form-label">Nilai</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nilai') is-invalid @enderror" id="nilai" name="nilai" value="{{ $datanilai->nilai }}">
                    @error('nilai')
                        <div class="alert alert-danger"> {{$message}} </div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-success float-right">Update</button>
        </form>
    </div>

@endsection