<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Jepnidah Hasibuan">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>SPK Pemilihan Kost berbasis Topsis </title>
    <!-- Icons-->
    <link href="{{ asset('ladun/admin/') }}/asset/vendors/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="{{ asset('ladun/admin/') }}/asset/vendors/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="{{ asset('ladun/admin/') }}/asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('ladun/admin/') }}/asset/vendors/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('ladun/admin/') }}/asset/css/style.css" rel="stylesheet">
    <link href="{{ asset('ladun/admin/') }}/asset/vendors/pace-progress/css/pace.min.css" rel="stylesheet">
</head>

<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Login</h1>
                            <p class="text-muted">Administrator</p>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="text" placeholder="Username" id="txtUsername">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input class="form-control" type="password" placeholder="Password" id="txtPassword">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="javascript:void(0)" class="btn btn-primary px-4" id="btnLogin" onclick="prosesLogin()">Login</a>
                                </div>

                            </div>

                            <div style="margin-top:20px;">
                                SPK Topsis - Pemilihan Kost by <strong>Jepnidah Hasibuan</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        const server = "{{ url('/') }}/";
        document.querySelector("#txtUsername").focus();

        function prosesLogin()
        {
            let username = document.querySelector("#txtUsername").value;
            let password = document.querySelector("#txtPassword").value;
            let ds = {'username':username, 'password':password}
            axios.post(server + "login/proses", ds).then(function(res){
                let obj = res.data;
                if(obj.status === 'no_user'){
                    window.alert("Tidak ada user !!!");
                }else if(obj.status === 'wrong_password'){
                    window.alert("Password salah !!!");
                }else{
                    window.location.assign(server + "app");
                }
            });
        }

    </script>

</body>

</html>