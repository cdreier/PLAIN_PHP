<?php 
session_start();

//parse document root
$protocol = str_replace("/", "", strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)));
$plainPHPRoot = $protocol . "://" . str_replace("index.php", "", $_SERVER["SERVER_NAME"] . $_SERVER["SCRIPT_NAME"]);
define('PLAIN_PHP_ROOT', $plainPHPRoot);

//loading PLAIN_PHP
require_once "lib/vendor/PLAIN_PHP/bootstrap.php";

use PLAIN_PHP\Controller;

//check if path is set and execute controller method
if(isset($_SERVER['PATH_INFO'])){
    Controller::execute($_SERVER['PATH_INFO']);
}else if( isset($_POST["PLAIN_PHP_AJAX"]) ){
    //ajax request found
    Controller::execute("/" . $_POST["class"] . "/" . $_POST["method"]);
}else{
    //no path is set, call default 
    App::index();
}

 ?>