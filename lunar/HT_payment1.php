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
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"></head>
<style>
.header a{
    font-family: "TH SarabunPSK";
    font-size: 80px;
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
div{
  font-family: "TH SarabunPSK";
  font-size: 20px;

}
h2{
  font-family: "TH SarabunPSK";
  font-size: 50px;

}
p{
  font-family: "TH SarabunPSK";
  font-size: 20px;
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
            h4{
              font-family: "TH SarabunPSK";
              font-size: 30px;
              color: #000000;

            }
            div.box
{

opacity:0.8;
}div.transbox
  {
		color: #FFFFFF;
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
        <li class="active"><a href="userpage.php">หน้าหลัก</a></li>
        <li><a href="HT_order1.php">วิธีการสั่งซื้อ</a></li>
        <li><a href="HT_payment1.php">วิธีการชำระเงิน</a></li>
        <li><a href="map1.php">แผนที่ร้าน</a></li>
        <li><a href="contactcus1.php">ติดต่อเรา</a></li>
      </ul>
    </nav>
    </div>
    <!-- ################################################################################################ -->
  </header>
  <body>
<center>
    <img src="img/kbank.png"><br>
    <img src="img/kbank2.png">
</center>
    <br><center><font size="6">1.หลังจากที่ทำการโอนเงินผ่านธนาคารแล้ว ให้เข้าไปที่ เมนู แจ้งชำระเงิน (ดังรูป)<font><center>
<img src="img/แจ้ง.png"> <br>
<center><font size="6">2.แล้วอัปโหลดหลักฐานการโอนเงิน (ดังรูป)</font></center>
<img src="img/แจ้ง3.png">
</center>

  </body>

    <!-- .################################################################################################ -->

    <!-- ################################################################################################ -->

  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
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