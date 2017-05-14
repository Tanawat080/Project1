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
}h1,h2,h3,h4,h5{
	font-family: "TH SarabunPSK";

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
<?
 //คั่นกลางตรงนี้เริ่มใน่ส่วนโชว์ข้อมูล
 ?>
<body>
		<form   name="form1" method="post" action="manage_order3.php?order_ID=<?php echo $_GET["order_ID"];?>" enctype="multipart/form-data">
<center>
 <table width="720" border="2">
 <tr>

 <th width="150"> <div align="center">รหัสสินค้า</div></th>
 <th width="300"> <div align="center">ชื่อสินค้า</div></th>
  <th width="150"> <div align="center">จำนวน</div></th>


 </tr>
				 <?php
					 include ("testdb.php");
					 $strSQL = mysqli_query($mysqli,"select product_ID from order_deatail where `order_ID`='".$_GET["order_ID"]."' group by product_ID
																						");
	while($objResult = mysqli_fetch_array($strSQL)){
				$SQL1=mysqli_query($mysqli,"select * from product where product_ID='".$objResult["product_ID"]."'");
				 ?>
				 <tr>
				<td border="0"><center><?php echo $objResult["product_ID"];?></center></td>
				<?php while($objResult1 = mysqli_fetch_array($SQL1)){?>
				 <td><center><?php echo $objResult1["product_Name"];?></center></td>
				 <?php }?>
				 <?php
				 	$SQL2=mysqli_query($mysqli,"SELECT product_ID,COUNT(product_ID) as amountPd from order_deatail where product_ID='".$objResult["product_ID"]."' and order_ID='".$_GET["order_ID"]."' group by product_ID");
				 while($objResult2 = mysqli_fetch_array($SQL2)){?>
				 <td><center><?php echo $objResult2["amountPd"]; ?></center></td>
				 <?php } ?>
		</tr>

		<?php
		}
		?>
	</table>
<?php
$SQL3 = mysqli_query($mysqli,"select SUM(deposit_cost) as sumdeposit from deposit
																																	where order_ID='".$_GET["order_ID"]."'");
$objResult3 = mysqli_fetch_array($SQL3);

$SQL4 = mysqli_query($mysqli,"select *  from `order` where order_ID='".$_GET["order_ID"]."'");
$objResult4 = mysqli_fetch_array($SQL4);

$total= $objResult4["total_cost"]-$objResult3["sumdeposit"];

$SQL6 = mysqli_query($mysqli,"select *  from data_status,status where data_status.status_ID=status.status_ID AND order_ID='".$_GET["order_ID"]."'");
$objResult6 = mysqli_fetch_array($SQL6);
?>
<div class="container">
	<h2>รหัสการที่ซื้อที่ : <?php echo $_GET["order_ID"];?></h2>
	<div class="form-inline">
<label for="ex3">ราคารวม : </label>
<input class="form-control"  name="totalcost" type="text" value="<?=number_format($objResult4["total_cost"],2);?>" disabled>
</div>
<br>
<div class="form-inline">
<label for="ex3">จ่ายแล้ว : </label>
<input class="form-control"  name="deposit_cost" type="text" value="<?=number_format($objResult3["sumdeposit"],2);?>" disabled>
<label for="ex3">คงเหลือ : </label>
<input class="form-control"  name="total" type="text" value="<?=number_format($total,2);?>" disabled><br><br>
</div>
<div class="form-inline">
<label for="ex3">สถานะ : </label>
<select class="form-control" name="status">
	<option value="<?php echo $objResult6['status_ID'];?>"><?php echo $objResult6['status_status'] ?></option>
<?php
include ("testdb.php");
$strSQL1 = mysqli_query($mysqli,"SELECT * FROM status");
	 while($objResult1 = mysqli_fetch_array($strSQL1)){
?>
<option value="<?php echo $objResult1["status_ID"];?>"><?php echo $objResult1["status_status"];?></option>
<?php } ?>
</select>
</div>

<?php
	$SQL5 = mysqli_query($mysqli,"select *  from data_status where order_ID='".$_GET["order_ID"]."'");
	$objResult5 = mysqli_fetch_array($SQL5);
	?>
	<br>
	<div class="form-inline">
	<label for="ex3">วันที่ลงพื้นที่สำรวจ : </label>
	<input class="form-control"  name="locate_Date" type="text" value="<?=$objResult5["locate_Date"];?>">
	<label for="ex3">วันที่ติดตั้ง : </label>
	<input class="form-control"  name="setup_Date" type="text" placeholder="ปปปป-ดด-วว"value="<?=$objResult5["setup_Date"];?>" ><br>
	</div>

<br>
<button type="submit"class="btn btn-default">ตกลง</button></center>
</div><br>
</body>

</html>
<?php }?>
