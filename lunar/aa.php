<?php
    error_reporting( error_reporting() & ~E_NOTICE );
    session_start();
    $p_id = $_REQUEST['p_id'];
	$act = $_REQUEST['act'];

	if($act=='add' && !empty($p_id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{

			$_SESSION['shopping_cart']=array();
		}else{

		}
		if(isset($_SESSION['shopping_cart'][$p_id]))
		{
			$_SESSION['shopping_cart'][$p_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['shopping_cart'][$p_id]=$amount;
		}
	}
	?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>STL CREATIVE</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>STL CREATIVE</title>

<!-- Bootstrap -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">


  </head>
  <body>
<div class="container">
      <div class="row">
        <div class="col-md-12">
            <h3 align="center"> Show Product </h3>
        </div>
    </div>
</div>  


<!-- show product -->
<div class="container">
    <div class="row">
  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="d.jpg" alt="...">
      <div class="caption">
        <h3>50บาท</h3>
        <p>รั้วบ้าน </p>
        <p>
        <a href="cartt.php" class="btn btn-primary" role="button">
        สั่งซื้อ
        </a> 
        <a href="product_detail.php" class="btn btn-default" role="button">
        รายละเอียดสินค้า</a></p>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="e.jpg" alt="...">
      <div class="caption">
        <h3>52000บาท</h3>
        <p>บันได </p>
        <p>
        <a href="#" class="btn btn-primary" role="button">
        สั่งซื้อ
        </a> 
        <a href="#" class="btn btn-default" role="button">
        รายละเอียดสินค้า</a></p>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="wi.jpg" alt="...">
      <div class="caption">
        <h3>13000บาท</h3>
        <p>รั้ว</p>
        <p>
        <a href="#" class="btn btn-primary" role="button">
        สั่งซื้อ
        </a> 
        <a href="#" class="btn btn-default" role="button">
        รายละเอียดสินค้า</a></p>
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-6 col-md-3">
    <div class="thumbnail">
      <img src="q.jpg" alt="...">
      <div class="caption">
        <h3>50000บาท</h3>
        <p>ระเบียง </p>
        <p>
        <a href="#" class="btn btn-primary" role="button">
        สั่งซื้อ
        </a> 
        <a href="#" class="btn btn-default" role="button">
        รายละเอียดสินค้า</a></p>
      </div>
    </div>
  </div>
</div>

</div>




 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>