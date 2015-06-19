<?php 
	session_start();
	require("config.php");
	$db = mysql_connect($dbhost, $dbuser, $dbpassword);
	mysql_select_db($dbdatabase, $db);

	if (isset($_POST['submit']))
	{
		$sql = "select * from users where username='".$_POST['username']."' AND 
		password='".$_POST['password']."';";
		$res = mysql_query($sql);
		$rows = mysql_num_rows($res);

		if ($rows == 1) {
			$_SESSION['USERNAME'] = $_POST['username'];
			$_SESSION['PASSWORD'] = $_POST['password'];
			if ($_POST['username'] == 'admin') {
				header("Location: ".$config_basedir."/coder/admin.php");
			}
			else {
				header("Location: ".$config_basedir."/coder/user.php");
			}
		}
		else {
			header("Location: ".$config_basedir."/index.php?error=1");
		}
	}
	else {
		if (isset($_GET['error']) && $_GET['error'] == 1)
		{
			echo "用户名或密码错误!";
		}
	}
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
			<input type="password" name="password" placeholder="password"> <br />
			<input type="submit" name="submit" value="login">
		</form>
	</div>
</body>
</html>