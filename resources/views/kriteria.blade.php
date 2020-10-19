@extends('navbar')
@section('heading')
	<h3 class="text-center">KRITERIA</h3>
 
<div class="card card-body">
	<h4>Tambah Kriteria</h4>	
	<form action="{{url('kriteria/tambah')}}" method="post">
		{{ csrf_field() }}
		<div class="row">
		<label class="col-sm-2"> Kriteria </label>
		<input type="text" name="kriteria" class="form-control col-sm-10" placeholder="Nama Kriteria" value="{{ old('kriteria') }}"> 
		@if($errors->has('kriteria'))
			<div class="text-danger">
				{{$errors->first('kriteria')}}
			</div>
		@endif
		</div>

		<div class="row">
		<label class="col-sm-2">Bobot</label>
		<input type="text" name="bobot" class="form-control col-sm-10" placeholder="Bobot Kriteria" value="{{ old('bobot') }}">
		@if($errors->has('bobot'))
			<div class="text-danger">
				{{$errors->first('bobot')}}
			</div>
		@endif
		</div>

		<div class="row">
		<label class="col-sm-2">Status</label>
		<select type="text" name="status" class="form-control col-sm-10">
			<option value="" disabled selected> == Pilih Status ==</option>
			<option value="Cost" @if(old('status')== 'Cost') selected="selected" @endif>Cost</option>
			<option value="Benefit" @if(old('status')== 'Benefit') selected="selected" @endif>Benefit</option>
		</select>
		@if($errors->has('status'))
			<div class="text-danger">
				{{$errors->first('status')}}
			</div>
		@endif
		</div>
		<input type="submit" value="Simpan" class="btn btn-success" onclick="return confirm('Menghapus data akan berpengaruh pada perhitungan, memungkinkan terjadi perubahan data !!')">
	</form>
</div>
	<br/>

<div class="card card-body">
	<h4>Daftar Kriteria</h4>
	<table class="table table-bordered table-striped text-center">
		<thead>
			<tr>
				<th>No.</th>
				<th>Nama Kriteria</th>
				<th>Bobot</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<input type="hidden" value="{{$id = ($kriteria->currentPage()-1)*$kriteria->perPage()}}">
		<tbody>
		@foreach($kriteria as $k)
			<tr>
				
				<td>{{ ++$id }}.</td>
				<td class="text-left">{{ $k->nama_kriteria }}</td>
				<td>{{ $k->bobot }}</td>
				<td>{{ $k->status }}</td>
				<td>
					<a href="{{url('kriteria/edit')}}/{{$k->id}}" class="btn btn-warning">Edit</a>
					|
					<a href="{{url('kriteria/hapus')}}/{{$k->id}}" class="btn btn-danger" onclick="return confirm('Menghapus data akan berpengaruh pada perhitungan, memungkinkan terjadi perubahan data !!')">Hapus</a>
				</td>
			</tr>
			@endforeach
		</tbody>
				</table>	
	
    Halaman : {{ $kriteria->currentPage() }} <br/>
	Jumlah Data : {{ $kriteria->total() }} <br/>
	Data Per Halaman : {{ $kriteria->perPage() }} <br/>
 
 
	{{ $kriteria->links() }}
</div>
@endsection