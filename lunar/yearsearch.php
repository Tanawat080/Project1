<?php
include 'connectt.php';
$sql = mysqli_query($mysqli,"select * from yearr where Year like '%{$_POST['Year']}%'");

?>
<div class="col-md-12">

 <table class="table table-bordered">
 <thead>
 <tr>
 <th>NO</th>
 <th>Product</th>
 <th>Year</th>
 <th>Total</th>
 </tr>
 </thead>
 <tbody>
 <?php $i=1; while ($result = mysqli_fetch_assoc($sql)) { ?>
 <tr>
 <td><?php echo $i;?></td>
 <td><?php echo $result['Product'];?></td>
 <td><?php echo $result['Year'];?></td>
 <td><?php echo $result['Total'];?></td>
 </tr>
 <?php $i++; } ?>
 </tbody>
 </table>
</div>