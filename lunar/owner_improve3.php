<html>
<head>

</head><meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<body>
<?php
include 'testdb.php';
		$price = $_POST["price"];

		$status = $_POST["status"];



					$strSQL = "UPDATE improve SET improve_Price='".$price."',status_ip_ID='".$status."'  WHERE improve_ID='".$_GET["improve_ID"]."'";
					$objQuery = mysqli_query($mysqli,$strSQL);


					echo "$strSQL";

					if($objQuery) {
						echo "Record update successfully";
					 Header("Location: owner_improve.php");
					}



?>
<!--<a href="testdb3.php">View files</a>-->
</body>
</html>
