<?php 
$_USERS_CONFIG = array(
    "active" => true,
    "registerAfterLoginFail" => true,
    
    //db tables
    "userTable" => "user",
    "saltTable" => "usersalts",
    "sessionTable" => "usersession",
    
    //routes
    "register" => "Users::register",
    "redirectAfter_failure" => "Users::login",
    "redirectAfter_success" => "ProtectedController::index",
    "redirectAfter_logout" => "Users::login"
);
 ?>