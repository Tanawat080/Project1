<?php
include 'connectt.php';
$sql = mysqli_query($mysqli,"select * from perday where orderDate like '%{$_POST['orderDate']}%'");

?>
<div class="col-md-12">

 <table class="table table-bordered">
 <thead>
 <tr>
 <th>orderID</th>
 <th>orderDate</th>
 <th>Total</th>
 <th>CustomerID</th>
 
 </tr>
 </thead>
 <tbody>
 <?php $i=1; while ($result = mysqli_fetch_assoc($sql)) { ?>
 <tr>
 <td><?php echo $i;?></td>
 <td><?php echo $result['OrderID'];?></td>
 <td><?php echo $result['orderDate'];?></td>
 <td><?php echo $result['Total'];?></td>
 <td><?php echo $result['CustomerID'];?></td>
 
 </tr>
 <?php $i++; } ?>
 </tbody>
 </table>
</div>