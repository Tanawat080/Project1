<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>บ้านสุรพล สแตนเลส</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
			<li ><a href="manageproduct.php">จัดการข้อมูลสินค้า</a></li>
			<li><a href="contact1.php">จัดการข้อมูลร้าน</a></li>

			<li><a href="#">จัดการสถานะการสั่งซื้อ</a></li>
			<li><a href="view_customer.php">ข้อมูลลูกค้า</a></li>
			<li><a href="#">รายงาน</a></li>
		</ul>
		</div>
</nav>


<table  width="20%" hight="10%" border="1">
	<tr  bgcolor="#FCCCCF">
		<td>
			<center> ชื่อผู้ใช้ :
			<?php echo($_SESSION['IdNo']);?>
			<?php //session_destroy();?>
			<strong><a href="logout.php">Log out</a></strong></center>
		</td>
	</tr>
</table>
<!-- logout ที่ล็อคเอาท์-->
<br><br>
<center><h3> แก้ไขข้อมูล </h3></center>

<div class="container">

		<form name="form1" method="post" action="edit2.php?product_IMG=<?php echo $_GET["product_IMG"];?>" enctype="multipart/form-data">
						<?php
						include ("testdb.php");
						$strSQL = mysqli_query($mysqli,"SELECT * FROM product WHERE product_IMG='".$_GET["product_IMG"]."'");
						$objResult = mysqli_fetch_array($strSQL);
						?>

		<div class="form-group">
			<label for="idPD">ชื่อสินค้า : </label>
			<font face = "MS Sans Serif"><input type="text" class="form-control" id="productName" name="productName" value="<?php echo $objResult["product_Name"];?>"></font>
		</div>
	<br><br>
		<div class="form-group">
			<label for="des">รายละเอียดสินค้า : </label>
			<font face = "MS Sans Serif"><textarea type="text" class="form-control" id="ProductDescription" name="ProductDescription" ><?php echo $objResult["Description"];?></textarea></font>
		</div>
		<br><br>
			<div class="form-group">
				<label for="des">รูปสินค้า : </label>
				<img src="pic/<?php echo $objResult["product_IMG"];?>"><br><br>
				<input type="hidden" name="hdnOldFile" value="<?php echo $objResult["product_IMG"];?>">
				<font face = "MS Sans Serif"><input type="file" class="form-control" id="fileUpload" name="fileUpload" ></font><br><br>
				<button class="button button3">ตกลง</button></center>
			</div>







</form>
</body>
</div>
</html>
<?php }?>
