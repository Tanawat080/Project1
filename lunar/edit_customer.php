<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>STL Creative</title>
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
h3{
	font-family: "TH SarabunPSK";
	font-size: 35px;
}
link{
	color: #000000;
}
</style><style>.button {
		background-color: #4CAF50; /* Green */
		border: none;
		color: white;
		padding: 5px 20px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 20px;
		margin: 4px 2px;
		cursor: pointer;
		font-family: "TH SarabunPSK";
}
.button1 {width: 250px;}
.button2 {width: 50%;}
.button3 {width: 25%;}
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
			<li><a href="manage_order.php">จัดการสถานะการสั่งซื้อ</a></li>
			<li><a href="view_customer.php">ข้อมูลลูกค้า</a></li>
			<li><a href="owner_improve.php">ประเมินราคาสินค้า</a></li>
			<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">รายงาน
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="incomeday1.php">รายรับรายวัน</a></li>
          <li><a href="incomemonth.php">รายรับรายเดือน</a></li>
          <li><a href="incomeyear.php">รายรับรายปี</a></li>
					</ul>
				</li>
				<form class="navbar-form navbar-left" method="post" action="search_product_owner1.php">
				<div class="form-group">
					<input type="text" name="search"class="form-control" placeholder="ค้นหา เช่น (ตู้จดหมาย,ประตูด้านนอก)">
				</div>
				<button type="submit" class="btn btn-default">ค้นหา</button>

			</form>
</ul>
</div>
</nav>


<div align="right">
<table  width="12%" hight="10%" border="1">
	<tr  bgcolor="#FCCCCF">
		<td>
			ชื่อผู้ใช้ :
			<?php echo($_SESSION['IdNo']);?>
			<?php //session_destroy();?>
			<strong><a href="logout.php">Log out</a></strong>
		</td>
	</tr>
</table>
</div>
<!-- logout ที่ล็อคเอาท์-->
<br><br>
<center><h3> แก้ไขข้อมูลลูกค้า </h3></center>

<div class="container">

		<form name="form1" method="post" action="edit_customer2.php?customer_ID=<?php echo $_GET["customer_ID"];?>" enctype="multipart/form-data">
						<?php
						include ("testdb.php");
						$strSQL = mysqli_query($mysqli,"SELECT * FROM customer WHERE customer_ID='".$_GET["customer_ID"]."'");
						$objResult = mysqli_fetch_array($strSQL);
						?>
<center>
		<div class="form-group">
			<label for="idPD">ชื่อ-สกุล : </label>
			<font face = "MS Sans Serif"><input type="text" style="width:450px"; class="form-control" id="customer_Name" name="customer_Name" value="<?php echo $objResult["customer_Name"];?>"></font>
		</div>

		<div class="form-group">
			<label for="des">ที่อยู่ : </label>
			<font face = "MS Sans Serif"><textarea type="text" style="width:450px"; class="form-control" id="address" name="address" ><?php echo $objResult["address"];?></textarea></font>
		</div>

		<div class="form-group">
			<label for="des">เบอร์โทรศัพท์ : </label>
			<font face = "MS Sans Serif"><input type="text" style="width:450px"; class="form-control" id="phone_No" name="phone_No" value="<?php echo $objResult["phone_No"];?>"></font>
		</div>

			<div class="form-group">
				<label for="des">รหัสบัตรประชาชน : </label>
				<font face = "MS Sans Serif"><input type="text" class="form-control" style="width:450px"; id="identification_No" name="identification_No" value="<?php echo $objResult["identification_No"];?>"></font>
				<br><button class="form-control" style="width:100px";>ตกลง</button></center>
			</div>







</form>
</body>
</div>
</html>
<?php }?>
