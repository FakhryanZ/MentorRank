<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<html>
<head>
	<title >{{env('APP_NAME')}}</title>
</head>
<body>
<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <a href="{{ route('home') }}"><b class="navbar-brand">TOPSIS SPK</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="nav navbar-nav ">
            <li class="nav-item {{ Request::is('alternatif') ? 'active' : '' }}">
                <a href=""><div class="nav-link">Alternatif</div></a>
            </li>
            <li class="nav-item {{ Request::is('kriteria') ? 'active' : '' }}">
                <a href="{{ route('kriteria') }}"><div class="nav-link">Kriteria</div></a>
            </li>
            <li class="nav-item {{ Request::is('detailkriteria') ? 'active' : '' }}">
                <a href=""><div class="nav-link">Detail Kriteria</div></a>
            </li>
            <li class="nav-item {{ Request::is('topsis') ? 'active' : '' }}">
                <a href=""><div class="nav-link">Perhitungan Topsis</div></a>
            </li>
        </ul>
    </div>
</nav>
<div class="bg">
    <div class="container" >
        <div class="mt-0 bottom">
            <div class="card-body" >
                @yield('heading')
            </div>
        </div>
    </div>
</div>
<footer>
    @2020 TOPSIS (Technique for Order of Preference by Similarity to Ideal Solution)
</footer>
</body>
</html>
