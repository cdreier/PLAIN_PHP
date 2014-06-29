<?php 

namespace PLAIN_PHP\Exceptions;

class ViewNotFoundException extends PlainException {
	
	function __construct($view) {
		parent::__construct("VIEW NOT FOUND: " . $view);
	}
}

 ?>