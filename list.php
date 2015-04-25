<?PHP

require_once('includes/php/Instructor.php'); 
$instructor = new Instructor();
$instructor->getCourse(1);
$instructor->prepareCourse();
if( isset($_GET['model']) ) $instructor->printCourseModel();

// Save new questions:
if( isset($_POST['save']) && isset($_POST['mode']) && $_POST['mode'] == "new" ) $instructor->setQuestion();

// Edit old questions:
if( isset($_POST['save']) && isset($_POST['mode']) && $_POST['mode'] == "edit" ) $instructor->resetQuestion();


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
  <table class="admin">
	  <?PHP foreach ($instructor->getCourse()->getModules() as $moduleKey => $module) { //print_r($module); ?>
      <tr>
        <td>Module <?= $module->getNumber() ?>: <?= $module->getName() ?> <a href="question-editor.php?moduleID=<?= $module->getID() ?>">New Question</a></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>     
    <?PHP foreach ($module->getQuestions() as $questionKey => $question) { //print_r($question); ?>
      <tr>
        <td><a href="question-editor.php?questionID=<?= $question->getID() ?>&moduleID=<?= $module->getID() ?>">Edit</a> Question: <?= $question->getNumber() ?> <?= substr(strip_tags($question->getQuestionText()), 0, 200) . "...." ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>     
    <?PHP } ?> 
      <tr>
        <td>&nbsp;</td>
      </tr>  
      <tr>
        <td>&nbsp;</td>
      </tr>       
    <?PHP } ?>
  </table>
</body>
</html>