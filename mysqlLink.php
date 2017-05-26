<?php
$hostname_add = "資料庫位置";
$database_add = "資料庫名稱";
$username_add = "資料庫帳號";
$password_add = "資料庫密碼";
$add = mysql_pconnect($hostname_add, $username_add, $password_add) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES 'utf8'");
?>