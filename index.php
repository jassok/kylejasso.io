<?php $sub = false; ?>
<?php include 'header.php'; ?>

<div class="introduction">
	<h1 class="newCommand">KyleJasso.io</h1>
</div>

<div class="command clearfix">
	<div class="center">
		<div id="commander"></div>
	</div>
</div>

<a id="work">
<div class="work clearfix">
	<div class="center">
		<h2>Work</h2>

		<div class="clearfix">
			<?php $query = mysql_query("SELECT code, src, client,site_type FROM projects WHERE active=1 ORDER BY date ASC"); ?>
			<?php while($mq = mysql_fetch_assoc($query)) :?>
				<div class="one-third">
					<a href="project/<?php echo $mq['code']; ?>">
						<div class="project">
							<div class="default">
								<img src="<?php echo $mq['src']; ?>" alt="<?php echo $mq['client']; ?>" />
							</div>
							<div class="hover">
								<h4><?php echo $mq['client']; ?></h4>
								<h5><?php echo $mq['site_type']; ?> Website</h5>
							</div>
						</div>
					</a>
				</div>
			<?php endwhile ; ?>
		</div>
	</div>
</div>

</body>
</html>

