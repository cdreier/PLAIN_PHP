<?php 

namespace PLAIN_PHP\Exceptions;


class ViewNotFoundException extends PlainException {
	
	function __construct($view) {
		parent::__construct("VIEW NOT FOUND: " . $view);
        
        if(PLAIN_PHP_DEV){
            $view = substr($view, 6, strlen($view));
            $view = str_replace(".php", "", $view);
            
            $this->helpText = "<p>but we can fix it! <a style='color: white; font-weight: bold;' href='";
            $this->helpText .= \DevelopementUtils::linkTo("createView", $view);
            $this->helpText .= "'>create View</a></p>";
        }
        
	}
}

 ?>