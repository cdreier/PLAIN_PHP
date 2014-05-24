<?php 
$_USERS_CONFIG = array(
    "active" => true,
    "registerAfterLoginFail" => true,
    
    //db tables
    "userTable" => "user",
    "saltTable" => "usersalts",
    
    //routes
    "register" => "Users::register",
    "redirectAfter_failure" => "Users::login",
    "redirectAfter_success" => "Users::login"
);
 ?>