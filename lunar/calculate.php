<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css"></head>


        <style>

            .button { /*ิbutton*/
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 24px;
                font-family: "TH SarabunPSK";
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
          label{
              font-family: "TH SarabunPSK";
            }

            .button {
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
            .button2 {width: 30%;}
            .button3 {width: 50%;}
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
            }font{
              font-family: "TH SarabunPSK";

            }
            </style><body>

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

  <body>
    <SCRIPT Language="JavaScript">

    function startCalc(){
    interval = setInterval("calc()",1);
    }
    function calc(){
    one = document.autoSumForm.width.value;
    two = document.autoSumForm.height.value;
    price=document.autoSumForm.price.value;
    document.autoSumForm.gap.value = two*price *one;
    }
    function stopCalc(){
    clearInterval(interval);
    }

    </SCRIPT>


    <form name="autoSumForm" method="post" action="testcart.php?p_id=<?php echo $_GET["product_ID"];?>&&act=add">


        <?php


          $mysqli = mysqli_connect("localhost", "root", "", "stl");
          $mysqli->set_charset("utf8");

        	$productID= $_GET["product_ID"];


        	$strSQL = mysqli_query($mysqli,"SELECT * FROM product where  product_ID= $productID");

          $objResult = mysqli_fetch_array($strSQL);
          $price=$objResult['Price'];
          ?>
    <div class="container"><center>
      <input type="hidden" name="Price" value="<?php echo $objResult["Price"];?>">

          <font size="9">ประเมินราคา</font><br>
            <label for="fname">ใส่ค่าประมาณความกว้าง และความยาว</label></font><br>
            <div class="form-group">
                  <label for="fname">ความกว้าง</label>
                  <input class="form-control" type=text name="width" value="" onFocus="startCalc();" onBlur="stopCalc();">
                  <label for="fname">&nbsp;&nbsp;เมตร</label><br>

                  <label for="fname">&nbsp;&nbsp;&nbsp;ความสูง</label>
                  <input class="form-control" type=text name="height" value="" onFocus="startCalc();" onBlur="stopCalc();">
                  <input type="hidden"  class="form-control" name="price" value="<?=$objResult['Price'];?>">
                  <label for="form-control">&nbsp;&nbsp;เมตร</label><br>
                  <label for="fname">ราคาต่อ 1 ชิ้น</label><br>
                  <input class="form-control" type=text name="gap" disabled="disabled">
                </div>

                  <button class="button button4" type="submit" ><font face = "TH SarabunPSK" >เลือก</font></button>
                      </div>
              </center>
    </form>

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
