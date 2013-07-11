<?php 
session_start();

//add database and models
//require_once('bootstrap.php');

//loading base controller
require_once "controllers/Controller.php";
//loading other controllers
spl_autoload_register(array('Controller', 'autoload'));



if(isset($_POST["method"])){
    $class = $_POST["class"];
    $method = $_POST["method"];
    $args = ( isset($_POST["args"]) )?$_POST["args"]:"";
    $call = $class . "::" . $method;
    call_user_func($call, $args);
}else{
    App::printJSONError();
}

 ?>