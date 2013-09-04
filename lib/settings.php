<?php
    $title = "Kyle Jasso - Web developer &amp; Programmer";
    $keywords = "";
    $description = "";
    $author = "Kyle Jasso";

    if(strstr($_SERVER['SERVER_NAME'],"localhost")) {
        define("WEBSITE_URL","http://localhost/Projects/kylejasso.io/");

        // Make sure we show all errors
        ini_set('display_errors', 1);
        ini_set('log_errors', 1);
        ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
        error_reporting(E_ALL);
    } else {
        // Live Server Base URL
        define("WEBSITE_URL","http://www.kylejasso.io/");

        // We also want to suppress all warnings
        ini_set('display_errors', 0);
        error_reporting(0);
    }

    define("DB_HOST","kylejasso.io");
    define("DB_USER","kylejass_root");
    define("DB_PASS","298473ksJ");
    define("DB_BASE","kylejass_site_v2");
?>