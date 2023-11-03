<?php

require("../class/db.php");
$db = new Database();   

    switch($_POST["req"]){
        case 'ok_cargo':
            $id = $_POST['id'];

            if(empty($id)){
                echo json_encode(["type"=>"warning","msg"=>"Kargo bilgisine ulaşılamadı!"]);
            }else{
                $sec = $db->selectAnd("cargos",["id"=>$id]);
                if($sec){
                    if($sec[0]["status"] != 1){
                        echo json_encode(["type"=>"warning","msg"=>"Kargo işlem görmüş!"]);
                    }else{
                        $update = $db->update("cargos",$id,["status"=>2]);
                        if($update){
                            echo json_encode(["type"=>"success","msg"=>"Kargo teslim alındı","ok"=>true]);
                        }else{
                            echo json_encode(["type"=>"warning","msg"=>"sistem hatası"]);
                        }
                    }
                }else{
                    echo json_encode(["type"=>"warning","msg"=>"Kargo bulunamadı!"]);  
                }
            }

                //echo json_encode(["type"=>"info","msg"=>$id]);
            break;

            case 'red_cargo':
                $id = $_POST['id'];
    
                if(empty($id)){
                    echo json_encode(["type"=>"warning","msg"=>"Kargo bilgisine ulaşılamadı!"]);
                }else{
                    $sec = $db->selectAnd("cargos",["id"=>$id]);
                    if($sec){
                        if($sec[0]["status"] != 1){
                            echo json_encode(["type"=>"warning","msg"=>"Kargo işlem görmüş!"]);
                        }else{
                            $update = $db->update("cargos",$id,["status"=>0]);
                            if($update){
                                echo json_encode(["type"=>"success","msg"=>"Kargo reddedildi","ok"=>true]);
                            }else{
                                echo json_encode(["type"=>"warning","msg"=>"sistem hatası"]);
                            }
                        }
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"Kargo bulunamadı!"]);  
                    }
                }
    
                    //echo json_encode(["type"=>"info","msg"=>$id]);
                break;


                case 'add_cargo':
                    $name = $_POST['name'];

        
                        if(empty($name)){
                            echo json_encode(["type"=>"warning","msg"=>"Firma adı girin"]);
                        }else{
                            $insert = $db->insert("cargo_company",[
                                "company_name" => $name,
                                "status" => 1,
                            ]);
                            if($insert){
                                echo json_encode(["type"=>"success","msg"=>"Başarılı","ok"=>true]);
                            }else{
                                echo json_encode(["type"=>"warning","msg"=>"sistem hatası"]);
                            }
                        }
                    break;
                case 'del_cargo':
                    $id = $_POST['id'];
        
                    if($id){
                        $bul =  $db->selectAnd("cargo_company",["id"=>$id]);
                        if($bul){
                            $delete = $db->delete("cargo_company",$id);
                            if($delete){
                                echo json_encode(["type"=>"success","msg"=>"Başarılı!","ok"=>true]);
                            }else{
                                echo json_encode(["type"=>"warning","msg"=>"Sistem Hatası!"]);
                            }
                        }else{
                            echo json_encode(["type"=>"warning","msg"=>"Firma Bulunamadı!"]);
                        }
                    }else{
                        echo json_encode(["type"=>"warning","msg"=>"Sistem Hatası!"]);
                    }
                break;
    }