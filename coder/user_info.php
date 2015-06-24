<?php
session_start();
if (isset($_SESSION['USERNAME']) == FALSE || $_SESSION['USERNAME'] != 'admin') {
	header("Location: ".$config_basedir);
}
require("../config.php");
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);
if (isset($_POST['modify_user_info'])) {
	$sql1 = "update users set username='".$_POST['username']."',sex='".$_POST['sex']."',
	tel='".$_POST['tel']."',email='".$_POST['email']."' where id=".$_GET['id'].";";
	mysql_query($sql1);
}
require("header.php");
?>

<?php
echo "<div id='modify_user_info'>";
	$user_sql = "select * from users where id=".$_GET['id'].";";
	$user_res = mysql_query($user_sql);
	$user_row = mysql_fetch_assoc($user_res);
	echo "<form action='user_info.php?id=".$_GET['id']."' method='post'>";
	echo "姓名: <input type='text' name='username' value='".$user_row['username']."'><br />";
	echo "性别: <input type='text' name='sex' value='".$user_row['sex']."'><br />";
	echo "电话: <input type='text' name='tel' value='".$user_row['tel']."'><br />";
	echo "邮箱: <input type='text' name='email' value='".$user_row['email']."'><br />";
	echo "<input type='submit' name='modify_user_info' value='修改'>";
	echo "</form>";
echo "</div>";
echo "<div id='user_char'>";
	$char_sql = "select * from roles where id in(select role_id from
				role_user where user_id=".$_GET['id'].");";
	$char_res = mysql_query($char_sql);
	echo "<table><tr><th>用户角色</th></tr>";
	while ($char_row = mysql_fetch_assoc($char_res))
	{
		echo "<tr>";
		echo "<td>".$char_row['name']."</td>";
		echo "</tr>";
	}
	echo "</table>";
echo "</div>";
?>

<?php 
require("footer.php");
?>





























