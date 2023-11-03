
<?php
$database = new Database;
$request = explode("/",$_SERVER["REQUEST_URI"]);

$setting = $database->selectAnd("settings",["id"=>1]);

$get_token = @$request[2];

$now = time();

?>

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
        <meta content="Metatige Dijital" name="author" />
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

if($get_token){
    $sec = $database->selectAnd("visitors",["token"=>$get_token]);
    if($sec){
        if($sec[0]["status"] == 1){

            ?>
            <div class="row justify-content-center">

                    
<div class="col-md-6 col-lg-6 col-xl-6">
    <h4 class="text-white card-title text-center"><?=Lang::line("text","can_login")?></h4>
    <div class="overflow-hidden">
                <div id="video">
                <input type="hidden" value="<?=$get_token?>" id="token">

                <iframe id="existing-iframe-example" width="100%" height="360" src="https://www.youtube.com/embed/ssMQOUWGWBk?autoplay=1&rel=0&autohide=1&mute=1&showinfo=0&controls=0&enablejsapi=1" frameborder="0" ></iframe>

                </div>
                <div id="sonuc" class="d-none text-center btn btn-success col-12 mt-10 p-4" style="width=100%" ></div>
            </div>
            </div>
            </div>
            <?php

        }elseif($sec[0]["status"] == 2){
            $update = $database->update("visitors",$sec[0]["id"],[
                "status" => 0,
                "exit_time" => $now
            ]);
            if($update){
                echo '<div class="row  justify-content-center">';
                echo '<div id="sonuc" class=" text-center btn btn-danger col-6 mt-10 p-4" style="width=100%" >';
                echo Lang::line("success","exit_successfull");
                echo'<br><br><i class="fas fa-spinner fa-spin"></i></div></div>';
                echo '<meta http-equiv="refresh" content="5;URL=/visitor">';

            }
        }elseif($sec[0]["status"] == 0){
            ?>
            <div class="row justify-content-center">

                    
<div class="col-md-6 col-lg-6 col-xl-6">
    <h4 class="text-white card-title text-center"><?=Lang::line("text","can_login")?></h4>
    <div class="overflow-hidden">
                <div id="video">
                <input type="hidden" value="<?=$get_token?>" id="token">

                <iframe id="existing-iframe-example" width="100%" height="360" src="https://www.youtube.com/embed/ssMQOUWGWBk?autoplay=1&rel=0&autohide=1&mute=1&showinfo=0&controls=0&enablejsapi=1" frameborder="0" ></iframe>

                </div>
                <div id="sonuc" class="d-none text-center btn btn-success col-12 mt-10 p-4" style="width=100%" ></div>
            </div>
            </div>
            </div>
            <?php
        }
    }else{
        echo "Ziyaretçi bilgisi bulunamadı!";
    }
}else{
    echo '<div class="row  justify-content-center">';
    echo '<div id="sonuc" class=" text-center btn btn-info  col-6 mt-10 p-4" style="width=100%" >';
    echo Lang::line("text","info_text");
    echo '</div></div>';
    echo '<meta http-equiv="refresh" content="5;URL=/visitor">';
    
    
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
            var tag = document.createElement('script');
            tag.id = 'iframe-demo';
            tag.src = 'https://www.youtube.com/iframe_api';
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            var player;
            function onYouTubeIframeAPIReady() {
                player = new YT.Player('existing-iframe-example', {
                    events: {
                    'onReady': onPlayerReady,
                    'onStateChange': stateChange
                    }
                });
            }

            function onPlayerReady(s){
              
            }
            function stateChange(e){
                console.log(e.data);
                if(e.data === 0){
                    $("#video").hide();
                    $(".card-title").hide();
                    let token = $("#token").val();
                    $.ajax({
                        type : 'POST',
                        url  : '/app/core/visitor.php',
                        dataType : 'JSON',
                        data:{
                            "req":"visitor_enter",
                            token:token
                        },
                        success: function(r){
                            $("#sonuc").html(r.msg);
                            $("#sonuc").removeClass("d-none");
                            setInterval(() => {
                                window.location.assign("/visitor/");
                            }, 5000);
                        }
                    })
                }
            }

   
            </script>
    </body>
</html>
