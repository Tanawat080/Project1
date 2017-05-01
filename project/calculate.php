<html>
    <head>
        <meta charset="utf-8">
      <title></title>

        <style>
            input[type=text] { /*input*/
                width: 30%;
                padding: 12px 12px;
                margin: 17px 0;
                box-sizing: border-box;
                border: 3px solid #ccc;
                -webkit-transition: 0.5s;
                transition: 0.5s;
                outline: none;
            }

            input[type=text]:focus {
                border: 3px solid #555;
            }
            .button { /*ิbutton*/
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 16px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 24px;
                font-family: "TH SarabunPSK";
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
          label{
              font-family: "TH SarabunPSK";
            }

        </style>
      </head>
  <body>
    <form name="frm" method="post" action="calculate1.php" target="iframe_target">
        <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
        <?php
          $mysqli = mysqli_connect("localhost", "root", "", "slt");
          $mysqli->set_charset("utf8");

        	$productID= $_GET["product_ID"];


        	$strSQL = mysqli_query($mysqli,"SELECT * FROM product where  product_ID= $productID");
          $sql1 = 'INSERT INTO order VALUES ("",'.date('Y-m-d').',"total_cost","'.$addr.'"")';

          $objResult = mysqli_fetch_array($strSQL);
          $price=$objResult['Price'];


          ?>
    <center><input type="hidden" name="Price" value="<?php echo $objResult["Price"];?>">
          <font size="8">   <label for="fname">ประเมินราคา</label></font><br><br><br>
          <font size="6">   <label for="fname">ใส่ค่าประมาณความกว้าง และความยาว</label></font><br>
          <font size="5">   <label for="fname">ความกว้าง</label>
                            <input type="text" id="fname" name="width" placeholder="ความกว้าง">     <label for="fname">&nbsp;&nbsp;เมตร</label><br>
                            <label for="lname">&nbsp;&nbsp;&nbsp;ความสูง</label>
                            <input type="text" id="lname" name="height" placeholder="ความสูง"</font><label for="fname">&nbsp;&nbsp;เมตร</label><br>
                            <button class="button button4">เช็คราคา</button><br></center>

    </form>

  </body>
</html>
