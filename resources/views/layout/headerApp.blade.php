<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>SPK Pemilihan Kost berbasis Topsis </title>
    <!-- Icons-->
    <link href="{{ asset('ladun/admin') }}/asset/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="{{ asset('ladun/admin') }}/asset/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="{{ asset('ladun/admin') }}/asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('ladun/admin') }}/asset/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="https://s3.jagoanstorage.com/aditia-storage/lib/datatable/datatables.min.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('ladun/admin') }}/asset/css/style.css" rel="stylesheet">
    <link href="{{ asset('ladun/admin') }}/asset/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <script src="{{ asset('ladun/admin') }}/asset/vendors/jquery/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://s3.jagoanstorage.com/aditia-storage/lib/datatable/jquery.dataTables.min.js"></script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img class="navbar-brand-full" src="{{ asset('ladun/admin') }}/asset/img/brand/logo.png" width="49" alt="Uinsu Logo">
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav ml-auto">

            <li class="nav-item d-md-down-none nama_admin">
                Halo, Admin
            </li>
            <li class="nav-item dropdown" style="margin-right: 25px">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="img-avatar" src="{{ asset('ladun/admin') }}/asset/img/avatars/no-profile-picture.png" alt="admin@bootstrapmaster.com">
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div>
                    <a class="dropdown-item" href="{{ url('/auth/logout') }}">
                        <i class="fa fa-lock"></i> Logout</a>
                </div>
            </li>
        </ul>
    </header>
    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/app">
                            <i class="nav-icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/app/data-kriteria">
                            <i class="nav-icon icon-list"></i> Data Kriteria
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/app/data-kost">
                            <i class="nav-icon icon-list"></i> Data Kost
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/app/data-pengujian">
                            <i class="nav-icon icon-list"></i> Data Pengujian
                        </a>
                    </li>
                </ul>
            </nav>
            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>