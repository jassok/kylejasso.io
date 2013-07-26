<?php
require_once('../conn.php');

//------------/ Sitewide Variables (used in meta.php, header.php and admin/ files) /---------------//

//- Path to the main logo file (from the site root)... used in the admin, but useful for other things as well
$LEV_websiteLogo = "admin/images/LEV_logo.png";

//---- Website URL... used for pretty urls mostly, but useful for other things as well
$LEV_websiteURL = BASE_URL;

//- Timezone
$LEV_timezone = "America/New_York";
date_default_timezone_set($LEV_timezone);

//- Database info
$hostname = DB_HOST;
$username = DB_USER;
$password = DB_PASSWORD;
$database = DB_DATABASE;
?>