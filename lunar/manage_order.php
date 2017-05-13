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
			<li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">รายงาน
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="incomeday1.php">รายรับรายวัน</a></li>
          <li><a href="incomemonth.php">รายรับรายเดือน</a></li>
          <li><a href="incomeyear.php">รายรับรายปี</a></li>
					  <li><a href="vatt.php">รายรับรายปี(รวมภาษี)</a></li>
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
<body>

<?
 //คั่นกลางตรงนี้เริ่มใน่ส่วนโชว์ข้อมูล
 ?>
<br>
<center>
 <table width="720" border="1">
 <tr>

 <th width="150"> <div align="center">รหัสออร์เดอร์</div></th>
 <th width="300"> <div align="center">ชื่อลูกค้า</div></th>
  <th width="150"> <div align="center">ราคารวม</div></th>
 <th width="120"> <div align="center">วันที่สั่งซื้อ</div></th>
  <th width="120"> <div align="center">สถานะ</div></th>

 </tr>
				 <?php
					 include ("testdb.php");
					 $strSQL0 = mysqli_query($mysqli,"select `order_ID`,total_cost,order_Date from `order` group by `order`.`order_ID`");
					 //$result0 = mysqli_fetch_array($strSQL0);



	while($objResult0 = mysqli_fetch_array($strSQL0)){
				 ?>
				 <tr>
				<td border="0"><center><a href="manage2_order.php?order_ID=<?php echo $objResult0["order_ID"];?>"><?php echo $objResult0["order_ID"];?></a></center></td>
				<?php $strSQL = mysqli_query($mysqli,"select * from customer,`order`,data_status
																				 where `order`.customer_ID=customer.customer_ID and
																				 `order`.order_ID = data_status.order_ID
																				 AND `order`.order_ID='".$objResult0["order_ID"]."'");
																$objResult= mysqli_fetch_array($strSQL)			?>
				 <td><center><?php echo $objResult["customer_Name"];?></center></td>


				 <td><center><?php echo number_format($objResult0["total_cost"],2);?></center></td>
				 <td><center><?php echo $objResult0["order_Date"];?></center></td>
				 <?php
					 	$SQL=mysqli_query($mysqli,"select * from status where status_ID ='".$objResult["status_ID"]."'");
						while($objResult1 = mysqli_fetch_array($SQL)){
					 ?>
					<td><center><?php echo $objResult1["status_status"];?></center></td>
					<?php } ?>
		</tr>
		<?php
		}
		?>

</form>

</body>
</html>
<?php }?>
