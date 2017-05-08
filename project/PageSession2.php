<?php
session_start();
?>
<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
Session Check.<br>
session_id(); = <?php echo session_id();?><br>
$strName = <?php echo $_SESSION["strName"];?><br>
$strSiteName = <?php echo $_SESSION["strSiteName"];?><br>
<br>
<a href="PageSession3.php">Delete Session</a>
</body>
</html>
