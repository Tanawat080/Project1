<html>
<head>

</head><meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<body>
<?php
		$name = $_POST["name"];
		$address = $_POST["address"];
		$tel = $_POST["tel"];
		$fax = $_POST["fax"];
		$email = $_POST["email"];
		$BH = $_POST["BH"];


		include 'testdb.php';

		$strSQL = "UPDATE `contact`SET `company_Name`='$name',`company_Address`='$address',`company_tel`='$tel',`company_Fax`='$fax',`company_Email`='$email',`business_Hour`='$BH'";

		$objQuery = mysqli_query($mysqli,$strSQL);
		echo "$strSQL";
		if($objQuery) {
				echo "Record update successfully";
			  Header("Location: contact1.php");
			}



?>
<!--<a href="testdb3.php">View files</a>-->
</body>
</html>
