<?php 

/**
 * 
 */
class CRUD extends Controller {
	
	public static function __callStatic($name, $arguments){
		$className = str_replace("save", "", $name);
		echo $className;
		echo $_POST["name"];
		
		if(count($arguments) > 0){
			$id = $arguments[0];
			echo $id;
		}
    }
	
	
}


 ?>