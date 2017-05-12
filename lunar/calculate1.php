<!DOCTYPE html>

<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){

	  Header("Location: form_login.php");

}else{?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script></head>


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
            }font{
              font-family: "TH SarabunPSK";

            }
            .data {
              font-family: "TH SarabunPSK";
              font-size: 20px;
            }
            html{
                padding:0px;
                margin:0px;
            }
            div#map_canvas{
                margin:auto;
                width:800px;
                height:550px;
                overflow:hidden;
                font-family: "TH SarabunPSK";
            }div.transbox
              {
            		color: #FFFFFF;
              }link{
              	color: #FFFFFF;
              }
              div.box
              {

              opacity:0.8;
              }.form-control{
                font-family: "TH SarabunPSK";
                font-size: 20px;

              }div .tel{
                font-family: "TH SarabunPSK";
                font-size: 30px;
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
            one = document.cal.am.value;
            two = document.cal.price.value;

            document.cal.totalprice.value = two*one;
            document.cal.totalprice1.value = two*one;
            }
            function stopCalc(){
            clearInterval(interval);
            }

            </SCRIPT>
<form name="cal" method="post" action="calculate2.php">
            <?php
            $mysqli = mysqli_connect("localhost", "root", "", "stl");
            $mysqli->set_charset("utf8");

            $product_ID= $_GET["product_ID"];

          $strSQL = mysqli_query($mysqli,"SELECT * FROM customer WHERE identification_No='".$_SESSION['IdNo']."'");


            $objResult = mysqli_fetch_array($strSQL);
              $width=$_POST['width'];
              $height=$_POST['height'];
              $price=$_POST['gap'];


            ?>
						
						<div class="container">
					  	<div class="row">
					      	<div class="col-md-2"></div>
					          <div class="col-md-8">

					    <p><a href="cart.php">กลับหน้าตะกร้าสินค้า</a> &nbsp;  <button class="btn btn-primary" onClick="window.print()"> print </button></p>
					    <table width="700" border="1" align="center" class="table">
					      <tr>
					        <td width="1558" colspan="5" align="center">
					        <strong>สั่งซื้อสินค้า</strong></td>
					      </tr>
					      <tr class="success">
					      <td align="center">ลำดับ</td>
					        <td align="center">สินค้า</td>
					        <td align="center">ราคา</td>
					        <td align="center">จำนวน</td>
					        <td align="center">รวม/รายการ</td>
					      </tr>
					  <?php
					  	include ("testdb.php");
					  	$total=0;
					  	foreach($_SESSION['shopping_cart'] as $p_id=>$p_detail)
					  	{
					  		$strSQL = mysqli_query($mysqli,"select * from product where product_ID='".$p_id."';");
					  		$row = mysqli_fetch_array($strSQL);
					  		$strSQL1 = mysqli_query($mysqli,"SELECT * FROM scale WHERE scale_id='".$p_detail[1]."';");
					  		$row1 = mysqli_fetch_array($strSQL1);
					  		$sum=$row['Price'] * $p_detail[0]*$row1['width']*$row1['height'];
					  		$total	+= $sum;
					      echo "<tr>";
					  	echo "<td align='center'>";
					  	echo  $i += 1;
					  	echo "</td>";
					      echo "<td>" . $row["product_Name"] . "</td>";
					      echo "<td align='right'>" .number_format($row['Price']*$row1['width']*$row1['height'],2) ."</td>";
					      echo "<td align='right'>$p_detail[0]</td>";
					      echo "<td align='right'>".number_format($sum,2)."</td>";
					      echo "</tr>";
					  	}
					  	echo "<tr>";
					      echo "<td  align='right' colspan='4'><b>รวม</b></td>";
					      echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
					      echo "</tr>";
					  ?>
					  </table>
					  		</div>
					  	</div>
					  </div>

          <center>
            <div class="contianer" style="margin:auto;padding-top:5px;width:600px;">
            <label for="idorder">สินค้า</label>&nbsp;&nbsp;
            <input type="text" class="form-control" id="product_Name" name="product_Name" value="<?php echo($objResult1['product_Name']);?>" disabled><br>
                  <input type="hidden"  class="form-control" name="PD_Name" value="<?php echo($objResult1['product_Name']);?>" >
            <label for="idorder">ขนาด(กว้าง X สูง)</label>&nbsp;&nbsp;
            <input type="text" class="form-control" id="size" name="size" value="<?php echo $width; echo"X"; echo $height;?>" ><br>

            <label for="idorder">จำนวนชิ้น</label>&nbsp;&nbsp;
              <input class="form-control" type=text name="am" value="" onFocus="startCalc();" onBlur="stopCalc();"><br>

            <input type="hidden"  class="form-control" name="price" value="<?php echo $_POST['gap'];?>" onFocus="startCalc();" onBlur="stopCalc();">

            <label for="idorder">ราคารวม</label>&nbsp;&nbsp;
            <input type="text" class="form-control"  name="totalprice"  disabled><br>
            <input type="hidden"  class="form-control" name="totalprice1"  >

            <label for="name">ชื่อ-นามสกุล </label> &nbsp;&nbsp;
            <input type="text" class="form-control" id="name" name="name" value="<?php echo($objResult['customer_Name']);?>"><br>

            <label for="tel">เบอร์โทร</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text"  class="form-control" id="tel" name="tel"  value="<?php echo($objResult['phone_No']);?>"><br><br>

            <label for="idorder"><B>กรุณากรอกจุดสังเกตใกล้เคียงและที่อยู่และ ปักหมุดบนที่อยูลงบนแผนที่</B></label><br>

            <label for="name">กรอกจุดสังเกตที่ใกล้เคียง</label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="text" class="form-control" id="aa" name="aa" placeholder="กรอกจุดสังเกตหรือสถานที่ที่ใกล้เคียง เช่น โรงเรียน วัด"> <br><br>
  </center>




          <div id="map_canvas"></div>

          <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyB604ioym5bF296ScxXRyD7SzTCYU7uO-I" type="text/javascript"></script>
          <script type="text/javascript">
          navigator.geolocation.getCurrentPosition(
              function(position) {
               var lat = position.coords.latitude;
              var lon = position.coords.longitude;

              localStorage.setItem("lat",lat);
              localStorage.setItem("lon",lon);

              console.log(lat);
              console.log(lon);
              },
              function () {
               alert('Error locating your device');
              },
              {enableHighAccuracy: true}
          );

          function initialize() {
            if (GBrowserIsCompatible()) {
              var lat = localStorage.getItem("lat");
              var lon = localStorage.getItem("lon");
              var map = new GMap2(document.getElementById("map_canvas"));
              var center = new GLatLng(lat,lon); // การกำหนดจุดเริ่มต้น
              map.setCenter(center, 13);  // เลข 13 คือค่า zoom  สามารถปรับตามต้องการ
              map.setUIToDefault();

              var marker = new GMarker(center, {draggable: true});
              map.addOverlay(marker);


              GEvent.addListener(marker, "dragend", function() {
                  var point = marker.getPoint();
                  map.panTo(point);

                  $("#lat_value").val(point.lat());
                  $("#lon_value").val(point.lng());
                  $("#zoom_value").val(map.getZoom());

              });

            }
          }
          </script>
          <script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
          <script type="text/javascript">
          $(function(){
              initialize();
              $(document.body).unload(function(){
                      GUnload();
              });
          });
          </script>
          <div id="showDD" style="margin:auto;padding-top:5px;width:600px;">

              Latitude
              <input name="lat_value" class="form-control" type="text" id="lat_value" value="0" />
              Longitude
              <input name="lon_value" class="form-control" type="text" id="lon_value" value="0" />
            Zoom
            <input name="zoom_value" type="text" id="zoom_value" value="0" size="5" /><br>
            <input type="submit" class="button2"name="button" id="button" value="ตกลง" />

          </div>


</div>
</form>
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
