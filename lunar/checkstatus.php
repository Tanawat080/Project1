
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
    <link href="home2.css" rel="stylesheet" >
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
  font-size: 40px;

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
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "select * from customer,product,`order`,order_deatail,data_status,status
where `order`.order_ID=order_deatail.order_ID AND
`order`.order_ID=data_status.order_ID AND
`order`.customer_ID=customer.customer_ID AND
order_deatail.product_ID=product.product_ID AND
status.status_ID=data_status.status_ID AND
customer_Name LIKE '%".$valueToSearch."%'
";
    $search_result = filterTable($query);

}
 else {
    $query = "select * from customer,`order`,data_status,status
where
`order`.order_ID=data_status.order_ID AND
`order`.customer_ID=customer.customer_ID AND
status.status_ID=data_status.status_ID ";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "stl");
    $connect->set_charset("utf8");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>check</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
      <div class="container">
      <center>
        <h2>เช็คสถานะ</h2>
        <div>
        <form action="checkstatus.php" method="post">
          <div>
          <label>กรอกชื่อ-สกุล</label>
            <input type="text" name="valueToSearch" placeholder="กรอกชื่อ-สกุล"><br>
          </div>
            <input type="submit" name="search" value="ค้นหา"><br>

            <table>
                <tr>
                    <th>รหัสออร์เดอร์</th>
                    <th>ชื่อ-สกุล</th>

                    <th>วันที่ลงพื้นที่สำรวจ</th>
                    <th>วันที่ติดตั้ง</th>
                    <th>วันที่ออร์เดอร์</th>
                    <th>สถานะ</th>



                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)){?>
                <tr>
                    <td><?php echo $row['order_ID'];?></td>
                    <td><?php echo $row['customer_Name'];?></td>

                    <td><?php echo $row['locate_Date'];?></td>
                    <td><?php echo $row['setup_Date'];?></td>

                    <td><?php echo $row['order_Date'];?></td>
                    <td><?php echo $row['status_status'];?></td>

                </tr>
                <?php }?>
            </table>

        </form>
</div></center>
  </div>  <div class="wrapper row4">
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
  </div></body>
</html>
</html>
