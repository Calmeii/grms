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
if (isset($_POST['delete_right'])) {
	$sql2 = "delete from user_right where user_id=".$_GET['id']." 
			AND right_id = ".$_POST['right_id'].";";
	mysql_query($sql2);
}
if (isset($_POST['add_right'])) {
	$sql3 = "insert into user_right(user_id,right_id) 
			values(".$_GET['id'].",".$_POST['add_right_id'].");";
	mysql_query($sql3);
}
require("header.php");
?>

<?php
// 修改用户信息
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
// 用户所在角色
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
// 用户所在部门
echo "<div id='user_depar'>";
	$depar_sql = "select name from branchs where id in (select branch_id 
				from branch_user where user_id = ".$_GET['id'].");";
	$depar_res = mysql_query($depar_sql);
	echo "<table><tr><th>用户部门</th></tr>";
	while ($depar_row = mysql_fetch_assoc($depar_res))
	{
		echo "<tr>";
		echo "<td>".$depar_row['name']."</td>";
		echo "</tr>";
	}
	echo "</table>";
echo "</div>";
// 用户权限
echo "<div id='user_right'>";
	$right_sql = "select * from rights where id in (select right_id
				from user_right where user_id = ".$_GET['id'].");";
	$right_res = mysql_query($right_sql);
	echo "<table><tr><th>用户权限</th><th>编辑</th></tr>";
	while ($right_row = mysql_fetch_assoc($right_res))
	{
		echo "<form action='".$config_basedir."/coder/user_info?id=".$_GET['id'].
			"' method='post'>";
		echo "<tr>";
		echo "<td>".$right_row['name']."</td>";
		echo "<input type='hidden' name='right_id' value='".$right_row['id']."'>";
		echo "<td><input type='submit' name='delete_right' value='删除'></td>";
		echo "</tr>";
		echo "</form>";
	}
	echo "<form action='".$config_basedir."/coder/user_info?id=".$_GET['id'].
	"' method='post'>";
	echo "<tr><td>";
	$add_sql = "select * from rights where id not in (select right_id
				from user_right where user_id = ".$_GET['id'].");";
	$add_res = mysql_query($add_sql);
	echo "<select name='add_right_id'>";
	while ($add_row = mysql_fetch_assoc($add_res))
	{
		echo "<option value='".$add_row['id']."'>".$add_row['name']."</option>";
	}
	echo "</select>";
	echo "</td><td><input type='submit' name='add_right' value='增加'></td></tr>";
	echo "</form>";
	echo "</table>";
echo "</div>";
?>

<?php 
require("footer.php");
?>





























