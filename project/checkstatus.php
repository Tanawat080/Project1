
<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "select * from customer,product,`order`,order_deatail,data_status,status
where `order`.order_ID=order_deatail.order_ID AND
`order`.order_ID=data_status.order_ID AND
`order`.customer_ID=customer.customer_ID AND
order_deatail.product_ID=product.product_ID AND
status.status_ID=data_status.status_ID AND
customer_Name LIKE '%".$valueToSearch."%'
";
    $search_result = filterTable($query);

}
 else {
    $query = "select * from customer,product,`order`,order_deatail,data_status,status
where `order`.order_ID=order_deatail.order_ID AND
`order`.order_ID=data_status.order_ID AND
`order`.customer_ID=customer.customer_ID AND
order_deatail.product_ID=product.product_ID AND
status.status_ID=data_status.status_ID ";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "stlcreative");
    $connect->set_charset("utf8");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>SEARCH</title>
        <style>
        body{
          font-family:"TH SarabunPSK";
          }
          table,tr,th,td{
                border: 1px solid #BEBEBE;
                font-family: "TH SarabunPSK";
            }
            tr{
              font-family: "TH SarabunPSK";
              font-size: 22px;

            }
            .button{
              background-color: #4CAF50; /* Green */
              border: none;
              color: white;
              padding: 8px 20px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-family: "TH SarabunPSK"
              font-size: 13px;
              margin: 4px 2px;
              -webkit-transition-duration: 0.4s; /* Safari */
              transition-duration: 0.4s;
              cursor: pointer;
            }
            .button4 {
              background-color: white;
              color: black;
              border: 2px solid #e7e7e7;
            }
            .button4:hover {background-color: #e7e7e7;}
            label {
              font-size: 50px;
            }

          th{
              font-family: "TH SarabunPSK";
              color: #222;
              background:#E6E6FA;
              padding: 10px 8px;
              border-bottom: 2px solid #E6E6FA;
              }
           .aa{
             color: #222;
             background:#FFDAB9;
             padding: 10px 8px;
             border-bottom: 2px solid #FFDAB9;
            }

        </style>
    </head>
    <body>
  <label for="check">ตรวจสอบสถานะออเดอร์</label><br><br><br>
      <center>  <form action="checkstatus.php" method="post">

            <input type="text" name="valueToSearch" placeholder="ค้นหาโดยชื่อลูกค้า" style="font: 20pt TH SarabunPSK">
            <button class= "button button4" name="search" >ค้นหา</button><br><br>

            <table>
                <tr>
                    <th>รหัสออเดอร์</th>
                    <th>ชื่อ-สกุล</th>
                    <th>สินค้า</th>
                    <th>วันที่ลงพื้นที่สำรวจ</th>
                    <th>วันที่ติดตั้ง</th>
                    <th>วันที่ออร์เดอร์</th>
                    <th>สถานะ</th>



                </tr>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)){?>
              <tr>
                    <td align="center" width="120" height="40" ><?php echo $row['order_ID'];?></td>
                    <td width="200" height="40"><?php echo $row['customer_Name'];?></td>
                    <td width="300" height="40"><?php echo $row['product_Name'];?></td>
                    <td align="center" width="150" height="40"><?php echo $row['locate_Date'];?></td>
                    <td align="center" width="120" height="40"><?php echo $row['setup_Date'];?></td>

                    <td align="center" width="120" height="40"><?php echo $row['order_Date'];?></td>
                    <td class="aa" align="center" width="120" height="40"><?php echo $row['status_status'];?></td>

                </tr>
                <?php }?>
            </table>

        </form></center>

    </body>
</html>
