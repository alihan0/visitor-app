<?php

// new filename
$filename = 'pic_'.date('YmdHis') . '.jpg';

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'../../src/uploads/'.$filename) ){
	$url =  $filename;
    
    echo json_encode(["type"=>"success","msg"=>"Resim yüklendi","file"=>$url]);
}

// Return image url
