<?php
	if($_POST['cmd']) {
		$command = $_POST['cmd'];
		switch($command) {
			case 'help' :
				echo "Reurn Help Commands";
				break;
			case 'project' :
				echo "Return project info";
				break;
			case 'resume' :
				echo "Return Resume info";
				break;
		}
	} else {
		echo "";
	}
?>