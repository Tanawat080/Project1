<html>
<body>

  <?php
    include ("testdb.php");

    $strSQL1=mysqli_query($mysqli,"select * from customer where identification_No='1841500151441'");
    $objResult1 = mysqli_fetch_array($strSQL1);
    $strSQL2=mysqli_query($mysqli,"select * from improve where customer_ID='".$objResult1['customer_ID']."'");
    echo "select * from improve where customer_ID='".$objResult1['customer_ID']."'";
    ?>

                <div class="form-group">
                  <label for="sel1">เลือกสินค้าของท่าน :</label>
                  <select class="form-control" name="scale" onchange="showUser(this.value)">
                      <?php while($objResult2 = mysqli_fetch_array($strSQL2)){
                          $strSQL3=mysqli_query($mysqli,"select * from type where type_ID='".$objResult2['type_ID']."'");
                          while($objResult3 = mysqli_fetch_array($strSQL3)){
                        ?>
                    <option value="<?php echo $objResult2["improve_ID"]; ?>"><font size="4"><?php echo"รหัสการตรวจสอบ : "; echo $objResult2['improve_ID']; echo " , ประเภท :"; echo $objResult3['type_Name'];?></font></option>
                    <?php } }?>
                  </select>
                </div>
                <div id="txtHint"></div>

  <?php?>




</body>
</html>
