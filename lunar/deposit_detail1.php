<html>
<body>
<?php
$q = intval($_GET['q']);
$customer_ID=$_GET['customer_ID'];

$mysqli = mysqli_connect("localhost", "root", "", "stl");
$mysqli->set_charset("utf8");
if (!$mysqli) {
    die('Could not connect: ' . mysqli_error($mysqli));
}

mysqli_select_db($mysqli,"ajax_demo");
#------------
$strSQL1=mysqli_query($mysqli,"select * from customer,product,`order`,order_deatail,data_status,status
          where `order`.order_ID=order_deatail.order_ID AND
          `order`.order_ID=data_status.order_ID AND
          `order`.customer_ID=customer.customer_ID AND
          order_deatail.product_ID=product.product_ID AND
          status.status_ID=data_status.status_ID AND
          customer.customer_ID='".$customer_ID."'AND
          `order`.order_ID='".$q."'");
          $objResult1 = mysqli_fetch_array($strSQL1);

$strSQL3=mysqli_query($mysqli,"select SUM(deposit_cost) as sumdeposit from deposit
                                                    where order_ID='".$q."'");


$objResult3 = mysqli_fetch_array($strSQL3);
$equal = $objResult1["total_cost"]-$objResult3["sumdeposit"];

#---------------
$sql="SELECT * FROM `order` where  order_ID ='".$q."' and customer_ID='".$customer_ID."'";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($result);


?>
<HR>
<label for="ex3">ชื่อ-สกุล : </label>
<label for="ex3"><?=$objResult1["customer_Name"];?> </label>
<br>

<label for="ex3">รหัสการสั่งซื้อที่ : </label>
<label for="ex3"><?php echo $objResult1["order_ID"];?></label>
<br>

<label for="ex3">ราคารวม : </label>
<label for="ex3"><?php echo $objResult1["total_cost"];?></label>
<br>

 <label for="ex3">จ่ายแล้ว : </label>
 <label for="ex3"><?php echo $objResult3["sumdeposit"];?></label>

 <label for="ex3">            คงเหลือ : </label>
 <label for="ex3"><?php echo $equal;?></label>
<br>

<label for="ex3">วันที่สั่งซื้อ : </label>
<label for="ex3"><?php echo $objResult1["order_Date"];?></label>
<br>

<label for="ex3">วันที่ลงพื้นที่สำรวจ : </label>
<label for="ex3"><?php echo $objResult1["locate_Date"];?></label>
<br>

<label for="ex3">วันที่ติดตั้ง :</label>
<label for="ex3"><?php echo $objResult1["setup_Date"];?></label>
<br>

<label for="ex3">สถานะ : </label>
<label for="ex3"><?php echo $objResult1["status_status"];?></label>

<br>
<strong><font color="red"><a href="payment_p.php">แจ้งการชำระเงินที่นี่!</a></font></strong>

<?php
mysqli_close($mysqli);
?>

</body>
</html>
