<?php

require_once('includes/php/Access.php'); 
require_once('includes/php/Course.php'); 

class Instructor {

	private $access;
	private $course;

	function Instructor() {
		$this->access = New Access();
		$this->course = New Course();
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
		$question = null;
		while ($questionFound == false && $searchAttempts < 100) {
			if (sizeof($this->course->getModules()) > 1) {
				$module = $modules[rand(0, sizeof($this->course->getModules()) - 1)];
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



}

?>