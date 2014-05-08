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

//autoload other controllers and framework files
spl_autoload_register("PLAIN_PHP_autoload");
function PLAIN_PHP_autoload($className){
    global $_CONFIG;
    foreach ($_CONFIG["AUTOLOAD_FOLDERS"] as $folder) {
        $file = $folder . $className . ".php";
        if(file_exists($file)){
            require_once $file;
            return;
        }
    }
}

//init localisation
I18n::init();