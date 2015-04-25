<?php

class Module {

	private $ID;
	private $name;
	private $number;
	private $questions = array();

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

	public function getNumber() {
		return $this->number;
	}

	public function setNumber($number) {
		$this->number = $number; 
	}

	public function getQuestion($questionID) {
		return $this->questions[$questionID];
	}

	public function setQuestion($question) {
		$this->questions[$question->getNumber()] = $question; 
	}

	public function getQuestions() {
		return $this->questions;
	}

	public function addQuestion($question) {
		$this->questions[$question->getID()] = $question;
	}

	public function removeQuestion($questionID) {
		unset($this->questions[$questionID]);
	}

}

?>