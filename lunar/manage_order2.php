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
div.d{
	font-family: "TH SarabunPSK";
	font-size: 20px;
}
h1{
	font-family: "TH SarabunPSK";

}
.container input{
	font-family: "TH SarabunPSK";
font-size: 20px;
}
.container {
	font-family: "TH SarabunPSK";
font-size: 20px;
}
</style>


<style>.button {
		background-color: #4CAF50; /* Green */
		border: none;
		color: white;
		padding: 5px 20px;
		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		margin: 4px 2px;
		cursor: pointer;
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
<?
 //คั่นกลางตรงนี้เริ่มใน่ส่วนโชว์ข้อมูล
 ?>
<br>
<form  class="form-inline" name="form1" method="post" action="manage_order3.php?order_ID=<?php echo $_GET["order_ID"];?>" enctype="multipart/form-data">

				 <?php
					 include ("testdb.php");
					 $strSQL = mysqli_query($mysqli,"select * from customer,product,`order`,order_deatail,data_status,status,deposit
																						where `order`.order_ID=order_deatail.order_ID AND
																						`order`.order_ID=data_status.order_ID AND
																						`order`.customer_ID=customer.customer_ID AND
																						order_deatail.product_ID=product.product_ID AND
																						status.status_ID=data_status.status_ID AND
																						`order`.order_ID='".$_GET["order_ID"]."'");
					$strSQL1 = mysqli_query($mysqli,"select SUM(deposit_cost) as sumdeposit from deposit
															 																							where order_ID='".$_GET["order_ID"]."'");
				   $objResult = mysqli_fetch_array($strSQL);
$objResult1 = mysqli_fetch_array($strSQL1);
					 $equal = $objResult["total_cost"]-$objResult1["sumdeposit"];

				 ?>

				 <div class="container">
		       <center>
		           <h1> จัดการออร์เดอร์</h1><br>
		           <label for="ex3">ชื่อ-สกุล : </label>
		           <input class="form-control" id="customer_Name" name="customer_Name" type="text" value="<?=$objResult["customer_Name"];?>" disabled>
		           <br><br>
							 <label for="ex3">สินค้า : </label>
		           <input class="form-control" id="product_Name" name="product_Name" type="text" value="<?=$objResult["product_Name"];?>" disabled>
		           <br><br>
							 <label for="ex3">ราคารวม : </label>
								<input class="form-control" id="locate_Date" name="totalcost" type="text" value="<?=$objResult["total_cost"];?>" disabled>
								<br><br>
								<label for="ex3">จ่ายแล้ว : </label>
								<input class="form-control" id="locate_Date" name="deposit_cost" type="text" value="<?=$objResult1["sumdeposit"];?>" disabled>
								<label for="ex3">คงเหลือ : </label>
								<input class="form-control" id="locate_Date" name="locate_Date" type="text" value="<?=$equal;?>" disabled>
								<br><br>
							 <label for="ex3">วันที่สั่งซื้อ : </label>
		           <input class="form-control" id="order_Date" name="order_Date" type="text" value="<?=$objResult["order_Date"];?>" disabled>
		         <br><br>
						  <label for="ex3">วันที่ลงพื้นที่สำรวจ : </label>
		           <input class="form-control" id="locate_Date" name="locate_Date" type="text" value="<?=$objResult["locate_Date"];?>" disabled>
		           <br><br>
							 <label for="ex3">วันที่ติดตั้ง : ปปปป-ดด-วว </label>
		           <input class="form-control" id="setup_Date" name="setup_Date" type="text" value="<?=$objResult["setup_Date"];?>">

		           <br><br>
							 <label for="ex3">สถานะ : </label>
							 <select name="status">
								 <option value="">โปรดเลือกสถานะออเดอร์</option>
						<?php
							include ("testdb.php");
							$strSQL1 = mysqli_query($mysqli,"SELECT * FROM status");
									while($objResult1 = mysqli_fetch_array($strSQL1)){
						?>
					<option value="<?php echo $objResult1["status_ID"];?>"><?php echo $objResult1["status_status"];?></option>
			 <?php
			 }
			 ?>
			 </select>

							 <br><br>
		 <button class="button button3">ตกลง</button></center>
		 </div>
</form>

</body>
</html>
<?php }?>
