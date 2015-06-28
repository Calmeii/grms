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
	if (isset($_POST['delete'])) {
		$sql = "delete from branchs where id=".$_POST['id'].";";
		mysql_query($sql);
		$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'delete deparment');";
		mysql_query($add_log);
	}
	else if (isset($_POST['add'])) {
		$sql = "insert into branchs(lst_id, name) values(
				'".$_POST['id']."','".$_POST[depar_name]."');";
		mysql_query($sql);
		$add_log = "INSERT INTO logs(`id`, `user_id`, `date`, `descp`) VALUES (NULL, '1', NOW(), 'add deparment');";
		mysql_query($add_log);
	}
}
judge_admin();
init_mysql();
judge_submit();
require("header.php");
?>

<?php

function getList($pid=1, &$result=array(), $spac=0)
{
	$sql = "select * from branchs where lst_id != id and lst_id = ".$pid.";";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_assoc($res))
	{
		$row['name'] = str_repeat("&nbsp;", $spac).$row['name']."->";
		$result[] = $row;
		getList($row['id'], $result, $spac+10);
	}
	return $result;
}
function displayCate()
{
	$rs = getList();
	$str = "<form action='depar_manage.php' method='post'>
		 <input type='text' name='depar_name' value=''>
		 <input type='hidden' name='id' value='1'>
		 &nbsp;&nbsp;<input type='submit' name='add' value='增加根节点'>
		 </form>";
	foreach ($rs as $key => $value) {
		 $str .= "<form action='depar_manage.php' method='post'>".$value['name']."
		 <input type='text' name='depar_name' value=''>
		 <input type='hidden' name='id' value='".$value['id']."'>
		 &nbsp;&nbsp;<input type='submit' name='add' value='增加'>
		 &nbsp;&nbsp;<input type='submit' name='delete' value='删除'>
		 &nbsp;&nbsp;<a href='depar_info.php?id=".$value['id']."'>查看部门信息</a><br />
		 </form>";
	}
	return $str;
}
echo displayCate();
?>

<?php
	require("footer.php");
?>











