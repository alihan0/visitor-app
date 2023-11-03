<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
#   COPYRIGHT © 2022   
#   METATIGE DIGITAL
#   www.metatige.com
#   info@metatige.com
#   -----------------
#   Bu sayfa yazılımın kök dosyasıdır. 

#   Oturumlar
#   Sistemde oturumlar, diller ve özelleştirilebilir bir çok seçenek için $_SESSION kullanılır.
session_start();

#   Yönlendirmeler
#   Sistemde bir sayfadan diğer sayfaya yönlendirme yapmak için Header'lar kullanılır. Header fonksiyonu sistem 
#   içerisinde daha farklı bir şekilde çalışan fonksiyona gömüşmüştür (redirect) ve o şekilde kullanılacaktır.
ob_start();

#   Engine
#   Sistemin her alanında kullanılan fonksiyonlar bu sayfadadır. Diğer tüm sayfalarda kullanılacak
#   olan çekirdek dosyalar bu sayfada çağırılır ve başlatılır.
require_once("engine.php");


#   ROUTE
#   Sistemin izleyeceği rotaların tanımlı olduğu sayfadır. Bu sayfa içerisinde tanımlı bir rota yoksa
#   sistem yönlendirme yapamaz ve çalışmayı durdurur.
require_once("app/route.php");


