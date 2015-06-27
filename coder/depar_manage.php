<?php
	require("header.php");
?>

<?php

function getList($pid=1, $result=array(), $spac=0)
{
	$spac += 2;
	$sql = "select * from branchs where lst_id = ".$pid.";";
	$res = mysql_query($sql);
	while ($row = mysql_fetch_assoc($res))
	{
		$row['name'] = str_repeat("&nbsp;", $spac).">".$row['name'];
		$result[] = $row;
		getList($row['id'], $result, $spac);
	}
	return $result;
}
function displayCate()
{
	$rs = getList();
	$str = "";
	foreach ($rs as $key => $value) {
		 $str .= $value['name']."<br />";
	}
	return $str;
}
echo displayCate();
?>

<?php
	require("footer.php");
?>











