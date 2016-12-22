<?php

$hostname_dbprotect = "localhost";
$username_dbprotect = "root";      
$password_dbprotect = "";        
$database_dbprotect = "BANI";     
$tablename_dbprotect= "admin";    
$dbprotect = mysql_connect($hostname_dbprotect, $username_dbprotect, $password_dbprotect) or trigger_error(mysql_err(),E_USER_ERROR); 

session_unset();
 mysql_close();
 header("Location: /BANI/cpanel/admin/login.php");
?>