<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    session_start();

?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Confirm</title>
</head>
<body>
<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php

include ('testdb.php');
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
	$name = $_POST["name"];
  $customerID=$_POST["customer_ID"];
	$address = $_POST["address"];
	$phone = $_POST["tel"];
	$p_qty = $_POST["$p_detail"];
	$total = $_POST['total'];
	$order_date = date("Y-m-d");
  $lat=$_POST['lat_value'];
  $lon=$_POST['lon_value'];
  $landmark=$_POST['landmark'];
  $date=$_POST['date'];
  $status = 1;


	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($mysqli,"BEGIN");
	$sql1 = "INSERT  INTO `order` VALUES
	(
    '$order_date',
    '$total',
    '$customer_ID'
	)";

	$query1	= mysqli_query($mysqli, $sql1) or die ("Error in query: $sql1" . mysql_error());


	$sql2 = "SELECT MAX(order_id) AS order_id FROM order ";
	$query2	= mysql_db_query($database_condb, $sql2);
	$row = mysql_fetch_array($query2);
	$order_id = $row['order_ID'];


	foreach($_SESSION['shopping_cart'] as $p_id=>$p_detail)
	{
    $strSQL1 = mysqli_query($mysqli,"SELECT * FROM scale WHERE scale_id='".$p_detail[1]."';");
    $row4 = mysqli_fetch_array($strSQL1);
		$sql3	= "SELECT * FROM product where product_ID=$p_id";
		$query3 = mysql_db_query($database_condb, $sql3);
		$row3 = mysqli_fetch_array($query3);
		$total=$row3['p_price']*$p_detail[0]*$row4['width']*$row4['height'];

		$sql4	= "INSERT INTO  order_detail
		values(
		'$p_id',
		'$p_detail[0]',
		'$total',
    '$lat',
    '$lon',
    '$landmark',
    '$address',
    '$order_id',
  )";

		$query4	= mysqli_query($mysqli, $sql4);
    $sql5="INSERT INTO  data_status
		values(
		'$date',
		'$status',
    '$order_id',
  )";
  $query5	= mysqli_query($mysqli, $sql5);

	}



	if($query1 && $query4 && $query5){
		mysqli_query($mysqli, "COMMIT");
		$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['shopping_cart'] as $p_id)
		{
			unset($_SESSION['shopping_cart']);
		}
	}
	else{
		mysqli_query($mysqli, "ROLLBACK");
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
	}


?>


<script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='index.php';
</script>



</body>
</html>
