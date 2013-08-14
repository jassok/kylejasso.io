<?php require_once('conn.php'); ?>
<?php include('lib/functions.php'); ?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8" />
	<meta name="keywords" content="Kyle Jasso, Designer, Developer, Web Design, Web Development, Web Developer" />
	<meta name="description" content="Kyle Jasso a Web developer in the Greater Philadelphia area." />
	<meta name="author" content="Kyle Jasso" />
	<meta name="viewport" content="width=device-width, inital-scale=1, maximum-scale=1" />
	<title>KyleJasso.io | Web Developer, Programmer</title>
	<base href="<?php echo BASE_URL; if (substr(BASE_URL,-1) != "/") { echo "/"; } ?>" />
	<link rel="stylesheet" type="text/css" href="style/screen.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.includes.js"></script>
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

			$('a[href="#work_section"]').on('click',function(event){
	  			var $anchor = $(this);
     
  				$('html, body').stop().animate({
    				scrollTop: ($($anchor.attr('href')).offset().top)+5
  				}, 1500,'easeInOutExpo');
   				
   				event.preventDefault();
			});
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
		<li><a href="#work_section">Work</a></li>
		<li><a href="contact">Contact</a></li>
	</ul>
</div>
