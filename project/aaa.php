<html>
<head>
<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$strKeyword = null;

	if(isset($_POST["txtKeyword"]))
	{
		$strKeyword = $_POST["txtKeyword"];
	}
?>
<form name="frmSearch" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
  <table width="599" border="1">
    <tr>
      <th>Keyword
      <input name="txtKeyword" type="text" id="txtKeyword" value="<?php echo $strKeyword;?>">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>

<?php

$mysqli = mysqli_connect("localhost", "root", "", "slt");
$mysqli->set_charset("utf8");


   $sql = "select * from customer,`order`,order_deatail,data_status,status,product
where `order`.order_ID=order_deatail.order_ID AND
`order`.order_ID=data_status.order_ID AND
`order`.customer_ID=customer.customer_ID AND
status.status_ID=data_status.status_ID AND
product.product_ID=order_deatail.product_ID
AND customer_ID LIKE '%".$strKeyword."%'";

   $query = mysqli_query($mysqli);

?>
<table width="600" border="1">
  <tr>
    <th width="91"> <div align="center">CustomerID </div></th>
    <th width="98"> <div align="center">Name </div></th>
    <th width="198"> <div align="center">Email </div></th>
    <th width="97"> <div align="center">CountryCode </div></th>
    <th width="59"> <div align="center">Budget </div></th>
    <th width="71"> <div align="center">Used </div></th>
  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["customer_ID"];?></div></td>
    <td><?php echo $result["customer_Name"];?></td>

  </tr>
<?php
}
?>
</table>

</body>
</html>
