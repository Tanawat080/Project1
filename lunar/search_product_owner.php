<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="home2.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<style>
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
</style>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="adminpage.php">บ้านสุรพล สแตนเลส</a>
    </div>
    <ul class="nav navbar-nav">
			<li ><a href="adminpage.php">หน้าหลัก</a></li>
			<li ><a href="manageproduct.php">จัดการข้อมูลสินค้า</a></li>
			<li><a href="contact1.php">จัดการข้อมูลร้าน</a></li>

			<li><a href="manage_order.php">จัดการสถานะการสั่งซื้อ</a></li>
			<li><a href="view_customer.php">ข้อมูลลูกค้า</a></li>
			<li><a href="#">รายงาน</a></li>
    </ul>
		<form class="navbar-form navbar-left" method="post" action="search_product.php">
		<div class="form-group">
			<input type="text" name="search"class="form-control" placeholder="ค้นหา เช่น (ตู้จดหมาย,ประตูด้านนอก)">
		</div>
		<button type="submit" class="btn btn-default">ค้นหา</button>

	</form>
	  </div>
</nav>

<div align="right" class="a">
<table  width="12%" hight="10%" border="1">
	<tr  bgcolor="#FCCCCF">
		<td>
			ชื่อผู้ใช้ :
			<?php echo($_SESSION['IdNo']);?>
			<?php //session_destroy();?>
			<strong><a href="logout.php">Log out</a></strong>
		</td>
	</tr>
</table>
</div>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lightbox JS v2.0 | Test Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />

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


	</style>

</head>
<body>
  <?php
  include 'testdb.php';
	$strSQL = mysqli_query($mysqli,"SELECT * FROM product,type where product.type_ID=type.type_ID and product_Name like '%".$_POST["search"]."%'");
  $SQL = "SELECT * FROM product,type where product.type_ID=type.type_ID and product_Name like '%".$_POST["search"]."%'";
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
          <input type="hidden" name="type_ID" value="<?php echo $objResult["product_ID"];?>">
            <font face="TH SarabunPSK" color="green" size="4"><B><?php echo $objResult["product_Name"];?></B></font>
            <center><a href="pic/<?php echo $objResult["product_IMG"];?>"rel="lightbox[food]"><img src="pic/<?php echo $objResult["product_IMG"];?>" width="140" height="110" border="0" /></a></center>
            <font size = "4"><?php echo $objResult["Description"];?></font><br>
        
      </div>
<?php
}
 }
 ?>
</form>


  </body>
</html>
</html>
<?php }?>
