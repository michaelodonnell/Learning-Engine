<?php

class Course {

	private $ID;
	private $name;
	private $target;
	private $modules;
	private $prepared = false;

	public function getID() {
		return $this->ID;
	}

	public function setID($ID) {
		$this->ID = $ID; 
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name; 
	}

	public function getModule($moduleID) {
		return $this->modules[$moduleID];
	}

	public function getModules() {
		return $this->modules;
	}

	public function setModules($modules) {
		$this->modules = $modules; 
	}

	public function setQuestions($questions) {
		$modules = $this->modules;
		foreach ($questions as $key => $question) {
			$module = $modules[$question->getModuleID()];
			$module->addQuestion($question);
		}
	}

	public function isPrepared() {
		return $this->prepared;
	}

	public function setPrepared($prepared) {
		$this->prepared = $prepared; 
	}

	public function getTarget() {
		return $this->target;
	}

	public function setTarget($target) {
		$this->target = $target;
	}

}

?>