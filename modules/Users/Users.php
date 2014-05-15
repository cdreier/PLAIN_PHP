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
    
    
    
    
    public static function auth($withRegistration){
        $user = R::findOne("User", "username = ? AND password = ?", array($_POST["username"], $_POST["password"]));
        if($user == null){
            if($withRegistration){
                self::keep("username", $_POST["username"]);
                self::redirectTo("register");
            }else{
                //error
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
    
    public static function loginForm($withRegistration = true){
        self::renderPartial(array(
            "action" => Users::linkTo("auth", $withRegistration)
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