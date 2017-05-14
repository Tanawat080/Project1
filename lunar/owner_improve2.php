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
}.container textarea{
	font-family: "TH SarabunPSK";
font-size: 20px;
}.container button {
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

			<strong><a href="logout.php">Log out</a></strong>
		</td>
	</tr>
</table>
</div>
<?
 //คั่นกลางตรงนี้เริ่มใน่ส่วนโชว์ข้อมูล
 ?>
<br>
<form  class="form-inline" name="form1" method="post" action="owner_improve3.php?improve_ID=<?php echo $_GET["improve_ID"];?>" enctype="multipart/form-data">

				 <?php
					 include ("testdb.php");
					 $strSQL = mysqli_query($mysqli,"select * from improve,type,status_improve,customer,scale
					 																 where improve.type_ID = type.type_ID and improve.customer_ID=customer.customer_ID
																					 and improve.status_ip_ID = status_improve.status_ip_ID and
																					 scale.scale_id=improve.scale_id and
																					 improve_ID ='".$_GET["improve_ID"]."'");

				   $objResult = mysqli_fetch_array($strSQL);



				 ?>

				 <div class="container">
		       <center>
		           <h1> ตรวจสอบราคาสินค้า</h1><br>
		           <label for="ex3">ชื่อ-สกุล : </label>
		           <input class="form-control" id="customer_Name" name="customer_Name" type="text" value="<?=$objResult["customer_Name"];?>" disabled>
		           <br><br>
							 <label for="ex3">ประเภท : </label>
		           <input class="form-control" id="product_Name" name="type_Name" type="text" value="<?=$objResult["type_Name"];?>" disabled>
		           <br><br>
							 <label for="ex3">ราคา : </label>
								<input class="form-control" id="locate_Date" name="price" type="text" value="" >
								<br><br>
								<label for="ex3">กว้าง : </label>
								<input class="form-control" id="locate_Date" name="width" type="text" value="<?=$objResult["width"];?>" disabled>
								<label for="ex3">ยาว : </label>
								<input class="form-control" id="locate_Date" name="height" type="text" value="<?=$objResult["height"];?>" disabled>
								<br><br>
								<iframe src="self/<?php echo $objResult["improve_IMG"];?>" type=frame&vlink=xx&link=xx&css=xxx&bg=xx&bgcolor=xx marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scorlling=yes width=500 height=600></iframe>

								<br><br>
							 <label for="ex3">รายละเอียดเพิ่มเติม : </label>
		           <textarea class="form-control" id="order_Date" name="description" type="text" style="width:300px" disabled><?php echo $objResult["improve_Description"];?></textarea>
		         <br><br>

							 <label for="ex3">สถานะ : </label>
							 <select name="status">
								 <option value="">โปรดเลือกสถานะออเดอร์</option>
						<?php
							include ("testdb.php");
							$strSQL1 = mysqli_query($mysqli,"SELECT * FROM status_improve");
									while($objResult1 = mysqli_fetch_array($strSQL1)){
						?>
					<option value="<?php echo $objResult1["status_ip_ID"];?>"><?php echo $objResult1["status_ip"];?></option>
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
