<?php 

namespace PLAIN_PHP\Exceptions;

class ActionNotFoundException extends PlainException {
	
    function __construct($info) {
        parent::__construct("ACTION NOT FOUND FOR ROUTE: " . $info);
    }
    
}


 ?>