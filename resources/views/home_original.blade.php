<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles2.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/styles2.css')}}"> -->
	<!-- Favicon  -->
</head >
<body data-spy="scroll" data-target=".fixed-top">
@extends('navbar')
@section('home')
    <!-- Header -->
    <header id="header" class="header">
        <div class="header-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-container">
                            <h1><span class="turquoise">Mentor Rank</span></h1>
                            <p class="p-large">Sistem Pendukung Keputusan  dalam pemilihan
                                mentor menggunakan metode Technique for Order of Preference by
                                Similarity to Ideal Solution (TOPSIS)</p>
                        </div> <!-- end of text-container -->
                    </div> <!-- end of col -->
                    <div class="col-lg-6">
                        <div class="image-container">
                            <img class="img-fluid" src="images/header-teamwork.svg" alt="alternative">
                        </div> <!-- end of image-container -->
                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of header-content -->
    </header> <!-- end of header -->
    <!-- end of header -->


    <!-- Services -->
    <div id="services" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Fitur-fitur Mentor Rank</h2>
                    <p class="p-heading p-large">Ada 4 fitur yang disediakan, antara lain:</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="images/services-icon-1.svg" alt="alternative">
                        <div class="card-body">
                            <a class="turquoise" href="{{ route('alternatif') }}">
                                <h4 class="card-title">Alternatif</h4>
                            </a>
                            <p>Menampilkan biodata dari mentor yang berpartisipasi</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="images/services-icon-2.svg" alt="alternative">
                        <div class="card-body">
                            <a class="turquoise" href="{{ route('kriteria') }}">
                                <h4 class="card-title">Kriteria</h4>
                            </a>
                            <p>Menampilkan kriteria-kriteria yang dibutuhkan dalam penilaian</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                        <img class="card-image" src="images/services-icon-3.svg" alt="alternative">
                        <div class="card-body">
                            <a class="turquoise" href="{{ route('datanilai') }}">
                                <h4 class="card-title">Data Nilai</h4>
                            </a>
                            <p>Penilaian mentor untuk setiap kriteria-kriteria yang diberikan</p>
                        </div>
                    </div>

                    <div class="card">
                        <img class="card-image" src="images/services-icon-3.svg" alt="alternative">
                        <div class="card-body">
                            <a class="turquoise" href="{{ route('topsis') }}">
                                <h4 class="card-title">Perhitungan TOPSIS</h4>
                            </a>
                            <p>Proses perhitungan sistem pendukung keputusan dalam pemilihan mentor</p>
                        </div>
                    </div>
                    <!-- end of card -->
                    
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of services -->
    
    <!-- Details 2 -->
    <div class="basic-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="images/details-2-office-team-work.svg" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <div class="text-container">
                        <h2>Langkah - Langkah Perhitungan TOPSIS</h2>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Menentukan alternatif-alternatif yang akan dipilih, yaitu A<sub>i</sub> = (i = 1, 2, 3, ..., m).</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Menentukan kriteria-kriteria yang akan dipilih C<sub>j</sub> = (j = 1, 2, 3, ..., n).</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Menentukan matriks skor dari setiap alternatif (matriks X), yaitu: <br/>
									<!-- Dimana: <br/>
									<ul>
										Xij	= Skor alternative I dan kriteria j <br/>
										M	= banyaknya alternatif <br/>
										N	= banyaknya kriteria<br/> 
									</ul></div> -->
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Menentukan skor ternormalisasi dari masing-masing alternatif untuk tiap kriteria (r<sub>ij</sub>)</div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Menentukan matriks skor normalisasi terbobot dengan persamaan 
                                    <br/><ul>y<sub>ij</sub> = w<sub>j</sub> x r<sub>ij</sub></ul>
                                </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Menentukan matriks solusi ideal positif (y<sub>j</sub><sup>+</sup>) dan negatif (y<sub>j</sub><sup>-</sup> ), yaitu: <br/>
                                    <ul>
										<li>𝐴+ → y<sub>j</sub><sup>+</sup> = max(y<sub>ij</sub>) pada atribut 𝑏𝑒𝑛𝑒𝑓𝑖𝑡 dan min yij pada atribut 𝑐𝑜𝑠𝑡 <br/></li>
										<li>𝐴− → y<sub>j</sub><sup>-</sup> = min(y<sub>ij</sub>) pada atribut 𝑏𝑒𝑛𝑒𝑓𝑖𝑡 dan max y<sub>ij</sub>> pada atribut 𝑐𝑜st</li>
									</ul>
                                </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Menentukan jarak tiap alternatif dari solusi ideal positif (Di<sup>+</sup>) dan jarak tiap alternatif dari solusi ideal negatif (Di<sup>-</sup>)<br/>
									<!-- <ul>
										<li>hh</li>
										<li>hh</li>
                                    </ul> -->
                                </div>
                            </li>
                            <li class="media">
                                <i class="fas fa-check"></i>
                                <div class="media-body">Menentukan skor akhir dari setiap alternatif (Vi )</div>
                            </li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-2 -->
    <!-- end of details 2 -->

    
    <!-- Pricing -->
    <div id="pricing" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Hasil Perhitungan TOPSIS</h2>
                    <p class="p-heading p-large">Hasil akhir sistem pendukung keputusan pemilihan mentor menggunakan metode TOPSIS</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
                <table class="table table-striped table-bordered table-hover">
                    <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Alternatif</th>
                        <th>Skor Akhir (V)</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @for ($i=0; $i < $sorting; $i++)
                        <tr>
                        <td>{{$i + 1}}.</td>
                        <td>{{$tampung[$i][0]}}</td>
                        <td align='left'>{{$tampung[$i][1]}}</td>
                        <td>{{$tampung[$i][2]}}</td> 
                        </tr>
                    @endfor
                    </tbody>
                </table>
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of pricing -->


     <!-- kesimpulan -->
     <div id="kesimpulan" class="cards-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Kesimpulan</h2>
                    <p class="p-heading p-large">Sistem ini hanya digunakan untuk membantu penentuan mentor terbaik, sistem merekomendasikan kriteria <b> Penguasaan Materi </b>, kriteria <b>Pengembangan Kurikulum </b>, & kriteria <b> Tanggung Jawab </b> sebagai acuan mentor terbaik</p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-2 -->
    <!-- end of kesimpulan -->


    <!-- deskripsi -->
    <div id="deskripsi" class="basic-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Anggota Kelompok</h2>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="images/team-member-2.svg" alt="alternative">
                        </div> <!-- end of image-wrapper -->
                        <p class="p-large"><strong>Hernanda Candra P. </strong></p>
                        <p class="job-title">1741720184</p>
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->
                    
                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="images/team-member-2.svg" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>M. Fakhryan Zulfahmi</strong></p>
                        <p class="job-title">1741720078 </p>
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                    <!-- Team Member -->
                    <div class="team-member">
                        <div class="image-wrapper">
                            <img class="img-fluid" src="images/team-member-1.svg" alt="alternative">
                        </div> <!-- end of image wrapper -->
                        <p class="p-large"><strong>Dwi Ananda Irhama</strong></p>
                        <p class="job-title">1741720109</p>
                    </div> <!-- end of team-member -->
                    <!-- end of team member -->

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    <!-- end of deskripsi -->

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="footer-col">
                        <h4>Mentor Rank</h4>
                        <p>Sistem pendukung keputusan dalam pemilihan
                            mentor menggunakan metode Technique for Order of Preference by
                            Similarity to Ideal Solution (TOPSIS)</p>
                    </div>
                </div> <!-- end of col -->
                <div class="col-md-5">
                    <div class="footer-col middle">
                        <h4>Colaborators Team</h4>
                        <ul class="list-unstyled li-space-lg">
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Github : <a class="turquoise" href="https://github.com/FakhryanZ/MentorRank">https://github.com/FakhryanZ/MentorRank</a></div>
                            </li>
                            <li class="media">
                                <i class="fas fa-square"></i>
                                <div class="media-body">Trello :  <a class="turquoise" href="https://trello.com/b/LyMe2DjM/mentorrank">https://trello.com/b/LyMe2DjM/mentorranks</a></div>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->
    	
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/validator.min.js"></script>
    <script src="js/scripts.js"></script>
@endsection
</body>
