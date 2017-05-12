<?php
include 'connectt.php';
$sql = mysqli_query($mysqli,"select * from permonth where Month like '
	%{$_POST['Month']}%'");

?>
<div class="col-md-12">

 <table class="table table-bordered">
 <thead>
 <tr>
 <th>Month</th>
 <th>Circulation</th>
 <th>Income</th>
 <th>%Increase</th>
 

 </tr>
 </thead>
 <tbody>
 <?php $i=1; while ($result = mysqli_fetch_assoc($sql)) { ?>
 <tr>
 <td><?php echo $i;?></td>
 <td><?php echo $result['Month'];?></td>
 <td><?php echo $result['Circulation'];?></td>
 <td><?php echo $result['Income'];?></td>
 <td><?php echo $result['%Increase'];?></td>
 </tr>
 <?php $i++; } ?>
 </tbody>
 </table>
</div>