<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head><meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<body>
<?php

		include ("testdb.php");
		$strSQL2 = "INSERT INTO user (Username,Password,Userlevel) VALUES ('".$_POST["idenNo"]."','".$_POST["passwordcus"]."','M') ";
		$objQuery2 = mysqli_query($mysqli,$strSQL2);

		$strSQL3 =  mysqli_query($mysqli,"SELECT MAX(ID) as ID FROM user ");
		$objResult3 = mysqli_fetch_array($strSQL3);
		$ID=$objResult3["ID"];

		$strSQL = "INSERT INTO customer (customer_Name,ID,customer_password,address,phone_No,identification_No) VALUES ('".$_POST["name"]."',$ID,'".$_POST["passwordcus"]."','".$_POST["address"]."','".$_POST["tel"]."','".$_POST["idenNo"]."') ";
		$objQuery = mysqli_query($mysqli,$strSQL);


		header( "location: index1.php" );
		exit(0);

?>
<!--<a href="testdb3.php">View files</a>-->
</body>
</html>
