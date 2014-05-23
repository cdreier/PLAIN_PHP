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
	
	private static function pwHash(){
		return sha1();
	}
    
	public static function create(){
		if($_POST["username"] == "" || $_POST["password1"] == "" || $_POST["password2"] == ""){
        	self::keep("error", "Please fill in all fields");
            self::redirectFromString(self::$config["register"]);
        }
		
		
		
	}
    
    public static function auth(){
        
        if($_POST["username"] == "" || $_POST["password"] == ""){
        	self::keep("error", "Please fill in all fields");
            self::redirectFromString(self::$config["redirectAfter_failure"]);
        }
        
        //TODO hash and salt table
        $user = R::findOne("User", "username = ? AND password = ?", array($_POST["username"], $_POST["password"]));
        if($user == null){
            if(self::$config["registerAfterLoginFail"]){
                self::keep("username", $_POST["username"]);
				self::redirectFromString(self::$config["register"]);
            }else{
                //error
                self::keep("error", "Login failed");
                self::redirectFromString(self::$config["redirectAfter_failure"]);
            }
            
        }else{
            //login redirect
            self::redirectFromString(self::$config["redirectAfter_success"]);
        }
    }
    
    
    
    public static function login(){
        self::render();
    }
    
    public static function register(){
        self::render(array(
        	"action" => Users::linkTo("create"),
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