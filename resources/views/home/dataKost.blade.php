<!DOCTYPE html>
<html lang="en">

<head>
    <title>SPK Pemilihan Kost berbasis Topsis </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Unicat project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ url('ladun/') }}/home/styles/bootstrap4/bootstrap.min.css">
    <link href="{{ asset('ladun/') }}/home/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('ladun/') }}/home/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('ladun/') }}/home/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('ladun/') }}/home/plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('ladun/') }}/home/styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('ladun/') }}/home/styles/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>
    <div class="super_container" style="font-family: 'Noto Sans JP', sans-serif;">

        <!-- Header -->

        <header class="header">

            <!-- Header Content -->
            <div class="header_container" style="background-color: #636e72;">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header_content d-flex flex-row align-items-center justify-content-start">
                                <nav class="main_nav_contaner">
                                    <ul class="main_nav">
                                        <li><a href="{{ url('') }}/" style="color:aliceblue;">Beranda</a></li>
                                        <li><a href="{{ url('') }}/pencarianKost" style="color:aliceblue;">Pencarian Kost</a></li>
                                        <li class="active"><a href="{{ url('') }}/dataKost" style="color:aliceblue;">Data Kost"an</a></li>
                                    </ul>
                                    <div class="hamburger menu_mm">
                                        <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                    </div>
                                </nav>
                                <nav class="ml-auto">
                                    <ul class="secondary_nav">
                                        <li class="signup_button"><a href="{{ url('') }}/login">Masuk</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End header  -->

        <main class="main" style="margin-top: 30px;margin-left:40px;margin-right:40px;">
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Data Kost</div>
                                <div class="card-body">
                                   
                                    <table id="table_id" class="table table-bordered" style="width:100%">
                                        <thead style="border-top: 1px solid #d0d0d0;">
                                            <tr>
                                                <th>
                                                    <center>No </center>
                                                </th>
                                                <th>
                                                    <center>Nama Kost</center>
                                                </th>
                                                <th>
                                                    <center>Fasilitas</center>
                                                </th>
                                                <th>
                                                    <center>Harga</center>
                                                </th>
                                                <th>
                                                    <center>Keamanan</center>
                                                </th>
                                                <th>
                                                    <center>Kenyamanan</center>
                                                </th>
                                                <th>
                                                    <center>Ukuran Kost</center>
                                                </th>
                                                <th>
                                                    <center>Jarak</center>
                                                </th>
                                                <th>
                                                    <center>Kebersihan</center>
                                                </th>
                                                <th>
                                                    <center>Tempat Strategis</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dataKost as $kost)
                                            <tr>
                                                <td>{{ $loop -> iteration }}</td>
                                                <td>{{ $kost -> nama_kost }}</td>
                                                <td>{{ $kost -> fasilitas_cap }}</td>
                                                <td>{{ $kost -> harga_cap }}</td>
                                                <td>{{ $kost -> keamanan_cap }}</td>
                                                <td>{{ $kost -> kenyamanan_cap }}</td>
                                                <td>{{ $kost -> ukuran_cap }}</td>
                                                <td>{{ $kost -> jarak_cap }}</td>
                                                <td>{{ $kost -> kebersihan_cap }}</td>
                                                <td>{{ $kost -> tempat_cap }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- /.row-->
                </div>
            </div>
        </main>


        <!-- Footer -->
        <footer>
            <div style="text-align:center;margin-bottom:100px;margin-top:60px;">
                <strong>Develop by Jepnidah Hasibuan</strong><br /> Program Studi Ilmu Komputer, Fakultas Sains dan Teknologi, Universitas Islam Negeri Sumatera Utara
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
    <script src="{{ asset('ladun/') }}/home/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('ladun/') }}/home/styles/bootstrap4/popper.js"></script>
    <script src="{{ asset('ladun/') }}/home/styles/bootstrap4/bootstrap.min.js"></script>
    <script src="{{ asset('ladun/') }}/home/plugins/greensock/TweenMax.min.js"></script>
    <script src="{{ asset('ladun/') }}/home/plugins/greensock/TimelineMax.min.js"></script>
    <script src="{{ asset('ladun/') }}/home/plugins/scrollmagic/ScrollMagic.min.js"></script>
    <script src="{{ asset('ladun/') }}/home/plugins/greensock/animation.gsap.min.js"></script>
    <script src="{{ asset('ladun/') }}/home/plugins/greensock/ScrollToPlugin.min.js"></script>
    <script src="{{ asset('ladun/') }}/home/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
    <script src="{{ asset('ladun/') }}/home/plugins/easing/easing.js"></script>
    <script src="{{ asset('ladun/') }}/home/plugins/parallax-js-master/parallax.min.js"></script>
    <script src="{{ asset('ladun/') }}/home/js/custom.js"></script>
    <script>

    </script>
</body>

</html>