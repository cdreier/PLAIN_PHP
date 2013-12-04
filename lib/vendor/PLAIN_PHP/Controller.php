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

//loading configs
require_once 'lib/config/routes.php';
require_once 'lib/config/db.php';
require_once 'lib/config/conf.php';

//loading orm
require_once 'lib/vendor/redbeanphp/rb.php';
if($_DB["db_active"]){
	R::setup( 'mysql:host='.$_DB["db_host"].';'.
	        'dbname='.$_DB["db_name"], $_DB["db_user"], $_DB["db_password"] );
			
	R::freeze( $_DB["db_freeze"] );
}

//autoload other controllers and framework files
spl_autoload_register(array('Controller', 'autoload'));

//init localisation
I18n::init();
 
class Controller {
    
    private static $scripts = array();
    private static $stylesheets = array();
    private static $renderArgs = array();
	
	private static $renderContent = array();
    
    public static $shouldRender = false;
    public static $alwaysInvoked = false;
    
    
    public static function addScript($filename, $path = "lib/js/"){
        self::$scripts[] = self::PATH() . $path . $filename;
    }
    
    public static function addExternalScript($url){
        self::$scripts[] = $url;
    }
	
	public static function addRenderContent($key, $value){
        self::$renderContent[$key] = $value;
    }
    
    public static function getRenderContent($key){
        return ( isset(self::$renderContent[$key]) ) ? self::$renderContent[$key] : "";
    }
    
    public static function setTitle($title){
        self::$renderContent["title"] = $title;
    }
    
    public static function getTitle(){
        return self::getRenderContent("title");
    }
    
    public static function addStylesheet($filename, $path = "lib/css/"){
        self::$stylesheets[] = self::PATH() . $path . $filename;
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
    	global $_CONFIG;
		foreach ($_CONFIG["AUTOLOAD_FOLDERS"] as $folder) {
			$file = $folder . $className . ".php";
			if(file_exists($file)){
	            require_once $file;
				return;
	        }
		}
    }
	
    
    public static function isActive($view = false, $routeParams = false){
    	
        $callee = $checkAgainst = get_called_class();
        if($view){
            $checkAgainst .= "/".$view;
            $callee .= "::".$view;
        }
        
        //first check if path info is set and matches 
        if(isset($_SERVER["PATH_INFO"])){
        	if(strstr($_SERVER["PATH_INFO"], $checkAgainst))
            	return true;
			
            //check against custom routing
			if (Routing::isActive($_SERVER["PATH_INFO"], $callee, $routeParams))
                return true;
        }
        
        //check render view only if no route params are set
        if(isset(self::$renderArgs["view"]) && !$routeParams){
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
        
        //not invoked in execute, do it now
        if(!self::$alwaysInvoked){
            call_user_func($trace["class"]."::"."always");
			self::$alwaysInvoked = true;
        }
        
        if(is_file( $view )){
            self::$renderArgs["args"] = $args;
            self::$renderArgs["view"] = $view;
            self::$shouldRender = true;
        }else{
            throw new Exception("VIEW NOT FOUND - " . $view);
        }
    }
	
	public static function renderText($txt){
		header("Content-Type: text/plain");
		exit($txt);
	}
	
	public static function renderJson($data){
		header("Content-Type: application/json");
		exit(json_encode($data));
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
            
            //just to be sure
            if(!self::$alwaysInvoked){
                list($class, $unused) = explode("::", $controllerInfo[0]);
                call_user_func($class."::"."always");
                self::$alwaysInvoked = true;
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
    
	private static function buildRoute($functionName, $param){
		
        $route = Routing::checkFunction(get_called_class()."::". $functionName);
		if(!$route){
	        $route = "/".get_called_class()."/$functionName";
		}else{
			try{
				//params only use with custom route
				$route = Routing::fillParams($route, $param);
			}catch(Exception $e){
				//error in routing, missmatch from expected and total params 
				echo $e;
			}
		}
		
		return $route;
	}
	
    public static function linkTo($functionName = "index", $param = false){
    	if($param !== false){
			if(!is_array($param)){
	    		$param = array_slice(func_get_args(), 1);
	    	}
    	}
		
    	$route = self::buildRoute($functionName, $param);
        return self::PATH()."index.php".$route;
    }
	
    public static function redirectTo($functionName = "index", $param = false){
    	if($param !== false){
			if(!is_array($param)){
	    		$param = array_slice(func_get_args(), 1);
	    	}
    	}
		
    	$route = self::buildRoute($functionName, $param);
        header( "Location: " . self::PATH() . "index.php" . $route ) ;
        exit();
    }
    
    
    public static function PATH() {
        global $_CONFIG;
        $local = array('localhost', '127.0.0.1');
        if (!in_array($_SERVER['HTTP_HOST'], $local)) {
            
            //check for allowed url modifications, in general www in server url or not
            $serverName = $_SERVER["SERVER_NAME"];
            $urlData = parse_url($_CONFIG["PATH"]);
            //if both are same, just return path
            if($serverName == $urlData["host"]){
                return $_CONFIG["PATH"];
            }else{
                //if not, server request is priority, set new host
                $urlData["host"] = $serverName;
                //expand protokol
                $urlData["scheme"] = $urlData["scheme"]."://";
                $urlData = implode("", $urlData);
                return $urlData;
            }
        } else {
            return $_CONFIG["LOCAL_PATH"];
        }
    }
    
    public static function _JSPATH(){
        ?>
        <script>
            function _getServerUrl(){
                return "<?php echo self::PATH(); ?>";
            }
        </script>
        <?php 
    }
    
}

 ?>