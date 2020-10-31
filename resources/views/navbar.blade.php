<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<html>
<head>
    <link rel="shortcut icon" href="{{ asset('avatar.png') }}"">
    <title>Mentor Rank</title>
</head>
<body class="bg ">
<nav class="navbar navbar-expand-md bg-primary navbar-dark">
    <a href="{{ route('home') }}"><b class="navbar-brand">Mentor Rank</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="nav navbar-nav ">
            <li class="nav-item {{ Request::is('alternatif') ? 'active' : '' }}">
                <a href="{{ route('alternatif') }}"><div class="nav-link">Alternatif</div></a>
            </li>
            <li class="nav-item {{ Request::is('kriteria') ? 'active' : '' }}">
                <a href="{{ route('kriteria') }}"><div class="nav-link">Kriteria</div></a>
            </li>
            <li class="nav-item {{ Request::is('datanilai') ? 'active' : '' }}">
                <a href="/datanilai"><div class="nav-link">Data Nilai</div></a>
            </li>
            <li class="nav-item {{ Request::is('topsis') ? 'active' : '' }}">
                <a href="{{ route('topsis') }}"><div class="nav-link">Perhitungan Topsis</div></a>
            </li>
        </ul>
       
        @if ( Auth::check() )
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item">
                <a href="/logout"><div class="nav-link active">Logout</div></a>
            </li>
        </ul>
        @endif
    </div>
</nav>
<div>
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
