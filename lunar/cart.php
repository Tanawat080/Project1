<?php
	session_start();
	
	$p_id = $_REQUEST['p_id']; 

	$act = $_REQUEST['act'];


	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-7">
<form id="frmcart" name="frmcart" method="post" action="?act=update">
  <table width="600" border="0" align="center" class="table table-hover">
    <tr>
      <center><td colspan="5" bgcolor="#CCCCCC">
      <center><img src="z1.png" alt="..."><b>ตะกร้าสินค้า</span></td></center>
    </tr>
    </tr>
    <tr>
      <td bgcolor="#EAEAEA">สินค้า</td>
      <td align="center" bgcolor="#EAEAEA">ราคา</td>
      <td align="center" bgcolor="#EAEAEA">จำนวน</td>
      <td align="center" bgcolor="#EAEAEA">รวม(บาท)</td>
      <td align="center" bgcolor="#EAEAEA">ลบ</td>
    </tr>


<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("connect.php");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select * from product where p_id=$p_id";
		$query = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['p_price'] * $qty;
		$total += $sum;
		echo "<tr>";
		echo "<td width='334'>" . $row["p_name"] . "</td>";
		echo "<td width='46' align='right'>" .number_format($row["p_price"],2) . "</td>";
		echo "<td width='57' align='right'>";  
		echo "<input type='text' name='amount[$p_id]' value='$qty' size='2'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='100' align='center'><a href='cart.php?p_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='3' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}
?>
<tr>

          <td></td>
          <td colspan="5" align="right">
          <button type="submit" name="button" id="button" class="btn btn-warning"> คำนวณราคาใหม่ </button>
            <button type="button" name="Submit2"  onclick="window.location='confirm.php';" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ </button>
            </td>
        </tr>
      
</td>
</tr>
</table>
</form>

      <p align="center"> <a href="product.php" class="btn btn-primary">กลับไปเลือกสินค้า</a> </p>
</body>
</html>