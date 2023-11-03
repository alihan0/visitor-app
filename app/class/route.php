<?php

class Route{
    
    public static function run($url,$function,$params = null){
        $request_uri = explode("/",$_SERVER["REQUEST_URI"]);
        if($request_uri[1] == $url){
            if(is_callable($function)){
                call_user_func($function,$params);
                
            }else{
                $controller = explode("@",$function);
        
                if(count($controller)>1){
                    if(file_exists("app/controller/".$controller[0].".php")){
                        require "app/controller/".$controller[0].".php";
                        call_user_func([new $controller[0], $controller[1]],$params);
                    }else{
                        echo "Controller dosyası bulunamadı!";
                    }
                }else{
                    if(file_exists("app/controller/".$controller[0].".php")){
                        require "app/controller/".$controller[0].".php";
                        call_user_func([new $controller[0], "index"],$params);
                    }else{
                        echo "Controller dosyası bulunamadı!";
                    }
                }
            }
        }
    }

}