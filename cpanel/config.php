<?php
$db="bani";
mysql_connect("localhost","root","");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysql_select_db($db);
?>