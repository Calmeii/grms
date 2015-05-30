<?php 
	require("config.php") 
?>
<!doctype html>
<html>
<head>
	<title>General rights management system</title>
	<link href="css/login.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
</head>
<body>
	<div id = "header"> 
		<h1><?php echo $config_webname; ?></h1> 
	</div>

	<div id =  "container">
		<form action="index.php" method="post">
			<label>Username</label>
			<input type="text" name="username" placeholder="username"> <br />
			<label>Password</label>
			<input type="password" name="username" placeholder="password"> <br />
			<input type="submit" value="submit">
			<a href="coder/register.php">register</a>
		</form>
	</div>
</body>
</html>