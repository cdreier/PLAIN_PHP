<?php

use PLAIN_PHP\Module; 

class Manual extends Module {
    
    public static function always(){
        self::addScript("prettify.js");
        self::addScript("manual.js");
        self::addStylesheet("sunburst-theme.css");
		
		self::extendFromTemplate("manual");
        
        self::setTitle("PLAIN_PHP - Manual");
    }
	
    public static function index(){
        self::render();
    }
    
    public static function modules(){
        self::render();
    }
    
    public static function coreconcepts(){
        self::render();
    }
	
    public static function tasks(){
        self::render();
    }
    
    public static function i18n(){
        self::render();
    }
	
	public static function routes(){
        self::render();
    }
	
    public static function controllers(){
        self::render();
    }
	
    public static function views(){
        self::render();
    }
	
    public static function ajax(){
        self::render();
    }
	
	public static function redbean(){
		self::render();
	}
    
    public static function sideMenu(){
        self::renderPartial();
    }
    
    
}




 ?>