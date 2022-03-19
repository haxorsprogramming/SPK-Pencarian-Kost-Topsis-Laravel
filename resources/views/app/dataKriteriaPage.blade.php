@include('layout.headerApp')
<!-- Content -->
<main class="main" style="margin-top: 30px;">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row" id="divDataKriteria">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Data Kriteria</div>
                        <div class="card-body">
                            <div style="margin-bottom:20px;">
                                <a href="javascript:void(0)" onclick="tambahAtc()" class="btn btn-primary">Tambah Kriteria</a>
                            </div>
                            <table class="table table-responsive-sm table-striped" style="margin-top: 20px" id="tblDataKriteria">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Bobot</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataKriteria as $kriteria)
                                    <tr>
                                        <td>{{ $loop -> iteration }}</td>
                                        <td>{{ $kriteria -> kriteria }}</td>
                                        <td>{{ $kriteria -> bobot }}</td>
                                        <td>{!! $kriteria -> nilai !!}</td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="editAtc('{{ $kriteria -> id }}')" class="btn btn-success">Edit</a>
                                            <a href="javascript:void(0)" onclick="hapusAtc('{{ $kriteria -> id }}')" class="btn btn-warning">Hapus</a>
                                        </td>
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
            <div class="row" style="display: none;" id="divKriteria">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Edit Kriteria</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="company">Nama Kriteria</label>
                                <input type="text" class="form-control" id="txtNamaKriteria">
                            </div>
                            <div class="form-group">
                                <label for="company">Bobot</label>
                                <input type="text" class="form-control" id="txtBobot">
                            </div>
                            <div class="form-group">
                                <label for="company">Keterangan / Nilai</label>
                                <textarea class="form-control" id="txtNilai" style="resize:none;"></textarea>
                            </div>
                            <div class="form-group">
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="simpanAtc()">Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="display: none;" id="divTambahKriteria">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Tambah Kriteria</div>
                        <div class="card-body">
                        <div class="form-group">
                                <label for="company">Nama Kriteria</label>
                                <input type="text" class="form-control" id="txtAddNamaKriteria">
                            </div>
                            <div class="form-group">
                                <label for="company">Bobot</label>
                                <input type="text" class="form-control" id="txtAddBobotKriteria">
                            </div>
                            <div class="form-group">
                                <label for="company">Keterangan / Nilai</label>
                                <textarea class="form-control" id="txtAddNilaiKriteria" style="resize:none;"></textarea>
                            </div>
                            <div class="form-group">
                                <a href="javascript:void(0)" class="btn btn-primary" onclick="prosesTambahKriteriaAtc()">Simpan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    var idKriteriaEdit = "";

    function prosesTambahKriteriaAtc()
    {
        let nama = document.querySelector("#txtAddNamaKriteria").value;
        let bobot = document.querySelector("#txtAddBobotKriteria").value;
        let nilai = document.querySelector("#txtAddNilaiKriteria").value;
        let ds = {'nama':nama, 'bobot':bobot, 'nilai':nilai}
        let rProses = "{{ url('/app/kriteria/tambah/proses') }}";
        if(nama === "" || bobot === "" || nilai === ""){
            pesanUmumApp('warning', 'Isi field !!!', 'Harap isi semua field yang ada .. !!!');
        }else{
            axios.post(rProses, ds).then(function(res){
            pesanUmumApp('success', 'Sukses', 'Berhasil menambah data kriteria ...');
            setTimeout(function() {
                window.location.assign("{{ url('/app/data-kriteria') }}");
            }, 500);
        });
        }
        
    }

    function tambahAtc()
    {
        $("#divDataKriteria").hide();
        $("#divTambahKriteria").show();
        document.querySelector("#txtAddNamaKriteria").focus();
        
    }

    function editAtc(idKriteria) {
        $("#divDataKriteria").hide();
        $("#divKriteria").show();
        let rProses = "{{ url('/app/kriteria/get/data') }}";
        axios.post(rProses, {
            'idKriteria': idKriteria
        }).then(function(res) {
            // console.log(res.data);
            let kriteria = res.data.kriteria;
            idKriteriaEdit = kriteria.id;
            document.querySelector("#txtNamaKriteria").value = kriteria.kriteria;
            document.querySelector("#txtBobot").value = kriteria.bobot;
            document.querySelector("#txtNilai").value = kriteria.nilai;
        });
        document.querySelector("#txtNamaKriteria").focus();

        console.log(idKriteria);
    }

    function hapusAtc(idKriteria) {
        let rProses = "{{ url('/app/kriteria/hapus/proses') }}";
        axios.post(rProses, {
            'idKriteria': idKriteria
        }).then(function(res) {
            let obj = res.data;
            pesanUmumApp('success', 'Sukses', 'Berhasil menghapus data kriteria ...');
            setTimeout(function() {
                window.location.assign("{{ url('/app/data-kriteria') }}");
            }, 500);
        });
    }

    function simpanAtc() {
        let kdKriteria = idKriteriaEdit;
        let nama = document.querySelector("#txtNamaKriteria").value;
        let bobot = document.querySelector("#txtBobot").value;
        let nilai = document.querySelector("#txtNilai").value;
        let ds = {
            'kdKriteria': kdKriteria,
            'nama': nama,
            'bobot': bobot,
            'nilai': nilai
        }
        let rProses = "{{ url('/app/kriteria/update/proses') }}";
        axios.post(rProses, ds).then(function(res) {
            pesanUmumApp('success', 'Sukses', 'Berhasil mengupdate data kriteria ...');
            setTimeout(function() {
                window.location.assign("{{ url('/app/data-kriteria') }}");
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