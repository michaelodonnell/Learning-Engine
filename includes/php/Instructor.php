<?php

require_once('Access.php'); 
require_once('Course.php');
require_once('Editor.php');

class Instructor {

	private $access;
	private $course;
	private $editor;

	function Instructor() {
		$this->access = New Access();
		$this->course = New Course();
		$this->editor = New Editor();
	}

	public function getCourse($ID = null) {
		if ($this->course->getID() == null) {
			$this->course = $this->access->getCourse($ID, $this->course);
		} 
		return $this->course;
	}

	public function prepareCourse() {
		$this->course->setModules($this->access->getModules($this->course->getID()));
		$this->course->setQuestions($this->access->getQuestions($this->course->getID()));
		$this->course->setPrepared(true);
	}

	public function printCourseModel() {
		echo "<pre>";
		print_r($this->getCourse());
		echo "</pre>";
	}

	public function askRandomQuestion() {
		$questionFound = false;
		$searchAttempts = 0;
		$modules = $this->course->getModules();
		$module = null;
		$moduleKeys = array_keys($modules);
		$question = null;
		while ($questionFound == false && $searchAttempts < 100) {
			if (sizeof($this->course->getModules()) > 1) {
				$module = $modules[$moduleKeys[rand(0, sizeof($this->course->getModules()) - 1)]];
			} else {
				if (sizeof($this->course->getModules()) == 1) $module = $modules[0];
			}

			$questions = $module->getQuestions();

			if (sizeof($module->getQuestions()) > 1) {
				$index = rand(0, sizeof($module->getQuestions()) - 1);
				$question = $questions[$index];
			} else {
				if (sizeof($module->getQuestions()) == 1) $question = $questions[0];
			}

			if ($question != null) return $question;
			$searchAttempts++;
		}
		return false;
	}

	public function getEditor() {
		return $this->editor;
	}

	public function setQuestion() {
		$question = $this->editor->setQuestion();
		$question = $this->access->setQuestion($question);
		$this->course->getModule($_POST['moduleID'])->addQuestion($question);
	}

	public function resetQuestion() {
		$this->access->deleteQuestion($_POST['oldQuestionID']);
		$question = $this->editor->setQuestion();
		$question = $this->access->setQuestion($question);
		$module = $this->course->getModule($_POST['moduleID']);
		$module->removeQuestion($_POST['oldQuestionID']);
		$module->setQuestion($question);
	}

}

?>