<?php

class Lang{
    

    public static function current_lang(){
        return $_SESSION["LANG"];
    }
   
    public static function switch($lang){
        $_SESSION["LANG"] = $lang;
    }

    public static function line($row, $line){
      
      $current_lang = self::current_lang();

      $lang_path = "src/lang/".$current_lang.".php";
    
      if($row){
        if(file_exists($lang_path)){
            require($lang_path);
            return $lang[$row][$line];
          }else{
            echo "Dil dosyası bulunamadı!";
          }
      }
      
    }

    
    
 

}