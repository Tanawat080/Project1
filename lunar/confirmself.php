<?php

$amount=$_POST['amount'];
$improve_ID=$_POST['improve_ID'];
$customer_ID=$_POST['customer_ID'];
$Price=$_POST['Price'];
$customer_ID=$_POST['customer_ID'];
$date=$_POST['date'];
$address=$_POST['address'];
$landmark=$_POST['landmark'];
$lat_value=$_POST['lat_value'];
$lon_value=$_POST['lon_value'];
$order_date = date("Y-m-d");
/* echo "<pre>";
  echo "<hr>";
  print_r($_POST);
  echo "</pre>"; */
  include ("testdb.php");
$SQL="INSERT INTO `order`(`order_Date`, `total_cost`, `customer_ID`) VALUES ('".$order_date."','".$Price."','".$customer_ID."')";
$result=mysqli_query($mysqli,$SQL);
#echo "INSERT INTO `order`(`order_Date`, `total_cost`, `customer_ID`) VALUES ('".$order_date."','".$Price."','".$customer_ID."')";

$sql2 = "SELECT MAX(order_id) AS order_id FROM `order` ";
$query2	= mysqli_query($mysqli, $sql2);
$row = mysqli_fetch_array($query2);
$order_id = $row['order_id'];

#$sql3 = "SELECT * FROM `improve` where improve_ID = '".$improve_ID."' ";

$sql4="INSERT INTO `order_deatail`( `amount`, `cost`, `latitude`, `longtitude`, `landmark`, `order_address`, `order_ID`, `improve_ID`)
        VALUES ('".$amount."','".$Price."','".$lat_value."','".$lon_value."','".$landmark."','".$address."','".$order_id."','".$improve_ID."')";
$result2=mysqli_query($mysqli,$sql4);

$sql5="INSERT INTO `data_status`(`locate_Date`, `status_ID`, `order_ID`)
       VALUES ('".$date."',1,'".$order_id."')";
$result3=mysqli_query($mysqli,$sql5);

if($query2 && $result2 && $result3){
  $strSQL3=mysqli_query($mysqli,"SELECT * FROM `order` WHERE customer_ID='".  $customer_ID."' ORDER BY order_ID DESC LIMIT 0,1");
  $objResult3 = mysqli_fetch_array($strSQL3);
 ?>


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
             } h1,h2,h3,h4,h5{
                 font-family: "TH SarabunPSK";
               }option{
                 font-family: "TH SarabunPSK";
                 font-size: 18px;
                   color: #000000;
               }div.container.button{
                 font-family: "TH SarabunPSK";
                 font-size: 18px;
                   color: #000000;
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
 <body><center>
   <h2>สั่งสินค้าสำเร็จ!!!!</h2>
   <h3 >รหัสการสั่งซื้อของคุณคือ <?php echo $objResult3['order_ID'];?></h3></center>
   <table width="720" border="2">
   <tr>

   <th width="150"> <div align="center">รหัสการออกแบบ</div></th>
   <th width="300"> <div align="center">ประเภท</div></th>
    <th width="150"> <div align="center">จำนวน</div></th>



   </tr>
           <?php
             include ("testdb.php");
             $strSQL = mysqli_query($mysqli,"select * from order_deatail where `order_ID`='".$objResult3['order_ID']."'");
    while($objResult = mysqli_fetch_array($strSQL)){
          $SQL1=mysqli_query($mysqli,"select * from improve where improve_ID='".$objResult["improve_ID"]."'");
           ?>
           <tr>
          <td border="0"><center><?php echo $objResult["improve_ID"];?></center></td>
          <?php while($objResult1 = mysqli_fetch_array($SQL1)){
                    $SQL6=mysqli_query($mysqli,"select * from type where type_ID='".$objResult1["type_ID"]."'");
                        while($objResult4 = mysqli_fetch_array($SQL6)){
            ?>
           <td><center><?php echo $objResult4["type_Name"];?></center></td>
           <?php }}?>
           <?php
            $SQL2=mysqli_query($mysqli,"SELECT improve_ID,COUNT(improve_ID) as amountPd from order_deatail where improve_ID='".$objResult["improve_ID"]."' and order_ID='".$objResult3['order_ID']."' group by improve_ID");
           while($objResult2 = mysqli_fetch_array($SQL2)){?>
           <td><center><?php echo $objResult2["amountPd"]; ?></center></td>
           <?php } ?>



      </tr>

      <?php
      }
        $strSQL8 = mysqli_query($mysqli,"select * from order_deatail where `order_ID`='".$objResult3['order_ID']."'");
        $objResult8 = mysqli_fetch_array($strSQL8);
        $SQL7=mysqli_query($mysqli,"select * from improve where improve_ID='".$objResult8["improve_ID"]."'");
        $objResult7 = mysqli_fetch_array($SQL7);
      ?>

    </table>
    <center>
    <div style="border:1px solid black; width:700px;
    height:100%; background:#FFFFFF; ">
     <center><iframe src="self/<?php echo $objResult7["improve_IMG"];?>" type=frame&vlink=xx&link=xx&css=xxx&bg=xx&bgcolor=xx marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scorlling=yes width=700 height=600></iframe>
    </div>

    <br><button type="button" class="btn btn-success" onclick="window.location='userpage.php';">เสร็จสิ้น</button>
  </center>
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
 </html>
<?php }else{
  echo "error";
} ?>
