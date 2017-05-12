<?php
print_r($_POST);

echo "<br/>";

$result = $_POST['Date'];  // value ที่ส่งมา
            $result_explode = explode('-', $result);   
            echo "ตั้งแต่วันที่: ". $result_explode[0]."<br />";  
            echo "ถึงวันที่: ". $result_explode[1]."<br />"; 
 

?>