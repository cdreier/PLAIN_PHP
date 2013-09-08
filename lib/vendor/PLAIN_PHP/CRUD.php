<?php 
/**
 * 
 */
class CRUD {
	
	private $obj;
	private $columns;
	private $relations;
	private $persisted;
	private $link;
	private $saveCallback;
	
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
		
	}
	
	public function listAll(){
		$className = get_class($this->obj);
		$q = Doctrine_Query::create()
		    ->select("*")
		    ->from("$className o")
			->orderBy("o.id DESC");
		$result = $q->execute();
		
		echo "<table>";
		$this->printTableHead();
		foreach ($result as $o) {
			echo "<tr>";
			foreach ($this->columns as $name => $type) {
				echo "<td>";
				echo $o[$name];
				echo "</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	
	private function printTableHead(){
		echo "<tr>";
		foreach ($this->columns as $name => $type) {
			echo "<th>$name</th>";
		}
		echo "</tr>";
	}
	
	public function printForm(){
		echo "<form method='post' action='$this->link'>";
		foreach ($this->columns as $name => $type) {
			echo "<div>";
			echo "<label for='$name'>$name</label>";
			echo "<input name='$name' type='".$this->inputType($type)."' />";
			echo "</div>";
		}
		if($this->saveCallback){
			echo "<input type='hidden' name='callback' value='$this->saveCallback' />";
		}
		//TODO print relations
		echo "<input value='".__("Save")."' type='submit' />";
		echo "</form>";
	}
	
	public function setSaveCallback($saveCallback){
		$this->saveCallback = $saveCallback;
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
		$_ROUTES["/CRUDHelper/".$functionName.$param] = "CRUDHelper::".$functionName;
		$this->link = CRUDHelper::linkTo($functionName, $this->obj->id);
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