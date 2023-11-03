<?php

require("../class/database.php");
$db = new Database;
$time = time();
$date = date("Y-m-d H:i:s");

switch ($_POST["req"]) {
    case 'enter_user':

        $id = $_POST['id'];

     //   echo json_encode(["type"=>"info","msg"=>$id]);
     if(empty($id)){
        echo json_encode(["type"=>"warning","msg"=>"Personel ID girin!"]);
     }else{
        $sec = $db->selectAnd("users",["id"=>$id]);
        if($sec){
            $bul = $db->selectAnd("personels",["user"=>$id]);
            if($bul){
                echo json_encode(["type"=>"warning","msg"=>"Bu ID ile giriş yapılmış!"]);
            }else{
                $insert = $db->insert("personels",[
                    "user" => $id,
                    "time" => $time,
                    "created_at" => $date
                ]);
                if($insert){
                    echo json_encode(["type"=>"success","msg"=>"GİRİŞ YAPILDI","ok"=>true]);
                }else{
                    echo json_encode(["type"=>"warning","msg"=>"sistem hatası"]);
                }
            }
        }else{
            echo json_encode(["type"=>"warning","msg"=>"ID Tanınamadı!"]);
        }

        
     }

        break;

        case 'exit_user':

            $id = $_POST['id'];
    
         //   echo json_encode(["type"=>"info","msg"=>$id]);
         if(empty($id)){
            echo json_encode(["type"=>"warning","msg"=>"Personel ID girin!"]);
         }else{
            $sec = $db->selectAnd("users",["id"=>$id]);
            if($sec){
                $bul = $db->selectAnd("personels",["user"=>$id]);
                if(!$bul){
                    echo json_encode(["type"=>"warning","msg"=>"Bu ID ile giriş yok!"]);
                }else{
                    
                    $del = $db->delete("personels",$bul[0]["id"]);
                    if($del){
                        echo json_encode(["type"=>"success","msg"=>"ÇIKIŞ YAPILDI","ok"=>true]);
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"sistem hatası"]);
                    }
                }
            }else{
                echo json_encode(["type"=>"warning","msg"=>"ID Tanınamadı!"]);
            }
    
            
         }
    
            break;
    }