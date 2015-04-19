function submitAnswer(answer) {
	var options = $('#options :checkbox:checked');
	var correct = true;
	var answer = answer.split(',');

	// Check at least one option has been ticked:
	if (options.length == 0) return false;

	// Update the buttons:
	$('#answerButton').hide();
	$('#nextButton').show();	

	// Check if the correct options were ticked:
	$(options).each(function(){
		if (answer.indexOf(this.name) < 0) correct = false;
	});

	// Check no extra options were ticked:
	if (options.length != answer.length) correct = false;

	// Display the answer:
	displayTheAnswer(correct);

	// Save the response:
	saveTheResponse(options, correct);
}

function saveTheResponse(options, correct) {
	$(document).ready(function(){
        $.ajax({
            url: 'includes/ajax/saveTheAnswer.php',
            dataType: 'text',
            data: "options=" + options + "correct=" + correct,
            success: function(data) {
            	// Do something with the response:
            	alert(data);
            }
        });
   });
}

function displayTheAnswer(correct) {
	if (correct == true) {
		$('#correct').show();
	} else {
		$('#incorrect').show();
	}
}