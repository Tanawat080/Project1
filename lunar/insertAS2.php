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
<center><h3> เพิ่มข้อมูล </h3></center>

<div class="container">
	<body>

		<?php
		if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"accessory/".$_FILES["fileUpload"]["name"])) // ย้ายจากไฟล์อัพโหลดไปเก็บใน folder pic
{



				//*** Insert Record ***//
				include ("testdb.php");
				$strSQL2 = "INSERT INTO `accessory`( `accessory_Name`, `accessory_IMG`) VALUES ('".$_POST['accessory_Name']."','".$_FILES["fileUpload"]["name"]."') ";

				$objQuery2 = mysqli_query($mysqli,$strSQL2);
				echo $strSQL2;
				Header ("Location: manageproduct.php");
			}
		?>






</body>
</div>
</html>
<?php }?>
