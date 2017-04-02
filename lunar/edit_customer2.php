<html>
<head>
<title>STL Creatives</title>
</head>
<body>
<?php

		//*** Update Record ***//
		include ("testdb.php");

		$strSQL = "UPDATE `customer` SET `customer_Name`='".$_POST["customer_Name"]."',`address`='".$_POST["address"]."',`phone_No`='".$_POST["phone_No"]."',`address`='".$_POST["address"]."',`identification_No`='".$_POST["identification_No"]."' WHERE `customer_ID` = '".$_GET["customer_ID"]."'; ";
		$objQuery = mysqli_query($mysqli,$strSQL);
    Header("Location: view_customer.php");
?>

</body>
</html>
