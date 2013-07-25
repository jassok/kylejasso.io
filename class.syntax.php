<?php
@include 'conn.php';

$project = $_POST['proj'];

//$project = 'cdc';

$query = mysql_fetch_assoc(mysql_query("SELECT * FROM highlighted_source WHERE code='$project'"));

?>
<script type="text/javascript" src="highlighter/run_prettify.js"></script>
<link rel="stylesheet" type="text/css" href="highlighter/sons-of-obsidian.css" />
<script type="text/javascript">
	$(function () {
		$('.prettyprint').css('max-height',(($(window).height())-200)+'px');

		$('a[href="#closePopUp"]').click(function () {
			$('.popUp').fadeOut(function () {
	            $(".browserDimmer").fadeOut(function () {
	                $('.popUp').html("");
	                $('.popUp').removeAttr('style');
	            });
	        });
	        return false;
		});
		var defaultStyles;
		$('.full').click(function () {

			var maxWidth = $(window).width();
			var maxHeight = $(window).height();

			if($(this).hasClass('shrink')) {
				console.log(defaultStyles);
				$('.popUp').attr('style',defaultStyles);
				$('.prettyprint').css('max-height',(maxHeight-200)+'px');
			} else {
				defaultStyles = $('.popUp').attr('style');
				$('.popUp').css({'height':maxHeight+'px','width':(maxWidth-20)+'px','top':0,'left':0,'margin-left':0,'margin-top':0});
				$('.prettyprint').css('max-height',(maxHeight-100)+'px');
			}
			$(this).toggleClass('shrink');
			return false;
		});

		$('.mini').click(function () {
			/* TODO: Still needs to function
			$('.tabrow').slideUp();
			$('.code').slideUp();
			$('.browserDimmer').hide();
			$('.popUp').css({'width':200,'bottom':0,'left':0,'margin-left':0,'display':block});
			*/
		});
	});
</script>

<div class="textEditor clearfix">
	<div class="heading">
		CDC - Swoop Cards
		<div class="mini"><img src="images/underscore.png" /></div>
		<div class="full"><img src="images/boxes.png" /></div>
		<div class="close"><a  href="#closePopUp"><img src="images/cross.png" /></a></div>
	</div>

	<ul class="tabrow">
		<li class="selected">index.php</li>
		<li>style.css</li>
	</ul>

	<div class="code">

		<pre class="prettyprint linenums">
		<?php echo str_replace("  "," ",htmlspecialchars($query['syntax'],ENT_QUOTES)); ?>
		</pre>

	</div>


</div>