﻿<?phpsession_start();if (isset($_SESSION['USERNAME']) == FALSE || $_SESSION['USERNAME'] != 'admin') {	header("Location: ".$config_basedir);}require("../config.php");$db = mysql_connect($dbhost, $dbuser, $dbpassword);mysql_select_db($dbdatabase, $db);if (isset($_POST['del_right'])) {	$sql = "delete from rights where id='".$_GET['id']."'";	mysql_query($sql);	header("Location:".$_SERVER['PHP_SELF']);	$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'delete right');";	mysql_query($add_log);}else if (isset($_POST['add'])) {	$sql = "insert into rights(name) 	values('".$_POST['name']."');";	mysql_query($sql);	$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'add right');";	mysql_query($add_log);	header("Location:".$_SERVER['PHP_SELF']);}require("header.php");?><?php$char_right_sql = "select * from rights ";$char_right_res = mysql_query($char_right_sql);echo "<table  >";echo "<tr><th>权限</th><th>编辑</th></tr>";while($char_right_row = mysql_fetch_assoc($char_right_res)){	echo "<form action=".$config_basedir."/coder/right_manage.php?id=".$char_right_row['id']." method='post'>";	echo "<tr>";	echo "<td>".$char_right_row['name']."</td>";	echo "<td><input type='submit' name='del_right' value='删除'></td>";	echo "</tr>";	echo "</form>";}echo "<form action=".$config_basedir."/coder/right_manage.php method='post'>";echo '<tr>	<td><input type="text" name="name"> </td>	<td><input type="submit" name="add" value="增加"> </td></tr>';echo '</form>';echo "</table>";?>