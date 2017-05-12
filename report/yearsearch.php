<?php
include 'connectt.php';
$sql = mysqli_query($mysqli,"select * from peryear where Company like '%{$_POST['Company']}%'");

?>
<div class="col-md-12">

 <table class="table table-bordered">
 <thead>
 <tr>
 <th>NO</th>
 <th>Company</th>
 <th>2012</th>
 <th>2013</th>
 <th>2014</th>
 <th>2015</th>
 <th>2016</th>
 <th>2017</th>
 <th>Total</th>
 </tr>
 </thead>
 <tbody>
 <?php $i=1; while ($result = mysqli_fetch_assoc($sql)) { ?>
 <tr>
 <td><?php echo $i;?></td>
 <td><?php echo $result['Company'];?></td>
 <td><?php echo $result['2012'];?></td>
 <td><?php echo $result['2013'];?></td>
 <td><?php echo $result['2014'];?></td>
 <td><?php echo $result['2015'];?></td>
 <td><?php echo $result['2016'];?></td>
 <td><?php echo $result['2017'];?></td>
 <td><?php echo $result['Total'];?></td>
 </tr>
 <?php $i++; } ?>
 </tbody>
 </table>
</div>