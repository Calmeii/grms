<?php
require("header.php");
?>
<?php
$sql = "select * from users;";
$res = mysql_query($sql);
echo "<table>";
echo "<tr><th>用户名</th><th>性别</th><th>电话</th><th>邮箱</th><th>删除</th></tr>";
while ($row = mysql_fetch_assoc($res))
{
	echo "<tr>";
	echo "<td>".$row['username']."</td><td>".$row['sex']."</td>";
	echo "<td>".$row['tel']."</td><td>".$row['email']."</td>";
	echo "<td><input type='submit' name='delete' value='删除'></td>";
	echo "</tr>";
}
echo "<tr><td><input type='submit' name='add' value='增加'><td></td><td></td>
<td></td><td></td></td></tr>";
echo "</table>";
?>
<?php
require("footer.php");
?>