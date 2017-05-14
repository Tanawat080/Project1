<?php
  $improve_ID=$_GET['improve_ID'];
  include ("testdb.php");
  $strSQL ="DELETE from improve where improve_ID='".$improve_ID."'";
  $result = mysqli_query($mysqli,$strSQL);
  if($result){

		Header ("Location: menudesign.php");
	}else{
		echo 'no complete';

	}
?>
