<?php $sub = true; ?>
<?php include 'header.php'; ?>

<?php
	$code = "";
	if(isset($_REQUEST['code'])) {
		$code = sanitize($_REQUEST['code']);
	} else {
		// Search Like
	}
	$query = mysql_fetch_assoc(mysql_query("SELECT * FROM projects WHERE code='$code'"));
	$logo = mysql_fetch_assoc(mysql_query("SELECT * FROM client_logos WHERE code='$code'"));
	$images = mysql_query("SELECT * FROM banners WHERE code='$code' ORDER BY position");
	$availableSource = mysql_num_rows(mysql_query("SELECT code FROM highlighted_source WHERE code='$code'"));
	
	if($availableSource > 1) {
		$sources = $availableSource." Files available.";
	} else {
		$sources = $availableSource." File available.";
	}
?>

<script type="text/javascript">
	$(function () {

		$('a[href="#viewSource"]').click(function () {
			$.ajax({
                type:"POST",
                url:"class.syntax.php",
                data:{'proj':$(this).data('code') }
            }).done(function ( msg) {
                $('.popUp').popUp(msg);
            });

			return false;
		});
	});
</script>

<div class="introduction">
	<h2 class="subHeading"><?php echo $query['client']; ?></h2>
</div>
<div class="command clearfix">
	<div class="center projectInfo">
		<div class="c10 images">
			<?php while($b = mysql_fetch_assoc($images)) : ?>
				<img src="<?php echo $b['src']; ?>" alt="<?php echo $b['alt']; ?>" />
			<?php endwhile ; ?>
		</div>
		<div class="c6 details">
			<div class="centerText">
				<?php if($logo['src']) : ?>
					<img class="logo" src="<?php echo $logo['src']; ?>" alt="<?php echo $logo['alt']; ?>" />
				<?php endif ; ?>
				<h3><?php echo $query['client']; ?></h3>
			</div>
			<hr />
			<p>
				<strong>Date: </strong><?php echo $query['date']; ?> <br />
				<strong>Site Type: </strong><?php echo $query['site_type']; ?> <br />
				<strong>External Link: </strong><?php echo "<a href='$query[external_link]' target='_BLANK'>$query[external_link]</a>"; ?> <br />
				<strong>Source Code: </strong> <a href="#viewSource" data-code="<?php echo $query['code']; ?>"><?php echo $sources; ?></a>
			</p>
			<hr />
			<?php echo $query['block']; ?>
			<hr />
			<?php echo $query['description']; ?>
		</div>
	</div>
</div>


<?php include 'footer.php'; ?>