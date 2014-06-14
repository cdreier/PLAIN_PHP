<?php 

class Manual extends Module {
    
    public static function always(){
        self::addScript("prettify.js");
        self::addStylesheet("sunburst-theme.css");
		
		self::extendFromTemplate("index");
        
        self::setTitle("PLAIN_PHP - Manual");
    }
	
    public static function index(){
        self::render();
    }
    
    public static function coreconcepts(){
        self::render();
    }
	
    public static function folders(){
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