<?php
session_start();
$_SESSION["strName"] = "Mr.Weerachai Nukitram";
$_SESSION["strSiteName"] = "ThaiCreate.Com";
session_write_close();
?>
<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
Session Created.<br><br>
<a href="PageSession2.php">Check Session</a>
</body>
</html>
