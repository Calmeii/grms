<?php
session_start();
if (isset($_SESSION['USERNAME']) == FALSE || $_SESSION['USERNAME'] != 'admin') {
	header("Location: ".$config_basedir);
}
require("../config.php");
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

if (isset($_POST['add_user'])){
	$add_user_sql = "INSERT INTO role_user (role_id, user_id) 
	values (".$_GET['id'].", ".$_POST['sel_user'].");";
	mysql_query($add_user_sql);
	$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'add user in role');";
	mysql_query($add_log);
	
}
if (isset($_POST['add_right'])) {
	$add_right_sql = "insert into role_right(role_id,right_id) 
	values(".$_GET['id'].",".$_POST['sel_right'].");";
	mysql_query($add_right_sql);
	$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'add right in role');";
	mysql_query($add_log);
	
}
if (isset($_POST['add_depar'])) {
	$add_depar_sql = "insert into branch_role(branch_id,role_id) 
	values(".$_POST['sel_depar'].",".$_GET['id'].");";
	mysql_query($add_depar_sql);
	$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'add adpar in role');";
	mysql_query($add_log);
	
}


if (isset($_POST['del_right'])) {
	$del_right_sql = "delete from role_right where role_id=".$_GET['id']." 
			AND right_id = ".$_POST['right_id'].";";
	mysql_query($del_right_sql);
	$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'delete right in role');";
	mysql_query($add_log);
	
}
if (isset($_POST['del_depar'])) {
	$del_depar_sql = "delete from branch_role where role_id=".$_GET['id']." 
			AND branch_id = ".$_POST['branch_id'].";";
	mysql_query($del_depar_sql);
	$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'delete deparment in role');";
	mysql_query($add_log);
}
if (isset($_POST['del_user'])) {
	$del_user_sql = "delete from role_user where role_id=".$_GET['id']." 
			AND user_id = ".$_POST['user_id'].";";
	mysql_query($del_user_sql);
	$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'delete user in role');";
	mysql_query($add_log);
}
?>

<//==========用户界面==================//>
<?php
require("header.php");
echo "<div id = 'branch_user'>";
$char_user_sql = "select * from users where id in (select user_id from role_user where role_id = ".$_GET['id']."); ";
$char_user_res = mysql_query($char_user_sql);
echo  "角色".$_GET['id'];
echo "<table  >";
echo "<tr><th>用户名</th><th>编辑</th></tr>";
while($char_user_row = mysql_fetch_assoc($char_user_res))
{
	echo "<form action=".$config_basedir."/coder/char_info.php?id=".$_GET['id']." method='post'>";
	echo "<tr>";
	echo "<td>".$char_user_row['username']."</td>";
	echo "<input type='hidden' name='user_id' value='".$char_user_row['id']."'>";
	echo "<td><input type='submit' name='del_user' value='删除'></td>";
	echo "</tr>";
	echo "</form>";
}
	echo "<form action=".$config_basedir."/coder/char_info.php?id=".$_GET['id']." method='post'>";
	echo "<tr><td>";
	$sl_username_sql = "select id,username from users where id not in (select user_id from role_user where role_id = ".$_GET['id']."); ";
	$sl_username_res = mysql_query($sl_username_sql);
	echo "<select name='sel_user'>";
	while ($sl_username_row = mysql_fetch_assoc($sl_username_res))
	{
		echo "<option value='".$sl_username_row['id']."'>".$sl_username_row['username']."</option>";
	}
	echo "</select>";
	echo "</td><td><input type='submit' name='add_user' value='增加'></td></tr>";
	echo "</form>";
	echo "</table>";
echo "</div>";
?>


<//==========权限界面==================//>

<?php
echo "<div id = 'role_right'>";
$char_right_sql = "select * from rights where id in (select right_id from role_right where role_id = ".$_GET['id']."); ";
$char_right_res = mysql_query($char_right_sql);
echo "<table  >";
echo "<tr><th>权限</th><th>编辑</th></tr>";
while($char_right_row = mysql_fetch_assoc($char_right_res))
{
	echo "<form action=".$config_basedir."/coder/char_info.php?id=".$_GET['id']." method='post'>";
	echo "<tr>";
	echo "<td>".$char_right_row['name']."</td>";
	echo "<input type='hidden' name='right_id' value='".$char_right_row['id']."'>";
	echo "<td><input type='submit' name='del_right' value='删除'></td>";
	echo "</tr>";
	echo "</form>";
}
	echo "<form action=".$config_basedir."/coder/char_info.php?id=".$_GET['id']." method='post'>";
	echo "<tr><td>";
	$sl_right_sql = "select * from rights where id not in (select right_id from role_right where role_id = ".$_GET['id']."); ";
	$sl_right_res = mysql_query($sl_right_sql);
	echo "<select name='sel_right'>";
	while ($sl_right_row = mysql_fetch_assoc($sl_right_res))
	{
		echo "<option value='".$sl_right_row['id']."'>".$sl_right_row['name']."</option>";
	}
	echo "</select>";
	echo "</td><td><input type='submit' name='add_right' value='增加'></td></tr>";
	echo "</form>";
	echo "</table>";
echo "</div>";
?>





<//==========部门界面==================//>
<?php
echo "<div id = 'branch_role'>";
$char_depar_sql = "select * from branchs where id in (select branch_id from branch_role where role_id = ".$_GET['id']."); ";
$char_depar_res = mysql_query($char_depar_sql);
echo "<table>";
echo "<tr><th>部门</th><th>编辑</th></tr>";
while($char_depar_row = mysql_fetch_assoc($char_depar_res))
{
	echo "<form action=".$config_basedir."/coder/char_info.php?id=".$_GET['id']." method='post'>";
	echo "<tr>";
	echo "<td>".$char_depar_row['name']."</td>";
	echo "<input type='hidden' name='branch_id' value='".$char_depar_row['id']."'>";
	echo "<td><input type='submit' name='del_depar' value='删除'></td>";
	echo "</tr>";
	echo"</form>";
}
	echo "<form action=".$config_basedir."/coder/char_info.php?id=".$_GET['id']." method='post'>";
	echo "<tr><td>";
	$sl_depar_sql = "select * from branchs where id not in (select branch_id from branch_role where role_id = ".$_GET['id']."); ";
	$sl_depar_res = mysql_query($sl_depar_sql);
	echo "<select name='sel_depar'>";
	while ($sl_depar_row = mysql_fetch_assoc($sl_depar_res))
	{
		echo "<option value='".$sl_depar_row['id']."'>".$sl_depar_row['name']."</option>";
	}
	echo "</select>";
	echo "</td><td><input type='submit' name='add_depar' value='增加'></td></tr>";
	echo "</form>";
	echo "</table>";
echo "</div>";
?>

