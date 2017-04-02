<?php

echo '<form method="post" action="admin_session.php">';
include ("testdb.php");
$id= $_GET['product_ID'];
$sql = 'DELETE FROM `product` WHERE product_ID ="'.$id.'";';
$result = mysqli_query($mysqli,$sql);
	if($result){
		
		Header ("Location: manageproduct.php");
	}else{
		echo 'no complete';

	}

?>
