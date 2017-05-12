<html>
<body>
<?php
$q = 21;
$customer_ID=1;

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
echo "select * from customer,product,`order`,order_deatail,data_status,status
          where `order`.order_ID=order_deatail.order_ID AND
          `order`.order_ID=data_status.order_ID AND
          `order`.customer_ID=customer.customer_ID AND
          order_deatail.product_ID=product.product_ID AND
          status.status_ID=data_status.status_ID AND
          customer.customer_ID='".$customer_ID."'AND
          `order`.order_ID='".$q."'";
$strSQL3=mysqli_query($mysqli,"select SUM(deposit_cost) as sumdeposit from customer,product,`order`,order_deatail,data_status,status,deposit
                                                    where `order`.order_ID=order_deatail.order_ID AND
                                                    `order`.order_ID=data_status.order_ID AND
                                                    `order`.customer_ID=customer.customer_ID AND
                                                    order_deatail.product_ID=product.product_ID AND
                                                    status.status_ID=data_status.status_ID AND
                                                    `order`.order_ID=deposit.order_ID AND
                                                      customer.customer_ID='".$customer_ID."'
                                                    and `order`.order_ID='".$q."'");


$objResult3 = mysqli_fetch_array($strSQL3);
$equal = $objResult1["total_cost"]-$objResult3["sumdeposit"];

#---------------
$sql="SELECT * FROM `order` where  order_ID ='".$q."' and customer_ID='".$customer_ID."'";
$result = mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($result);


?>
<HR>
<label for="ex3">ชื่อ-สกุล : </label>
<input class="form-control"  name="customer_Name" type="text" value="<?=$objResult1["customer_Name"];?>" disabled>

<label for="ex3">รหัสที่สั่งซื้อที่ : </label>
<input class="form-control" name="product_Name" type="text" value="<?=$objResult1["order_ID"];?>" disabled>

<label for="ex3">ราคารวม : </label>
 <input class="form-control"  name="totalcost" type="text" value="<?=$objResult1["total_cost"];?>" disabled>

 <label for="ex3">จ่ายแล้ว : </label>
 <input class="form-control" name="deposit_cost" type="text" value="<?=$objResult3["sumdeposit"];?>" disabled>
 <label for="ex3">คงเหลือ : </label>
 <input class="form-control"  name="locate_Date" type="text" value="<?=$equal;?>" disabled>

<label for="ex3">วันที่สั่งซื้อ : </label>
<input class="form-control" name="order_Date" type="text" value="<?=$objResult1["order_Date"];?>" disabled>

<label for="ex3">วันที่ลงพื้นที่สำรวจ : </label>
<input class="form-control"  name="locate_Date" type="text" value="<?=$objResult1["locate_Date"];?>" disabled>

<label for="ex3">วันที่ติดตั้ง : ปปปป-ดด-วว </label>
<input class="form-control"  name="setup_Date" type="text" value="<?=$objResult1["setup_Date"];?>" disabled>

<label for="ex3">สถานะ : </label>
<input class="form-control" name="status" type="text" value="<?=$objResult1["status_status"];?>" disabled>

<?php
mysqli_close($mysqli);
?>

</body>
</html>
