<?php
@include 'conn.php';

	function cleanInput($input) {

		$search = array(
			'@<script[^>]*?>.*?</script>@si',   // Strip out javascript
			'@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
			'@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
			'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
		);

		$output = preg_replace($search, '', $input);
		return $output;
	}

	function sanitize($input) {
	    if (is_array($input)) {
	        foreach($input as $var=>$val) {
	            $output[$var] = sanitize($val);
	        }
	    }
	    else {
	        if (get_magic_quotes_gpc()) {
	            $input = stripslashes($input);
	        }
	        $input  = cleanInput($input);
	        $output = mysql_real_escape_string($input);
	    }
	    return $output;
	}

	if($_POST['cmd']) {
		$command = sanitize($_POST['cmd']);
		$options = sanitize($_POST['opt']);
		$project = sanitize($_POST['proj']);

		if(strstr($command, 'clear') || $command == 'cls') {
			echo 'clear';
		} elseif(strstr($command, 'command') || $command == 'help' || $command == 'man') {
			runHelp();
		} elseif(strstr($command,'project')) {
			runProject($options,$project);
		} elseif(strstr($command,'resume') || $command == 'portfolio') {
			runResume($options);
		} else {
			echo "-Command `$command' not found. Run `help' for a list of available commands.";
		}
	} else {
		echo "";
	}


	function runHelp () {
		echo "The available commands are listed below. <br />";
		echo '<div class="one-third">';
			echo 'projects <br />'.
					'projects &lt;code&gt; <br />'.
					'projects -source &lt;code&gt; <br />'.
					'projects -link &lt;code&gt; <br />';
			echo 'resume <br />'.
					'resume -skills <br />'.
					'resume -experience <br />'.
					'resume -education <br />';
		echo '</div>';

		echo '<div class="two-thirds">';
			echo  'Show a list of all projects displayed in the portfolio. <br />'.
					'List detailed information about a specific project. <br />'.
					'Display select source code for a specific project. <br />'.
					'Open the project page for more information and pretty pictures.<br />';
			echo 'Show basic information off my resume <br />'.
					'List all technical skills. <br />'.
					'List past work experience. <br />'.
					'List education and training. <br />';
		echo '</div>';

		echo '<br /><br />';

	}

	function runProject($opt, $proj) {
		if(!$opt && !$proj) {
			$query = mysql_query("SELECT * FROM projects ORDER BY code ASC");

			?>
			<div class="clearfix">
				<div class="c2 colHeader"><b>Code</b></div>
				<div class="c3 colHeader"><b>Client</b></div>
				<div class="c11 colHeader"><b>Details</b></div>
			</div>
			<?php while($q = mysql_fetch_assoc($query)) : ?>
				<div class="clearfix">
					<div class="c2"><?php echo $q['code']; ?></div>
					<div class="c3"><?php echo $q['client']; ?></div>
					<div class="c11"><?php echo $q['site_type'].' | '.date('F Y',strtotime($q['date'])); ?></div>
				</div>

			<?php endwhile ;?>
				<br /><br />

			<?php

		} if(!$opt && $proj) {
			// No options, just details about the project
			$query = mysql_fetch_assoc(mysql_query("SELECT * FROM projects WHERE code='$proj'"));
			?>
				<p>Client: <?php echo $query['client']; ?> <br />
					Date: <?php echo date('F Y',strtotime($query['date'])); ?><br />
					<?php echo $query['block']; ?> <br /><br />
					URL: <a href="<?php echo $query['external_link']; ?>"><?php echo $query['external_link']; ?></a><br />
				</p>

				<p><?php echo $query['description']; ?></p>

				<br /><br />

			<?php

		} if ($opt && $proj) {
			// Specific Request
			if(strstr($opt,'source')) {
				echo "1 | 1 | $proj";
			} elseif(strstr($opt,'link')) {
				echo "1 | 2 | $proj";
			} else {
				echo "Command `$command $opt $proj' is unknown. Run `help' for a list of available commands.";
			}

		}

	}

	function runResume($options) {

	}
?>