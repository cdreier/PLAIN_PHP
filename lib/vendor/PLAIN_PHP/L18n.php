<?php 
/**
 * The MIT License (MIT)
 *
 *  Copyright (c) <2013> <Christian Dreier (dreier@weilacher.net) - weilacher.net>
 *    
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *  
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *  
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 * 
 */ 
class L18n {
	
	public static $_LANGUAGE = "";
	private static $_SESSION_NAME = "l18n";
	
	public static function init(){
		if(isset($_SESSION[self::$_SESSION_NAME])){
			self::$_LANGUAGE = $_SESSION[self::$_SESSION_NAME];
		}else{
			self::$_LANGUAGE = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		}
	}
	
	private static function includeMsgFile(){
		global $_MESSAGES;
		if($_MESSAGES == null){
			$path = "lib/messages/";
			$fullPath = $path . self::$_LANGUAGE . ".php";
			if(is_file($fullPath)){
				include_once($fullPath);
				return;
			}
			
			//language messages not found, include default
			$fullPath = $path . "default.php";
			if(is_file($fullPath)){
				include_once($fullPath);
				return;
			}
		}
	} 
	
	public static function getMessage($key){
		self::includeMsgFile();
		global $_MESSAGES;
        if(!isset($_MESSAGES[$key])){
            return $key;
        }
		return $_MESSAGES[$key];
	}
}


function __($key){
	return L18n::getMessage($key);
}




 ?>