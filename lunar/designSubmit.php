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
}h1,h2,h3,h4{
	font-family: "TH SarabunPSK";

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


		if(move_uploaded_file($_FILES["fileUpload1"]["tmp_name"],"self/".$_FILES["fileUpload1"]["name"])) // ย้ายจากไฟล์อัพโหลดไปเก็บใน folder pic
{



				//*** Insert Record ***//
				include ("testdb.php");

				$strSQL1=mysqli_query($mysqli,"select * from customer where identification_No='".$_SESSION['IdNo']."'");

									$objResult1 = mysqli_fetch_array($strSQL1);
									$strSQL2 = "INSERT INTO `improve`(  `improve_IMG`,  `type_ID`, `status_ip_ID`, `width`, `height`, `improve_Description`, `customer_ID`)
															VALUES ('".$_FILES["fileUpload1"]["name"]."','".$_POST['type']."',1,'".$_POST['scale_w']."','".$_POST['scale_h']."','".$_POST['description']."','".$objResult1['customer_ID']."')";

									$objQuery2 = mysqli_query($mysqli,$strSQL2);

				$strSQL3=mysqli_query($mysqli,"SELECT * FROM improve WHERE customer_ID='".$objResult1['customer_ID']."' ORDER BY improve_ID DESC LIMIT 0,1");


				$objResult3 = mysqli_fetch_array($strSQL3);


				?>

<?php }
 ?>
 <center>
     <h2>อัพโหลดสำเร็จ!!!!</h2>
		 <h5>รหัสการตรวจสอบของคุณคือ <?php echo $objResult3['improve_ID'];?></h5>
 <h4>กรุณารอการตอบรับและคำนวณราคาจากทางร้าน</h4>

 <iframe src="self/<?php echo $objResult3["improve_IMG"];?>" type=frame&vlink=xx&link=xx&css=xxx&bg=xx&bgcolor=xx marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scorlling=yes width=500 height=600></iframe>

     <!--<img src="self/<?php #echo $objResult3["improve_IMG"];?>" width="140" height="110" border="0" /><br>-->


     <h4>กว้าง : <?php echo $objResult3['width'];?> เมตร  ยาว : <?php echo $objResult3['height'];?> เมตร <br></h4>
     <h4>รายละเอียดเพิ่มเติม : <?php echo $objResult3['improve_Description'];?> <br></h4>

<button type="button" class="btn btn-success" onclick="window.location='userpage.php';">เสร็จสิ้น</button>


</center>

</body>
</div>
</html>
<?php }?>
