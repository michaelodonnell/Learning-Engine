<?PHP

class Editor {

	public function setQuestion() {
		// Create the question object:
		$question = new Question();

		// Save the POST variables to local:
		$question->setModuleID($_POST['moduleID']);
		$question->setNumber($_POST['questionNumber']);
		$question->setExhibit(null);
		$question->setQuestionText($this->clean($_POST['questionText']));
		$question->setOption(1, $this->clean($_POST['option1']));
		$question->setOption(2, $this->clean($_POST['option2']));
		$question->setOption(3, $this->clean($_POST['option3']));
		$question->setOption(4, $this->clean($_POST['option4']));
		$question->setOption(5, $this->clean($_POST['option5']));
		$question->setOption(6, $this->clean($_POST['option6']));
		$question->setOption(7, $this->clean($_POST['option7']));
		$question->setOption(8, $this->clean($_POST['option8']));
        $question->setOption(9, $this->clean($_POST['option9']));
        $question->setOption(10, $this->clean($_POST['option10']));
		$question->setAnswer($this->clean($_POST['answer']));
		$question->setExplanation($this->clean($_POST['explanation']));

		// Return to the instructor:
		return $question;
	}

	private function clean($text) {
	  $search = array(                 // www.fileformat.info/info/unicode/<NUM>/ <NUM> = 2018
                "\xC2\xAB",     // « (U+00AB) in UTF-8
                "\xC2\xBB",     // » (U+00BB) in UTF-8
                "\xE2\x80\x98", // ‘ (U+2018) in UTF-8
                "\xE2\x80\x99", // ’ (U+2019) in UTF-8
                "\xE2\x80\x9A", // ‚ (U+201A) in UTF-8
                "\xE2\x80\x9B", // ‛ (U+201B) in UTF-8
                "\xE2\x80\x9C", // “ (U+201C) in UTF-8
                "\xE2\x80\x9D", // ” (U+201D) in UTF-8
                "\xE2\x80\x9E", // „ (U+201E) in UTF-8
                "\xE2\x80\x9F", // ‟ (U+201F) in UTF-8
                "\xE2\x80\xB9", // ‹ (U+2039) in UTF-8
                "\xE2\x80\xBA", // › (U+203A) in UTF-8
                "\xE2\x80\x93", // – (U+2013) in UTF-8
                "\xE2\x80\x94", // — (U+2014) in UTF-8
                "\xE2\x80\xA6"  // … (U+2026) in UTF-8
      );

      $replacements = array(
                "<<", 
                ">>",
                "'",
                "'",
                "'",
                "'",
                '"',
                '"',
                '"',
                '"',
                "<",
                ">",
                "-",
                "-",
                "..."
      );

      $text = str_replace($search, $replacements, $text);

      return $text;
	}

}

?>