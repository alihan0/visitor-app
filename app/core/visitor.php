<?php

require("../class/database.php");
$db = new Database;
$time = time();
$date = date("Y-m-d H:i:s");

switch ($_POST["req"]) {
    case 'add_visitor':
        
            $arr = ["(",")","-", " "];
            $fullname = $_POST["Fullname"];
            $email = $_POST["Email"];
            $phone = $_POST["Phone"];
            $company = $_POST["Company"];
            $person = $_POST["Person"];
            $reason = $_POST["ReasonVisit"];
            $token = md5($phone.$email);
            $phone2 = "90".str_replace($arr, "",$phone);
            $resim = $_POST['resim'];
            $imza = $_POST['imza'];

                if(empty($fullname) || empty($email) || empty($phone) || empty($company) || empty($person) || empty($reason) ){
                    echo json_encode(["type"=>"warning","msg"=>"Boş alan bırakmayın!"]);
                }else{
                    $insert = $db->insert("visitors",[
                        "full_name" => $fullname,
                        "email" => $email,
                        "phone" => $phone,
                        "phone_masked" => $phone2,
                        "company" => $company,
                        "person" => $person,
                        "reason" => $reason,
                        "imza" => $imza,
                        "resim" => $resim,
                        "token" => $token,
                        "status" => 1,
                        "created_at" => $date
                    ]);
                    if($insert){
                        echo json_encode(["type"=>"success","msg"=>"Giriş oluşturuldu","ok"=>true,"last_id"=>$insert]);
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"Sistem Hatası!"]);
                    }
                }

        break;
    case 'visitor_enter':
        $token = $_POST["token"];
        $now = time();
        if(!empty($token)){
            $sec = $db->selectAnd("visitors",["token"=>$token]);
            if($sec){
          

                $update = $db->update("visitors",$sec[0]["id"],[
                    "status"=>2,
                    "enter_time" => $now
                ]);
                if($update){
                    echo json_encode(["msg"=>'Hoşgeldiniz, artık giriş yapabilirsiniz.<br><br><i class="fas fa-spinner fa-spin"></i> ']);
                }else{
                    echo json_encode(["msg"=>"Hata"]);
                }
             
       
            }
        }
        break;
}