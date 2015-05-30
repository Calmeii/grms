<?php 
	require("../config.php") 
?>
<!doctype html>
<html>
<head>
	<title>General rights management system</title>
	<link href="../css/login.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
</head>
<body>
	<div id = "header"> 
		<h1><?php echo $config_webname; ?> </h1>
	</div>

	<div id =  "container">
		<form action="register.php" method="post">
			<label>Username</label>
			<input type="text" name="username" placeholder="username"> <br />
			
			<label>Password</label>
			<input type="password" name="username" placeholder="password"> <br />
			
			<label>repeat password</label>
			<input type="password" name="username" placeholder="password"> <br />
			
			<label>邮箱</label>
			<input type="text" name="mail" placeholder="xxx@xx.com"> <br />
			
			<laber>电话</laber>
			<input type="text" name="phone" placeholder="000000"> <br />
			
			<laber>性别</laber>
			<input type="radio" checked="checked" name="Sex" value="male" />男
			<input type="radio" checked="checked" name="Sex" value="female" />女 <br />
			
			<input type="submit" value="submit">
		</form>
	</div>
</body>
</html>





