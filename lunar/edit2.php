<html>
<head>
<title>STL Creatives</title>
</head>
<body>
<?php

		//*** Update Record ***//
		include ("testdb.php");

		$strSQL = "UPDATE `product` SET `product_Name`='".$_POST["productName"]."',`Description`='".$_POST["ProductDescription"]."',`Price`='".$_POST["ProductPrice"]."' WHERE `product_ID` = '".$_GET["product_ID"]."'; ";
		$objQuery = mysqli_query($mysqli,$strSQL);

	if($_FILES["fileUpload"]["name"] != "")
	{
		if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"pic/".$_FILES["fileUpload"]["name"]))
		{

			//*** Delete Old File ***//
			@unlink("pic/".$_POST["hdnOldFile"]);

			//*** Update New File ***//

			$strSQL ="UPDATE `product` SET product_IMG = '".$_FILES["fileUpload"]["name"]."' WHERE `product_ID` = '".$_GET["product_ID"]."'; ";
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
