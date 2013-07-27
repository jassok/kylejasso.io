<?php

/* == Include connection settings (For Remote) ======== */
include("lib/settings.php");

/* == Include local connection settings =============== */
	/**************************************************
	# If you are building your site and testing on both
	# a localhost and a remote server, then you need to
	# create a file called "local.settings.php" in the lib
	# folder. This file should mirror any variables set in
	# settings.php that need to be overridden. 
	#
	# Example of local.settings.php:
	#
	# <?php
	# 	$hostname = "localhost";
	#	$username = "root";
	# 	$password = "";
	# ?>
	***************************************************/

//Local Testing for site
if(file_exists('lib/local.settings.php')) {
	include('lib/local.settings.php'); 
}
// Loal Testing for admin.
if(file_exists('../lib/local.settings.php')) {
	include('../lib/local.settings.php');
}

/* == Check that details are set ====================== */
	if(!$hostname) { die("Please set your host in <b>lib/settings.php</b>"); }
	if(!$username) { die("Please set your username in <b>lib/settings.php</b>"); }
	if(!$database) { die("Please set your database in <b>lib/settings.php</b>"); }

$conn = mysql_connect($hostname, $username, $password);

if($conn) {
	mysql_select_db($database, $conn);
} else {
	die("An error occoured. Please check the error log." . writeError(mysql_error(),$errorFile));
}

$query = mysql_query("SELECT permissionID FROM lev_userpermissions");
?>

