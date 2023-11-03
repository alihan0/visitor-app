<?php

require("../class/database.php");
$db = new Database;
$time = time();
$date = date("Y-m-d H:i:s");

switch ($_POST["req"]) {
    case 'add_cargo':

        $company = $_POST['company'];
        $sender = $_POST['sender'];
        $user = $_POST['user'];
        $cargo_no = $_POST['cargo_no'];

        if($company == 0){
            echo json_encode(["type"=>"warning","msg"=>"Kargo Firması Seçin!"]);
        }elseif($user == 0){
            echo json_encode(["type"=>"warning","msg"=>"Alıcı Seçin!"]);
        }elseif(empty($sender) || empty($cargo_no)){
            echo json_encode(["type"=>"warning","msg"=>"Gönderici adı ya da kargo takip numarası boş bırakılamaz!"]);
        }else{
            
            $insert = $db->insert("cargos",[
                "company" => $company,
                "sender" => $sender,
                "user" => $user,
                "cargo_no" => $cargo_no,
                "status" => 1,
                "created_at" => $date
            ]);
            if($insert){
                echo json_encode(["type"=>"success","msg"=>"Kargo teslim alındı!","ok"=>true]);
            }else{
                echo json_encode(["type"=>"warning","msg"=>"sistem hatası"]);
            }
        }
        
        break;
    }