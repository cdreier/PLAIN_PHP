<?php 

/**
 * 
 */
class CRUDHelper extends Controller{
    
    private static $specialFields = array("boolean");
	
	public static function __callStatic($name, $arguments){
	    
		//save handles create and update
        if(strpos($name, "save") === 0){
            self::save(str_replace("save", "", $name), $arguments);
        }else if(strpos($name, "list") === 0){
        	self::listAll(str_replace("list", "", $name), $arguments);
        }
		
    }
	
	private static function listAll($obj){
		$q = Doctrine_Query::create()
		    ->select("*")
		    ->from("$obj o")
			->orderBy("o.id DESC");
		$result = $q->execute();
		
		foreach ($result as $o ) {
			echo $o->toString();
		}
	}
    
    private static function fillObject(&$obj){
        foreach ($obj->getTable()->getFieldNames() as $name ) {
            if(isset($_POST[$name])){
                
                $meta = $obj->getTable()->getColumnDefinition(strtolower($name));
                if(in_array($meta["type"], self::$specialFields)){
                    //TODO: check for booleans etc and set on to true..
                    
                }else{
                    $obj[$name] = $_POST[$name];
                }
                
            }
        }
    }
    
    private static function create($className){
        $obj = new $className();
        self::fillObject($obj);
        
        $obj->save();
		
		if(isset($_POST["callback"])){
			header( "Location: " . $_POST["callback"] ) ;
			exit();
		}
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