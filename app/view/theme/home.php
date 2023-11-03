<!doctype html>
<html lang="<?=Lang::current_lang();?>">

    <head>
        
        <meta charset="utf-8" />
        <title><?=$GLOBALS["config"]["project_name"]?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Metatige Dijital Medya" name="description" />
        <meta content="Metatige Ditijal" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?=$GLOBALS["config"]["assets"]?>/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="<?=$GLOBALS["config"]["assets"]?>/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?=$GLOBALS["config"]["assets"]?>/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?=$GLOBALS["config"]["assets"]?>/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <?=addCss()?>
        <style>
            .box{
                width:50px;
                height:50px;
                border:3px solid #fff;
                border-radius:4px;
                margin-left:5px;
                padding:0;
                overflow:hidden;
            }
            .current{
                width:65px;
                height:65px;
                border:3px solid gold;
                border-radius:4px;
                margin-left:5px;
                padding:0;
                overflow:hidden;
                margin-top:-7px
            }
            .tr{
                background-image: url('/src/libs/app/tr.png');
                background-repeat: no-repeat;
                background-size:cover;
                background-position: center;
            }
            .en{
                background-image: url('/src/libs/app/en.png');
                background-repeat: no-repeat;
                background-size:cover;
                background-position: center;
            }
        </style>
    </head>

    <body style="background:url('<?=$GLOBALS["config"]["url"]?>src/libs/assets/images/bg.jpg');background-size:cover;">
        <div class="account-pages  pt-sm-5">
            <div class="container">

            <div class="row justify-content-center text-center">
                
            <h2 class="form-label mb-2" style="font-weight:bold;font-size:52px;color:#fff;text-shadow:0 2px 3px #000"><?=$GLOBALS["config"]["project_name"]?></h2>
            <p style="color:#fff"><?=Lang::line("text","welcome")?></p>
            <br>
            <br>
                <a href="/tr" class="box tr <?php if(Lang::current_lang() == "tr"){echo"current";}?>"></a>
                <a href="/en" class="box en <?php if(Lang::current_lang() == "en"){echo"current";}?>"></a>
                <p class="text-white"><?=Lang::line("text","choose_lang")?></p>
        
            </div>



                <div class="row justify-content-center mt-4">
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                
                            </div>
                            <a href="javascript:void(0)" class="btn btnVisitorEnter">
                            <div class="card-body pt-0"> 
                            
                                <div class="p-4 text-center">
                                <i style="font-size:55px" class="fa-solid fa-users"></i>
                                <br>
                                <br>
                                <label for="username" class="form-label"><?=Lang::line("button","visitor_enter")?></label>
                                </div>
                            </div>
                            </a>    
                        </div>
                        

                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                
                            </div>
                            <a href="javascript:void(0)" class="btn"  data-bs-toggle="modal" data-bs-target="#cargoModal">
                            <div class="card-body pt-0"> 
                            
                                <div class="p-4 text-center">

                                <i style="font-size:55px" class="fa-solid fa-truck-fast"></i>
                                <br>
                                <br>    
                                <label for="username" class="form-label"><?=Lang::line("button","cargo")?></label>
                                </div>
            
                            </div></a>
                        </div>
                        

                    </div>

                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                
                            </div> <a href="javascript:void(0)" id="callPerson" class="btn">
                            <div class="card-body pt-0 text-center"> 
                            
                                <div class="p-4">
                                <i style="font-size:55px" class="fa-solid fa-user"></i>
                                <br>
                                <br>
                                <label for="username" class="form-label"><?=Lang::line("button","call_staff")?></label>
                                </div>
            
                            </div></a>
                        </div>
                        

                    </div>
                    
                    
                </div>


                <div class="row justify-content-center">


                <div class="col-md-3 col-lg-3 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                
                            </div> <a href="javascript:void(0)" class="btn" data-bs-toggle="modal" data-bs-target="#staffModal">
                            <div class="card-body pt-0"> 
                            
                                <div class="p-4 text-center">
                                <i style="font-size:55px" class="fa-solid fa-user-tie"></i>
                                <br>
                                <br>
                                <label for="username" class="form-label"><?=Lang::line("button","staff_enter")?></label>
                                </div>
            
                            </div></a>
                        </div>
                        

                    </div>



                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                
                            </div> <a href="javascript:void(0)" class="btn" data-bs-toggle="modal" data-bs-target="#staffModal2">
                            <div class="card-body pt-0"> 
                            
                                <div class="p-4 text-center">
                                <i style="font-size:55px" class="fa-solid fa-user-tie"></i>
                                <br>
                                <br>
                                <label for="username" class="form-label"><?=Lang::line("button","staff_exit")?></label>
                                </div>
            
                            </div></a>
                        </div>
                        

                    </div>

                    
                    
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                
                            </div> <a href="javascript:void(0)" class="btn" data-bs-toggle="modal" data-bs-target="#supportModal">
                            <div class="card-body pt-0"> 
                            
                                <div class="p-4 text-center">

                                <i style="font-size:55px"  class="fa-solid fa-headset"></i>
                                <br>
                                <br>
                                <label for="username" class="form-label"><?=Lang::line("button","support")?></label>
                                </div>
            
                            </div></a>
                        </div>
                        

                    </div>
                    
                    
                </div>

                <div class="row justify-content-center text-center mt-5">
                
                
                <p style="color:#fff">Copyright © 2022 - <a href="https://metatige.com" target="_blank">Metatige</a> | Tüm hakları saklıdır.</p>
    
                <hr>
                </div>

            </div>
        </div>
        <!-- end account-pages -->

        <!-- JAVASCRIPT -->
      <?=addJs()?>
        
        <!-- App js -->
        <script src="assets/js/app.js"></script>












        <div id="supportModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","support_title")?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <?php
                         $database = new Database;
                         $select = $database->selectAnd("support", ["status"=>1]);
                        
                         for($i=0;$i<count($select);$i++){
                            ?>
                            <div class="card">
                            <div class="card-body bg-primary bg-soft">
                            <h5> <i class="<?=$select[$i]["icon"]?>"></i> <?=$select[$i]["title"]?></h5>
                            <hr>
                            <p style="font-weight:bold"><?=$select[$i]["value"]?></p>
                            </div>
                        </div>
                            <?php
                         }
                         
                        ?>


                        
                        
                       
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("task","close")?></button>
                  
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->





        <div id="cargoModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","new_cargo")?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <form>
                            <div class="row mb-4">
                                <label for="cargo_company" class="col-sm-3 col-form-label"><?=Lang::line("form","cargo_company")?>:</label>
                                <div class="col-sm-9">
                                    <select id="cargo_company" class="form-select">
                                        <option value="0"><?=Lang::line("form","select")?></option>
                                        <?php 
                                        $cargos = $database->selectAnd("cargo_company",["status"=>1]);
                                        for($i=0;$i<count($cargos);$i++){
                                            ?>
                                            <option value="<?=$cargos[$i]["id"]?>"><?=$cargos[$i]["company_name"]?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="sender" class="col-sm-3 col-form-label"><?=Lang::line("form","sender")?>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="sender" placeholder="<?=Lang::line("form","sender_entry")?>">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="user" class="col-sm-3 col-form-label"><?=Lang::line("form","recipient")?>:</label>
                                <div class="col-sm-9">
                                <select class="form-select" id="user">
                                        <option value="0"><?=Lang::line("form","select")?></option>
                                        <?php 
                                        $users = $database->selectAnd("users",["status"=>1]);
                                        for($i=0;$i<count($users);$i++){
                                            ?>
                                            <option value="<?=$users[$i]["id"]?>"><?=$users[$i]["fname"].' '.$users[$i]['lname']?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="cargo_no" class="col-sm-3 col-form-label"><?=Lang::line("form","cargo_tracking_no")?>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cargo_no" placeholder="<?=Lang::line("form","cargo_tracking_no_entry")?>">
                                </div>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-9">

                                    

                                    <div>
                                        <a class="btn btn-primary w-md btnSendCargo"><?=Lang::line("task","submit")?></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("task","close")?></button>
                  
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div>

            <div id="staffModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","staff_entry")?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <form>
                            
                    <div class="row mb-4">
                                <label for="enterID" class="col-sm-3 col-form-label"><?=Lang::line("form","staff_id_no")?>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="enterID" placeholder="<?=Lang::line("form","staff_id_no_entry")?>">
                                </div>
                            </div>
                            
                            

                            <div class="row justify-content-end">
                                <div class="col-sm-9">

                                    

                                    <div>
                                        <button type="submit" class="btn btn-primary w-md btnEnter"><?=Lang::line("task","login")?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("task","close")?></button>
                  
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div>




            <div id="staffModal2" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel"><?=Lang::line("title","exit")?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <form>
                            
                            <div class="row mb-4">
                                <label for="exit_id" class="col-sm-3 col-form-label"><?=Lang::line("form","staff_id_no")?>:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exit_id" placeholder="<?=Lang::line("form","staff_id_no_entry")?>">
                                </div>
                            </div>
                            
                            

                            <div class="row justify-content-end">
                                <div class="col-sm-9">

                                    

                                    <div>
                                        <button type="submit" class="btn btn-primary w-md btnExit"><?=Lang::line("task","logout")?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal"><?=Lang::line("task","close")?></button>
                  
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div>
            <?php include 'src/inc/modals.php'; addJs();?>
            <script>
                $(".btnSendCargo").on("click", function(){
                    let company = $("#cargo_company").val();
                    let sender = $("#sender").val();
                    let user = $("#user").val();
                    let cargo_no = $("#cargo_no").val();

                    $.ajax({
                        type : 'POST',
                        url  : '/app/core/cargo.php',
                        dataType : 'JSON',
                        data : {
                            "req":"add_cargo",
                            company:company,
                            sender:sender,
                            user:user,
                            cargo_no:cargo_no
                        },
                        success: function(r){
                            toastr[r.type](r.msg);
                            if(r.ok){
                                setTimeout(() => {
                                    window.location.reload();
                                }, 1000);
                            }
                        }
                    })
                });


                $(".btnEnter").on("click", function(e){
                    e.preventDefault();
                    let id = $("#enterID").val();
                    
                    $.ajax({
                        type : 'POST',
                        url  : '/app/core/user.php',
                        dataType : 'JSON',
                        data: {
                            "req":"enter_user",
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

                $(".btnExit").on("click", function(e){
                    e.preventDefault();
                    let id = $("#exit_id").val();
                    
                    $.ajax({
                        type : 'POST',
                        url  : '/app/core/user.php',
                        dataType : 'JSON',
                        data: {
                            "req":"exit_user",
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
                })
            </script>

                                        
    </body>
</html>
