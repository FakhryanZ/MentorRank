@extends('navbar')
@section('heading')
<h3 class="text-center">TOPSIS</h3>
  <div class="card card-body">
    <h4>Kriteria</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                      <th rowspan='2'>No.</th>
                      <th rowspan='2'>Kode</th>
                      <th rowspan='2'>Alternatif</th>
                      <th colspan='{{$kriteria->count()}}' class="text-center">Kriteria</th>
                    </tr>
                    <tr>
                      @foreach($kriteria as $k)
                      <th>{{$k->nama_kriteria}}</th>
                      @endforeach
                    </tr>
                </thead>
                <tbody>
                <div hidden>{{$index=0}}</div>
                @foreach($data as $nama=>$krit)
                  <tr>
                    <td align='center'>{{++$index}}.</td>
                    <td align='center'>A{{$index}}</td>
                    <td>{{$nama}}</td>
                    @foreach($namakriteria as $k)
                    <td align='center'>{{$krit[$k]}}</td>
                    @endforeach
                  </tr>
                @endforeach
                </tbody>
            </table>
  </div><br>
  <div class="card card-body">
    <h4>Normalisasi</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                      <th rowspan='2'>No.</th>
                      <th rowspan='2'>Kode</th>
                      <th rowspan='2'>Alternatif</th>
                      <th colspan='{{$kriteria->count()}}' class="text-center">Kriteria</th>
                    </tr>
                    <tr>
                      @foreach($kriteria as $k)
                      <th>{{$k->nama_kriteria}}</th>
                      @endforeach
                    </tr>
                </thead>
                <tbody>
                <div hidden>{{$index=0}}</div>
                @foreach($data as $nama=>$krit)
                <tr>
                  <td align='center'>{{++$index}}.</td>
                  <td align='center'>A{{$index}}</td>
                  <td>{{$nama}}</td>
                  @foreach($namakriteria as $k)
                  <td align='center'>{{$normalisasi[$k][$index-1]}}</td>
                  @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>
  </div>

  <div class="card card-body mt-4">
    <h4>Normalisasi Terbobot</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                      <th rowspan='2'>No.</th>
                      <th rowspan='2'>Kode</th>
                      <th rowspan='2'>Alternatif</th>
                      <th colspan='{{$kriteria->count()}}' class="text-center">Kriteria</th>
                    </tr>
                    <tr>
                      @foreach($kriteria as $k)
                      <th>{{$k->nama_kriteria}}</th>
                      @endforeach
                    </tr>
                </thead>
                <tbody>
                <div hidden>{{$index=0}}</div>
                @foreach($data as $nama=>$krit)
                <tr>
                  <td align='center'>{{++$index}}.</td>
                  <td align='center'>A{{$index}}</td>
                  <td>{{$nama}}</td>
                  
                  @foreach($namakriteria as $k)
                    <td align='center'>{{$arrnormalterbobot[$k][$index-1]}}</td>
                  @endforeach
                </tr>
                @endforeach
                </tbody>
            </table>
  </div>

  <div class="card card-body mt-4">
    <h4>Solusi Ideal Positif</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                      <th rowspan='2'>No.</th>
                      <th colspan='{{$kriteria->count()}}' class="text-center">Kriteria</th>
                    </tr>
                    <tr>
                      @foreach($kriteria as $k)
                      <th>{{$k->nama_kriteria}}</th>
                      @endforeach
                    </tr>
                </thead>
                <tbody>
                <div hidden>{{$index=0}}</div>
                <tr>
                  <td align='center'>{{++$index}}.</td>
                  
                  @foreach($idealpositif as $ip)
                    <td align='center'>{{$ip}}</td>
                  @endforeach
                </tr>
                </tbody>
            </table>
  </div>

  <div class="card card-body mt-4">
    <h4>Solusi Ideal Negatif</h4>
            <table class="table table-striped table-bordered table-hover">
                <thead class="text-center">
                    <tr>
                      <th rowspan='2'>No.</th>
                      <th colspan='{{$kriteria->count()}}' class="text-center">Kriteria</th>
                    </tr>
                    <tr>
                      @foreach($kriteria as $k)
                      <th>{{$k->nama_kriteria}}</th>
                      @endforeach
                    </tr>
                </thead>
                <tbody>
                <div hidden>{{$index=0}}</div>
                <tr>
                  <td align='center'>{{++$index}}.</td>
                  
                  @foreach($idealnegatif as $in)
                    <td align='center'>{{$in}}</td>
                  @endforeach
                </tr>
                </tbody>
            </table>
  </div>
@endsection