<?php 

/**
 * 
 */
class ProtectedController extends Controller {
	
	public static function always(){
		if(!App::checkLogin()){
			App::redirectTo("login");
		}
		
		self::setTitle("DEMO CONTROLLER");
	}
	
	public static function index(){
		echo "logged in";
	}
	
}


 ?>