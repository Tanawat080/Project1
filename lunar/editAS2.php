<html>
<head>
<title>STL Creatives</title>
</head>
<body>
<?php

		//*** Update Record ***//
		include ("testdb.php");

		$strSQL = "UPDATE `accessory` SET `accessory_Name`='".$_POST["accessoryName"]."' WHERE `accessory_ID` = '".$_GET["accessory_ID"]."'; ";
		$objQuery = mysqli_query($mysqli,$strSQL);

	if($_FILES["fileUpload"]["name"] != "")
	{
		if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"accessory/".$_FILES["fileUpload"]["name"]))
		{

			//*** Delete Old File ***//
			@unlink("accessory/".$_POST["hdnOldFile"]);

			//*** Update New File ***//

			$strSQL ="UPDATE `accessory` SET accessory_IMG = '".$_FILES["fileUpload"]["name"]."' WHERE `accessory_ID` = '".$_GET["accessory_ID"]."'; ";
			$objQuery = mysqli_query($mysqli,$strSQL);

			echo "Copy/Upload Complete<br>";
			echo $strSQL;
			Header ("Location: manageproduct.php");
		}
		Header ("Location: manageproduct.php");
	}
 Header("Location: manageproduct.php");
?>

</body>
</html>
