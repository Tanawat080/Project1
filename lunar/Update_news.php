<?php
include ("testdb.php");

$strSQL = "UPDATE `Promotion_news` SET `news`='".$_POST["News"]."';";
$objQuery = mysqli_query($mysqli,$strSQL);
  Header ("Location: adminpage.php");



?>
