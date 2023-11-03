<?php 

session_start();
if(isset($_SESSION["admin"])){
    header("location: /admin/");
}
?>
<!doctype html>
<html lang="tr">

<head>
        
        <meta charset="utf-8" />
        <title>Oturum Aç</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="assets/libs/toastr/build/toastr.min.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body  style="background:url('assets/images/bg-admin.jpg');background-size:cover;">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Hoşgeldin !</h5>
                                            <p>Yönetim paneline erişmek için giriş yapmalısın.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0"> 
                                <div class="auth-logo">
                                    

                                    <a href="https://metatige.com" target="_blank" class="auth-logo-dark">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="assets/images/metatige-vdark.png" alt="" class="rounded-circle" height="50">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form class="form-horizontal" action="https://themesbrand.com/skote-django/layouts/index.html">
        
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Kullanıcı adı</label>
                                            <input type="text" class="form-control" id="username" placeholder="Kullanıcı adınızı girin">
                                        </div>
                
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Şifre</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" placeholder="Şifrenizi girin" aria-label="Password" aria-describedby="password-addon" id="password">
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>

                                        
                                        
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" id="btnLogin" type="submit">Oturum Aç</button>
                                        </div>
            
                                        

                                        <div class="mt-4 text-center">
                                        <div>
                              
                                <p>Copyright © <script>document.write(new Date().getFullYear())</script> <a href="https://metatige.com" target="_blank">Metatige Dijital</a> | Tüm hakları saklıdır.</p>
                            </div>
                                        </div>
                                    </form>
                                </div>
            
                            </div>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/toastr/build/toastr.min.js"></script>
        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script type="text/javascript">
            $("#btnLogin").on("click", function(e){
                e.preventDefault();
                let username = $("#username").val();
                let password = $("#password").val();

                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/admin.php',
                    dataType  :'JSON',
                    data:{
                        "req":"login",
                        username:username,
                        password:password
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.assign("/admin/");
                            }, 1000);
                        }
                    }
                })
            })
        </script>
    </body>
</html>
