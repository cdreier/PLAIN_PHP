<?php 
$_USERS_CONFIG = array(
    "active" => false,
    "registerAfterLoginFail" => true,
    
    //db tables
    "userTable" => "user",
    "sessionTable" => "usersession",
    
    //routes
    "register" => "Users::register",
    "redirectAfter_failure" => "Users::login",
    "redirectAfter_success" => "ProtectedController::index",
    "redirectAfter_logout" => "Users::login"
);
 ?>