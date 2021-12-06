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
                                    <li><a href="{{ url('') }}/"  style="color:aliceblue;">Beranda</a></li>
									<li class="active"><a href="{{ url('') }}/pencarianKost" style="color:aliceblue;">Pencarian Kost</a></li>
									<li><a href="{{ url('') }}/dataKost"  style="color:aliceblue;">Data Kost"an</a></li>
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
    <div class="container">
        <div class="features">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">Rekomendasi Pencarian Kost</div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="txtNama">Nama Pencari Kost</label>
                                        <input type="text" nama="txtNama" id="txtNama" placeholder="Nama Pencari Kost" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Fasilitas</label>
                                        <select class="form-control" name="txtFasilitas" id="txtFasilitas">
                                            <option value="5">Kasur, Lemari, Dapur, Kamar Mandi, AC, WIFI</option>
                                            <option value="4">Kasur, Lemari, Dapur, Kamar Mandi, AC</option>
                                            <option value="3">Kasur, Kamar Mandi, Wifi</option>
                                            <option value="2">Kasur, Lemari, Kamar Mandi</option>
                                            <option value="1">Kasur, Kamar Mandi</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Harga</label>
                                        <select class="form-control" name="txtHarga" id="txtHarga">
                                            <option value="1">Rp. 500.000 - Rp. 600.000</option>
                                            <option value="2">Rp. 450.000 - Rp. 500.000</option>
                                            <option value="3">Rp. 400.000 - Rp. 450.000</option>
                                            <option value="4">Rp. 350.000 - Rp. 400.000</option>
                                            <option value="5">Rp. 400.000 - Rp. 300.000</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Keamanan</label>
                                        <select class="form-control" id="txtKeamanan" name="txtKeamanan">
                                            <option value="5">Security, Pemantauan CCTV</option>
                                            <option value="4">Security</option>
                                            <option value="3">Tidak ada pemilik kost</option>
                                            <option value="2">Ada pemilik kost dan penjaga kost</option>
                                            <option value="1">Ada pemilik kost</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Kenyamanan</label>
                                        <select class="form-control" name="txtKenyamanan" id="txtKenyamanan">
                                            <option value="1">Mayoritas non-muslim, tidak ada mesjid, tidak ada gereja</option>
                                            <option value="2">Mayoritas non-muslim, tidak ada mesjid, tidak ada gereja, interaksi sosial</option>
                                            <option value="3">Mayoritas muslim, lingkungan sehat</option>
                                            <option value="4">Mayoritas muslim, ada mesjid, ada gereja</option>
                                            <option value="5">Mayoritas muslim, ada mesjid</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Ukuran kost</label>
                                        <select class="form-control" name="txtUkuran" id="txtUkuran">
                                            <option value="5">3 X 4 Meter</option>
                                            <option value="4">3 X 3 Meter</option>
                                            <option value="3">2,5 X 3,4 Meter</option>
                                            <option value="2">2,5 X 3 Meter</option>
                                            <option value="1">2 x 2,5 Meter</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Jarak</label>
                                        <select class="form-control" name="txtJarak" id="txtJarak">
                                            <option value="5">3 - 5 Menit</option>
                                            <option value="4">6 - 8 Menit</option>
                                            <option value="3">9 - 11 Menit</option>
                                            <option value="2">12 - 14 Menit</option>
                                            <option value="1">14 - 17 Menit</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Kebersihan</label>
                                        <select class="form-control" name="txtKebersihan" id="txtKebersihan">
                                            <option value="5">Ada petugas kebersihan</option>
                                            <option value="4">Ada jadwal piket</option>
                                            <option value="3">Pemilik kost membantu kebersihan kost</option>
                                            <option value="2">Kebersihan menjadi tanggung jawab bersama</option>
                                            <option value="1">Kebersihan menjadi tanggung jawab masing masing</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Tempat Strategis</label>
                                        <select class="form-control" name="txtTempatStrategis" id="txtTempatStrategis">
                                            <option value="5">Dekat kampus, warung makan, toko kelontong</option>
                                            <option value="4">Dekat kampus, warung makan</option>
                                            <option value="3">Warung makan, toko kelontong, foto copy</option>
                                            <option value="2">Warung makan, toko kelontong, foto copy, laundry</option>
                                            <option value="1">Warung makan, toko kelontong, foto copy, laundry, atm</option>
                                        </select>
                                    </div>
                                    <div>
                                        <a href="javascript:void(0)" onclick="prosesPerhitungan()" class="btn btn-primary" id="btnProses">Proses</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Footer -->
        <footer>
            <div style="text-align:center;margin-bottom:100px;">
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
        document.querySelector("#txtNama").focus();
        var rProses = "{{ url('/pencarianKost/proses') }}";
        function prosesPerhitungan()
        {
            let nama = document.querySelector("#txtNama").value;
            if(nama === ''){
                window.alert("Harap isi nama pencari kost !!!");
            }else{
                let c1 = document.querySelector("#txtFasilitas").value;
                let c2 = document.querySelector("#txtHarga").value;
                let c3 = document.querySelector("#txtKeamanan").value;
                let c4 = document.querySelector("#txtKenyamanan").value;
                let c5 = document.querySelector("#txtUkuran").value;
                let c6 = document.querySelector("#txtJarak").value;
                let c7 = document.querySelector("#txtKebersihan").value;
                let c8 = document.querySelector("#txtTempatStrategis").value;

                let ds = {'nama':nama, 'c1':c1, 'c2':c2, 'c3':c3, 'c4':c4, 'c5':c5, 'c6':c6, 'c7':c7, 'c8':c8 }

                axios.post(rProses, ds).then(function(res){
                    let obj = res.data;
                    let token = obj.token;
                    window.location.assign("{{ url('/hasilPencarian/') }}/"+token);
                });

            }
        }
    </script>
</body>

</html>