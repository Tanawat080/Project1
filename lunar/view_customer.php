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
.tab{
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
<body>
	<?php
	include ("testdb.php");
	$strSQL = mysqli_query($mysqli,"SELECT * FROM customer ");
	?>
	<center>
		<div class="tab">
	 <table width="1000" border="1">
	 <tr>

	 <th width="150"> <div align="center">รหัสลูกค้า</div></th>
	  <th width="450"> <div align="center">ชื่อ-สกุล</div></th>
	 <th width="150"> <div align="center">ที่อยู่</div></th>
	 <th width="100"> <div align="center">เบอร์โทรศัพท์</div></th>
	 <th width="100"> <div align="center">รหัสบัตรประชาชน</div></th>
	 <th width="100"> <div align="center"></div></th>

 </tr>
 <?php

 	while($objResult = mysqli_fetch_array($strSQL))
 	{
 ?>

 <tr>
 <td><div align="center"><?php echo $objResult["customer_ID"];?></div></td>
<td><center><?php echo $objResult["customer_Name"];?></center></td>
 <td><center><?php echo $objResult["address"];?></center></td>
 <td><center><?php echo $objResult["phone_No"];?></center></td>
 <td><center><?php echo $objResult["identification_No"];?></center></td>
 <td border="0"><center><a href="edit_customer.php?customer_ID=<?php echo $objResult["customer_ID"];?>">เเก้ไขข้อมูล</a></center></td>
 </tr>
 <?php
 	}
 ?>
 </table>
 </div>
</center>



</body>
</html>
<?php }?>
