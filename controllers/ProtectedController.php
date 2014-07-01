<?php 

/**
 * 
 */
class ProtectedController extends PLAIN_PHP\Controller {
	
    private static $user;
    
	public static function always(){
		self::$user = Users::checkSession();
	}
	
	public static function index(){
	    $text = self::$user->username . " logged in!";
		self::renderText($text);
	}
	
}


 ?>