
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>STL Creative</title>
  <link href="hdoor1.css" rel="stylesheet" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"></head>
	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>

  <style type="text/css">
		body{ color: #333; font: 20px 'TH SarabunPSK', Verdana, sans-serif;	}
    div.figure {
      float: left;
      width: 29%;
      border: thin silver solid;
      margin: 0.8em;
      padding: 0.5em;

    }
    div.figure a {
      float: left;
      text-decoration: none;
      font-family: Georgia, "TH SarabunPSK", serif;
      color: black;
      font-size: 100%;
      font-style: italic;
      font-size: smaller;
      text-indent: 0;
    }
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 8px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
        cursor: pointer;
    }

    .button4 {
    background-color: white;
    color: black;
    border: 2px solid #e7e7e7;
    }

    .button4:hover {background-color: #e7e7e7;}
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

</head>
<body>
    <div class="container">
  <?php
  include 'testdb.php';
	$strSQL = mysqli_query($mysqli,"SELECT * FROM product,type where product.type_ID=type.type_ID and product_Name like '%".$_POST["search"]."%' limit 0,20");
  $SQL = "SELECT * FROM product,type where product.type_ID=type.type_ID and product_Name like '%".$_POST["search"]."%' limit 0,20";
  $result = mysqli_query($mysqli,$SQL);
  $numrows = mysqli_num_rows($result);


        if($numrows==0){
          echo "<script language=\"JavaScript\">";
echo "alert('ไม่พบข้อมูล');window.location=window.history.back();";
      echo "</script>";
        } else {
          while($objResult = mysqli_fetch_array($strSQL)){
      ?>

      <form name="FrmCal" method="post" action="calculate.php?product_ID=<?php echo $objResult["product_ID"];?>">
        <div class="figure">
          <input type="hidden" name="type_ID" value="<?php echo $objResult["type_ID"];?>">
            <font face="TH SarabunPSK" color="green" size="4"><B><?php echo $objResult["product_Name"];?></B></font>
            <center><a href="pic/<?php echo $objResult["product_IMG"];?>"rel="lightbox[food]"><img src="pic/<?php echo $objResult["product_IMG"];?>"  border="0" /></a></center>
            <?php echo iconv_substr($objResult["Description"],0,30, "UTF-8")."...";?>
           <center><button class="button button4" type="button" onClick="this.form.action='check.php?product_ID=<?php echo $objResult["product_ID"];?>'; submit()"><font face = "TH SarabunPSK" >เช็คราคา</font></button>
      </div>
<?php
}
 }
 ?>
</form>

</div>
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
