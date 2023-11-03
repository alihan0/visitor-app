<?php

#   COPYRIGHT © 2022   
#   METATIGE DIGITAL
#   www.metatige.com
#   info@metatige.com
#   -----------------
#   Bu sayfa yazılımın çekirdek dosyasıdır. 

//   SAYFA ÇAĞIRMA

#   Config
#   Sistem boyunca kullanılacak olan tüm değişken ve sabitlerin tanımlı olduğu dosyadır.
require("app/config.php");


#   Route
#   Sistemdeki route yapısını oluşturan ve çalıştıran sınıftır.
require("app/class/route.php");

#   Veritabanı
#   Sistemin veritabanı bağlantısını sağlayan dosyadır.
require("app/connect/db.php");

#   API
#   Sistemin ana sunucu ile (Metatige) bilgi alışverişi yapabilmesi gerekli olan ön tanımların yapıldığı dosyadır.
#   Sistem ana sunucu ile iletişime geçemediği sürece bir çok görev ve fonksiyon çalıştırılamayacaktır.
require("app/connect/api.php");

#   DİL
#   Sistemin varsayılan dilini ya da kullanıcı tarafından seçilen dili bularak sistemin dilini değiştiren
#   sınıftır.
require("app/class/lang.php");

#   VERİTABANI
#   Sistemin veritabanı bağlantılarını gerçekleştiren sınıftır.
require("app/class/database.php");





//   FONKSİYONLAR

#   YÖNLENDİRME
#   Sistem genelinde sayfa yönlendirmek için bu fonksiyon kullanılmaktadır. Fonksiyon varsayılan olarak bir 
#   string değer alır ve kullanıcıyı bu string değere yönlendirir. 
function redirect($url){
    if($url){
        header("location: $url");
    }
}

#   SAYFA GÖSTERME
#   Route yapısı gereği tüm sistem sadece kök dosyası (index.php) üzerinde çalışır ve tüm yönlendirmeler
#   yine kök dosyasına yapılır. Kullanıcının hangi sayfada olduğunu ya da hangi sayfaya gitmeye çalıştığını
#   route yapısı ile anlayarak ilgili dosyayı gösterebilmek için bu fonksiyonu çağırıyoruz.
function view($page, $side){
    if($page && file_exists('app/view/'.$side.'/'.$page.'.php')){
        require('app/view/'.$side.'/'.$page.'.php');
    }else{
        echo "View dosyası bulunamadı!";
    }
}

#   STİLL DOSYALARI
#   Bu fonksiyon sistemde kullanılanacak olan tüm kütüphanelerin stil dosyalarını otomatik
#   olarak sayfaya dahil eder.
function addCss(){
    $libs =$GLOBALS["config"]["libs"];
     for ($i=0;$i<count($libs);$i++){
         $folder = "src/libs/".$libs[$i].'/';
         if(file_exists($folder)){
             $dosyalar = scandir($folder);
 
             foreach ($dosyalar as $dosya) {
             
               if ($dosya =='.' || $dosya == '..') continue;
             
               $uzanti = substr(strrchr($dosya,'.'),1);
 
               if($uzanti == "css"){
                 echo '<link href="'.$GLOBALS['config']['url'].$folder.$dosya.'" id="'.$libs[$i].'" rel="stylesheet" type="text/css" />';
               }
             }
         }else{
             echo "BULUNAMADI: ".$folder."!";
         }
     }
 }

#   SCRIPT DOSYALARI
#   Bu fonksiyon sistemde kullanılacak olan tüm kütüphanelerin script dosyalarını otomatik
#   olarak sayfaya dahil eder.
function addJs(){
    $libs =$GLOBALS["config"]["libs"];
     for ($i=0;$i<count($libs);$i++){
         $folder = "src/libs/".$libs[$i].'/';
         if(file_exists($folder)){
             $dosyalar = scandir($folder);
             foreach ($dosyalar as $dosya) {
               if ($dosya =='.' || $dosya == '..') continue;
               $uzanti = substr(strrchr($dosya,'.'),1);
               if($uzanti == "js"){
                 echo ' <script type="text/javascript" src="'.$GLOBALS['config']['url'].$folder.$dosya.'"></script>';
               }           
             }
         }else{
             echo "BULUNAMADI: ".$folder."!";
         }
     }
 }


#   VARSAYILAN DİL
#   Eğer kullanıcı herhangi bir dil seçmemişse config dosyasında tanımlanan varsayılan dil geçerli olacak.
if(!isset($_SESSION["LANG"])){
    $_SESSION["LANG"] = $GLOBALS['config']['lang'];
}



