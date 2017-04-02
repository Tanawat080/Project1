<?php
session_start();
        if(isset($_REQUEST['idNo'])){
				//connection
                  include("testdb.php");
				//รับค่า user & password
                  $idNo = $_REQUEST['idNo'];
                  $Password = $_REQUEST['Password'];
				//query
                  $sql="SELECT * FROM User Where Username='".$idNo."' and Password='".$Password."' ";

                  $result = mysqli_query($mysqli,$sql);

                  if(mysqli_num_rows($result)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["IdNo"] = $row["Username"];
                      //$_SESSION["User"] = $row["Firstname"]." ".$row["Lastname"];
                      $_SESSION["Userlevel"] = $row["Userlevel"];

                      if($_SESSION["Userlevel"]=="A"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php

                        Header("Location: adminpage.php");

                      }

                      if ($_SESSION["Userlevel"]=="M"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php

                        Header("Location: userpage.php");

                      }

                  }else{
                    echo $sql;
                  echo "<script>";
                  echo "alert(\" user หรือ  password ไม่ถูกต้อง \");";

                  echo "window.history.back()";
                  echo "</script>";

                  }

        }else{


             Header("Location: form_login.php"); //user & password incorrect back to login again

        }
?>
