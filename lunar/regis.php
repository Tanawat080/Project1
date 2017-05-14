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


button {
  background-color: #838B83; /* Green */
  border: none;
  color: white;
  padding: 10px 100px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;
  font-family: "TH SarabunPSK";
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {width: 30%;}
.button2 {width: 50%;}
.button3 {width: 100%;}
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
div.abcd{
  font-family: "TH SarabunPSK";
  font-size: 20px;
}div{
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
      <a class="navbar-brand" href="#">บ้านสุรพล สแตนเลส</a>
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

    <!-- .################################################################################################ -->
    <html>
    <body>
      <div class="container">
    <form name="form1" method="post" action="regis2.php" enctype="multipart/form-data" OnSubmit="return chkString();">
      <script language="JavaScript">
	       function chkString()
	         {
		           if(document.form1.passwordcus.value.length < 8 || document.form1.passwordcus.value.length > 12   ) {
			                alert('ความยาวรหัสผ่าน 8-12 ตัวอักษร');
			                   return false;
		           }

               if(document.form1.tel.value.length != 10 ) {
			                alert('เบอร์โทรศัพท์ควรมี 10 หลัก กรุณากรอกใหม่อีกครั้ง');
			                   return false;
		           }

               if(document.form1.idenNo.value.length != 13 ) {
			                alert('หมายเลขบัตรประชาชนควรมี 13 หลัก กรุณากรอกใหม่อีกครั้ง');
			                   return false;
		           }


	         }
      </script>

        <div class="abcd">
        <center><font size="7"> ลงทะเบียน </font><br></center>

      <center><div class="form-group" >
        <labelfor="name">ชื่อ-สกุล : </label>
        <input type="text" style="width:450px"; class="form-control" name="name" value="" />

      <label for="name">รหัสผ่าน :</label><input type="password" style="width:450px"; class="form-control" name="passwordcus" value="" placeholder="รหัสผ่าน 8-12 ตัว" />
        <label for="name">ที่อยู่ :</label><input type="text" style="width:450px"; class="form-control" name="address" value="" />
          <label for="name">เบอร์โทรศัพท์ : </label><input type="text" style="width:450px"; class="form-control" name="tel" value="" maxlength="10" onKeyUp="if(isNaN(this.value) ){ alert('กรุณากรอกตัวเลข'); this.value='';}" />
          <label for="name">หมายเลขบัตรประชาชน :</label><input type="text" style="width:450px"; class="form-control" name="idenNo" value="" maxlength="13" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" />
      </div><!-- <input type="submit" value="ลงทะเบียน" /> -->
        <center><button  class="form-control" style="width:100px";><a>ลงทะเบียน</a></button><center>
       </div>

    </form>
  </div>
    </body>
    </html>
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
