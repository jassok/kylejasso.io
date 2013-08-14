<?php
@include 'conn.php';
@include 'lib/functions.php';

$project = sanitize($_POST['proj']);

//$project = 'cdc';

$query = mysql_query("SELECT * FROM highlighted_source WHERE code='$project'");

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
			$(window).scrollTop();

			var maxWidth = $(window).width();
			var maxHeight = $(window).height();

			if($(this).hasClass('shrink')) {
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

		$('.tabrow').find('li:first').addClass('selected')
		$('.code').find('.prettyprint:first').show();
		$('.tabrow li').click(function () {
			var change = $(this).data('id');
			console.log(change);
			$('.tabrow li').each(function () {
				$(this).removeClass('selected');
			});
			$(this).addClass('selected');

			$('.prettyprint').each(function () {
				if($(this).is(':visible')) {
					$(this).fadeOut(function () {
						$('#'+change).fadeIn();
					});
				}
			})
		})
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
		<?php while($lq = mysql_fetch_assoc($query)) : ?>
			<li data-id="<?php echo $lq['source_ID']; ?>"><?php echo $lq['filename']; ?></li>
		<?php endwhile ; ?>
	</ul>

	<div class="code">
		<?php $query = mysql_query("SELECT * FROM highlighted_source WHERE code='$project'"); ?>
		<?php while($cq = mysql_fetch_assoc($query)) : ?>
			<pre class="prettyprint linenums" id="<?php echo $cq['source_ID']; ?>">
<?php echo str_replace("  "," ",htmlspecialchars($cq['syntax'],ENT_QUOTES)); ?>
			</pre>
		<?php endwhile ; ?>
	</div>


</div>