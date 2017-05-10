<!DOCTYPE html>

<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){

	  Header("Location: form_login.php");

}else{?>

<html>
<head>
<title>STL Creative</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<style>
.header a{
		font-family: "TH SarabunPSK";a
		font-size: 50px;
		color: #FFFFFF;
}
a{
	font-family: "TH SarabunPSK";
	font-size: 20px;
}
label{
	font-family: "TH SarabunPSK";
	font-size: 20px;
}
div.transbox
  {
		color: #FFFFFF;
  }
link{
	color: #FFFFFF;
}            div.box
{

opacity:0.8;
}h3{
	font-family: "TH SarabunPSK";
	font-size: 30px;
	color: #000000;

}
.imghover1 {
display: block;
width: 350px;
height: 240px;
background: url('img11.jpg'); /* ที่อยู่รูปภาพที่1 */
text-indent: -99999px;
}
.imghover1:hover {
background-image : url('img12.jpg'); /* ที่อยู่รูปภาพที่2 */
}

			.imghover2 {
			display: block;
			width: 350px;
			height: 240px;
			background: url('img13.jpg'); /* ที่อยู่รูปภาพที่1 */
			text-indent: -99999px;
			}
			.imghover2:hover {
			background-image : url('img14.jpg'); /* ที่อยู่รูปภาพที่2 */
			}

			.imghover3 {
			display: block;
			width: 350px;
			height: 240px;
			background: url('img15.jpg'); /* ที่อยู่รูปภาพที่1 */
			text-indent: -99999px;
			}
			.imghover3:hover {
			background-image : url('img16.jpg'); /* ที่อยู่รูปภาพที่2 */
			}

</style>

</head>

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
    <div class="navbar-form navbar-right">
                    <a class="faicon-facebook" href="https://www.facebook.com/profile.php?id=100002132690045"><i class="fa fa-facebook-square"></i></a>
                    <a class="faicon-pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                    <a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    <a class="faicon-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                    <a class="faicon-rss" href="#"><i class="fa fa-rss"></i></a>

    </div>

  </div>

</nav>



</body>





<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="wrapper bgded overlay dark" style="background-image:url('images/demo/backgrounds/05.png')">
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <header id="header" class="clear">
    <div class="header">
      <h4><a class="navbar-brand" href="index1.php">บ้านสุรพล สแตนเลส</a></h4>
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
    <!-- ################################################################################################ -->
  </header>
  <section id="pageintro" class="clear">
    <!-- ################################################################################################ -->
		<?php
		include ("testdb.php");
		$strSQL = mysqli_query($mysqli,"SELECT * FROM `promotion_news`");
		$objResult = mysqli_fetch_array($strSQL);

		?>
<center>
<div class="box">
	<table  width="12%" hight="10%" >
		<tr >
			<td bgcolor="#FFFFFF">
				<center><h3><br><?=$objResult["news"];?></h3>
			</td>
		</tr>
	</table>

</div>
</center>





    </center>


    <!-- ################################################################################################ -->
  </section>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="container clear">
    <!-- main body -->
    <!-- ################################################################################################ -->

		<div class="group center">
      <article class="one_quarter first"><i class="fa fa-3x fa-th btmspace-30"></i>
        <h4 class="font-x1 uppercase"><a href="format_1.php">รูปแบบสำเร็จรูป</a></h4>
        <p>มีรูปแบบที่มากมาย และหลายหลายให้คุณได้เลือกสรร</p>
      </article>
      <article class="one_quarter"><i class="fa fa-3x fa-paint-brush btmspace-30"></i>
        <h4 class="font-x1 uppercase"><a href="menudesign.php">ออกแบบด้วยตนเอง</a></h4>
        <p>มีบริการสำหรับลูกค้าที่ต้องการออกแบบได้ด้วยตัวเอง</p>
      </article>
      <article class="one_quarter"><i class="fa fa-3x fa-credit-card btmspace-30"></i>
        <h4 class="font-x1 uppercase"><a href="payment_p.php">แจ้งชำระเงิน</a></h4>
        <p>ชำระเงินโอนผ่านธนาคารกสิกรไทย และธนาคารกรุงเทพ</p>
      </article>
      <article class="one_quarter"><i class="fa fa-3x fa-check-square-o btmspace-30"></i>
        <h4 class="font-x1 uppercase"><a href="checkstatus.php">เช็คสถานะ สินค้าสำเร็จรูป</a></h4>
        <p>ตรวจสอบสถานะของลูกค้า ที่ทำการสั่งสินค้าแล้ว</p>
      </article><br>
      <article class="one_quarter first"><i class="fa fa-3x fa-upload btmspace-30"></i>
        <h4 class="font-x1 uppercase"><a href="upfile.php">อัพโหลดไฟล์</a></h4>
        <p>อัพโหลดไฟล์ สำหรับลูกค้าที่ออกแบบด้วยตนเอง</p>
      </article>
      <article class="one_quarter"><i class="fa fa-3x fa-check-circle-o btmspace-30"></i>
        <h4 class="font-x1 uppercase"><a href="menudesign.php">เช็คการตรวจสอบ</a></h4>
        <p>ตรวจสอบสถานะการตรวจสอบราคา สำหรับสินค้าที่ออกแบบด้วยตนเอง</p>
      </article>
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper">
<div class="table center elements">
    <!-- ################################################################################################ -->
<div class="table-cell bgded overlay dark" >
        <div class="imghover1"> </div>
          <p>คุณสมบัติเด่นของสเตนเลสคือความแข็งแกร่งทนทาน </p>
</div>
    <div class="table-cell bgded overlay dark" >
      <div class="imghover2"> </div>
      <p>ผลงานมีคุณภาพ โดยผู้เชี่ยวชาญและช่างผู้ชำนาญ</p>

    </div>
    <div class="table-cell bgded overlay dark" >
      <div class="imghover3"> </div>
        <p>พร้อมให้บริการด้วยความเต็มใจ</p>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
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
</body>
</html>


<?php }?>
