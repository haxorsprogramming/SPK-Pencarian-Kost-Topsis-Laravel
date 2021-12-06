@include('layout.headerApp')
<!-- Content -->
<main class="main" style="margin-top: 30px;">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Data Kost</div>
                        <div class="card-body">
                            <div style="margin-bottom:20px;">
                                <a href="{{ url('/') }}/app/tambah-kost" class="btn btn-primary">Tambah Kost</a>
                            </div>
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
                                        <th>
                                            
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
                                        <td>
                                            <a href="#!" class="btn btn-warning" onclick="hapusProses('{{ $kost -> id }}')">Hapus</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- ANALISA MATRIX  -->
                    <div class="card">
                        <div class="card-header">Konversi Nilai</div>
                        <div class="card-body">
                            <table id="table_id" class="table table-bordered" style="width:100%">
                                <thead style="border-top: 1px solid #d0d0d0;">
                                    <tr>
                                        <th>
                                            <center>No </center>
                                        </th>
                                        <th>
                                            <center>Alternatif</center>
                                        </th>
                                        <th>
                                            <center>C1 (Cost)</center>
                                        </th>
                                        <th>
                                            <center>C2 (Benefit)</center>
                                        </th>
                                        <th>
                                            <center>C3 (Benefit)</center>
                                        </th>
                                        <th>
                                            <center>C4 (Benefit)</center>
                                        </th>
                                        <th>
                                            <center>C5 (Benefit)</center>
                                        </th>
                                        <th>
                                            <center>C6 (Benefit)</center>
                                        </th>
                                        <th>
                                            <center>C7 (Benefit)</center>
                                        </th>
                                        <th>
                                            <center>C8 (Benefit)</center>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataKost as $kost)
                                    <tr>
                                        <td>{{ $loop -> iteration }}</td>
                                        <td><b>(A{{$loop -> iteration}})</b> {{ $kost -> nama_kost }} </td>
                                        <td>{{ $kost -> fasilitas_angka }}</td>
                                        <td>{{ $kost -> harga_angka }}</td>
                                        <td>{{ $kost -> keamanan_angka }}</td>
                                        <td>{{ $kost -> kenyamanan_angka }}</td>
                                        <td>{{ $kost -> ukuran_angka }}</td>
                                        <td>{{ $kost -> jarak_angka }}</td>
                                        <td>{{ $kost -> kebersihan_angka }}</td>
                                        <td>{{ $kost -> tempat_angka }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<script>
    function hapusProses(kdKost)
    {
        let rProses = "{{ url('/app/kost/hapus/proses') }}";
        axios.post(rProses, {'kdKost':kdKost}).then(function(res){
            let obj = res.data;
            pesanUmumApp('success', 'Sukses', 'Berhasil menghapus kost ...');
                setTimeout(function() {
                    window.location.assign("{{ url('/app/data-kost') }}");
                }, 500);
        });
    }
    function pesanUmumApp(icon, title, text) {
        Swal.fire({
            icon: icon,
            title: title,
            text: text
        });
    }
</script>
<!-- End content  -->
@include('layout.footerApp')