<?php
$q = intval($_GET['q']);
$p=$_GET["product_id"];
$con = mysqli_connect("localhost", "root", "", "stl");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM product,scale,type where product.type_ID = type.type_ID and type.type_ID = scale.type_ID and scale_id ='".$q."' and product_ID ='".$p."'   ";
$result = mysqli_query($con,$sql);


$row = mysqli_fetch_array($result);

    echo "ราคารวม : ".number_format($row['width']*$row['height']*$row['Price'],2)." บาท";
  echo "<HR>";

mysqli_close($con);
?>
