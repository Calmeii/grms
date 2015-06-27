<?php
session_start();
if (isset($_SESSION['USERNAME']) == FALSE || $_SESSION['USERNAME'] != 'admin') {
	header("Location: ".$config_basedir);
}
require("../config.php");
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

if (isset($_POST['del_dary'])) {
	$sql = "delete from logs where id='".$_GET['id']."'";
	mysql_query($sql);
	header("Location:".$_SERVER['PHP_SELF']);
}
require("header.php");
?>
<?php
$dary_sql = "select * from logs ";
$dary_res = mysql_query($dary_sql);
$name = "admin";
echo "<table  >";
echo "<tr><th>用户名</th><th>操作时间</th><th>操作描述</th><th>编辑</th></tr>";
while($dary_row = mysql_fetch_assoc($dary_res))
{
	echo "<form action=".$config_basedir."/coder/dary.php?id=".$dary_row['id']." method='post'>";
	echo "<tr>";
	// echo "<td>".$dary_row['user_id']."</td>";
	echo "<td>".$name."</td>";
	echo "<td>".$dary_row['date']."</td>";
	echo "<td>".$dary_row['descp']."</td>";
	echo "<td><input type='submit' name='del_dary' value='删除'></td>";
	echo "</tr>";
	echo "</form>";
}
echo "</table>";
?>