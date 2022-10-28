<?php

//echo $_SERVER['SERVER_PROTOCOL'];

namespace system\traits;
trait mytrait{

    protected function route($location){
        $protocol=strpos($_SERVER['SERVER_PROTOCOL'],'https') == true ? 'https' : 'http';
        header("location:".$protocol."://".$_SERVER['HTTP_HOST']."/khayyam_mvc/".$location);
    }

    protected function reback(){
        $reback=isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
        if ($reback !=null) {
            header("location:$reback");
        }
        else {
            echo "آدرس قبلی وجود ندارد";
        }
    }

    protected function asset($file){
        global $site_url;
        $location=$site_url."public/".$file;
        echo $location;
    }
    protected function image_address($file){
        global $site_url;
        $location="public/".$file;
        return $location;
    }

    protected function url($url){
        global $site_url;
            $location=$site_url.$url;
        echo $location;
    }

    protected function view($file,$var=null){

      $file=str_replace('.','/',$file);
        if($var){
            extract($var);
        }
        $location=realpath(dirname(__FILE__)."/../../application/view/".$file.".php");
        if(file_exists($location)){
            require_once $location;
        }
        else{
            echo "فایل مورد نظر شما در پوشه وجود ندارد";
        }
    }

    protected function include($file,$var=null){

        $file=str_replace('.','/',$file);
        if($var){
            extract($var);
        }
        $location=realpath(dirname(__FILE__)."/../../application/view/".$file.".php");
        if(file_exists($location)){
            require_once $location;
        }
        else{
            echo "فایل مورد نظر شما در پوشه وجود ندارد";
        }
    }
}