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

require_once 'lib/config/routes.php';
//autoload other controllers and framework files
spl_autoload_register(array('Controller', 'autoload'));

//init localisation
I18n::init();
 
class Controller {
    
    private static $scripts = array();
    private static $stylesheets = array();
    private static $renderArgs = array();
    
    public static $shouldRender = false;
    
    
    public static function addScript($filename, $path = "lib/js/"){
        self::$scripts[] = App::PATH() . $path . $filename;
    }
    
    public static function addStylesheet($filename, $path = "lib/css/"){
        self::$stylesheets[] = App::PATH() . $path . $filename;
    }
    
    public static function injectScripts(){
        foreach (self::$scripts as $script) {
            ?>
            <script src="<?php echo $script ?>" type="text/javascript" charset="utf-8"></script>
            <?php 
        }
    }
    public static function injectStylesheets(){
        foreach (self::$stylesheets as $stylesheet) {
            ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $stylesheet ?>" />
            <?php 
        }
    }
    
    public static function autoload($className){
        $file = "controllers/" . $className . ".php";
        if(file_exists($file)){
            require_once $file;
			return;
        }
		
		$file = "lib/vendor/PLAIN_PHP/" . $className . ".php";
        if(file_exists($file)){
            require_once $file;
        }
    }
	
    
    public static function isActive($view = false){
    	
        $checkAgainst = get_called_class();
        if($view){
            $checkAgainst .= "/".$view;
        }
        
        //first check if path info is set and matches 
        if(isset($_SERVER["PATH_INFO"])){
        	if(strstr($_SERVER["PATH_INFO"], $checkAgainst))
            	return true;
			
			$checkedRoute = Routing::checkFunction($checkAgainst);
			if($checkedRoute)
				return $_SERVER["PATH_INFO"] == $checkedRoute;
        }
        
        //check render view 
        if(isset(self::$renderArgs["view"])){
            return strstr(self::$renderArgs["view"], $checkAgainst);
        }
		
        //perhaps i forgot something, but should return false now
        return false;
    }
    
    public static function yield(){
        extract(self::$renderArgs["args"]);
        include(self::$renderArgs["view"]);
    }
    
    protected static function always(){
        //to implement from subclasses, called on every render() call
    }
	
    public static function render($args = array()){
        $trace = debug_backtrace();
        $trace = $trace[1];
        $view = "views/" . $trace["class"] ."/" . $trace["function"] . ".php";
        
        //invoke always call
        call_user_func($trace["class"]."::"."always");
        
        if(is_file( $view )){
            self::$renderArgs["args"] = $args;
            self::$renderArgs["view"] = $view;
            self::$shouldRender = true;
        }else{
            throw new Exception("VIEW NOT FOUND - " . $view);
        }
    }
    
    public static function renderPartial($args = array()){
        $trace = debug_backtrace();
        $trace = $trace[1];
        $view = "views/" . $trace["class"] ."/" . $trace["function"] . ".php";
        if(is_file( $view )){
            extract($args);
            include($view);
        }else{
            throw new Exception("VIEW NOT FOUND - " . $view);
        }
    }
    
    public static function execute( $pathInfo ){
        $controllerInfo = Routing::parsePathInfo($pathInfo);
        if(count($controllerInfo) == 2 && is_callable($controllerInfo[0])){
        	if(!is_array($controllerInfo[1])){
        		$controllerInfo[1] = array($controllerInfo[1]);
        	}
            call_user_func_array($controllerInfo[0], $controllerInfo[1]);
        }else{
            throw new Exception("METHOD NOT FOUND - " . $pathInfo);
        }
    }
    
    
    /**
     * starts a json store in the session
     * this value is kept as long as you get it with Controller::get 
     */
    public static function keep($key, $value){
        if(!isset($_SESSION["keep"])){
            $_SESSION["keep"] = json_encode(array($key => $value));
        }else{
            $data = json_decode($_SESSION["keep"], true);
            $data[$key] = $value;
            $_SESSION["keep"] = json_encode($data);
        }
    }
    
    /**
     * return the value for given key, stored with Controller::keep 
     */
    public static function get($key){
        if(!isset($_SESSION["keep"])){
            return null;
        }
        
        $data = json_decode($_SESSION["keep"], true);
        if(!isset($data[$key])){
            return null;
        }
        
        $return = $data[$key];
        unset($data[$key]);
        $_SESSION["keep"] = json_encode($data);
        return $return;
    }
    
    public static function linkTo($functionName = "index", $param = ""){
    	$route = Routing::checkFunction(get_called_class()."::".$functionName);
		if(!$route){
	        $route = "/".get_called_class()."/$functionName";
		}else{
			//params only use with custom route
			$route = Routing::fillParams($route, $param);
		}
		
        return App::PATH()."index.php".$route;
    }
    
    public static function redirectTo($functionName, $param = ""){
        $route = Routing::checkFunction(get_called_class()."::". $functionName);
		if(!$route){
	        $route = "/".get_called_class()."/$functionName";
		}else{
			//params only use with custom route
			$route = Routing::fillParams($route, $param);
		}
        
        header( "Location: " . App::PATH() . "index.php" . $route ) ;
        exit();
    }
    
    
    
    
}




 ?>