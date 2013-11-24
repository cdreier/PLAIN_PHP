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
class App extends Controller {

    const _PATH = "http://plain-php.drailing.net/";
    const _LOCAL_PATH = "http://localhost/PLAIN_PHP/";
    const SESSION_NAME = "PHP_PLAIN";

    public static function index() {
        self::render();
    }

    
    









    public static function debug(){
    	echo "asd";
		$test = R::dispense("test");
		$test->name = "judith";
		R::store($test);
    }

    public static function printJSONSuccess($attr = array()) {
        $attr["error"] = 0;
        echo json_encode($attr);
    }

    public static function printJSONError($errorCode = true) {
        $return = array("error" => $errorCode);
        echo json_encode($return);
    }
    
    public static function PATH() {
        $local = array('localhost', '127.0.0.1');
        if (!in_array($_SERVER['HTTP_HOST'], $local)) {
            
            //check for allowed url modifications, in general www in server url or not
            $serverName = $_SERVER["SERVER_NAME"];
            $urlData = parse_url(self::_PATH);
            //if both are same, just return path
            if($serverName == $urlData["host"]){
                return self::_PATH;
            }else{
                //if not, server request is priority, set new host
                $urlData["host"] = $serverName;
                //expand protokol
                $urlData["scheme"] = $urlData["scheme"]."://";
                $urlData = implode("", $urlData);
                return $urlData;
            }
        } else {
            return self::_LOCAL_PATH;
        }
    }
    
    public static function _JSPATH(){
        ?>
        <script>
            function _getServerUrl(){
                return "<?php echo App::PATH(); ?>";
            }
        </script>
        <?php 
    }

}
?>