<?php 
/**
 * 
 */
class Forms {
	
	private $obj;
	private $columns;
	private $relations;
	private $persisted;
	
	private $excludes;
	
	function __construct($doctrineObj) {
		$this->obj = $doctrineObj;
		
		//only for debug
		$this->obj = new User();
		$this->checkState();
		
		$this->excludes = array("id", "created_at", "updated_at");
		
		$this->parseColumns();
		$this->parseRelations();
		
		var_dump($this->columns);
		echo "<br/>";
		echo "<br/>";
		var_dump($this->persisted);
	}
	
	private function checkState(){
		$this->persisted = !($this->obj->state() == Doctrine_Record::STATE_TCLEAN || 
				$this->obj->state() == Doctrine_Record::STATE_TDIRTY);
	}
	
	private function parseColumns(){
		$this->columns = array();
		foreach ($this->obj->getTable()->getColumns() as $name => $meta) {
			if(in_array($name, $this->excludes)){
				continue;
			}
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