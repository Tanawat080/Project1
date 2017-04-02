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
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
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
}div.transbox
  {
		color: #FFFFFF;
  }
link{
	color: #FFFFFF;
}            div.box
{

opacity:0.8;
}
</style>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <ul class="nav navbar-nav navbar-center">
      <li><a href="regis.php"><span class="glyphicon glyphicon-user"></span>สมัครสมาชิก</a></li>
      <li><a href="form_login.php"><span class="glyphicon glyphicon-log-in"></span>ลงชื่อเข้าใช้</a></li>
      <form class="navbar-form navbar-left" method="post" action="search_product.php">
      <div class="form-group">
        <input type="text" name="search"class="form-control" placeholder="ค้นหา เช่น (ตู้จดหมาย,ประตูด้านนอก)">
      </div>
      <button type="submit" class="btn btn-default">ค้นหา</button>

    </form>
    </ul>
    <?php
    include ("testdb.php");
    $strSQL = mysqli_query($mysqli,"SELECT * FROM customer WHERE identification_No='".$_SESSION['IdNo']."'");
    $objResult = mysqli_fetch_array($strSQL);


    ?>
    <div align="right" class="transbox">

          ชื่อผู้ใช้ :
          <?php echo($objResult['customer_Name']);?>
          <?php //session_destroy();?>
          <strong><a href="logout.php">Log out</a></strong>

  </div>
  </div>
</nav>


</body>





<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="" style="background-color:#CCCCFF;">
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <header id="header" class="clear">
    <div class="header">
      <a class="navbar-brand" href="index1.php">บ้านสุรพล สแตนเลส</a>
    </div>
    <!-- ################################################################################################ -->

    <div class="relative row2">

    <nav id="mainav" class="fl_right" color="red">
      <ul class="clear">
        <li class="active"><a href="index1.php">หน้าหลัก</a></li>
        <li><a href="HT_order.php">วิธีการสั่งซื้อ</a></li>
        <li><a href="HT_payment.php">วิธีการชำระเงิน</a></li>
        <li><a href="map.php">แผนที่ร้าน</a></li>
        <li><a href="contactcus.php">ติดต่อเรา</a></li>
      </ul>
    </nav>
    </div>
<div class="container">
	<body>

		<?php
		if(move_uploaded_file($_FILES["fileUpload"]["tmp_name"],"pic/".$_FILES["fileUpload"]["name"])) // ย้ายจากไฟล์อัพโหลดไปเก็บใน folder pic
{



				//*** Insert Record ***//
				include ("testdb.php");
				$strSQL1=mysqli_query($mysqli,"select * from customer,product,`order`,order_deatail,data_status,status
									where `order`.order_ID=order_deatail.order_ID AND
									`order`.order_ID=data_status.order_ID AND
									`order`.customer_ID=customer.customer_ID AND
									order_deatail.product_ID=product.product_ID AND
									status.status_ID=data_status.status_ID AND
									identification_No='".$_SESSION['IdNo']."'");
									$objResult1 = mysqli_fetch_array($strSQL1);
				$strSQL2 = "INSERT INTO deposit (`deposit_cost`, `deposit_IMG`, `deposit_date`, `deposit_time`, `order_ID`, `bank_ID`)
																				VALUES ('".$_POST["Price"]."','".$_FILES["fileUpload"]["name"]."','".$_POST["date"]."','".$_POST["time"]."','".$objResult1["order_ID"]."','".$_POST["bank"]."') ";

				$strSQL3=mysqli_query($mysqli,"select SUM(deposit_cost) as sumdeposit from customer,product,`order`,order_deatail,data_status,status,deposit
																														where `order`.order_ID=order_deatail.order_ID AND
																														`order`.order_ID=data_status.order_ID AND
																														`order`.customer_ID=customer.customer_ID AND
																														order_deatail.product_ID=product.product_ID AND
																														status.status_ID=data_status.status_ID AND
																														`order`.order_ID=deposit.order_ID AND
																														identification_No='".$_SESSION['IdNo']."'");

				$objQuery2 = mysqli_query($mysqli,$strSQL2);
				$objResult3 = mysqli_fetch_array($strSQL3);
        $equal = $objResult1["total_cost"]-$objResult3["sumdeposit"];

				?>

<?php }
Header("Location: deposit_detail.php");

 ?>
</body>
</div>
</html>
<?php }?>
