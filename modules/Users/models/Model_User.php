<?php 

/**
 * 
 */
class Model_User extends RedBean_SimpleModel {
	
    /**
     * setting new password with a new generated salt an saves both
     */
    public function setPassword($plain){
		
        $salt = "$2a$12$" . uniqid() . PLAIN_PHP\Utils::randomString(9);
        
        //force blowfish algorithm through salt
        $this->password = crypt($plain, $salt);
        R::store($this->bean);
    }
    
    
    public function checkPassword($plain){
        $hashedPW = crypt($plain, $this->password);
        if($this->password == $hashedPW){
            return true;
        }
        
        return false;
    }
}


 ?>