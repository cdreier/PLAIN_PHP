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
	
	private static function pwHash($plain){
		return sha1();
	}
    
	public static function create(){
	    //check input
		if($_POST["username"] == "" || $_POST["password1"] == "" || $_POST["password2"] == ""){
        	self::keep("error", "Please fill in all fields");
            self::keep("username", $_POST["username"]);
            self::redirectFromString(self::$config["register"]);
        }else if( $_POST["password1"] != $_POST["password2"] ){
        	self::keep("error", "Your passwords did not match");
            self::keep("username", $_POST["username"]);
            self::redirectFromString(self::$config["register"]);
        }
		
		//check if username is free
		$user = R::findOne(self::$config["userTable"], "username = ?", array($_POST["username"]));
        if($user != null){
            self::keep("error", "This username is taken, please choose another one.");
            self::redirectFromString(self::$config["register"]);
        }
        
        //everything checked, lets create
        $salt = R::dispense(self::$config["saltTable"]);
        $bytes = openssl_random_pseudo_bytes(8);
        $salt->val = bin2hex($bytes);
        
        $user = R::dispense(self::$config["userTable"]);
        $user->username = $_POST["username"];
        $user->password = sha1($_POST["password1"] . $salt->val);
        R::store($user);
        
        $salt->user = $user;
        R::store($salt);
        
        //TODO: store something in session
        
        
        self::redirectFromString(self::$config["redirectAfter_success"]);
	}
    
    public static function auth(){
        
        if($_POST["username"] == "" || $_POST["password"] == ""){
        	self::keep("error", "Please fill in all fields");
            self::redirectFromString(self::$config["redirectAfter_failure"]);
        }
        
        //TODO hash and salt table
        $user = R::findOne(self::$config["userTable"], "username = ? AND password = ?", array($_POST["username"], $_POST["password"]));
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
        self::render();
    }
    
    public static function loginForm(){
        self::renderPartial(array(
            "action" => Users::linkTo("auth")
        ));
    }
    
    public static function registerForm(){
        self::renderPartial(array(
            "error" => self::get("error"),
            "action" => self::linkTo("create"),
            "username" => self::get("username")
        ));
    }
}



 ?>