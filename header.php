<?php require_once('lib/settings.php'); ?>
<?php require_once('lib/database.php'); ?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title><?php echo $title; ?></title>

    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="author" content="<?php echo $author; ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <base href="<?php echo WEBSITE_URL; if (substr(WEBSITE_URL,-1) != "/") { echo "/"; } ?>" />

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch-icon-114x114.png" />

    <!-- Load up a few scripts here, the rest can wait -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.0/jquery-ui.min.js"></script>

    <!-- Make things all pretty like with a style sheet -->
    <link rel="stylesheet" type="text/css" href="style.css" />

    <!-- IE Exclusive, yeah you know, that browser everyone hates -->
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="fontello-ie7.css"><![endif]-->
</head>
<body>

<?php if($page == 'index') : ?>
    <header class="clearfix">
        <a href="">
            <h1>KyleJasso.io</h1>
            <h2>web developer</h2>
        </a>
    </header>
<?php endif ;?>
<main class="<?php echo $page; ?>">