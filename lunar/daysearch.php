<?php
include 'connectt.php';
$sql = mysqli_query($mysqli,"select * from day where Day like '%{$_POST['Day']}%'");

?>
<div class="col-md-12">

 <table class="table table-bordered">
 <thead>
 <tr>
 <th>NO</th>
 <th>orderID</th>
 <th>Day</th>
 <th>Name</th>
 <th>Price</th>
 <th>Total</th>
 </tr>
 </thead>
 <tbody>
 <?php $i=1; while ($result = mysqli_fetch_assoc($sql)) { ?>
 <tr>
 <td><?php echo $i;?></td>
 <td><?php echo $result['OrderID'];?></td>
 <td><?php echo $result['Day'];?></td>
 <td><?php echo $result['Name'];?></td>
 <td><?php echo $result['Price'];?></td>
 <td><?php echo $result['Total'];?></td>
 </tr>
 <?php $i++; } ?>
 </tbody>
 </table>
</div>