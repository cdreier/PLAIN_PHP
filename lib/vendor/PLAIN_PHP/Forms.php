<?php 
/**
 * 
 */
class Forms {
	
	private $obj;
	private $columns;
	private $relations;
	private $persisted;
	private $link;
	
	private $excludes;
	
	function __construct($doctrineObj) {
		$this->obj = $doctrineObj;
		
		//only for debug
		$this->obj = new User();
		$this->checkState();
		$this->generateRoutes();
		
		$this->excludes = array("id", "created_at", "updated_at");
		
		$this->parseColumns();
		$this->parseRelations();
		
		// var_dump($this->obj);
		echo "<br/>";
		echo "<br/>";
		$link = CRUD::linkTo("yay");
		echo "<a href='$link'>test</a>";
	}
	
	public function printForm(){
		echo "<form method='post' action='$this->link'>";
		foreach ($this->columns as $name => $type) {
			echo "<div>";
			echo "<label for='$name'>$name</label>";
			echo "<input name='$name' type='".$this->inputType($type)."' />";
			echo "</div>";
		}
		//TODO print relations
		echo "<input value='".__("Save")."' type='submit' />";
		echo "</form>";
	}
	
	private function inputType($type){
		//TODO parse other types
		switch ($type) {
			case 'boolean':
				return "checkbox";
			default:
				return "text";
		}
	}
	
	private function generateRoutes(){
		global $_ROUTES;
		$className = get_class($this->obj);
		$functionName = "save".$className;
		$param = null;
		if($this->persisted){
			$param = "/{id}";
		}
		$_ROUTES["/CRUD/".$functionName.$param] = "CRUD::".$functionName;
		$this->link = CRUD::linkTo($functionName, $this->obj->id);
	}
	
	private function checkState(){
		$this->persisted = !($this->obj->state() == Doctrine_Record::STATE_TCLEAN || 
				$this->obj->state() == Doctrine_Record::STATE_TDIRTY);
	}
	
	private function parseColumns(){
		$this->columns = array();
		foreach ($this->obj->getTable()->getFieldNames() as $name ) {
			if(in_array($name, $this->excludes)){
				continue;
			}
            $meta = $this->obj->getTable()->getColumnDefinition(strtolower($name));
			$this->columns[$name] = $meta["type"];
		}
	}
	
	private function parseRelations(){
		$this->relations = array();
		foreach ($this->obj->getTable()->getRelations() as $name) {
			$this->relations[] = $name["alias"];
		}
	}
	
	
	
}


 ?>