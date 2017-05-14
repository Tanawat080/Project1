<html>
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
              }font{
	                font-family: "TH SarabunPSK";
	              }div.transbox
								  {
										color: #FFFFFF;
								  }


</style>
<body>
  <form name="" method="post" >
<?php
$q = intval($_GET['q']);

$con = mysqli_connect("localhost", "root", "", "stl");
$con->set_charset("utf8");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM improve,type,scale where improve.type_ID = type.type_ID and scale.scale_id=improve.scale_id and improve_ID ='".$q."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

$sql2="select * from status_improve where status_ip_ID='".$row['status_ip_ID']."'";
$result2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_array($result2);

$sql3="select * from type where type_ID='".$row['type_ID']."'";
$result3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_array($result3);


?>
<HR>

  <input type="hidden" name="improve_ID" value="<?php echo $q;?>">
  <input type="hidden" name="improve_Price" value="<?php echo $row["improve_Price"];?>">
  <input type="hidden" name="customer_ID" value="<?php echo $row["customer_ID"];?>">
  <input type="hidden" name="Price" value="<?php echo $row["improve_Price"];?>">



  <font font-family: "TH SarabunPSK" color="Green"><h3><?php echo $row2["status_ip"];?></h3></font>
  ประเภท : <?php echo $row3["type_Name"];?> <br>
  ขนาด : <?php echo$row['width'];?> X <?php echo$row['height']?> ตารางเมตร<br>
  ราคา : <?php if(!$row["improve_Price"]){
    echo "ยังไม่ประเมินราคา";
  }else{
    echo $row["improve_Price"];
  }?><br>
  รายละเอียดเพิ่มเติม : <?php echo$row['improve_Description'];?><br>
<HR>
รูปภาพ <br>
<div style="border:1px solid black; width:700px;
height:100%; background:#FFFFFF; ">
 <center><iframe src="self/<?php echo $row["improve_IMG"];?>" type=frame&vlink=xx&link=xx&css=xxx&bg=xx&bgcolor=xx marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scorlling=yes width=700 height=600></iframe>
</div><br>
<?php
  if($row['status_ip_ID']==2){ ?>
    <div class="form-inline">
  <br>จำนวน : <input class="form-control" name="amount" value="">
</div>
  <br><button  class="button" type="submit">ยืนยันการสั่งซื้อ</button><br>
  <HR>
  <?php }else if($row['status_ip_ID']==3){ ?>

    <div class="form-inline">
      <a href="newDesign.php?improve_ID=<?php echo $q;?>">ออกแบบใหม่</a> |||
      <a href="improveDelete.php?improve_ID=<?php echo $q;?>">ยกเลิก</a>

  </div>
  <br>
    <HR>
<?php  } else {

  }

 ?>


<?php
mysqli_close($con);
?>
</form>
</body>
</html>
