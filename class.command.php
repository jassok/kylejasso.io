<?php
@include 'conn.php';

$command = "";
$options = "";
$project = "";
$RESPONSE = "";


function cleanInput($input) {

	$search = array(
		'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
		'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
		'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
		'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
	);

	$output = preg_replace($search, '', $input);
	return $output;
}

function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}

	// Sanitize any incoming commands because we're about to database
	if($_POST['c-command']) {
		$command = sanitize($_POST['c-command']);
	}

	if($_POST['c-options']) {
		$options = sanitize($_POST['c-options']);
	}

	if($_POST['c-project']) {
		$project = sanitize($_POST['c-project']);
	}


	// Insure that a command was posted
	if($command) {
		$response = array("command" => $command, "popup" => 0, "error" => 0);

		$response['message'] = "message";
		$response['popup'] = 1;

	} else {

	}

	echo json_encode($response);
?>