<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    session_start();

		/* echo "<pre>";
			print_r($_SESSION);
			echo "<hr>";
			print_r($_POST);
			echo "</pre>"; */
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php

include ('testdb.php');
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	$name = $_POST["name"];
  $customer_ID=$_POST["customer_ID"];
	$address = $_POST["address"];
	$phone = $_POST["tel"];
	$p_qty = $_POST["p_detail"];
	$total = $_POST['total'];
	$order_date = date("Y-m-d");
  $lat=$_POST['lat_value'];
  $lon=$_POST['lon_value'];
  $landmark=$_POST["landmark"];
  $date=$_POST["date"];
  $status = 1;


	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($mysqli,"BEGIN");
	$sql1 = "INSERT  INTO `order` VALUES
	(NULL,
    '$order_date',
    '$total',
    '$customer_ID'
	)";

	$query1	= mysqli_query($mysqli, $sql1) or die ("Error in query: $sql1" . mysql_error());


	$sql2 = "SELECT MAX(order_id) AS order_id FROM `order` ";
	$query2	= mysqli_query($mysqli, $sql2);
	$row = mysqli_fetch_array($query2);
	$order_id = $row['order_id'];


	foreach($_SESSION['shopping_cart'] as $p_id=>$p_detail)
	{
    $strSQL1 = mysqli_query($mysqli,"SELECT * FROM scale WHERE scale_id='".$p_detail[1]."';");

    $row4 = mysqli_fetch_array($strSQL1);
		$sql3	= "SELECT * FROM product where product_ID=$p_id";
		$query3 = mysqli_query($mysqli, $sql3);
		$row3 = mysqli_fetch_array($query3);
		$total=$row3['Price']*$p_detail[0]*$row4['width']*$row4['height'];

		$sql4	= "INSERT INTO  `order_deatail`
		values(
		'$p_id',
		'$p_detail[0]',
		'$total',
    '$lat',
    '$lon',
    '$landmark',
    '$address',
    '$order_id',
		NULL
  )";

		$query4	= mysqli_query($mysqli, $sql4);

		$sql5="INSERT INTO  data_status
		values(
		'$date',
		NULL,
		'$status',
    '$order_id'
  )";
  $query5	= mysqli_query($mysqli, $sql5);

}



	if($query1 && $query4 && $query5){
		mysqli_query($mysqli,"COMMIT");

		foreach($_SESSION['shopping_cart'] as $p_id)
		{
			unset($_SESSION['shopping_cart']);
		}


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

			<th width="150"> <div align="center">รหัสสินค้า</div></th>
			<th width="300"> <div align="center">ชื่อสินค้า</div></th>
			 <th width="150"> <div align="center">จำนวน</div></th>


			</tr>
							<?php
								include ("testdb.php");
								$strSQL = mysqli_query($mysqli,"select product_ID from order_deatail where `order_ID`='".$objResult3['order_ID']."' group by product_ID
																								 ");
			 while($objResult = mysqli_fetch_array($strSQL)){
						 $SQL1=mysqli_query($mysqli,"select * from product where product_ID='".$objResult["product_ID"]."'");
							?>
							<tr>
						 <td border="0"><center><?php echo $objResult["product_ID"];?></center></td>
						 <?php while($objResult1 = mysqli_fetch_array($SQL1)){?>
							<td><center><?php echo $objResult1["product_Name"];?></center></td>
							<?php }?>
							<?php
							 $SQL2=mysqli_query($mysqli,"SELECT product_ID,COUNT(product_ID) as amountPd from order_deatail where product_ID='".$objResult["product_ID"]."' and order_ID='".$objResult3['order_ID']."' group by product_ID");
							while($objResult2 = mysqli_fetch_array($SQL2)){?>
							<td><center><?php echo $objResult2["amountPd"]; ?></center></td>
							<?php } ?>
				 </tr>

				 <?php
				 }
				 ?>
			 </table>
			 <button type="button" class="btn btn-success" onclick="window.location='userpage.php';">เสร็จสิ้น</button>
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





	<?php }
	else{
		mysqli_query($mysqli,"ROLLBACK");

	}


?>





</body>
</html>
