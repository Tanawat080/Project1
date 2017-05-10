
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
    <link href="h.css" rel="stylesheet" >
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


</head>
<body>
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
  font-size: 20px;

}
p{
  font-family: "TH SarabunPSK";
  font-size: 20px;
}

            }.button {
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

            .button1 {width: 50%;}
            .button2 {width: 50%;}
            .button3 {width: 100%;}
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
            div.abcd{
              font-family: "TH SarabunPSK";
              font-size: 20px;
            }



</style>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">

    <ul class="nav navbar-nav navbar-center">
      <li><a href="regis.php"><span class="glyphicon glyphicon-user"></span>สมัครสมาชิก</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>ลงชื่อเข้าใช้</a></li>
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
        <li><a href="#">วิธีการสั่งซื้อ</a></li>
        <li><a href="#">วิธีการชำระเงิน</a></li>
        <li><a href="#">แผนที่ร้าน</a></li>
        <li><a href="contactcus.php">ติดต่อเรา</a></li>
      </ul>
    </nav>
    </div>
    <!-- ################################################################################################ -->
  </header>

<div class="container">
<body>
  <SCRIPT Language="JavaScript">

  function startCalc(){
  interval = setInterval("calc()",1);
  }
  function calc(){
  one = document.FrmCal.width.value;
  two = document.FrmCal.height.value;
  price=document.FrmCal.price.value;
  document.FrmCal.gap.value = two*price *one;
  }
  function stopCalc(){
  clearInterval(interval);
  }

  </SCRIPT>
<form name="FrmCal" method="post" >
  <?php
  $mysqli = mysqli_connect("localhost", "root", "", "stl");
  $mysqli->set_charset("utf8");

  $a= $_POST["type_ID"];

  echo '<input type="hidden" name="type_ID" value="'.$a.'">'."\n";
  $strSQL = mysqli_query($mysqli,"SELECT * FROM product,type where product.type_ID=type.type_ID and product.type_ID= $a");


    while($objResult = mysqli_fetch_array($strSQL)){?>


        <div class="figure">
          <input type="hidden" name="type_ID" value="<?php echo $a;?>">
          <input type="hidden" name="product_ID" value="<?php echo $objResult["product_ID"];?>">
            <font face="TH SarabunPSK" color="green" size="4"><B><?php echo $objResult["product_Name"];?></B></font>
            <center><a href="pic/<?php echo $objResult["product_IMG"];?>"rel="lightbox[food]"><img src="pic/<?php echo $objResult["product_IMG"];?>" width="140" height="110" border="0" /></a></center>
           <font face="TH SarabunPSK" color="green" size="4">
             <?php echo iconv_substr($objResult["Description"],0,30, "UTF-8")."...";?>


          </font>

           <center><button class="button button4" type="button" onClick="this.form.action='check.php?product_ID=<?php echo $objResult["product_ID"];?>'; submit()"><font face = "TH SarabunPSK" >เช็คราคา</font></button>
           </center>

      </div>
  <?php } ?>
  </form>



</body>
</html>
