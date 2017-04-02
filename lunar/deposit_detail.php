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
a{
	font-family: "TH SarabunPSK";
	font-size: 20px;
}
label{
	font-family: "TH SarabunPSK";
	font-size: 20px;
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

				$strSQL3=mysqli_query($mysqli,"select SUM(deposit_cost) as sumdeposit from customer,product,`order`,order_deatail,data_status,status,deposit
																														where `order`.order_ID=order_deatail.order_ID AND
																														`order`.order_ID=data_status.order_ID AND
																														`order`.customer_ID=customer.customer_ID AND
																														order_deatail.product_ID=product.product_ID AND
																														status.status_ID=data_status.status_ID AND
																														`order`.order_ID=deposit.order_ID AND
																														identification_No='".$_SESSION['IdNo']."'");


				$objResult3 = mysqli_fetch_array($strSQL3);
        $equal = $objResult1["total_cost"]-$objResult3["sumdeposit"];

				?>
				<div class="container">
					<center>

							<label for="ex3">ชื่อ-สกุล : </label>
							<input class="form-control" id="customer_Name" name="customer_Name" type="text" value="<?=$objResult1["customer_Name"];?>" disabled>

							<label for="ex3">สินค้า : </label>
							<input class="form-control" id="product_Name" name="product_Name" type="text" value="<?=$objResult1["product_Name"];?>" disabled>

							<label for="ex3">ราคารวม : </label>
							 <input class="form-control" id="locate_Date" name="totalcost" type="text" value="<?=$objResult1["total_cost"];?>" disabled>

							 <label for="ex3">จ่ายแล้ว : </label>
							 <input class="form-control" id="locate_Date" name="deposit_cost" type="text" value="<?=$objResult3["sumdeposit"];?>" disabled>
							 <label for="ex3">คงเหลือ : </label>
							 <input class="form-control" id="locate_Date" name="locate_Date" type="text" value="<?=$equal;?>" disabled>

							<label for="ex3">วันที่สั่งซื้อ : </label>
							<input class="form-control" id="order_Date" name="order_Date" type="text" value="<?=$objResult1["order_Date"];?>" disabled>

						 <label for="ex3">วันที่ลงพื้นที่สำรวจ : </label>
							<input class="form-control" id="locate_Date" name="locate_Date" type="text" value="<?=$objResult1["locate_Date"];?>" disabled>

							<label for="ex3">วันที่ติดตั้ง : ปปปป-ดด-วว </label>
							<input class="form-control" id="setup_Date" name="setup_Date" type="text" value="<?=$objResult1["setup_Date"];?>" disabled>

							<label for="ex3">สถานะ : </label>
							<input class="form-control" id="setup_Date" name="status" type="text" value="<?=$objResult1["status_status"];?>" disabled>


		</div>


</div>
</body>
          <div class="wrapper row4">
            <footer id="footer" class="clear">
              <!-- ################################################################################################ -->
              <center><div class="one_quarter first">
                <ul class="w3-ul">
                <li class="w3-xxxlarge"><i class="fa fa-home"></i> </li>
              </ul>

              </div>
              <div class="one_quarter">

                <address class="btmspace-15">
                บ้านสุรพล สแตนเลส<br>
                24/53  &amp; หมู่ 1<br>

                </address>

              </div>
              <div class="one_quarter">

                <address class="btmspace-15">
                  ต.บางม่วง อ.ตะกั่วป่า<br>
                  จ.พังงา 82110

                </address>

              </div>
              <div class="one_quarter">
                <ul class="nospace">
                  <li class="btmspace-10"><span class="fa fa-phone"></span> 081-326-6568</li>
                  <li><span class="fa fa-envelope-o"></span> suraphol@email.com</li>
                </ul>
              </div>
          </center>
              <!-- ################################################################################################ -->
            </footer>
          </div>

          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->

          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->
          <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
          <!-- JAVASCRIPTS -->
          <script src="layout/scripts/jquery.min.js"></script>
          <script src="layout/scripts/jquery.backtotop.js"></script>
          <script src="layout/scripts/jquery.mobilemenu.js"></script>
          <!-- IE9 Placeholder Support -->
          <script src="layout/scripts/jquery.placeholder.min.js"></script>
          <!-- / IE9 Placeholder Support -->
          <!-- Homepage specific -->
          <script src="layout/scripts/jquery.flexslider-min.js"></script>

</html>
<?php }?>
