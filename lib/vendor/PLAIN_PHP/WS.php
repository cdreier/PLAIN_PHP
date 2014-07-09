<?php 

namespace PLAIN_PHP;

/**
 * 
 */
class WS {
	
    private $baseURI; 
    private $timeout; 
    private $data;
    private $ssl;

	function __construct($uri) {
		$this->baseURI = $uri;

        $this->ssl = (strstr($this->baseURI, "https://"));
        
        $this->timeout = 5;
        $this->data = array();
	}
    
    public function setTimeout($sec){
        $this->timeout = $sec;
    }
    
    private function execute($curlChannel){
        $response = curl_exec($curlChannel);
        curl_close($curlChannel);
        
        $json = json_decode($response, true);
        if(is_array($json)){
            return $json;
        }
        
        return $response;
    }
    
    private function init($route){
        if(substr($route, 0, 1) != "/"){
            $route = "/".$route;
        }

        $ch = curl_init($this->baseURI . $route);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if($this->ssl){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        }

        return $ch;
    }
    
    public function setData($data){
        $this->data = $data;
    }
    
    public function addData($key, $value){
        if(!is_array($this->data)){
            $this->data = array();
        }
        
        $this->data[$key] = $value;
    }

    public function getDataString(){
        $str = "";
        if(count($this->data) > 0){
            $str .= "?";
            foreach ($this->data as $key => $value) {
                $str .= $key."=".$value."&";
            }
            //remove last &
            $str = substr($str, 0, strlen($str) - 1);
        }
        return $str;
    }
    
    public function get($route = ""){
        
        $route .= $this->getDataString();
        
        $ch = $this->init($route);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        
        return $this->execute($ch);
    }
    
    public function post($route = ""){
        $ch = $this->init($route);
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
        
        return $this->execute($ch);
    }
    
    public function delete($route = ""){
        $ch = $this->init($route);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        
        return $this->execute($ch);
    }
    
    public static function getData($url){
        $ws = new WS($url);
        return $ws->get();
    }
    
}

 ?>