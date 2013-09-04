<?php
    $db = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_BASE);


    if($db->connect_errno > 0) {
        if(strstr($_SERVER['SERVER_NAME'],'localhost')) {
            die('Unable to connect to database [' . $db->connect_error . ']');
        } else {
            $alertMessage = "<h2>Oops...</h2>";
            $alertMessage .= "<p>It appears something has catastrophically failed.
            I've been alerted, and will fix it as soon as I can.</p>";
            $alertMessage .= "<p>In the mean time, why not head over to
            <a href='http://www.linkedin.com/in/kylejasso/'>My Linkedin Profile?</a></p>";

            die($alertMessage);
        }
    }

?>