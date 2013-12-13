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
    
    /**
     * add a javascript file to your current render call
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#addScript
     * @param string $filename  
     * @param string $path      default path is lib/js/ , overwrite to load from diffrent location
     * 
     */
    public static function addScript($filename, $path = "lib/js/"){
        self::$scripts[] = self::PATH() . $path . $filename;
    }
    
    /**
     * add a script from external url
     * 
     * @param String $url
     */
    public static function addExternalScript($url){
        self::$scripts[] = $url;
    }
	
    /**
     * add key - value based content to you render call, see setTitle for conrete usage
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#renderContent
     * @param string $key   
     * @param string $value
     */
	public static function addRenderContent($key, $value){
        self::$renderContent[$key] = $value;
    }
    
    /**
     * get the render content for given $key, after set with addRenderContent($key, $value)
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#renderContent
     * @param string $key
     */
    public static function getRenderContent($key){
        return ( isset(self::$renderContent[$key]) ) ? self::$renderContent[$key] : "";
    }
    
    /**
     * set the title in your <title> - tag in the index file
     * this is a shortcut for addRenderContent('title', $title)
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#setTitleTitle
     * @param string $title 
     */
    public static function setTitle($title){
        self::$renderContent["title"] = $title;
    }
    
    /**
     * get the title, previously set with setTitle
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#setTitleTitle
     */
    public static function getTitle(){
        return self::getRenderContent("title");
    }
    
    /**
     * add a css file to your current render call
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#addStylesheet
     * @param string $filename  
     * @param string $path      default path is lib/css/ , overwrite to load from diffrent location
     * 
     */
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
	
    /**
     * checks if your calling controller is aktive in the current render call
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#isActive
     * @param string $view          optional, if set, checks also if specific view is called
     * @param array $routeParams    optional, if set, checks if specific view with custom route is called
     * 
     * @return boolean true if your conditions are all fulfilled
     */
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
    
    /**
     * only used once in the root index.php file
     */
    public static function yield(){
        extract(self::$renderArgs["args"]);
        include(self::$renderArgs["view"]);
    }
    
    /**
     * to implement from subclasses, if possible called before the execute() function, but at the latest before every render() call
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#always
     * 
     */
    protected static function always(){
        //to implement from subclasses, called on every render() call
    }
	
    /**
     * renders the corresponding view to your controller function
     * e.g. MyController::showMe renders /views/MyController/showMe.php
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#render
     * @param array $args   associative array with data for your view, the keys are the name of the variable in your view
     */
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
	
    /**
     * prints the text with the correct Content-Type header (text / plain) 
     * scipt processing is canceled after renderText
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#controller_renderText
     * @param string $txt
     */
	public static function renderText($txt){
		header("Content-Type: text/plain");
		exit($txt);
	}
	
    /**
     * prints the json_encoded data with the correct Content-Type header (application / json) 
     * scipt processing is canceled after renderJSON
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#controller_renderJson
     * @param array $data
     */
	public static function renderJSON($data){
		header("Content-Type: application/json");
		exit(json_encode($data));
	}
    
    /**
     * includes the view at the place the function is called
     * the view is found by the known naming convention
     * e.g. MyController::showMe includes /views/MyController/showMe.php
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/views#renderPartial
     * @param array $args   optional, associative array with data for your view, the keys are the name of the variable in your view
     * @param boolean $ajax optional, default = false, set to true if you want to ouput the view via AJAX, if so, script processing is canceled 
     * 
     */
    public static function renderPartial($args = array(), $ajax = false){
        $trace = debug_backtrace();
        $trace = $trace[1];
        $view = "views/" . $trace["class"] ."/" . $trace["function"] . ".php";
        if(is_file( $view )){
            extract($args);
            include($view);
			if($ajax)exit();
        }else{
            throw new Exception("VIEW NOT FOUND - " . $view);
        }
    }
    
    /**
     * only called once, at the top of the root index.php file, to start the framework and route processing
     */
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
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#keepGet
     * @param string $key
     * @param string $value
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
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#keepGet
     * @param string $key
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
	
    /**
     * generates absolute framework link to controller function
     * 
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#linkTo
     * @param string $functionName  default = "index"
     * @param mixed $param          optional, if there is a custom route, this can be an array or a list of parameters (see documentation)
     * 
     * @return string $link         the generated, absolute link to the requested route
     */
    public static function linkTo($functionName = "index", $param = false){
    	if($param !== false){
			if(!is_array($param)){
	    		$param = array_slice(func_get_args(), 1);
	    	}
    	}
		
    	$route = self::buildRoute($functionName, $param);
        return self::PATH()."index.php".$route;
    }
	
    /**
     * starts a header redirect to the requested controller function and cancels the script processing  
     *  
     * @link http://plain-php.drailing.net/index.php/Manual/controllers#redirTo
     * @param string $functionName  default = "index"
     * @param mixed $param          optional, if there is a custom route, this can be an array or a list of parameters (see documentation)
    
     */
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