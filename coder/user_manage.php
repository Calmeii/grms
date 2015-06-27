<?php
session_start();
if (isset($_SESSION['USERNAME']) == FALSE || $_SESSION['USERNAME'] != 'admin') {
	header("Location: ".$config_basedir);
}
require("../config.php");
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

if (isset($_POST['delete'])) {
	$sql = "delete from users where id=".$_GET['id'].";";
	mysql_query($sql);
	$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'delete user');";
	mysql_query($add_log);
}
else if (isset($_POST['add'])) {
	$sql = "insert into users(username,sex,tel,email) values('"
			.$_POST['username']."', '".$_POST['sex']."', '".$_POST['tel']."', '"
			.$_POST['email']."');";
	mysql_query($sql);
	$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'add user');";
	mysql_query($add_log);
	header("Location:".$_SERVER['PHP_SELF']);
}
require("header.php");
?>
<?php
$sql = "select * from users;";
$res = mysql_query($sql);

echo "<table class='now' style='width:600'>";
echo "<tr><th>姓名</th><th>性别</th><th>电话</th>
	<th>邮箱</th><th>编辑</th></tr>";
while ($row = mysql_fetch_assoc($res))
{
	echo "<form action=".$config_basedir.
		"/coder/user_manage.php?id=".$row['id']." method='post'>";
	echo "<tr>";
	echo "<td><a href='user_info.php?id=".$row['id']."'>".$row['username']."</a></td>";
	echo "<td>".$row['sex']."</td>";
	echo "<td>".$row['tel']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td><input type='submit' name='delete' value='删除'></td>";
	echo "</tr>";
	echo '</form>';
}
echo "<form action=".$config_basedir."/coder/user_manage.php method='post'>";
echo '<tr>
	<td><input type="text" name="username"></td>
	<td><input type="text" name="sex"> </td>
	<td><input type="text" name="tel"> </td>
	<td><input type="text" name="email"> </td>
	<td><input type="submit" name="add" value="增加"> </td>
</tr>';
echo '</form>';
echo "</table>";
?>
<?php
require("footer.php");
?>