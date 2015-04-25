<?php 

require_once('includes/php/Instructor.php'); 
$instructor = new Instructor();
$instructor->getCourse(1);
$instructor->prepareCourse();

// For Testing:
// $instructor->printCourseModel();
if ($instructor->getCourse()->isPrepared()) {
	$randomQuestion = $instructor->askRandomQuestion();
  // $randomQuestion = $instructor->getCourse()->getModule(3)->getQuestion(41);
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
	<script>
	var studentID = 1;
	var courseID = 1;
	var moduleID = <?= $randomQuestion->getModuleID() ?>;
  var questionID = <?= $randomQuestion->getID() ?>;
	</script>
  	<form onSubmit="submitAnswer(studentID, courseID, moduleID, questionID, '<?= $randomQuestion->getAnswer() ?>'); return false;">
      
        <h1><?= $instructor->getCourse()->getName() ?></h1>
           
      	<legend>Question <span class="number"><?= $randomQuestion->getNumber() ?></span> <?PHP $modules = $instructor->getCourse()->getModules(); echo $modules[$randomQuestion->getModuleID()]->getName(); ?></legend>
      	<br />
      	<?= $instructor->getFormatter()->displayHTML($randomQuestion->getQuestionText()) ?>
      	<br />
      	<br />
        <fieldset id="options">
      	<?PHP foreach ($randomQuestion->getAllOptions() as $key => $option) { ?>
      		<?= $key ?>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="<?= $key ?>"><label class="light" for="development"><?= $option ?></label><br>
	  	<?PHP } ?>
        </fieldset>
      	<br />
      	<br />
      	<div id="answerContainer">
			<div id="answer">
				<div id="correct"><span class="green"><strong>RIGHT.</strong></span> <?= $randomQuestion->getExplanation() ?></div>
				<div id="incorrect"><span class="red"><strong>WRONG.</strong></span> <?= $randomQuestion->getAnswer() ?>. <?= $randomQuestion->getExplanation() ?></div> 
      		</div>
      	</div>
        <div class="wrapper">
        	<button id="answerButton">Answer</button><button id="nextButton" onClick="location.reload(); return false;">Next</button>
        </div>
    </form>	

</body>
</html>