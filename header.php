<?php require_once('conn.php'); ?>
<?php include('lib/functions.php'); ?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="" />
	<meta name="viewport" content="width=device-width, inital-scale=1, maximum-scale=1" />
	<base href="<?php echo BASE_URL; if (substr(BASE_URL,-1) != "/") { echo "/"; } ?>" />
	<link rel="stylesheet" type="text/css" href="style/screen.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>

	<script type="text/javascript" src="js/jquery.popup.js"></script>
	<script type="text/javascript" src="js/jquery.commander.js"></script>

	<script type="text/javascript">
		$(function () {
			$('#commander').commander({
				path:"S:\\KyleJasso.io\\",
				windowTitle: "Prospector: Kylejasso.io Command Prompt",
				website: "KyleJasso.io"
			});

			$('.work .project').hover(
				function () {
					$(this).find('.hover').animate({
						bottom: '0'
					},600);
				},
				function () {
					$(this).find('.hover').animate({
						bottom: '-500'
					},600);
				}
			);
		});
	</script>

</head>

<body>
	<div class="browserDimmer"></div> <!-- popup bg -->
	<div class="popUp"></div> <!-- standard popup -->

<div class="header">
	<?php if($sub) :?>
		<h1 class="subHeading"><a href="">KyleJasso.io</a></h1>
	<?php endif ; ?>
	<ul class="nav">
		<li><a href="about">About</a></li>
		<li><a href="#Work">Work</a></li>
		<li><a href="contact">Contact</a></li>
	</ul>
</div>
