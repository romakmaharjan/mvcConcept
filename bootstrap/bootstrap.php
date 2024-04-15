<?php 
require_once "../vendor/autoload.php";


use Application\system\App;


try{
    $app = new App();
    $app->start();
}catch(Exception $e){
    echo $e->getMessage();
}

?>