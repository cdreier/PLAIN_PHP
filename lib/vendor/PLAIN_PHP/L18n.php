<?php 

/**
 * 
 */
class L18n {
	
	public static $_LANGUAGE = "";
	
	public static function init(){
		self::$_LANGUAGE = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
	}
	
}







 ?>