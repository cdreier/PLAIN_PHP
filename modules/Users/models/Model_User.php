<?php 

/**
 * 
 */
class Model_User extends RedBean_SimpleModel {
	
    /**
     * setting new password with a new generated salt an saves both
     */
    public function setPassword($plain){
        
        if(count($this->ownUsersalts) > 0){
            $salt = end( $this->bean->ownUsersalts );
        }else{
            $salt = R::dispense(Users::$config["saltTable"]);
        }
        
        //generate new salt
        $secure = true;
        $bytes = openssl_random_pseudo_bytes(8, $secure);
        $salt->val = bin2hex($bytes);
        $salt->user = $this->bean;
        R::store($salt);
        
        $this->password = sha1($plain . $salt->val);
        R::store($this->bean);
    }
    
    
    public function checkPassword($plain){
        if(count($this->ownUsersalts) > 0){
            $salt = end( $this->bean->ownUsersalts );
            $hashedPW = sha1($plain . $salt->val);
            if($this->bean->password == $hashedPW){
                return true;
            }
        }
        
        return false;
    }
}


 ?>