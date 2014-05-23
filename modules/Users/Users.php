<?php 

/**
 * 
 */
class Users extends Module {
	
    
    public static function init(){
        parent::init();
        
        if(!class_exists("R")){
            throw new Exception("The Users-Module need a configured database!", 1);
        }
    }
    
    
    
    public static function auth(){
        
        if($_POST["username"] == "" || $_POST["password"] == ""){
            self::redirectFromString(self::$config["redirectAfter_failure"]);
            return;
        }
        
        //TODO hash and salt table
        $user = R::findOne("User", "username = ? AND password = ?", array($_POST["username"], $_POST["password"]));
        if($user == null){
            if(self::$config["registerAfterLoginFail"]){
                self::keep("username", $_POST["username"]);
                self::redirectTo("register");
            }else{
                //error
                echo self::$config["redirectAfter_failure"];
            }
            
        }else{
            //login redirect
        }
    }
    
    
    
    public static function login(){
        self::render();
    }
    
    public static function register(){
        self::render(array(
            "username" => self::get("username")
        ));
    }
    
    public static function loginForm(){
        self::renderPartial(array(
            "action" => Users::linkTo("auth")
        ));
    }
    
    public static function registerForm($username = ""){
        self::renderPartial(array(
            "action" => "",
            "username" => $username
        ));
    }
}



 ?>