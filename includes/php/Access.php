<?php

require_once('Database.php'); 
require_once('Course.php'); 
require_once('Module.php'); 
require_once('Question.php'); 

class Access {

	private $debug = false;

	private $database;
	private $formatter;

	function Access() {
		$this->database = new Database();
	}

	public function getCourse($ID) {
		if ($this->debug == true) echo "<br />Access Call: " . __FUNCTION__;
		// Get the course from the database:
		$course = New Course();
		$this->database->connect();
		$rows = $this->database->query("SELECT * FROM courses WHERE ID = " . $ID . " LIMIT 1;");
		$record = $this->database->fetch_array($rows);
		$course->setID($record['ID']);
		$course->setName($record['name']);
		$course->setTarget($record['target']);
		$this->database->close();
		return $course;
	}

	public function getModules($courseID) {
		if ($this->debug == true) echo "<br />Access Call: " . __FUNCTION__;
		// Get the modules from the database:
		$modules = array();
		$this->database->connect();
		$rows = $this->database->query("SELECT * FROM modules WHERE courseID = " . $courseID . " ORDER BY number ASC;");
		while($record = $this->database->fetch_array($rows)) {
			$module = New Module();
			$module->setID($record['ID']);
			$module->setName($record['name']);
			$module->setNumber($record['number']);
			$modules[$record['ID']] = $module;
		}
		$this->database->close();
		return $modules;
	}

	public function getQuestions($courseID) {
		if ($this->debug == true) echo "<br />Access Call: " . __FUNCTION__;
		// Get the modules from the database:
		$questions = array();
		$this->database->connect();
		$rows = $this->database->query("SELECT * FROM questions WHERE courseID = " . $courseID . " ORDER BY moduleID ASC, number ASC;");
		while($record = $this->database->fetch_array($rows)) {
			$question = New Question();
			$question->setID($record['ID']);
			$question->setModuleID($record['moduleID']);
			$question->setNumber($record['number']);
			$question->setExhibit($record['exhibit']);
			$question->setQuestionText($record['questionText']);
			$question->setOption(1, $record['option1']);
			$question->setOption(2, $record['option2']);
			if ($record['option3'] != "") $question->setOption(3, $record['option3']);
			if ($record['option4'] != "") $question->setOption(4, $record['option4']);
			if ($record['option5'] != "") $question->setOption(5, $record['option5']);
			if ($record['option6'] != "") $question->setOption(6, $record['option6']);
			if ($record['option7'] != "") $question->setOption(7, $record['option7']);
			if ($record['option8'] != "") $question->setOption(8, $record['option8']);
			$question->setAnswer($record['answer']);
			$question->setExplanation($record['explanation']);
			$questions[$record['number']] = $question;
		}
		$this->database->close();
		return $questions;
	}

	public function setQuestion($question) {
		// if ($this->getQuestion(1, $question->moduleID, $question->getNumber()) != false) return false;
		if ($this->debug == true) echo "<br />Access Call: " . __FUNCTION__;
		$this->database->connect();
		if ($this->debug == true) {
			echo "<pre>Setting Question: ";
			print_r($question);
			echo "</pre>";
		}
		$data['courseID'] = 1;
		$data['moduleID'] = $question->getModuleID();
		$data['number'] = $question->getNumber();
		$data['questionText'] = $question->getQuestionText();
		$data['option1'] = $question->getOption(1);
		$data['option2'] = $question->getOption(2);
		$data['option3'] = $question->getOption(3);
		$data['option4'] = $question->getOption(4);
		$data['option5'] = $question->getOption(5);
		$data['option6'] = $question->getOption(6);
		$data['option7'] = $question->getOption(7);
		$data['option8'] = $question->getOption(8);
		$data['answer'] = $question->getAnswer();
		$data['explanation'] = $question->getExplanation();
		$question->setID($rows = $this->database->insert("questions", $data));
		$this->database->close();
		return $question;
	}

	public function deleteQuestion($questionID) {
		$this->database->connect();
		$query = $rows = $this->database->delete('questions', 'ID=' . $questionID);
		$this->database->close();
		return $query;
	}

	public function setResponse($studentID, $courseID, $moduleID, $response, $correct) {
		$this->database->connect();
		$query = "insert into history (studentID, courseID, moduleID, questionID, response, correct) values ($studentID, $courseID, $moduleID, 1, '$response', $correct)";
		$rows = $this->database->query($query);
		$this->database->close();
		return $query;
	}

}

?>