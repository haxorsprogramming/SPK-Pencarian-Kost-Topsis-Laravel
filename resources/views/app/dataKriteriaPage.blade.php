@include('layout.headerApp')
<!-- Content -->
<main class="main" style="margin-top: 30px;">
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Data Kriteria</div>
                        <div class="card-body">
                            <table class="table table-responsive-sm table-striped" style="margin-top: 20px" id="tblDataKriteria">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Bobot</th>
                                        <th>Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($dataKriteria as $kriteria)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td>{{ $kriteria -> kriteria }}</td>
                                    <td>{{ $kriteria -> bobot }}</td>
                                    <td>{!! $kriteria -> nilai !!}</td>
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
<!-- End content  -->
@include('layout.footerApp')