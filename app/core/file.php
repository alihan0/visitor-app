<?php 

require ("../class/class.upload.php");
//require("../../engine.php");




$handle = new \Verot\Upload\Upload($_FILES['file']);

if ($handle->uploaded) {
    $name = time();
    $handle->file_new_name_body   = $name;
    $handle->image_resize         = true;
    $handle->image_x              = 200;
    $handle->image_ratio_y        = true;
    $handle->image_convert         = 'jpg';
    
    $handle->process('../../src/uploads/');

    if ($handle->processed) {
        echo json_encode(["type"=>"success","msg"=>"Resim Yüklendi","img"=>$name.".jpg"]);
        $handle->clean();
      } else {
        echo json_encode(["type"=>"error","msg"=>$handle->error]);
      }

    
}else{
    echo json_encode(["type"=>"error","msg"=>$handle->error]);
}