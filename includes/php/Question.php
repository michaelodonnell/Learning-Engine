<?php

class Question {

	private $ID;
	private $moduleID;
	private $number;
	private $exhibit;
	private $questionText;
	private $options = array();
	private $answer;
	private $explanation;

	public function getID() {
		return $this->ID;
	}

	public function setID($ID) {
		$this->ID = $ID; 
	}

	public function getModuleID() {
		return $this->moduleID;
	}

	public function setModuleID($moduleID) {
		$this->moduleID = $moduleID; 
	}

	public function getNumber() {
		return $this->number;
	}

	public function setNumber($number) {
		$this->number = $number; 
	}

	public function getExhibit() {
		return $this->exhibit;
	}

	public function setExhibit($exhibit) {
		$this->exhibit = $exhibit; 
	}

	public function getQuestionText() {
		return $this->questionText;
	}

	public function setQuestionText($questionText) {
		$this->questionText = $questionText; 
	}

	public function getOption($index) {
		return $this->option[$index];
	}

	public function setOption($index, $option) {
		$this->options[$index] = $option; 
	}

	public function getAllOptions() {
		return $this->options;
	}

	public function getAnswer() {
		return $this->answer;
	}

	public function setAnswer($answer) {
		$this->answer = $answer; 
	}

	public function getExplanation() {
		return $this->explanation;
	}

	public function setExplanation($explanation) {
		$this->explanation = $explanation; 
	}

}

?>