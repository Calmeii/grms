<?php
function judge_admin() 
{
	session_start();
	if (isset($_SESSION['USERNAME']) == FALSE || $_SESSION['USERNAME'] != 'admin') {
		header("Location: ".$config_basedir);
	}
}
function init_mysql() 
{
	require("../config.php");
	$db = mysql_connect($dbhost, $dbuser, $dbpassword);
	mysql_select_db($dbdatabase, $db);
}
function judge_submit()
{
	if (isset($_POST['delete_user'])) 
	{
		$sql = "delete from branch_user where branch_id=".$_GET['id']."
				and user_id=".$_POST['user_id'].";";
		mysql_query($sql);
		$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'delect user in deparment');";
		mysql_query($add_log);		
	}
	if (isset($_POST['add_user'])) {
		$sql = "insert into branch_user(branch_id,user_id) values(
		 	".$_GET['id'].",".$_POST['user_id'].");";
		mysql_query($sql);
		$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'add user in deparment');";
		mysql_query($add_log);
	}
	if (isset($_POST['delete_role'])) 
	{
		$sql = "delete from branch_role where branch_id=".$_GET['id']."
				and role_id=".$_POST['role_id'].";";
		mysql_query($sql);
		$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'delect role in deparment');";
		mysql_query($add_log);
	}
	if (isset($_POST['add_role'])) {
		$sql = "insert into branch_role(branch_id,role_id) values(
		 	".$_GET['id'].",".$_POST['role_id'].");";
		mysql_query($sql);
		$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'add role in deparment');";
		mysql_query($add_log);
	}
	if (isset($_POST['delete_right'])) 
	{
		$sql = "delete from branch_right where branch_id=".$_GET['id']."
				and right_id=".$_POST['right_id'].";";
		mysql_query($sql);
		$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'delect right in deparment');";
		mysql_query($add_log);
	}
	if (isset($_POST['add_right'])) {
		$sql = "insert into branch_right(branch_id,right_id) values(
		 	".$_GET['id'].",".$_POST['right_id'].");";
		mysql_query($sql);
		$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'add right in deparment');";
		mysql_query($add_log);
	}

}
function construct_header()
{
	judge_admin();
	init_mysql();
	judge_submit();
	require("header.php");
}
construct_header();
?>

<?php

function depar_user()
{
	$sql = "select * from users where id in(
			select user_id from branch_user where branch_id=
			".$_GET['id'].");";
	$res = mysql_query($sql);
	echo "<table><tr><th>部门用户</th><th>编辑</th></tr>";
	while ($row = mysql_fetch_assoc($res))
	{
		echo "<form action='depar_info.php?id=".$_GET['id']."' method='post'>
		<tr><td>".$row['username']."</td><td>
		<input type='hidden' name='user_id' value='".$row['id']."'>
		<input type='submit' name='delete_user' value='删除'></td></tr></form>";
	}
	$str = "<form action='depar_info.php?id=".$_GET['id']."' method='post'>
		<tr><td><select name='user_id'>";
		$sql="select * from users where id not in(select user_id from 
			branch_user where branch_id = ".$_GET['id'].");";
		$res = mysql_query($sql);
		while ($row = mysql_fetch_assoc($res)) {
			$str .= "<option value='".$row['id']."'>".$row['username']."</option>";
		}
	$str .= "</select></td><td><input type='submit' name='add_user' value='增加'>
			</td></tr></form></table>";
	echo $str;
}
function depar_char()
{
	$sql = "select * from roles where id in(
			select role_id from branch_role where branch_id=
			".$_GET['id'].");";
	$res = mysql_query($sql);
	echo "<table><tr><th>部门角色</th><th>编辑</th></tr>";
	while ($row = mysql_fetch_assoc($res))
	{
		echo "<form action='depar_info.php?id=".$_GET['id']."' method='post'>
		<tr><td>".$row['name']."</td><td>
		<input type='hidden' name='role_id' value='".$row['id']."'>
		<input type='submit' name='delete_role' value='删除'></td></tr></form>";
	}
	$str = "<form action='depar_info.php?id=".$_GET['id']."' method='post'>
		<tr><td><select name='role_id'>";
		$sql="select * from roles where id not in(select role_id from 
			branch_role where branch_id = ".$_GET['id'].");";
		$res = mysql_query($sql);
		while ($row = mysql_fetch_assoc($res)) {
			$str .= "<option value='".$row['id']."'>".$row['name']."</option>";
		}
	$str .= "</select></td><td><input type='submit' name='add_role' value='增加'>
			</td></tr></form></table>";
	echo $str;

}
function depar_right()
{
	$sql = "select * from rights where id in(
			select right_id from branch_right where branch_id=
			".$_GET['id'].");";
	$res = mysql_query($sql);
	echo "<table><tr><th>部门权限</th><th>编辑</th></tr>";
	while ($row = mysql_fetch_assoc($res))
	{
		echo "<form action='depar_info.php?id=".$_GET['id']."' method='post'>
		<tr><td>".$row['name']."</td><td>
		<input type='hidden' name='right_id' value='".$row['id']."'>
		<input type='submit' name='delete_right' value='删除'></td></tr></form>";
	}
	$str = "<form action='depar_info.php?id=".$_GET['id']."' method='post'>
		<tr><td><select name='right_id'>";
		$sql="select * from rights where id not in(select right_id from 
			branch_right where branch_id = ".$_GET['id'].");";
		$res = mysql_query($sql);
		while ($row = mysql_fetch_assoc($res)) {
			$str .= "<option value='".$row['id']."'>".$row['name']."</option>";
		}
	$str .= "</select></td><td><input type='submit' name='add_right' value='增加'>
			</td></tr></form></table>";
	echo $str;	
}
function construct_body()
{
	depar_user();
	depar_char();
	depar_right();
}
construct_body();

?>

<?php
require("footer.php");
?>















