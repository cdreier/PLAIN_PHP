<?php 

class Template {
	
	private static $templatePath = "templates/";
	private static $templates = array();
	private static $currentActive = array();
	
	private $name;
	private $content;
	
	function __construct($argument) {
		$this->name = $argument;
		ob_start();
	}
	
	public function process(){
		$this->content = ob_get_contents();
		ob_end_clean();
		$template = $this;
		include self::$templatePath . $this->name . ".php";
	}
	
	public function _yield(){
		echo $this->content;
	}
	
	public static function extend($name){
		self::$templates[$name] = new Template($name);
		array_push(self::$currentActive, self::$templates[$name]);
	}
	
	public static function _finish(){
		if(count(self::$currentActive) > 0){
			$template = array_pop(self::$currentActive);
			$template->process();
		}
	}
	
}

 ?>