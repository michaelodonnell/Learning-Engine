<?PHP

require_once '../php/Access.php'; 
$access = New Access();
echo $access->setResponse($_REQUEST['studentID'], $_REQUEST['courseID'], $_REQUEST['moduleID'], $_REQUEST['questionID'], $_REQUEST['response'], $_REQUEST['correct']);

?>