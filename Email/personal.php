<?php
	$button ='background:#553679; color:#fbfbfb; padding:8px 15px; float:right; text-decoration:none;';

	$emailnote ="
	<b>Greetings Valve Employee!</b><br /><br />
	Let me introduce myself, my name is Kyle Jasso and I am a front-end and back-end web developer currently based in the
	Greater Philadelphia area. I have been designing, programming, and learning all I can about web development for nearly
	five years now. The thrill of it has me constantly looking for new avenues and experiences to further my talents.<br /><br />

	As a self taught, and highly motovated coder, I am always looking for ways to improve, and new environments to learn and grow in.
	I would be honored, if you would take a few moments to checkout my portfolio, and resume. <br /><br />
		<a style='$button' href='http://www.kylejasso.io/'>Let me see it!</a>
	<br style='clearfix' />

	<br />
	Thanks, and I hope to hear from you soon!<br /><br />
	Kyle Jasso<br /><br />
	Phone: 503 369 6789<br />
	";

?>

<html>
<head>
	<title></title>
</head>
<body>
<form method="post" action="sendmail.php">
	<label>Subject</label> <br />
	<input type="text" name="subject" /> <br /><br />

	<label>To</label> <br />
	<input type="text" name="to" /> <br /><br />

	<label>Message</label> <br />
	<textarea name="message"><?php echo $emailnote; ?></textarea> <br /><br />

	<button type="submit">submit</button>

	
</form>
</body>
</html>