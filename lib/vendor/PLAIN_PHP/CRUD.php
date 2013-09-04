<?php 

/**
 * 
 */
class CRUD extends Controller {
	
	public static function __callStatic($name, $arguments){
	    
        if(strpos($name, "save") == 0){
            self::save(str_replace("save", "", $name), $arguments);
        }
		
    }
    
    private static function fillObject(&$obj){
        foreach ($obj->getTable()->getFieldNames() as $name ) {
            if(isset($_POST[$name])){
                
                //TODO: check for booleans etc and set on to true..
                $meta = $obj->getTable()->getColumnDefinition(strtolower($name));
                
                $obj[$name] = $_POST[$name];
            }
        }
    }
    
    private static function create($className){
        $obj = new $className();
        self::fillObject($obj);
        
        $obj->save();
    }
    
    private static function update($className, $id){
        
        //TODO  update object 
        echo $className;
        echo $_POST["name"];
    }
    
    private static function save($name, $args){
        
        //TODO: check if $name is a valid doctrine model classname
        
        //update
        if(count($args) > 0){
            $id = $args[0];
            self::update($name, $id);
        }else{
            //create
            self::create($name);
        }
    }
	
	
}


 ?>