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

			$('.project').mouseenter(function () {
				$this = $(this);
				$this.find('.default').fadeOut(function () {
					$this.find('.hover').fadeIn();
				});
			}).mouseleave(function() {
				$this.find('.hover').fadeOut(function () {
					$this.find('.default').fadeIn();
				});
			});
		});
	</script>

</head>

<body>
	<div class="browserDimmer"></div> <!-- popup bg -->
	<div class="popUp"></div> <!-- standard popup -->

<div class="header">
	<?php if($sub) :?>
		<h1 class="subHeading">KyleJasso.io</h1>
	<?php endif ; ?>
	<ul class="nav">
		<li><a href="about">About</a></li>
		<li><a href="#Work">Work</a></li>
		<li><a href="#">Contact</a></li>
	</ul>
</div>
