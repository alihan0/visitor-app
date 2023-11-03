<?php

require("../class/database.php");
$db = new Database;
$time = time();
$date = date("Y-m-d H:i:s");


if($_POST["req"] == "send"){
    $set = $db->selectAnd("settings");
    if($set[0]["sms"] > 0){
        
        $nsms = $set[0]["sms"] - 1;
        $update = $db->update("settings",1,["sms"=>$nsms]);
        if($update){
            $number = $set[0]["staff_number"];
            $api_url     = "https://metatige.mobikob.com/sms/send/";
            
            ////////////////// Değişecek Alanlar ////////////////////////
            $api_user     = "alihan@metatige.com"; // user@mail (Profilinizden öğrenebilirsiniz)
            $api_pass     = "alihan12"; // Mobikob Parolanız
            $head         = "08503801229"; // Onaylanmış başlıklarınızdan biri
            $to           = $number; // 905000000000 format
            $msg          = "Lobiden bekleniyorsunuz! Bir kişi 'Görevli Çağır' butonuna bastı."; // Mesaj
            ///////////////////////////////////////////////////////////
            
            $payload = array(
                'api_user' => $api_user,
                'api_pass' => $api_pass,
                'head' => $head ,
                'to'       => $to,
                'msg'      => $msg,
            );
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_URL,$api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
            $result = curl_exec($ch);
            curl_close($ch);
            echo json_encode(["type"=>"success","msg"=>"$number Görevli personel çağırıldı, lütfen bekleyiniz."]);
        }else{
            echo json_encode(["type"=>"warning","msg"=>"sistem hatası!"]);
        }
    }else{
        echo json_encode(["type"=>"warning","msg"=>"SMS bakiyesi yetersiz!"]);
    }
    
}