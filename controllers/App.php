<?php
/**
 * The MIT License (MIT)
 *
 *  Copyright (c) <2013> <Christian Dreier (dreier.christian@gmail.com) - drailing.net>
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
class App extends Controller {
	
	const SESSION_NAME = "PLAIN_PHP";

    public static function index() {
        self::render();
    }
    

	public static function login(){
	    
		self::render(array(
			"error" => self::get("error")
		));
	}
	
	public static function logout(){
		unset($_SESSION[self::SESSION_NAME]);
		session_destroy();
		self::redirectTo("login");
	}

	public static function auth(){
		if($_POST["username"] == "test" && $_POST["password"] == "test"){
			$_SESSION[self::SESSION_NAME] = "test";
			ProtectedController::redirectTo("index");
		}else{
			self::keep("error", "Login failed");
			self::redirectTo("login");
		}
	}
	
	public static function checkLogin(){
		global $_CONFIG;
		return isset($_SESSION[self::SESSION_NAME]);
	}



    public static function img($img, $defaultPath = "") {
        return App::PATH() . "public/img/" . $defaultPath . "/" . $img;
    }
    
    public static function setLang($lang){
        I18n::setLanguage($lang);
        header( "Location: " . $_SERVER["HTTP_REFERER"] ) ;
        exit();
    }
    

    
}
?>