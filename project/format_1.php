
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="home3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<style>
.header a{
		font-family: "TH SarabunPSK";
		font-size: 50px;
		color: #696969;
}
a{
	font-family: "TH SarabunPSK";
	font-size: 20px;
}
label{
	font-family: "TH SarabunPSK";
	font-size: 20px;
}
</style>



 <div class="form-group">
	<br>  &nbsp;&nbsp;&nbsp; <label for="idPD">เลือกประเภทสินค้า : </label>

				 <?php
         $mysqli = mysqli_connect("localhost", "root", "", "slt");
         $mysqli->set_charset("utf8");
					 $strSQL = mysqli_query($mysqli,"SELECT * FROM type");
							 while($objResult = mysqli_fetch_array($strSQL)){

				 ?>
				 <center>
					<form name="<?php echo $objResult["type_ID"];?>" method="post" action="door.php">
					 <input type= "hidden" name="type_ID" value="<?php echo $objResult["type_ID"];?>">
						<div class="figure">
							<!--<a href="type<?php echo $objResult["type_ID"];?>.php"> -->
								<img src="img/<?php echo $objResult["type_IMG"];?>" width="140"height="110" alt="Eiffel tower"><br>
								<br><input  type = "submit" name = "submit" value="<?php echo $objResult["type_Name"];?>" >
							</a>
						</div>

				 </center>
</form>
		<?php
		}

		?>

	 </div>










</body>
</html>
