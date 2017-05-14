<?php

echo '<form method="post" action="admin_session.php">';
include ("testdb.php");
$id= $_GET['accessory_ID'];
$sql = 'DELETE FROM `accessory` WHERE accessory_ID ="'.$id.'";';
$result = mysqli_query($mysqli,$sql);
	if($result){

		Header ("Location: manageproduct.php");
	}else{
		echo 'no complete';

	}

?>
