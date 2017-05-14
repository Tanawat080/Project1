<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lightbox JS v2.0 | Test Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<style type="text/css">
		body{ color: #333; font: 10.5px 'TH SarabunPSK', Verdana, sans-serif;	}

        div.figure img {
              width: 65px; height: 60px;
              text-align: center;
        }

        div.figure {
              float: left;
              width: 65px; height: 58px;
              text-align: center;
              margin: 7px; padding: 30px;
              border:1px solid #CDC9C9;
              -webkit-box-shadow: 0px 0px 20px 0px rgba(50, 50, 50, .5),
            0px -25px 35px 0px rgba(50, 50, 50, .3) inset;
              -moz-box-shadow: 0px 0px 10px 0px rgba(50, 50, 50, .5),
            0px -25px 35px 0px rgba(50, 50, 50, .3) inset;
              box-shadow: 0px 0px 5px 0px rgba(50, 50, 50, .5),
            0px -25px 35px 0px rgba(50, 50, 50, .3) inset;
              -moz-border-radius: 8px;
              -webkit-border-radius: 7px;

        }

        h1{
          color: #696969;
          text-shadow: black 0.01em 0.01em 0.02em
        }
	 </style>

</head>
<body>

  <?php
  $mysqli = mysqli_connect("localhost", "root", "", "stl");
  $mysqli->set_charset("utf8");


	$strSQL = mysqli_query($mysqli,"SELECT * FROM accessory");?>

<center><h1>เลือกลวดลาย</h1>

  <?php while($objResult = mysqli_fetch_array($strSQL)){?>

     <form name="FrmCal" method="post" action="svg-editor.html?accessory_ID=<?php echo $objResult["accessory_ID"];?>">
        <div class="figure">
            <font face="TH SarabunPSK" size="1"><B><?php echo $objResult["accessory_Name"];?></B></font>
          <a href="download.php?accessory_IMG=<?php echo $objResult["accessory_IMG"];?>">
            <img src="accessory/<?php echo $objResult["accessory_IMG"];?>">
            </a>

        </from>

      </div>

<?php } ?></center>
  </body>
</html>
