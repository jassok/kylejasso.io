<?php
@include 'conn.php';

$command = "";
$options = "";
$project = "";
$RESPONSE = "";

$commands = array('help','man','projects','project','resume','-source','-s','-link','-l');

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

	// Sanitize any incoming commands because we're about to database
	if($_POST['c-command']) {
		$command = strtolower(sanitize($_POST['c-command']));
	}

	if($_POST['c-options']) {
		$options = strtolower(sanitize($_POST['c-options']));

		if($options == 'false') {
			$options = false;
		}
	}

	if($_POST['c-project']) {
		$project = strtolower(sanitize($_POST['c-project']));

		if($project == 'false') {
			$project = false;
		}
	}

	// Insure that a command was posted
	if($command) {
		$RESPONSE = array("command" => $command, "popup" => 0, "err" => 0, "message" => "");

		if(in_array($command,$commands)) {
			if($command == 'help' || $command == 'man') {
				if($options) {
					$help = getHelp($options);
				} else {
					$help = getHelp();
				}

				$RESPONSE['message'] = $help;
			} else if ($command == "project" || $command == "projects") {
				$proj = getProjects($options,$project);

				if(strstr($proj,'-s')) {
					$RESPONSE['popup'] = 1;
				}
				$RESPONSE['message'] = $proj;
			} else if ($command == "-source" || $command == "-s") {
				$RESPONSE['popup'] = 1;
				$RESPONSE['message'] = "-s $project";
			} else if ($command == "resume") {
				$resume = getResume($project);

				$RESPONSE['message'] = $resume;
			}

		} else {
			$RESPONSE['err'] = 1;
			$RESPONSE['message'] = "`".$command."' is not a recgonized as an internal or external command, <br />".
								"operable program or batch file. Please see 'help` for a list of available commands.";
		}
	}

	function getHelp($specific = false) {
		$help = array(
			'<p>Use `help (command)\' for specific details about each command.',
			'<div class="half column">projects &lt;option&gt; &lt;code&gt;</div><div class="half column">A complete list of all projects and their client code.</div>',
			'<div class="half column">[-source],[-s] &lt;code&gt;</div><div class="half column">View the source for a client project;</div>',
			'<div class="half column">[-link],[-l] &lt;code&gt;</div><div class="half column">Open the full project details page.</div>',
			'<div class="half column">resume</div><div class="half column">View the overarching resume details. See `help resume\' for more.</div>',
			'<div class="half column">[-skills]</div><div class="half column">List all technical skills and languages.</div>',
			'<div class="half column">[-experience]</div><div class="half column">Full list of past work experience.</div>',
			'<div class="half column">[-education]</div><div class="half column">Details about education, including related course work.</div>'
			);
		if($specific) {
			if($specific == "projects" || $specific == "project") {
				$returnMessage = $help[0]."<br />".$help[1]."<br />".$help[2]."<br />".$help[3]."<br />";
			} else if ($specific == "resume") {
				$returnMessage = $help[0]."<br />".$help[4]."<Br />".$help[5]."<br />".$help[6]."<br />";
			} else {
				$RESPONSE['err'] = 1;
				$returnMessage = "Command ".$specific." was not found. Please refer to `help'.";
			}
		} else {
			$returnMessage = $help[0]."<br />".$help[1]."<br />".$help[4]."<br />";
		}

		return $returnMessage;

	}

	function getProjects($specific = false, $code = false) {
		$return = "";

		if($specific && $code) {
			if($specific == "-source" || $specific == "-s") {
				$return = "-s ".$code;
			} else if ($specific == "-link" || $specific == "-l") {
				$return = "-l client/$code";
			}

		} else if (!$specific && $code) {
			$query = mysql_fetch_assoc(mysql_query("SELECT * FROM projects WHERE code='$code'")) or die("Code $code not found");
			$return .= "<p>";
			$return .= "<b>$query[client] [".$query['code']."]</b><br />";
			$return .= "$query[date] - $query[site_type]";
			$return .= "</p>";

			$return .= "<p>$query[block]</p>";

			$return .= $query['description'];

		} else {
			$query = mysql_query("SELECT * FROM projects ORDER BY code ASC") or die(mysql_error());

			$return .= "<div class='clearfix'>".
				"<div class='c2 colHeader'><b>Code</b></div>".
				"<div class='c3 colHeader'><b>Client</b></div>".
				"<div class='c11 colHeader'><b>Details</b></div>".
				"</div>";
			 while($q = mysql_fetch_assoc($query)) {
				$return .= "<div class='clearfix'>".
					"<div class='c2'>".$q['code']."</div>".
					"<div class='c3'>".$q['client']."</div>".
					"<div class='c11'>".$q['site_type']." | ".date('F Y',strtotime($q['date']))."</div>".
					"</div>";
			}
		}
		return $return;
	}

	function getResume($opt = false) {
		$return = '';

		if($opt){
			$opt = str_replace('-',$opt);
			die($opt);
			$query = mysql_fetch_assoc(mysql_query("SELECT * FROM resume WHERE section='$opt'"));

			$return = $query['text'].$opt.$project;

		} else {
			$return = "what do i return for general";
		}

		return $return;
	}
	echo json_encode($RESPONSE);
?>

