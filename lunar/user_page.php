<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){

	  Header("Location: form_login.php");

}else{?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>User page</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <h1>You are Member</h1>
		
    <?php echo($_SESSION['IdNo']);?>
      <?php //session_destroy();?>
    </p>
    <p><strong>
    <a href="logout.php">Log out</a></strong></p>

</body>
</html>
<?php }?>
