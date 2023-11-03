<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require("class/db.php");

if(!isset($_SESSION["admin"])){
    header("location: /admin/");
}
$db = new Database;

$admin = $db->selectAnd("admin",["id"=>$_SESSION["aid"]]);

?>



<!doctype html>
<html lang="tr">

    <head>
        
        <meta charset="utf-8" />
        <title>Yönetim Paneli</title>
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

    <body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <?php 
                include 'include/topbar.php';
                include 'include/sidebar.php';
            ?>

            <!-- ========== Left Sidebar Start ========== -->
            
            <!-- Left Sidebar End -->

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <?php 
                            $reqeust = explode("/",$_SERVER["REQUEST_URI"]);
                            
                            if($reqeust[1] == "admin"){
                                
                                if(@$_GET["page"]){
                                    $page = "view/".$_GET["page"].".php";
                                    if(file_exists($page)){
                                        require($page);
                                    }else{
                                        echo "404";
                                    }
                                }else{
                                    require("view/home.php");
                                }
                            }else{
                                header("location: ../");
                            }
                        ?>
                    </div>
                    <!-- container-fluid -->
                </div>


                <?php include 'include/footer.php'; ?>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- dashboard init -->
        <script src="assets/js/pages/dashboard.init.js"></script>
        <script src="assets/js/jquery-input-mask-phone-number.js"></script>
        <script src="assets/libs/toastr/build/toastr.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script>
            $(".btnAddVisitor").on("click", function(){
                $("#visitorModal").modal("show");

                $('#inputPhone').usPhoneFormat({
                    format: '(xxx) xxx-xxxx',
                });  
            });
             
            $("#btnSaveVisit").on("click", function(){
                let fullname = $("#inputFullname").val();
                let company = $("#inputCompany").val();
                let email = $("#inputEmail").val();
                let phone = $("#inputPhone").val();
                let person = $("#inputPerson").val();
                let reason = $("#inputReasonVisit").val();

                $.ajax({
                    type : 'POST',
                    url  :'/admin/core/visitor.php',
                    dataType : 'JSON',
                    data : {
                        "req":"addVisitor",
                        fullname:fullname,
                        company:company,
                        email:email,
                        phone:phone,
                        person:person,
                        reason:reason
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
            });


            $(".btnOkCargo").on("click", function(){
                let id = $(this).parent("td").attr("id");
                
                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/cargo.php',
                    dataType : 'JSON',
                    data : {
                        "req":"ok_cargo",
                        id:id
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
            });
            $(".btnRedCargo").on("click", function(){
                let id = $(this).parent("td").attr("id");
                
                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/cargo.php',
                    dataType : 'JSON',
                    data : {
                        "req":"red_cargo",
                        id:id
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
            });

            $(".btnExitStaff").on("click", function(){
                let id = $(this).parent("td").attr("id");
                
                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/user.php',
                    dataType : 'JSON',
                    data : {
                        "req":"exit_staff",
                        id:id
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
            });

            $(".btnAddSupport").on("click", function(){
                let icon = $("#icon").val();
                let title = $("#title").val();
                let value = $("#value").val();

                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/support.php',
                    dataType : 'JSON',
                    data : {
                        "req":"add_support",
                        icon:icon,
                        title:title,
                        value:value
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
            });

            $(".btnDelSupport").on("click", function(){

                let id = $(this).parent("td").attr("id");

                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/support.php',
                    dataType : 'JSON',
                    data : {
                        "req":"del_support",
                        id:id
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
            });

            $(".btnPutStaff").on("click", function(){

                let no = $("#staffNumber").val();

                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/support.php',
                    dataType : 'JSON',
                    data : {
                        "req":"put_staff",
                        no:no
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
            });

            $(".btnAddAdmin").on("click", function(){
                let username = $("#inputAdminUname").val();
                let password = $("#inputAdminPassword").val();
                
                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/admin.php',
                    dataType : 'JSON',
                    data : {
                        "req":"add_admin",
                        username:username,
                        password:password
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.assign("main.php?page=account&show=admin&q=all");
                            }, 1000);
                        }
                    }
                })
            });

            $(".btnDelAdmin").on("click", function(){
                let id = $(this).parent("td").attr("id");
               
                
                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/admin.php',
                    dataType : 'JSON',
                    data : {
                        "req":"del_admin",
                        id:id
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
            });




            $(".btnAddStaff").on("click", function(){
                let fname = $("#inputStaffFname").val();
                let lname = $("#inputStaffLname").val();
                let email = $("#inputStaffEmail").val();
                let phone = $("#inputStaffPhone").val();

                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/user.php',
                    dataType : 'JSON',
                    data : {
                        "req":"add_staff",
                        fname:fname,
                        lname:lname,
                        email:email,
                        phone:phone
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.assign("main.php?page=account&show=staff&q=all");
                            }, 1000);
                        }
                    }
                })
            });

            $(".btnDelStaff").on("click", function(){
                let id = $(this).parent("td").attr("id");
               
                
                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/user.php',
                    dataType : 'JSON',
                    data : {
                        "req":"del_staff",
                        id:id
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
            });

            
            $(".btnAddCargo").on("click", function(){
                let name = $("#inputCargoName").val();

                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/cargo.php',
                    dataType : 'JSON',
                    data : {
                        "req":"add_cargo",
                        name:name,
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.assign("main.php?page=account&show=cargo&q=all");
                            }, 1000);
                        }
                    }
                })
            });

            $(".btnDelCargo").on("click", function(){
                let id = $(this).parent("td").attr("id");
               
                
                $.ajax({
                    type : 'POST',
                    url  : '/admin/core/cargo.php',
                    dataType : 'JSON',
                    data : {
                        "req":"del_cargo",
                        id:id
                    },
                    success: function(r){
                        toastr[r.type](r.msg);
                        if(r.ok){
                            setInterval(() => {
                                window.location.reload();
                            }, 1000);
                        }
                    }
                })
            });
        </script>
    </body>

</html>