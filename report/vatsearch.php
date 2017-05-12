<?php
include 'connectt.php';
$sql = mysqli_query($mysqli,"select * from vat where NO like '%{$_POST['NO']}%'");

?>
<div class="col-md-12">

 <table class="table table-bordered">
 <thead>
 <tr>
 <th>NO</th>
 <th>Circulation</th>
 <th>vat</th>
 <th>Total</th>
 </tr>
 </thead>
 <tbody>
 <?php $i=1; while ($result = mysqli_fetch_assoc($sql)) { ?>
 <tr>
 <td><?php echo $i;?></td>
 <td><?php echo $result['Circulation'];?></td>
 <td><?php echo $result['vat'];?></td>
 <td><?php echo $result['Total'];?></td>
 </tr>
 <?php $i++; } ?>
 </tbody>
 </table>
</div>