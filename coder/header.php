<?php
require("../config.php");
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