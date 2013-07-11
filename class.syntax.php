<?php
@include 'conn.php';

$project = $_POST['proj'];

$project = 'cdc';

$query = mysql_fetch_assoc(mysql_query("SELECT * FROM highlighted_source WHERE code='$project'"));

?>
<script type="text/javascript" src="highlighter/run_prettify.js"></script>
<link rel="stylesheet" type="text/css" href="highlighter/sons-of-obsidian.css" />


<div class="textEditor clearfix">
	<div class="heading">
		CDC - Swoop Cards
		<div class="mini"><img src="images/underscore.png" /></div>
		<div class="full"><img src="images/boxes.png" /></div>
		<div class="close"><img src="images/cross.png" /></div>
	</div>

	<ul class="tabrow">
		<li class="selected">index.php</li>
		<li>style.css</li>
	</ul>

	<div class="code">

		<pre class="prettyprint linenums">
(function() {
    var jsSyntaxHighlighting = 'rocks';
})();
		</pre>

	</div>


</div>