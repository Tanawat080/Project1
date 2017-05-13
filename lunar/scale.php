<?php
$q = intval($_GET['q']);

$con = mysqli_connect("localhost", "root", "", "stl");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM scale where  type_ID = '".$q."' ";
$result = mysqli_query($con,$sql);

?><br>
  <label for="sel1">เลือกขนาด:</label>
  <select class="form-control" name="scale" style="width:200px" >
    <?php while($row = mysqli_fetch_array($result)){ ?>
    <option value="<?php echo $row["scale_id"]; ?>"><font size="4"><?php echo"กว้าง "; echo $row["width"]; echo" เมตร"; echo"    ยาว "; echo $row["height"];  echo" เมตร";?></font></option>
    <?php } ?>
  </select>
