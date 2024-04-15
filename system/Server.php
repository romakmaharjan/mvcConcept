<?php

namespace Application\system;

class Server{

    public static function url(){
        $url=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url=str_replace('/ittrainingnepalcourse/mvcphp','',$url);
        $url=preg_replace('/[?].*/','',$url);
        $url=trim($url,'/');
        if($url==''){
            $url='/';
        }
        return $url;
    }
}