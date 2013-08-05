<?php
/**
 * The MIT License (MIT)
 *
 *  Copyright (c) <2013> <Christian Dreier (dreier@weilacher.net) - weilacher.net>
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
class Routing {
	
	public static function checkFunction($fun){
		global $_ROUTES;
		$flipped = array_flip($_ROUTES);
		if(array_key_exists($fun, $flipped)){
			return $flipped[$fun];
		}
		return false;
	}
	
	
	private static function parseDefaultRoute($pathInfo){
		$pathInfo = substr($pathInfo, 1);
        $parts = explode("/", $pathInfo);
        if(count($parts) < 2 ){
            $parts[1] = "index";
        }
        
        if(count($parts) > 2){
            return array(ucfirst($parts[0])."::".$parts[1], $parts[2]);
        }
        return array(ucfirst($parts[0])."::".$parts[1], array());
	}
	
	private static function checkRoutes($pathInfos){
		global $_ROUTES;
		$flipped = array_flip($_ROUTES);
		foreach ($flipped as $key => $value) {
			//prepare for preg with escaping /
			$value = str_replace("/", "\\/", $value);
			//create pattern and repalce {valueNames} with .*
			$pattern = "/".preg_replace("/{.*}/", ".*", $value)."/";
			if(preg_match($pattern, $pathInfos)){
				//FIXME: fetch the IDs from the pathInfo
				// preg_match("/{.*}/", $pathInfos, $result );
				// var_dump($result);
				return array($key, array());
			}
		}
		return false;
	}
	
	public static function parsePathInfo($pathInfo){
		$foundRoute = self::checkRoutes($pathInfo);
		
		if( $foundRoute ){
			return $foundRoute;
		}
		return self::parseDefaultRoute($pathInfo); 
    }
	
	
	
	
	
}
 
 
 
?>