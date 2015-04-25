<?PHP

require_once('includes/php/Instructor.php'); 
$instructor = new Instructor();
$instructor->getCourse(1);
$instructor->prepareCourse();

// Detect page mode:
if( isset($_GET['moduleID']) && !isset($_GET['questionID']) ) {
	$mode = "new";
} elseif( isset($_GET['moduleID']) && isset($_GET['questionID']) ) {
	$mode = "edit";
	$module = $instructor->getCourse()->getModule($_GET['moduleID']);
	$question = $module->getQuestion($_GET['questionID']);
} else {
	die("Page missing question or module ID");
}

?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Engine</title>
  <link rel="stylesheet" href="includes/css/main.css">
  <script src="includes/js/jquery-1.11.2.min.js"></script>
   <script src="includes/js/test.js"></script>
</head>

<body>
  <form class="admin" action="list.php" method="post">
  	<input type="hidden" name="mode" value="<?= $mode ?>" />
  	<input type="hidden" name="save" value="1" />
  	<input type="hidden" name="moduleID" value="<?= $_GET['moduleID'] ?>" />
  	<input type="hidden" name="courseID" value="1" />
  	<?PHP if ($mode == "edit") { ?>
  	<input type="hidden" name="oldQuestionID" value="<?= $question->getID() ?>" />
  	<?PHP } ?> 
  	<?= ucwords($mode) ?> Question Number: <input style="width: 100px;" type="text" name="questionNumber" value="<?PHP if ($mode == "edit") echo $question->getNumber(); ?>">
  	<br>
  	Question Text: 
  	<textarea rows="20" cols="50" name="questionText"><?PHP if ($mode == "edit") echo $question->getQuestionText(); ?></textarea>
  	<br>
  	Option 1: <input style="width: 90%;" type="text" name="option1" value="<?PHP if ($mode == "edit") echo htmlentities($question->getOption(1)); ?>" />
  	<br>
  	Option 2: <input style="width: 90%;" type="text" name="option2" value="<?PHP if ($mode == "edit") echo htmlentities($question->getOption(2)); ?>" />
  	<br>
  	Option 3: <input style="width: 90%;" type="text" name="option3" value="<?PHP if ($mode == "edit") echo htmlentities($question->getOption(3)); ?>" />
  	<br>
  	Option 4: <input style="width: 90%;" type="text" name="option4" value="<?PHP if ($mode == "edit") echo htmlentities($question->getOption(4)); ?>" />
  	<br>
  	Option 5: <input style="width: 90%;" type="text" name="option5" value="<?PHP if ($mode == "edit") echo htmlentities($question->getOption(5)); ?>" />
  	<br>
  	Option 6: <input style="width: 90%;" type="text" name="option6" value="<?PHP if ($mode == "edit") echo htmlentities($question->getOption(6)); ?>" />
  	<br>
  	Option 7: <input style="width: 90%;" type="text" name="option7" value="<?PHP if ($mode == "edit") echo htmlentities($question->getOption(7)); ?>" />
  	<br>
  	Option 8: <input style="width: 90%;" type="text" name="option8" value="<?PHP if ($mode == "edit") echo htmlentities($question->getOption(8)); ?>" />
  	<br>
  	Answer: eg "1,2,4" <input style="width: 250px;" type="text" name="answer" value="<?PHP if ($mode == "edit") echo htmlentities($question->getAnswer()); ?>">
  	<br>
  	Explanation: 
  	<textarea rows="10" cols="50" name="explanation"><?PHP if ($mode == "edit") echo htmlentities($question->getExplanation()); ?></textarea>
  	<br>
  	<br>
  	<button id="answerButton">Save</button>
  </form>
</body>
</html>