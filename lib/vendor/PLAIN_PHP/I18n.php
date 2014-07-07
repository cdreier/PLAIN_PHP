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
 
namespace PLAIN_PHP;
 
class I18n {
	
	public static $_LANGUAGE = "";
	private static $_SESSION_NAME = "i18n";
	
	public static function init(){
		if(isset($_SESSION[self::$_SESSION_NAME])){
			self::$_LANGUAGE = $_SESSION[self::$_SESSION_NAME];
		}else{
		    if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
    			self::$_LANGUAGE = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		    }else{
		        self::$_LANGUAGE = false;
		    }
		}
	}
    
    /**
     * set the language manually
     * 
     * @param string $lang  the language code (ISO 639-2 language code) 
     */
    public static function setLanguage($lang){
        self::$_LANGUAGE = $lang;
        $_SESSION[self::$_SESSION_NAME] = $lang;
    }
	
	private static function includeMsgFile(){
		global $_MESSAGES;
		if($_MESSAGES == null){
			$path = "lib/messages/";
			//get default messages
			$fullPath = $path . "default.php";
			if(is_file($fullPath)){
				include_once($fullPath);
			}
            
            //merge default with specific language file 
			$fullPath = $path . self::$_LANGUAGE . ".php";
            $msgBackup = $_MESSAGES;
			if(is_file($fullPath)){
				include_once($fullPath);
                $_MESSAGES = array_merge($msgBackup, $_MESSAGES);
			}
			
		}
	} 
	
	public static function getMessage($key, $args){
		self::includeMsgFile();
		global $_MESSAGES;
        if(!isset($_MESSAGES[$key])){
            return $key;
        }
        
        $message = $_MESSAGES[$key];
        for ($i = 0; $i < count($args); $i++) {
            $replace = $args[$i];
            //FIXME: something wont work with "%".$i+1, quickfix here
            $tmp = $i+1;
            $message = str_replace("$$tmp", $replace, $message);
        }
        
		return $message;
	}
}

/**
 * searches the message for given key in the current active language, with fallback to default language
 * 
 * @param string $key   the key in your message files
 * 
 * @return string the message   if nothing is found, the key is returned 
 */
function __($key){
    $args = func_get_args();
	return I18n::getMessage($key, array_slice($args, 1));
}




 ?>