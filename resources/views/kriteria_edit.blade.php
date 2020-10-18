@extends('navbar')
@section('heading')
<h3 class="text-center">EDIT KRITERIA</h3>
<div class="card card-body">	
	<form action="{{url('kriteria/update')}}/{{$kriteria->id}}" method="post">
		{{ csrf_field() }}
        {{ method_field('PUT') }}
        
		<div class="form-group row">
            <label class="col-sm-2">Kriteria</label>
            <input type="text" name="kriteria" class="form-control col-sm-10" placeholder="Nama Kriteria" value="{{$kriteria->nama_kriteria}}">
            @if($errors->has('kriteria'))
                <div class="text-danger">
                    {{$errors->first('kriteria')}}
                </div>
		    @endif
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Bobot</label>
            <input type="text" name="bobot" class="form-control col-sm-10" placeholder="Bobot Kriteria" value="{{$kriteria->bobot}}">
            @if($errors->has('bobot'))
                <div class="text-danger">
                    {{$errors->first('bobot')}}
                </div>
		    @endif
        </div>
        <div class="form-group row">
            <label class="col-sm-2">Status</label>
            <select type="text" name="status" class="form-control col-sm-10">
                <option value="" disabled {{ old('name', $kriteria->status)== '' ? 'selected':'' }}>Pilih Status</option>
                <option value="Cost" {{ old('name', $kriteria->status)== 'Cost' ? 'selected':'' }}>Cost</option>
                <option value="Benefit" {{ old('name', $kriteria->status)== 'Benefit' ? 'selected':'' }}>Benefit</option>
		    </select>
            @if($errors->has('status'))
                <div class="text-danger">
                    {{$errors->first('status')}}
                </div>
		    @endif
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Edit Kriteria">
        </div>
    </form>
</div>
@endsection