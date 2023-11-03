<?php

require("../class/db.php");
$db = new Database();   
$dtime = date("Y-m-d H:i:s");
    switch($_POST["req"]){
        case 'exit_staff':
            $id = $_POST['id'];

            if(empty($id)){
                echo json_encode(["type"=>"warning","msg"=>"Personel bilgisine ulaşılamadı!"]);
            }else{
                $sec = $db->selectAnd("personels",["user"=>$id]);
                if($sec){
              
                    $del = $db->delete("personels",$sec[0]["id"]);
                    if($del){
                        echo json_encode(["type"=>"success","msg"=>"ÇIKIŞ YAPILDI","ok"=>true]);
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"sistem hatası"]);
                    }
                    
                }else{
                    echo json_encode(["type"=>"warning","msg"=>"Personel girişi bulunamadı!"]);  
                }
            }

                //echo json_encode(["type"=>"info","msg"=>$id]);
            break;
        case 'add_staff':
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

                if(empty($fname) || empty($lname) || empty($email) || empty($phone)){
                    echo json_encode(["type"=>"warning","msg"=>"Boş alan bırakmayın!"]);
                }else{
                    $insert = $db->insert("users",[
                        "fname" => $fname,
                        "lname" => $lname,
                        "email" => $email,
                        "phone" => $phone,
                        "status" => 1,
                        "created_at" => $dtime
                    ]);
                    if($insert){
                        echo json_encode(["type"=>"success","msg"=>"Başarılı","ok"=>true]);
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"sistem hatası"]);
                    }
                }
            break;
        case 'del_staff':
            $id = $_POST['id'];

            if($id){
                $bul =  $db->selectAnd("users",["id"=>$id]);
                if($bul){
                    $delete = $db->delete("users",$id);
                    if($delete){
                        echo json_encode(["type"=>"success","msg"=>"Başarılı!","ok"=>true]);
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"Sistem Hatası!"]);
                    }
                }else{
                    echo json_encode(["type"=>"warning","msg"=>"Personel Bulunamadı!"]);
                }
            }else{
                echo json_encode(["type"=>"warning","msg"=>"Sistem Hatası!"]);
            }
        break;

            
    }