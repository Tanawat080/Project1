<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
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
			<li ><a href="manageproduct.php">จัดการข้อมูลสินค้า</a></li>
			<li><a href="contact1.php">จัดการข้อมูลร้าน</a></li>

			<li><a href="#">จัดการสถานะการสั่งซื้อ</a></li>
			<li><a href="view_customer.php">ข้อมูลลูกค้า</a></li>
			<li><a href="#">รายงาน</a></li>
		</ul>
		</div>
</nav>


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
<?
 //คั่นกลางตรงนี้เริ่มใน่ส่วนโชว์ข้อมูล
 ?>
 <?php

 include ("testdb.php");
 $strSQL = mysqli_query($mysqli,"SELECT * FROM product,type where product.type_ID=type.type_ID and product.type_ID='".$_POST["type_ID"]."' ");

 ?>

<br>
<center>
 <table width="340" border="1">
 <tr>
 <th width="50"> <div align="center">รหัสสินค้า</div></th>
 <th width="150"> <div align="center">ชื่อสินค้า</div></th>
 <th width="150"> <div align="center">รูปภาพ</div></th>
 <th width="150"> <div align="center">คำอธิบาย</div></th>
 <th width="150"> <div align="center">ประเภท</div></th>
 </tr>
 <?php

 	while($objResult = mysqli_fetch_array($strSQL))
 	{
 ?>

 <tr>
 <td><div align="center"><?php echo $objResult["product_ID"];?></div></td>
 <td><center><img src="pic/<?php echo $objResult["product_IMG"];?>"></center></td>
 <td><center><a href="edit.php?product_IMG=<?php echo $objResult["product_IMG"];?>">Edit</a></center></td>
 <td><center><?php echo $objResult["Description"];?></center></td>
 <td><center><?php echo $objResult["type_Name"];?></center></td>

 </tr>
 <?php
 	}
 ?>
 </table>
</center>








</body>
</html>
<?php }?>
