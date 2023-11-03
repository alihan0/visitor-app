<?php

require("../class/db.php");
$db = new Database();   

    switch($_POST["req"]){
        case 'add_support':
            $icon = $_POST['icon'];
            $title = $_POST['title'];
            $value = $_POST['value'];

                if(empty($icon)){
                    echo json_encode(["type"=>"warning","msg"=>"Bir ikon seçin!"]);
                }elseif(empty($title) || empty($value)){
                    echo json_encode(["type" =>"warning","msg"=>"Tüm alanları doldurun!"]);
                }else{
                    $insert = $db->insert("support",["icon"=>$icon,"title"=>$title,"value"=>$value,"status"=>1]);
                    if($insert){
                        echo json_encode(["type"=>"success","msg"=>"Başarılı!","ok"=>true]);
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"sistem hatası!"]);
                    }
                }
        break;
        case 'del_support':
            $id = $_POST['id'];

                if(empty($id)){
                    echo json_encode(["type"=>"warning","msg"=>"sistem hatası!"]);
                }else{
                    $sec = $db->selectAnd("support",["id"=>$id]);
                    if($sec){
                        $del = $db->delete("support",$id);
                        if($del){
                            echo json_encode(["type"=>"success","msg"=>"Başarılı!","ok"=>true]);
                        }else{
                            echo json_encode(["type"=>"warning","msg"=>"sistem hatası!"]);
                        }
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"Veri bulunamadı!"]);
                    }
                }
            break;

        case 'put_staff':
            $no = $_POST['no'];
            if(empty($no)){
                echo json_encode(["type"=>"warning","msg"=>"Boş alan bırakmayın!"]);
            }else{
                $up = $db->update("settings",1,["staff_number"=>$no]);
                if($up){
                    echo json_encode(["type"=>"success","msg"=>"Görevli numarası güncellendi!","ok"=>true]);
                }else{
                    echo json_encode(["type"=>"warning","msg"=>"sistem hatası!"]);
                }
            }
            break;
    }