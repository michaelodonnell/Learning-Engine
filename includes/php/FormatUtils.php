<?php

class FormatUtils {

	public function formatCode($code) {
		$code = nl2br($code);
		$code = preg_replace('/[ ](?=[^>]*(?:<|$))/', '&nbsp', $code);
		return $code;
	}

}

?>