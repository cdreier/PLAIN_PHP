<?php 

namespace PLAIN_PHP\Exceptions;


class TemplateNotFoundException extends Exception {
    
    function __construct($template) {
        parent::__construct("TEMPLATE NOT FOUND: " . $template);
        
        if(PLAIN_PHP_DEV){
            
            $this->helpText = "<p>but we can fix it! <a style='color: white; font-weight: bold;' href='";
            $this->helpText .= \DevelopementUtils::linkTo("createTemplate", $template);
            $this->helpText .= "'>create Template</a></p>";
        }
        
    }
}

 ?>