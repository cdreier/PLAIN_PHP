<?php

class App extends Controller {

    const _PATH = "http://192.168.0.36/PHP_PLAIN/";
    const _LOCAL_PATH = "http://localhost/PHP_PLAIN/";
    const SESSION_NAME = "PHP_PLAIN";

    public static function index() {
        self::render();
    }

    
    









    public static function debug(){
        
    }

    public static function printJSONSuccess($attr = array()) {
        $attr["error"] = 0;
        echo json_encode($attr);
    }

    public static function printJSONError($errorCode = true) {
        $return = array("error" => $errorCode);
        echo json_encode($return);
    }
    
    public static function PATH(){
        $local = array('localhost', '127.0.0.1');
        if(!in_array($_SERVER['HTTP_HOST'], $local)){
            return self::_PATH;
        }else{
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