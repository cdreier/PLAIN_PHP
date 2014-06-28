<?php
/**
 * The MIT License (MIT)
 *
 *  Copyright (c) <2013> <Christian Dreier (dreier.christian@gmail.com) - drailing.net>
 *    
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *  
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *  
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 * 
 */  

namespace PLAIN_PHP;

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