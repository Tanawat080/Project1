<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="home2.css">
    <title></title>
  </head>


  <body>
      <center>
          <div class="figure"><a href="door.php"><img src="img/door.jpg" width="140"height="110" alt="Eiffel tower"><br>ประตูสแตนเลส</a></div>
          <div class="figure"><a href="door.php"><img src="img/window.jpg" width="140"height="110" alt="Eiffel tower"><br>หน้าต่างสแตนเลส</a></div>
          <div class="figure"><a href="door.php"><img src="img/รั้ว.jpg" width="140"height="110" alt="Eiffel tower"><br>ร้้วสแตนเลส</a></div>
          <div class="figure"><a href="door.php"><img src="img/ราวบันได.jpg" width="140"height="110" alt="Eiffel tower"><br>ราวบันไดสแตนเลส</a></div>
          <div class="figure"><a href="door.php"><img src="img/ราวระเบียง.jpg" width="140"height="110" alt="Eiffel tower"><br>ราวระเบียงสแตนเลส</a></div>
          <div class="figure"><a href="door.php"><img src="img/กันสาด.jpg" width="140"height="110" alt="Eiffel tower"><br>กันสาด,หลังคา</a></div>
          <div class="figure"><a href="door.php"><img src="img/หลังคาโรงรถ.jpg" width="140"height="110" alt="Eiffel tower"><br>หลังคาโรงจอดรถ</a></div>
          <div class="figure"><a href="door.php"><img src="img/เหล็กแหลม.jpg" width="140"height="110" alt="Eiffel tower"><br>เหล็กแหลมบนกำแพง</a></div>
          <div class="figure"><a href="door.php"><img src="img/asser.jpg" width="140"height="110" alt="Eiffel tower"><br>อื่นๆ</a></div>

          <div class="figure"><a href="type<?php echo $objResult["type_ID"];?>.php"><img src="img/door.jpg" width="140"height="110" alt="Eiffel tower"><br><?php echo $objResult["type_Name"];?></a></div>
      <center>

    </body>
</html>
