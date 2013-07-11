<?php 

class Manual extends Controller {
	
    public static function index(){
        self::addScript("prettify.js");
        self::addStylesheet("sunburst-theme.css");
        self::render();
    }
	
    public static function folders(){
        self::addScript("prettify.js");
        self::addStylesheet("sunburst-theme.css");
        self::render();
    }
	
    public static function controllers(){
        self::addScript("prettify.js");
        self::addStylesheet("sunburst-theme.css");
        self::render();
    }
	
    public static function views(){
        self::addScript("prettify.js");
        self::addStylesheet("sunburst-theme.css");
        self::render();
    }
	
    public static function doctrine(){
        self::addScript("prettify.js");
        self::addStylesheet("sunburst-theme.css");
        self::render();
    }
    
    public static function ajax(){
        self::addScript("prettify.js");
        self::addStylesheet("sunburst-theme.css");
        self::render();
    }
    
    public static function sideMenu(){
        self::renderPartial();
    }
    
    
}




 ?>