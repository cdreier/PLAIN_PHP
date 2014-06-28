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

//loading configs
require_once 'lib/config/routes.php';
require_once 'lib/config/conf.php';

//loading orm
$dbConfigFile = "lib/config/db/".str_replace("www.", "", $_SERVER["SERVER_NAME"]).".php";
if(is_file($dbConfigFile)){
    require_once 'lib/vendor/redbeanphp/rb.phar';
    require_once $dbConfigFile;
    
    R::setup( 'mysql:host='.$_DB["db_host"].';'.
            'dbname='.$_DB["db_name"], $_DB["db_user"], $_DB["db_password"] );
            
    R::freeze( $_DB["db_freeze"] );
}

//parse autoload folders
for($i = 0; $i < count($_CONFIG["AUTOLOAD_FOLDERS"]); $i++) {
    $folder = $_CONFIG["AUTOLOAD_FOLDERS"][$i];
    //wildcard at the end, search subfolders too
    if(substr($folder, -1) == "*" ){
        $folder = str_replace("*", "", $folder);
        $_CONFIG["AUTOLOAD_FOLDERS"][$i] = $folder;
        //scan subfolders and add to autoload folders
        appendSubfolders($folder, $_CONFIG["AUTOLOAD_FOLDERS"]);
    }
}

//autoload other controllers and framework files
spl_autoload_register("__PLAIN_PHP_autoload");
function __PLAIN_PHP_autoload($className){
    global $_CONFIG;
    foreach ($_CONFIG["AUTOLOAD_FOLDERS"] as $folder) {
        
        $file = $folder . $className . ".php";
        if(file_exists($file) && !is_dir($file)){
            
			
			//required class is a module
			if( substr($file, 0, 8 + strlen($className)) == "modules/".$className ){
				//check if config file exists
				if(is_file("modules/" . $className . "/config/conf.php")){
		            require "modules/" . $className . "/config/conf.php";
		            $moduleConfigName = "_".strtoupper($className)."_CONFIG";
		            $moduleConfig = $$moduleConfigName;
		            if(!$moduleConfig["active"]){
		            	return;
		            }
		        }else{
		            throw new Exception("No conf.php file found for $className Module.", 1);
		        }
			}
            
            
            //require class    
            require_once $file;
            
            //class found, required and initialized, we can stop
            return;
        }
    }
}

//preload modules to parse config
foreach (scandir("modules/") as $module) {
    if(substr($module, 0, 1) != "."){
        //loading modules
        if(class_exists($module)) {
            $module::init();
        }
    }
}


function appendSubfolders($dir, &$target){
    //add following /
    if(substr($dir, -1) != "/"){
        $dir .= "/";
    }
    
    $folders = scandir($dir);
    foreach($folders as $folder){
        //exclude . and ..
        if(substr($folder, 0, 1) != "."){
            if(is_dir($dir.$folder)){
                if(!in_array($dir.$folder, $target)){
                    array_push($target, $dir.$folder. "/");
                }
                appendSubfolders($dir.$folder, $target);
            }
        }
    }
}

//init localisation
PLAIN_PHP\I18n::init();