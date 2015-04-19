<?php

require_once('includes/php/Database.php'); 
require_once('includes/php/Course.php'); 
require_once('includes/php/Module.php'); 
require_once('includes/php/Question.php'); 
require_once('includes/php/FormatUtils.php'); 

class Access {

	private $debug = false;

	private $database;
	private $formatter;

	function Access() {
		$this->database = new Database();
		$this->formatter = new FormatUtils();
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
			$modules[] = $module;
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
			$question->setQuestionText($this->formatter->formatCode($record['questionText']));
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
			$questions[] = $question;
		}
		$this->database->close();
		return $questions;
	}



	public function setResponse() {
		$this->database->connect();
		$query = "insert into history (studentID, courseID, moduleID, questionID, response, correct) values (1, 1, 1, 1, 1, 1)";
		mail('mail@michaelodonnell.ie', 'My Subject', $query);
		$rows = $this->db->query($query);
		$this->database->close();
	}

}

?>