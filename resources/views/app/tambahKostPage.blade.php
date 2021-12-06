@include('layout.headerApp')
<!-- Content -->
<main class="main" style="margin-top: 30px;">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Tambah Data Kost</div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="company">Nama Kost</label>
                                <input type="text" class="form-control" id="txtNamaKost">
                            </div>
                            <div class="form-group">
                                <label for="company">Alamat Kost</label>
                                <input type="text" class="form-control" id="txtAlamatKost">
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
                                <select class="form-control" id="txtHarga" name="txtHarga">
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
                                <select class="form-control" id="txtKenyamanan" name="txtKenyamanan">
                                    <option value="1">Mayoritas non-muslim, tidak ada mesjid, tidak ada gereja</option>
                                    <option value="2">Mayoritas non-muslim, tidak ada mesjid, tidak ada gereja, interaksi sosial</option>
                                    <option value="3">Mayoritas muslim, lingkungan sehat</option>
                                    <option value="4">Mayoritas muslim, ada mesjid, ada gereja</option>
                                    <option value="5">Mayoritas muslim, ada mesjid</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="company">Ukuran kost</label>
                                <select class="form-control" id="txtUkuran" name="txtUkuran">
                                    <option value="5">3 X 4 Meter</option>
                                    <option value="4">3 X 3 Meter</option>
                                    <option value="3">2,5 X 3,4 Meter</option>
                                    <option value="2">2,5 X 3 Meter</option>
                                    <option value="1">2 x 2,5 Meter</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="company">Jarak</label>
                                <select class="form-control" id="txtJarak" name="txtJarak">
                                    <option value="5">3 - 5 Menit</option>
                                    <option value="4">6 - 8 Menit</option>
                                    <option value="3">9 - 11 Menit</option>
                                    <option value="2">12 - 14 Menit</option>
                                    <option value="1">14 - 17 Menit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="company">Kebersihan</label>
                                <select class="form-control" id="txtKebersihan" name="txtKebersihan">
                                    <option value="5">Ada petugas kebersihan</option>
                                    <option value="4">Ada jadwal piket</option>
                                    <option value="3">Pemilik kost membantu kebersihan kost</option>
                                    <option value="2">Kebersihan menjadi tanggung jawab bersama</option>
                                    <option value="1">Kebersihan menjadi tanggung jawab masing masing</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="company">Tempat Strategis</label>
                                <select class="form-control" id="txtTempatStrategis" name="txtTempatStrategis">
                                    <option value="4">Dekat kampus, warung makan</option>
                                    <option value="5">Dekat kampus, warung makan, toko kelontong</option>
                                    <option value="3">Warung makan, toko kelontong, foto copy</option>
                                    <option value="2">Warung makan, toko kelontong, foto copy, laundry</option>
                                    <option value="1">Warung makan, toko kelontong, foto copy, laundry, atm</option>
                                </select>
                            </div>
                            <div class="row align-items-center mt-3">
                                <div class="col-sm-6">
                                    <a href="javascript:void(0)" class="btn btn-primary btn-lg btn-block" id="btnSimpan" onclick="prosesSimpan()">Simpan</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
    </div>
</main>
<!-- End content  -->
<script>
    document.querySelector("#txtNamaKost").focus();
    const server = "{{ url('/') }}/";

    function prosesSimpan() {
        var namaKost = document.querySelector("#txtNamaKost").value;
        var alamatKost = document.querySelector("#txtAlamatKost").value;
        if (namaKost === '') {
            pesanUmumApp("warning", "Isi field !!!", "Harap isi nama kost !!!");
        } else {
            let fasilitas = document.querySelector("#txtFasilitas").value;
            let harga = document.querySelector("#txtHarga").value;
            let keamanan = document.querySelector("#txtKeamanan").value;
            let kenyamanan = document.querySelector("#txtKenyamanan").value;
            let ukuran = document.querySelector("#txtUkuran").value;
            let jarak = document.querySelector("#txtJarak").value;
            let kebersihan = document.querySelector("#txtKebersihan").value;
            let tempat = document.querySelector("#txtTempatStrategis").value;
            let ds = {
                'nama': namaKost,
                'alamat': alamatKost,
                'fasilitas': fasilitas,
                'harga': harga,
                'keamanan': keamanan,
                'kenyamanan': kenyamanan,
                'ukuran': ukuran,
                'jarak': jarak,
                'kebersihan': kebersihan,
                'tempat': tempat
            }

            axios.post(server + 'app/tambah-kost/proses', ds).then(function(res) {
                let obj = res.data;
                pesanUmumApp('success', 'Sukses', 'Berhasil menambahkan data kost ...');
                setTimeout(function() {
                    window.location.assign(server + "app/data-kost");
                }, 500);
            });
            // $.post(server + "/admin/prosesTambahKost", ds, function(res){
            //     let obj = JSON.parse(res);
            //     let status = obj.status;
            //     pesanUmumApp('success', 'Sukses', 'Berhasil menambahkan data kost ...');
            //         setTimeout(function(){
            //             window.location.assign(server+"admin/dataKost");
            //         }, 500);
            // });
        }
    }

    function pesanUmumApp(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }
</script>
@include('layout.footerApp')