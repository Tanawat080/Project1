<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<html>
    <head> <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
        <title>STL Creative</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<link rel="stylesheet" href="home2.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        }h1{
          font-family: "TH SarabunPSK";
          font-size: 50px;
        }
        div.d{
          font-family: "TH SarabunPSK";
          font-size: 20px;
        }
        </style>


        <style>.button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 5px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .button1 {width: 250px;}
        .button2 {width: 50%;}
        .button3 {width: 25%;}
        </style>


    </head>

    <body>
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
						<li class="dropdown">
			        <a class="dropdown-toggle" data-toggle="dropdown" href="#">รายงาน
			        <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			          <li><a href="incomeday1.php">รายรับรายวัน</a></li>
			          <li><a href="incomemonth.php">รายรับรายเดือน</a></li>
			          <li><a href="incomeyear.php">รายรับรายปี</a></li>
								  <li><a href="vatt.php">รายรับรายปี(รวมภาษี)</a></li>
								</ul>
							</li>
							<form class="navbar-form navbar-left" method="post" action="search_product_owner1.php">
							<div class="form-group">
								<input type="text" name="search"class="form-control" placeholder="ค้นหา เช่น (ตู้จดหมาย,ประตูด้านนอก)">
							</div>
							<button type="submit" class="btn btn-default">ค้นหา</button>

						</form>
			</ul>
			</div>
			</nav>
      <div align="right" class="d" >
      <table  width="12%" hight="10%" border="1">
      	<tr  bgcolor="#FCCCCF">
      		<td>
      			<div class="d">ชื่อผู้ใช้ :
      			<?php echo($_SESSION['IdNo']); ?>
      			<?php //session_destroy();?>
      			<strong><a href="logout.php">Log out</a></strong>
            </div>
      		</td>
      	</tr>
      </table>
      </div>

<!--###################################################################################################
#################################################################33
#########################################3

3#
33-->

  <form  class="form-inline" name="form1" method="post" action="contact2.php" enctype="multipart/form-data">
    <?php
    include ("testdb.php");
    $strSQL = mysqli_query($mysqli,"SELECT * FROM contact");
    $objResult = mysqli_fetch_array($strSQL);
    ?>

    <div class="container">
      <center>
          <h1> จัดการข้อมูลร้าน</h1><br>
          <label for="ex3">ชื่อร้าน : </label>
          <input class="form-control" id="name" name="name" type="text" value="<?php echo $objResult["company_Name"];?>">
          <br><br>
					<label for="ex3">ที่อยู่ : </label>
          <textarea class="form-control" id="address" cols="50" rows="3" name="address" type="text"><?=$objResult["company_Address"];?></textarea>
        <br><br>
				<label for="ex3">เบอร์โทรศัพท์ : </label>
          <input class="form-control" id="tel" type="text" maxlength="10" name="tel" value="<?=$objResult["company_tel"];?>" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';} " >
      <br>  <br>
			<label for="ex3">แฟกซ์ : </label>
          <input class="form-control" id="fax" type="text" name="fax" maxlength="9" value="<?=$objResult["company_Fax"];?>" onKeyUp="if(isNaN(this.value)){ alert('กรุณากรอกตัวเลข'); this.value='';}" >
      <br>  <br>
			<label for="ex3">อีเมลล์ : </label>
          <input class="form-control" id="email" name="email" type="text" value="<?=$objResult["company_Email"];?>" >
      <br>  <br>
			<label for="ex3">เวลาทำการ : </label>
          <input class="form-control" id="hourBussiness" name="BH" type="text" value="<?=$objResult["business_Hour"];?>">
      <br><br>
<button class="button button3">ตกลง</button></center>
</div>
</form>
</body>
</html>
<?php }?>
