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

class Module extends Controller{
    
    public static $config;
	private static $moduleName;
    
    public static function init(){
        
		self::$isModule = true;
        self::$moduleName = get_called_class();
        
        //load config, checks if active etc are in bootstrap file
        require "modules/" . self::$moduleName . "/config/conf.php";
        $moduleConfigName = "_".strtoupper(self::$moduleName)."_CONFIG";
        self::$config = $$moduleConfigName;
        
        //merging routes
        if(is_file("modules/" . self::$moduleName . "/config/routes.php")){
            require_once "modules/" . self::$moduleName . "/config/routes.php";
            global $_ROUTES;
            $moduleRoutesName = "_".strtoupper(self::$moduleName)."_ROUTES";
            $_ROUTES = array_merge($_ROUTES, $$moduleRoutesName);
        }
    }
    
    
    protected static function redirectFromString($target){
        list($class, $function) = explode("::", $target);
        $class::redirectTo($function);
    }
    
    
    
    public static function render($args = array()){
        $trace = debug_backtrace();
        $trace = $trace[1];
        
        $view = "modules/" . $trace["class"] ."/views/" . $trace["function"] . ".php";
        
        //not invoked in execute, do it now
        if(!self::$alwaysInvoked){
            call_user_func($trace["class"]."::"."always");
            self::$alwaysInvoked = true;
        }
        
        self::_render($view, $args);
    }
    
    public static function renderPartial($args = array(), $ajax = false){
        $trace = debug_backtrace();
        $trace = $trace[1];
        $view = "modules/" . $trace["class"] ."/views/" . $trace["function"] . ".php";
        if(is_file( $view )){
            extract($args);
            include($view);
            if($ajax)exit();
        }else{
            throw new Exceptions\ViewNotFoundException($view);
        }
    }
	
	public static function addStylesheet($filename, $path = "public/css/"){
		$path = "modules/" . self::$moduleName . "/" . $path;
		parent::addStylesheet($filename, $path);
    }
	
    public static function addScript($filename, $path = "public/js/"){
		$path = "modules/" . self::$moduleName . "/" . $path;
		parent::addScript($filename, $path);
    }
    
}


 ?>