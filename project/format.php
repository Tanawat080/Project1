
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="home2.css">
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
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="adminpage.php">บ้านสุรพล สแตนเลส</a>
		</div>
		<ul class="nav navbar-nav">
			<li ><a href="adminpage.php">หน้าหลัก</a></li>
			<li ><a href="manageproduct.php">จัดการข้อมูล</a></li>
			<li><a href="contact1.php">จัดการข้อมูลร้าน</a></li>
			<li><a href="#">รายงาน</a></li>
			<li><a href="#">จัดการสถานะลูกค้า</a></li>
		</ul>
		</div>
</nav>


<?
 //คั่นกลางตรงนี้เริ่มใน่ส่วนโชว์ข้อมูล
 ?>

 <div class="form-group">
	<br>  &nbsp;&nbsp;&nbsp; <label for="idPD">เลือกประเภทสินค้า : </label>

				 <?php
					 include ("testdb.php");
					 $strSQL = mysqli_query($mysqli,"SELECT * FROM type");
							 while($objResult = mysqli_fetch_array($strSQL)){

				 ?>
				 <center>
					<form name="<?php echo $objResult["type_ID"];?>" method="post" action="type1.php">
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
