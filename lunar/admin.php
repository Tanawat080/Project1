<?php session_start();?>
<?php

if (!$_SESSION["IdNo"]){  //check session

	  Header("Location: form_login.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form

}else{?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="admin.php">บ้านสุรพล สแตนเลส</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="admin.php">หน้าหลัก</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">จัดการข้อมูล<span class="caret"></span></a>
      <ul class="dropdown-menu">
			
      <li><a href="insert1.php">เพิ่มข้อมูล</a></li>
      <li><a href="#">แก้ไขข้อมูล</a></li>
      <li><a href="#">ลบข้อมูล</a></li>
    </ul>
      <li><a href="contact1.php">แก้ไขข้อมูลร้าน</a></li>
      <li><a href="#">รายงาน</a></li>
      <li><a href="#">จัดการสถานะลูกค้า</a></li>
    </ul>
	  </div>
</nav>


<table  width="12%" hight="10%" border="1">
	<tr  bgcolor="#FCCCCF">
		<td>
			ชื่อผู้ใช้ :
			<?php echo($_SESSION['IdNo']);?>
			<?php //session_destroy();?>
			<strong><a href="logout.php">Log out</a></strong>
		</td>
	</tr>
</table>
</body>
</html>
<?php }?>
