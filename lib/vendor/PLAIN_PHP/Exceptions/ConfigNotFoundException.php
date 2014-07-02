<?php 

namespace PLAIN_PHP\Exceptions;

class ConfigNotFoundException extends Exception {
	
	function __construct($config) {
		parent::__construct("REQUIRED CONFIG NOT FOUND. IN MODULE: " . $config);
	}
}

 ?>