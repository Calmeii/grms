<?php
session_start();
require("../config.php");
if (isset($_SESSION['USERNAME']) == FALSE)
{
	 header("Location: ".$config_basedir."/index.php");
}
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);
mysql_query("set names 'utf8'");
?>

<!doctype html>
<html>
<head>
	<title><?php echo $config_webname; ?></title>
	<link href="../css/stylesheet.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
</head>
<body>
	<div id = "header">
		<h1><?php echo $config_webname; ?></h1>
	</div>
	<div id = "container">
		<div id = "bar">
			<?php require("bar.php"); ?>
		</div>
		<div id = "main">