<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<!DOCTYPE html>
<html lang="en">
<script language ="JavaScript">
function confirmDelete(){
	return confirm('คุณแน่ใจหรือไม่ที่ต้องการลบ ?');
}
</script>
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

body{
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
			<li><a href="#">รายงาน</a></li>
		</ul>
		<form class="navbar-form navbar-left" method="post" action="search_product_owner1.php">
		<div class="form-group">
			<input type="text" name="search"class="form-control" placeholder="ค้นหา เช่น (ตู้จดหมาย,ประตูด้านนอก)">
		</div>
		<button type="submit" class="btn btn-default">ค้นหา</button>

	</form>
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
<?
 //คั่นกลางตรงนี้เริ่มใน่ส่วนโชว์ข้อมูล
 ?>
 <?php

 include 'testdb.php';
 $strSQL = mysqli_query($mysqli,"SELECT * FROM product,type where product.type_ID=type.type_ID and product_Name like '%".$_POST["search"]."%'");
?>



<br>
<center>
 <table width="1000" border="1">
 <tr>

 <th width="150"> <div align="center">ชื่อสินค้า</div></th>
  <th width="450"> <div align="center">รูปภาพ</div></th>
 <th width="150"> <div align="center">คำอธิบายสินค้า</div></th>
 <th width="100"> <div align="center">ประเภท</div></th>
 <th width="100"> <div align="center">ราคาต่อหน่วย</div></th>
 <th width="100" border="0"> <div align="center"></div></th>
 <th width="100" border="0"> <div align="center"></div></th>

 </tr>
 <?php

 	while($objResult = mysqli_fetch_array($strSQL))
 	{
 ?>

 <tr>

 <td><div align="center"><?php echo $objResult["product_Name"];?></div></td>
 <td><center><img src="pic/<?php echo $objResult["product_IMG"];?>" width="160"height="130"></center></td>


 <td><center><?php echo $objResult["Description"];?></center></td>
 <td><center><?php echo $objResult["type_Name"];?></center></td>
 <td><center><?php echo $objResult["Price"];?></center></td>

	<div class="label">
 <td border="0"><center><a href="edit.php?product_IMG=<?php echo $objResult["product_IMG"];?>">เเก้ไขข้อมูล</a></center></td>
 <td border="0"><center><a href="delete.php?product_ID=<?php echo $objResult["product_ID"];?>" onClick="return confirmDelete();">ลบ</a></center></td>




 </tr>
 <?php
 	}

 ?>
 </table>
</center>



</body>
</html>
<?php }?>
