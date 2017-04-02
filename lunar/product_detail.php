<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Product Detail</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<table width="600" border="0" align="center" class="square">
  <tr><td colspan="3" bgcolor="#CCCCCC"><b>Product</b></td></tr>
  
<?php
//connect db
    include("connect.php");
  $p_id = $_GET['p_id']; //สร้างตัวแปร p_id เพื่อรับค่า
  
  $sql = "select * from product where p_id=$p_id";  //รับค่าตัวแปร p_id ที่ส่งมา
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  //แสดงรายละเอียด
  echo "<tr>";
    echo "<td width='85' valign='top'><b>Title</b></td>";
    echo "<td width='279'>" . $row["p_name"] . "</td>";
    echo "<td width='70' rowspan='4'><img src='img/" . $row["p_pic"] . " ' width='100'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td valign='top'><b>Detail</b></td>";
    echo "<td>" . $row["p_detail"] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td valign='top'><b>Price</b></td>";
    echo "<td>" .number_format($row["p_price"],2) . "</td>";
    echo "</tr>"; 
    echo "<tr>";
    echo "<td colspan='2' align='center'>";
    echo "<a href='cart.php?p_id=$row[p_id]&act=add'><h2><span class='glyphicon glyphicon-shopping-cart'> 
    </span> เพิ่มลงตะกร้าสินค้า </a></h2>"; 
    echo "</tr>";
?>
<td>

</table>

 <br><p align="center"> <a href="product.php" class="btn btn-info">กลับไปเลือกสินค้า</a> </p></br>
</body>
</html>