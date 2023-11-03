<?php

#   COPYRIGHT © 2022   
#   METATIGE DIGITAL
#   www.metatige.com
#   info@metatige.com
#   -----------------
#   Bu sayfa yazılımın tanımlama dosyasıdır. 


$config["url"] = "https://akbil2.metatige.com/";     //SİSTEMİN KURULU OLDUĞU URL
$config["basename"] = "akbilteknoloji";             // SİSTEMİN BASE ADI
$config["project_name"] = "Akbil Teknoloji";        // PROJENİN GÖRÜNEN ADI
$config["lang"] = "tr";                             // SİSTEMİN VARSAYILAN DİLİ


$config["smtp_host"] = "mail.randevular.net";
$config["smtp_port"] = 587;
$config["smtp_user"] = "destek@randevular.net";
$config["smtp_password"] = "alihan12";
$config["smtp_sender"] = "Metatige Dijital";

$config["libs"] = [
    "jquery",
    "jquery-ui",
    "bootstrap",
    "jquery-signature",
    "icons",
    "fontawesome",
    "toastr",
    "input-mask-phone-number",
    "jquery-qrcode",
    "print",
    "webcam",
    "app",
];
$config["assets"] = $config["url"]."app/view/theme/assets";


if(!defined("APP")){
    define("APP",$config["url"]."app/");
}
if(!defined("SRC")){
    define("SRC",$config["url"]."src/");
}
if(!defined("ASSET")){
    define("ASSET",SRC."assets/");
}
if(!defined("IMG")){
    define("IMG",SRC."images/");
}
global $config;