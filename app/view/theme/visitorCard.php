
<?php
$database = new Database;
$request = explode("/",$_SERVER["REQUEST_URI"]);

$setting = $database->selectAnd("settings",["id"=>1]);


?>

<!doctype html>
<html lang="<?=Lang::current_lang();?>">

    <head>
        
        <meta charset="utf-8" />
        <title><?=$GLOBALS["config"]["project_name"]?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Metatige Dijital Medya" name="description" />
        <meta content="Themesbrand" name="author" />
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
            @media print{
                .print{
                    border:1px solid #000;
                    width:90%;
                    padding:10px;
                    size:8cm;
                    overflow:hidden;
                }
            }
        </style>
    </head>

    <body style="background:url('<?=$GLOBALS["config"]["url"]?>src/libs/assets/images/bg.jpg');background-size:cover;">
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">

<?php
switch ($request[2]) {
    case 'show':
        
        $visitorID =  $request[3];

            if(!$visitorID){
                header("location: /");
            }else{
                $sec = $database->selectAnd("visitors",["id"=>$visitorID]);

                $token = $sec[0]["token"];

                $qrData = $setting[0]["site_url"].'visitor/'.$token;
                ?>
                
                <div class="row justify-content-center">


                



                    
                
                    
                    
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                
                            </div> 
                            <div class="card-body pt-0 print"> 
                            
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class=" mt-3 text-black">#<?=$visitorID?></h3>
                                        <h2 class=" mt-3 text-black"><?=Lang::line("title","visitor")?></h2>
                                        <span id="name" class="font-weight-bold h3 text-black"><?=$sec[0]["full_name"]?></span><br>
                                        <span id="company" class="text-black h5">(<?=$sec[0]["company"]?>)</span><br>
                                        <div class="border p-2  mt-2 text-black" style="overflow:hidden"><?=$sec[0]["imza"]?></div>
                                        <br>
                                        <span class="h5 text-black" id="email"><?=$sec[0]["email"]?></span> <br>
                                        <span class="h5 text-black" id="phone">0<?=$sec[0]["phone"]?></span><br>
                                        <span class="h5 text-black"><?=$sec[0]["created_at"]?></span>


                                    </div>
                                    <div class="col-6">
                                    
                                        <img class="mt-2"  src="<?=$GLOBALS["config"]["url"]?>src/uploads/<?=$sec[0]["resim"]?>" width="250">

                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                    <input id="qrData" type="hidden" value="<?=$qrData?>">
                                        <div style="margin-top:50px" id="qr"></div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-12 text-center">
                                    <span class="h5 text-black" style="margin-top:20px">Akbil Teknoloji - Metatige Dijital</span>
                                    </div>
                                </div>
            
                            </div>
                          
                        </div>
                       
                        <div class="row">
                        <div class="col-md-5 col-lg-5 col-xl-5"></div>
                            <div class="col-md-4 col-lg-4 col-xl-4">
                                <a class="btn btn-success btnPrint">Yazdır</a>
                            </div>
                        </div>

                    </div>
                    
                    
                </div>
              
                
                <?php


            }


        break;
    
    default:
        header("location: /");
        break;
}

?>


        


                


                

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
        <script type="text/javascript">
            $(document).ready(function(){
                let qrData = $("#qrData").val();    
                jQuery('#qr').qrcode(qrData);
            });
            $(".btnPrint").on("click", function(){
            $(".print").print({
                addGlobalStyles : false,
                stylesheet : null,
                rejectWindow : false,
                noPrintSelector : ".no-print",
                iframe : false,
                append : "test",
                prepend : null
            });
            })
        </script>
    </body>
</html>
