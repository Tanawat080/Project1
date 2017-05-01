<html>
<head>
</head>
<body>


  <body>
  </html>
<?php
  $width=$_POST['width'];
  $height=$_POST['height'];
  $price=$_POST['Price'];

 $totalprice=$width*$height*$price;

 		echo "<script language=\"JavaScript\">";
 		echo "alert('ราคารวม $totalprice บาท');";
    echo "</script>";

?>
