<?php 

/**
 * 
 */
class Module extends Controller{
    
    public static $config;
    
    public static function init(){
    	
		self::$isModule = true;
        $className = get_called_class();
        
        //load config
        if(is_file("modules/" . $className . "/config/conf.php")){
            require "modules/" . $className . "/config/conf.php";
            $moduleConfigName = "_".strtoupper($className)."_CONFIG";
            self::$config = $$moduleConfigName;
        }else{
            throw new Exception("No conf.php file found for $className Module.", 1);
        }
        
        //module is not active, stop here
        if(!self::$config["active"]){
            return;
        }
		
        //merging routes
        if(is_file("modules/" . $className . "/config/routes.php")){
            require_once "modules/" . $className . "/config/routes.php";
            global $_ROUTES;
            $moduleRoutesName = "_".strtoupper($className)."_ROUTES";
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
        
        if(is_file( $view )){
            self::$renderArgs["args"] = $args;
            self::$renderArgs["view"] = $view;
            self::$shouldRender = true;
        }else{
            throw new Exception("VIEW NOT FOUND - " . $view);
        }
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
            throw new Exception("VIEW NOT FOUND - " . $view);
        }
    }
    
    
}


 ?>