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

  xmlhttp.open("GET","showselfdesign.php?q="+str,true);
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

<div class="container">
<body>


<form  method="post" action="a.php"><center>
	<table width="1000" border="1">
  <tr>

  <th width="150"> <div align="center">รหัสการตรวจสอบ</div></th>
  <th width="300"> <div align="center">ชื่อลูกค้า</div></th>
  <th width="300"> <div align="center">ประเภทสินค้า</div></th>
  <th width="120"> <div align="center">ราคา</div></th>
   <th width="120"> <div align="center">สถานะ</div></th>
  </tr>
 				 <?php
 					 include ("testdb.php");
 					 $strSQL = mysqli_query($mysqli,"select * from improve,type,status_improve,customer
 					 																 where improve.type_ID = type.type_ID and improve.customer_ID=customer.customer_ID
 																					 and improve.status_ip_ID = status_improve.status_ip_ID ");
 	while($objResult = mysqli_fetch_array($strSQL)){
 				 ?>
 				 <tr>
 				<td border="0"><center><a href="owner_improve2.php?improve_ID=<?php echo $objResult["improve_ID"];?>"><?php echo $objResult["improve_ID"];?></a></center></td>
 				 <td><center><?php echo $objResult["customer_Name"];?></center></td>
 				 <td><center><?php echo $objResult["type_Name"];?></center></td>
 				 <td><center><?php echo number_format($objResult["improve_Price"],2);?></center></td>
 				 <td><center><?php echo $objResult["status_ip"];?></center></td>

 		</tr>
 		<?php
 		}

 		?>
<?php
include ("testdb.php");

$strSQL1=mysqli_query($mysqli,"select * from customer where identification_No='".$_SESSION['IdNo']."'");
$objResult1 = mysqli_fetch_array($strSQL1);
$strSQL2=mysqli_query($mysqli,"select * from improve where customer_ID='".$objResult1['customer_ID']."'");
$strSQLT=mysqli_query($mysqli,"select * from improve where customer_ID='".$objResult1['customer_ID']."'");

$resultis= mysqli_fetch_array($strSQLT);
if (isset($resultis)) {

?>

            <div class="form-group">

              <label for="sel1">เลือกรหัสการตรวจสอบของท่าน :</label>
              <select class="form-control" name="scale" onchange="showUser(this.value)">

                  <?php while($objResult2 = mysqli_fetch_array($strSQL2)){
                      $strSQL3=mysqli_query($mysqli,"select * from type where type_ID='".$objResult2['type_ID']."'");
                      while($objResult3 = mysqli_fetch_array($strSQL3)){
                    ?>
                <option value="<?php echo $objResult2["improve_ID"]; ?>"><font size="4"><?php echo"รหัสการตรวจสอบ : "; echo $objResult2['improve_ID']; echo " , ประเภท :"; echo $objResult3['type_Name'];?></font></option>
                <?php } }?>
              </select>
            </div>
<?php }else {
  echo "ไม่มีรายการสินค้าที่คุณออกแบบด้วยตนเอง";
}


?>
            <div id="txtHint"></div>

<?php?>








</form>
</body>
</html>
<?php }?>
