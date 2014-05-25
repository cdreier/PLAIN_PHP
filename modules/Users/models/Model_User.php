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
        $salt->val = uniqid();
        $salt->user = $this->bean;
        R::store($salt);
		
        $this->password = crypt($plain, $salt->val);
        R::store($this->bean);
    }
    
    
    public function checkPassword($plain){
        if(count($this->ownUsersalts) > 0){
            $salt = end( $this->bean->ownUsersalts );
            $hashedPW = crypt($plain, $salt->val);
            if($this->bean->password == $hashedPW){
                return true;
            }
        }
        
        return false;
    }
}


 ?>