<?php
    error_reporting( error_reporting() & ~E_NOTICE );
    session_start();
    $p_id = $_REQUEST['p_id'];
  	$act = $_REQUEST['act'];
    $s=$_POST["scale"];
  if (!$_SESSION["IdNo"]){

  	  Header("Location: form_login.php");

  }else{

    if($act=='add' && !empty($p_id))
  	{
  		if(!isset($_SESSION['shopping_cart']))
  		{

  			$_SESSION['shopping_cart']=array();
  		}else{

  		}
      #----------------------------------------------------------
  		if(isset($_SESSION['shopping_cart'][$p_id]) && in_array("'.$s.'",$_SESSION['shopping_cart'][1],true)) ##เช็คค่า id มีอยู่ไหม
  		{

              $_SESSION['shopping_cart'][$p_id][0]++;

      }else{
  			   $_SESSION['shopping_cart'][$p_id]=array(1,$s);
           #$_SESSION['shopping_cart'][$p_id][0]++;
  		}

  	}

  	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
  	{
  		unset($_SESSION['shopping_cart'][$p_id]);
  	}

    if($act=='Cancel-Cart'){
    		unset($_SESSION['shopping_cart']);
    	}
  	if($act=='update')
  	{
  		$amount_array = $_POST['amount'];
  		foreach($amount_array as $p_id=>$amount)
  		{
  			$_SESSION['shopping_cart'][$p_id][0]=$amount;
  		}
  	}
	?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script></head>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<title>Shopping Cart </title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
    }div.transbox
      {
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
    }font{
      font-family: "TH SarabunPSK";

    }table{
      font-family: "TH SarabunPSK";
      font-size: 20px;
    }
    </style></head>

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
          <li class="active"><a href="userpage.php">หน้าหลัก</a></li>
          <li><a href="HT_order1.php">วิธีการสั่งซื้อ</a></li>
          <li><a href="HT_payment1.php">วิธีการชำระเงิน</a></li>
          <li><a href="map1.php">แผนที่ร้าน</a></li>
          <li><a href="contactcus1.php">ติดต่อเรา</a></li>
        </ul>
      </nav>
      </div>
<?php //include("menu.php");?>
<br>
<br>
<body>
<div class="container">
  <div class="row">

      <form id="frmcart" name="frmcart" method="post" action="?act=update">
        <?php//include ('testdb.php');
    //  $strSQL = "SELECT * FROM product WHERE product_ID='".$p_id."';";
      //    echo $strSQL; ?>

       <table width="100%" border="0" align="center" class="table table-hover">
        <tr>
          <td height="40" colspan="9" align="center" bgcolor="#CCCCCC"><strong><b>ตะกร้าสินค้า</span></strong></td>
        </tr>
        <tr>
          <td align="center" bgcolor="#EAEAEA"><strong>No.</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>image</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>สินค้า</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>กว้าง</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>ยาว</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>ราคา/1ตร.ม.</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>จำนวน</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>รวม/รายการ</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>ลบ</strong></td>
        </tr>
        <?php

if(!empty($_SESSION['shopping_cart']))
{
  include ('testdb.php');

	foreach($_SESSION['shopping_cart'] as $p_id=>$p_detail ){

    $strSQL = mysqli_query($mysqli,"SELECT * FROM product WHERE product_ID='".$p_id."';");
    $strSQL1 = mysqli_query($mysqli,"SELECT * FROM scale WHERE scale_id='".$p_detail[1]."';");
    $row1 = mysqli_fetch_array($strSQL1);
    //echo "SELECT * FROM scale WHERE scale_id='".$sa."'";
		while($row = mysqli_fetch_array($strSQL))
		{
      $sum=$row['Price'] * $p_detail[0]*$row1['width']*$row1['height'];

		$total += $sum;

		echo "<tr>";
		echo "<td align='center'>";
        echo $i += 1;
        echo ".";
		echo "</td>";
		echo "<td width='100' >"."<img src='pic/$row[product_IMG]'  width='50'/>"."</td>";
		echo "<td width='334' align='center'>"." " . $row["product_Name"] . "</td>";


?>
<td width='57' align='right'> <?php echo $row1['width'];?> </td>
<td width='57' align='right'> <?php echo $row1['height'];?> </td>
<?php
		echo "<td width='100' align='center'>".number_format($row['Price'],2). "</td>";
?>
		<td width='57' align='right'><input type='text' class="form-control" name='amount[<?=$p_id?>]' value='<?=$p_detail[0]?>'/></td>

<td width='100' align='right'> <?php echo number_format($row['Price']*$p_detail[0]*$row1['width']*$row1['height'],2); ?> </td>
<?php

		echo "<td width='100' align='center'><a href='testcart.php?p_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";

		echo "</tr>";
		}
 #foreach ที่สอง
	} #foreach1

	echo "<tr>";
  	echo "<td colspan='7' bgcolor='#CEE7FF' align='right'>Total</td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>";
  	echo "<b>";
  	echo  number_format($total,2);
  	echo "</b>";
  	echo "</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>

        <tr>
          <td></td>
          <td colspan="7" align="right">
            <a href="format_2.php" class="btn btn-primary">กลับไปเลือกสินค้า</a>
            <a href="testcart.php?act=Cancel-Cart" class="btn btn-danger"> ยกเลิกตะกร้าสินค้า </a>
          <a><button type="submit" name="button" id="button" class="btn btn-warning"> คำนวณราคาใหม่ </button></a>
            <a><button type="button" name="Submit2"  onclick="window.location='confirm1.php';" class="btn btn-primary">
            <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ </button></a>
            </td><td></td>
        </tr>
      </form>

    </div>
  </div>



</body>
</html>
<?php }?>
