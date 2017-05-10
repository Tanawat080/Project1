<html>
<body>
  <form name="" action="a.php">
<?php
$q = intval($_GET['q']);

$con = mysqli_connect("localhost", "root", "", "stl");
$con->set_charset("utf8");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM improve,type where improve.type_ID = type.type_ID and improve_ID ='".$q."'";
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
<iframe src="self/<?php echo $row["improve_IMG"];?>" type=frame&vlink=xx&link=xx&css=xxx&bg=xx&bgcolor=xx marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scorlling=yes width=500 height=600></iframe>
<br>
<?php
  if($row['status_ip_ID']==2){ ?>
  <br><button class="button" type="submit">ยืนยันการสั่งซื้อ</button><br>
  <HR>
  <?php }else {
    echo '<h3><font color="red">';
    echo "ยังไม่ทำการตรวจสอบราคาจากทางร้าน";
    echo '</font></h3>';
  }

 ?>


<?php
mysqli_close($con);
?>
</form>
</body>
</html>
