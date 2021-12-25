@include('layout.headerApp')
<!-- Content -->
<main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="../dashboard">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-6 col-lg-3">
                <div class="card">
                  <div class="card-body p-0 d-flex align-items-center">
                  <i class="fa fa-list-ul bg-warning p-4 font-2xl mr-3"></i>
                    <div>
                      <div class="text-value-sm text-primary">
                        {{ $totalPengujian }}
                      </div>
                      <div class="text-muted text-uppercase font-weight-bold small">Pengujian</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-6 col-lg-3">
                <div class="card">
                  <div class="card-body p-0 d-flex align-items-center">
                  <i class="fa fa-list-ul bg-warning p-4 font-2xl mr-3"></i>
                    <div>
                      <div class="text-value-sm text-info">
                        {{ $totalKost }}
                      </div>
                      <div class="text-muted text-uppercase font-weight-bold small">Kost</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-6 col-lg-3">
                <div class="card">
                  <div class="card-body p-0 d-flex align-items-center">
                    <i class="fa fa-list-ul bg-warning p-4 font-2xl mr-3"></i>
                    <div>
                      <div class="text-value-sm text-warning">
                        8
                      </div>
                      <div class="text-muted text-uppercase font-weight-bold small">Kriteria</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
              <div class="col-6 col-lg-3">
                <div class="card">
                  <div class="card-body p-0 d-flex align-items-center">
                    <i class="fa fa-user bg-danger p-4 font-2xl mr-3"></i>
                    <div>
                      <div class="text-value-sm text-danger">
                       1
                      </div>
                      <div class="text-muted text-uppercase font-weight-bold small">Admin</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">Halaman Dashboard</div>
                  <div class="card-body">
                    <h3>Aplikasi Sistem Pendukung Keputusan Pemilihan Kost Terbaik</h3>
                    <img src="{{ asset('') }}ladun/home/images/courses_background.jpg" style="width: 100%;">
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