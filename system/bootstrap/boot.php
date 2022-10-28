<?php
ob_start();
session_start();
include_once 'system/config.php';
include_once 'system/bootstrap/Autoload.php';
$autoload= new \system\bootstrap\Autoload();
$autoload->myautoload();

include_once 'system/router/Routing.php';
$router=new \system\router\Routing();
$router->run();
