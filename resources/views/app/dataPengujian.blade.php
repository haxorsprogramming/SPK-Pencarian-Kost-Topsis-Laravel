@include('layout.headerApp')
<!-- Content -->
<main class="main" style="margin-top: 30px;">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Data Pengujian</div>
                        <div class="card-body">
                            <table id="tblDataPengujian" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penguji</th>
                                        <th>Waktu Pengujian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dataPengujian as $pengujian)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td>{{ $pengujian -> nama_penguji }}</td>
                                    <td>{{ $pengujian -> created_at }}</td>
                                    <td>
                                        <a href="{{ url('/hasilPencarianAdmin/') }}/{{ $pengujian -> token }}" target="new" class="btn btn-primary">Detail</a>&nbsp;
                                        <a href="javascript:void(0)" class="btn btn-warning" onclick="hapusAtc('{{ $pengujian -> token }}')">Hapus</a>
                                    </td>
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
    $("#tblDataPengujian").dataTable();

    function hapusAtc(token)
    {
        let rProses = "{{ url('/app/pengujian/hapus/proses') }}";
        axios.post(rProses, {'token':token}).then(function(res){
            pesanUmumApp('success', 'Sukses', 'Berhasil menghapus data pengujian ...');
            setTimeout(function() {
                window.location.assign("{{ url('/app/data-pengujian') }}");
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