<?php
session_start();
require("../class/db.php");
$db = new Database();
$dtime = date("Y-m-d H:i:s");
if($_POST){
    switch($_POST["req"]){
        case 'login':
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            $hash = md5(sha1($password)).sha1(md5($password));

                if(empty($username) || empty($password)){
                    echo json_encode(["type"=>"warning","msg"=>"Boş alan bıramayın!"]);
                }else{
                    $sec = $db->selectAnd("admin",[
                        "username" =>$username,
                        "password" => $hash
                    ]);
                    if($sec){
                        if($sec[0]["status"] == 0){
                            echo json_encode(["type"=>"warning","msg"=>"Giriş izniniz bulunmuyor!"]);
                        }else{
                            $_SESSION["admin"] = true;
                            $_SESSION["aid"] = $sec[0]["id"];
                            echo json_encode(["type"=>"success","msg"=>"Giriş başarılı!","ok"=>true]);
                        }
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"Kullanıcı adı ya da şifre hatalı!"]);
                    }
                }

            break;
        case 'add_admin':

            $username = $_POST['username'];
            $password = $_POST['password'];
            $hash = md5(sha1($password)).sha1(md5($password));

            if(empty($username) || empty($password)){
                echo json_encode(["type"=>"warning","msg"=>"Boş alan bırakmayın."]);
            }else{
                $bul =  $db->selectAnd("admin",["username"=>$username]);
                if($bul){
                    echo json_encode(["type"=>"warning","msg"=>"Kullanıcı adı kullanılıyor."]);
                }else{
                    $insert = $db->insert("admin",[
                        "username" => $username,
                        "password" => $hash,
                        "status" => 1,
                        "created_at" => $dtime 
                    ]);
                    if($insert){
                        echo json_encode(["type"=>"success","msg"=>"Başarılı!","ok"=>true]);
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"Sistem Hatası!"]);
                    }
                }
            }

            break;
        case 'del_admin':
                $id = $_POST['id'];

                if($id){
                    $bul =  $db->selectAnd("admin",["id"=>$id]);
                    if($bul){
                        $delete = $db->delete("admin",$id);
                        if($delete){
                            echo json_encode(["type"=>"success","msg"=>"Başarılı!","ok"=>true]);
                        }else{
                            echo json_encode(["type"=>"warning","msg"=>"Sistem Hatası!"]);
                        }
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"Admin Bulunamadı!"]);
                    }
                }
            break;
    }
}