<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>STL Creative</title>
  <meta charset="utf-8">
    <link href="h.css" rel="stylesheet" >
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script>

function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }

  xmlhttp.open("GET","scale.php?q="+str,true);
  xmlhttp.send();
}
</script>

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
}div.transbox
	{
		color: #FFFFFF;
	}

            }.button {
              background-color: #838B83; /* Green */
              border: none;
              color: white;
              padding: 10px 100px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 18px;
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
              }.container input{
              	font-family: "TH SarabunPSK";
              font-size: 20px;
              }input, select {
    font-size: 12px;
    padding: 2px;
}
input:required {
    border: 2px inset #F0E68C;
}
input[type='date'] {
    height: 16px;
}
input[type='range'] {
    position: relative;
    bottom: -5px;
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
      <a class="navbar-brand" >บ้านสุรพล สแตนเลส</a>
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
    <!-- ################################################################################################ -->
  </header>

<div class="container" >
<body>
<form  method="post" action="designSubmit.php" enctype="multipart/form-data"><center>

<h1> อัพโหลดรูปภาพสำหรับ การออกแบบด้วยตัวเอง </h1>
    <label for="idPD">เลือกประเภท : </label><div class="form">
			<select class="form-control" name="type" style="width:200px"; onchange="showUser(this.value)">

				                  <?php include ("testdb.php");
				            $strSQL = mysqli_query($mysqli,"SELECT * FROM type");
			                while($objResult = mysqli_fetch_array($strSQL)){
			                    ?>
			                <option value="<?php echo $objResult["type_ID"];?>"><?php echo $objResult["type_Name"]; ?></option>
			                <?php } ?>
			              </select>


  <div class="form-group">
      <div id="txtHint"></div>
</div>
        <label for="des">รายละเอียดเพิ่มเติม : </label>
        <font ><textarea class="form-control" rows="5"  style="width:300px"; name="description" placeholder="รายละเอียดเพิ่มเติม"></textarea></font>
        <font color="red" ><label for="des">** กรุณาระบุรายละเอียดอย่างชัดเจน ** </label></font>
        <br><label for="des">เลือกรูป : </label>
        <input type="file" class="form-control" id="fileUpload1" name="fileUpload1" style="width:300px";  ><br>
        <button class="button" type="submit">ตกลง</button></center>
</center>


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
</body>
</html>
<?php }?>
