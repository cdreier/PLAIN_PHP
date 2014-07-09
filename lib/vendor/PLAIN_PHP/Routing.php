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

class Routing {
	
	public static function checkFunction($fun){
		global $_ROUTES;
		$flipped = array_flip($_ROUTES);
		if(array_key_exists($fun, $flipped)){
			return $flipped[$fun];
		}
		return false;
	}
    
    public static function isActive($pathInfo, $fun, $params){
        $foundRoutes = self::checkFunction($fun);
        if($foundRoutes){
            $filledRoute = self::fillParams($foundRoutes, $params);
            return $pathInfo == $filledRoute;
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
            return array(ucfirst($parts[0])."::".$parts[1], array_slice($parts, 2));
        }
        return array(ucfirst($parts[0])."::".$parts[1], array());
	}
	
	public static function fillParams($route, $param){
		if(is_array($param)){
			$routeParts = explode("/", $route);
			$paramCount = 0;
			
			//check if params are matching dynamix route parts
			if(substr_count($route, "{") != count($param)){
				throw new PLAIN_PHP\Exception\Exception("ROUTE PARAMETER COUNT NOT MATCHING ARGUMENTS");
			}
			
			for ($i = 0; $i < count($routeParts); $i++) {
				$part = $routeParts[$i];
				if(substr($part, 0, 1) == "{"){
					$routeParts[$i] = $param[$paramCount];
					$paramCount++;
				}
			}
			$route = implode("/", $routeParts);
			
		}
		return $route;
	}
	
	/**
	 * @param $pathInfos
	 * @return array with (Controller::function, Route) or false if no route found 
	 */
	private static function getRawRoute($pathInfos){
		global $_ROUTES;
		foreach ($_ROUTES as $key => $value) {
		    
            //route is limited to a specific request method
            if(substr($key, 0, 1) == "("){
                //extract methos
                preg_match_all("/\(.*\)/", $key, $tMethod);
                $method = $tMethod[0][0];
                $method = str_replace("(", "", $method);
                $method = str_replace(")", "", $method);
                
                // check if request method matches route method
                if($_SERVER["REQUEST_METHOD"] != $method){
                    //no match, check other routes
                    continue;
                }

                //request method mathed route method, clean up route
                $key = preg_replace("/\(.*\)/", "", $key);
            }
            
            
			//prepare for preg with escaping /
			$tValue = str_replace("/", "\\/", $key);
            //create pattern and repalce {valueNames} with .*
            $pattern = "/".preg_replace("/{.*}/", "\\w+", $tValue)."/";

            if(preg_match($pattern, $pathInfos)){
                //check slashes to filter
                $routeParts = explode("/", $key);
                $pathInfoParts = explode("/", $pathInfos);
                if(count($routeParts) == count($pathInfoParts) ){
                    $routeFound = true;
                    //check route parts
                    for($i = 0; $i < count($routeParts); $i++){
                        //part is param
                        if(substr($routeParts[$i],0,1) == "{"){
                            continue;
                        }
                        //if part not param and does not match, leave loop
                        if($routeParts[$i] != $pathInfoParts[$i]){
                            $routeFound = false;
                            $i = count($routeParts);
                        }
                    }

                    //if route found and matching all parts, return
                    if($routeFound){
                        return array($value, $key);
                    }
                }
			}
		}

		return false;
	}
	
	private static function checkRoutes($pathInfos){
		$rawRoute = self::getRawRoute($pathInfos);
		if($rawRoute){
			//split both routes ..
			$pathInfoParts = explode("/", $pathInfos);
			$checkParts = explode("/", $rawRoute[1]);
			//.. and diff them the get the values in the pathInfos
			return array($rawRoute[0], array_diff($pathInfoParts, $checkParts));
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