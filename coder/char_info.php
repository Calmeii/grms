<?php
if (isset($_SESSION['USERNAME']) == FALSE || $_SESSION['USERNAME'] != 'admin') {
	header("Location: ".$config_basedir);
}
//session_start();
require("../config.php");
$db = mysql_connect($dbhost, $dbuser, $dbpassword);
mysql_select_db($dbdatabase, $db);

if(isset($_POST['edit'])){
	$sql = "update roles ser name='".$_POST['name']."',
	where id=".$_GET['id'].";"; 
}
else if (isset($_POST['delete'])) {
	$sql = "delete from roles where id='".$_GET['id']."'";
	mysql_query($sql);
	header("Location:".$_SERVER['PHP_SELF']);
}
require("header.php");
?>
<?php
$char_sql = "select username from users where id in (select user_id from role_user where role_id = ".$_GET['id']."); ";
$char_res = mysql_query($char_sql);
//$char_row = mysql_fetch_assoc($char_res);
while($char_row = mysql_fetch_assoc($char_res))
{
	echo "<form action=".$config_basedir."/coder/char_manage.php?id=".$row['id']." method='post'>";
	echo "<tr>";
	echo "<td><a href='char_info.php?id=".$row['id']."'>".$row['name']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['id']."</td>";
	echo "<td><input type='submit' name='delete' value='删除'></td>";
	echo "</tr>";
	echo '</form>';
}
echo "<form action=".$config_basedir."/coder/char_manage.php method='post'>";
echo '<tr>
	<td><input type="text" name="name"> </td>
	<td><input type="text" name="id"></td>
	<td> </td>
	<td><input type="submit" name="add" value="增加"> </td>
</tr>';
echo '</form>';
echo "</table>";
?>
?>