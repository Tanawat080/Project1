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
    <link href="h.css" rel="stylesheet" >
  <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<script>
$.urlParam = function(name){
		 var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		 return results[1] || 0;
 }
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
	var a = $.urlParam("customer_ID");
	xmlhttp.open("GET","deposit_detail1.php?q="+str+"&customer_ID="+a,true);
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


	<body>
<center>		<form method="post" >
	<div class="container">
		<?php
				//*** Insert Record ***//
				include ("testdb.php");
				?>
						<div class="form-group">
							<label for="sel1">เลือกรหัสการสั่งซื้อของท่าน :</label>
							<select style="width:300px"; class="form-control" name="order" onchange="showUser(this.value)">

									<?php
										$strSQL = mysqli_query($mysqli,"SELECT * FROM `order`,customer where `order`.customer_ID = customer.customer_ID and `order`.customer_ID = '".$_GET['customer_ID']."' GROUP BY order_ID;");
															while($objResult = mysqli_fetch_array($strSQL)){
										?>
								<option style="width:300px"; value="<?php echo $objResult['order_ID']; ?>"><?php echo"รหัสการสั่งซื้อที่ : "; echo $objResult['order_ID']; ?></option>
								<?php }  ?>
							</select>
						</div>

						<div id="txtHint"></div>

	</div>

	</form>
	</body></html>
<?php }?>
