<html>
<head>

</head><meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<body>
<?php
include 'testdb.php';
		$SD = $_POST["setup_Date"];

		$status = $_POST["status"];



					$strSQL = "UPDATE `data_status` SET `setup_Date`='$SD',`status_ID`='$status' WHERE order_ID='".$_GET["order_ID"]."'";
					$objQuery = mysqli_query($mysqli,$strSQL);


					echo "$strSQL";

					if($objQuery) {
							echo "Record update successfully";
						  Header("Location: manage_order.php");
						}

d

?>
<!--<a href="testdb3.php">View files</a>-->
</body>
</html>
