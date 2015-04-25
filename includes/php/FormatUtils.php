<?php

class FormatUtils {

	public function displayHTML($text) {
		$text = nl2br($text);
		$text = preg_replace('/[ ](?=[^>]*(?:<|$))/', '&nbsp', $text);
		return $text;
	}

}

?>