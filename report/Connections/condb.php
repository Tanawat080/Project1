<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_condb = "localhost";
$database_condb = "stl";
$username_condb = "root";
$password_condb = "";
$condb = mysql_pconnect($hostname_condb, $username_condb, $password_condb) or trigger_error(mysql_error(),E_USER_ERROR); 
?>