<?php
include 'connectt.php';
$sql = mysqli_query($mysqli,"select * from `order` where YEAR(order_Date) = '".$_POST['Year']."'");

?>
<div class="col-md-12">
<h2>รายรับรายปี</h2>
  <table class="table table-bordered">
  <thead>
  <tr>
  <th>รหัสการสั่งซื้อ</th>
  <th>วันที่</th>
  <th>ยอดการสั่งซื้อ(บาท)</th>

  </tr>
  </thead>
  <tbody>
  <?php
  $total =0;
   while ($result = mysqli_fetch_array($sql)) {
    $total += $result['total_cost'];
    ?>
  <tr>

  <td><?php echo $result['order_ID'];?></td>
  <td><?php echo $result['order_Date'];?></td>
  <td><?php echo number_format($result['total_cost'],2);?></td>


  </tr>
  <?php  } ?>
 <td>รวมยอดการสั่งซื้อ </td>
 <td></td>
 <td><?php echo number_format($total,2);?></td>
  </tbody>
  </table>
</div>
