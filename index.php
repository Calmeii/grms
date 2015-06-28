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
		}
		else {
			header("Location:".$_SERVER['PHP_SELF']."?error=1");
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
<html lang="en">
<html>
<head>
	<title>General rights management system</title>
	<link href="css/login.css" rel="stylesheet" type="text/css"/>
	<meta charset="utf-8">
</head>
<body>
	<div class="container">
		<section id="content">
			<form action="index.php" method="post">
				<h1><?php echo $config_webname; ?></h1>
				<div>
					<input type="text" placeholder="username"  name="username"  > <br />
				</div>
				<div>
					<input type="password" placeholder="password"  name="password"  > <br />
				</div>
				<div>
					<input type="submit" name="submit" value="login">
					<a href="#">Lost your password?</a>
					<a href="#">Register</a>
				</div>
			</form>
			<div class="button">
				<a href="#">About us</a>
			</div>
		</section>
	</div>
</body>
</html>

