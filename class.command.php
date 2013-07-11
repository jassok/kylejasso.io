<?php
	if($_POST['cmd']) {
		$command = $_POST['cmd'];
		$options = $_POST['opt'];
		$project = $_POST['proj'];
		switch($command) {
			case 'clear' :
				echo 'clear';
				break;
			case 'help' :
				runHelp();
				break;
			case 'project' :
				runProject($options,$project);
				break;
			case 'resume' :
				runResume($options);
				break;
			default:
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
			<?php while($q = mysql_fetch_assoc($query)) : ?>
				<div class="clearfix">
					<div class="c2"><?php echo $q['code']; ?></div>
					<div class="c3"><?php echo $q['client']; ?></div>
					<div class="c11"><?php echo $q['site_type'].' '.$q['date']; ?></div>
				</div>

			<?php endwhile ;?>

			<?php

		} if(!$opt && $proj) {
			// No options, just details about the project

		} if ($opt && $proj) {
			// Specific Request

		}

	}

	function runResume($options) {

	}
?>