<?php
@include 'lib/functions.php';

$to = "kyle.jasso@gmail.com";

foreach($_POST as $key => $val) {
	if($val) {
		${$key} = $val;
	}
}

$mail = "A new message recieved from: $name <br /><br />";
$mail .= $message."<br /><br />";
$mail .= "$email <br />";
$mail .= "$phone <br />";

$subject .=" Via Kylejasso.io";

$headers = "From: ".strip_tags($email)."\r\n";
$headers .= "Reply-To: ".strip_tags($email)."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$send = mail($to,$subject,$mail,$headers);

if($send) {
	echo "<h3>Success!</h3>";
	echo "<p>Your message has been sent, and I will get back to you as soon as I can.</p>";
}

?>