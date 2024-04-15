<?php

namespace Application\system;
class App{
    public function start(){
       $router= new router();
       require_once '../routers/web.php';
    }
}
?>