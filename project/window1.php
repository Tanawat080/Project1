<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Lightbox JS v2.0 | Test Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />

	<script src="js/prototype.js" type="text/javascript"></script>
	<script src="js/scriptaculous.js?load=effects" type="text/javascript"></script>
	<script src="js/lightbox.js" type="text/javascript"></script>

	<style type="text/css">
		body{ color: #333; font: 18px 'TH SarabunPSK', Verdana, sans-serif;	}
    div.figure {
      float: left;
      width: 25%;
      border: thin silver solid;
      margin: 0.8em;
      padding: 0.5em;

    }
    div.figure a {
      float: left;
      text-decoration: none;
      font-family: Georgia, "TH SarabunPSK", serif;
      color: black;
      font-size: 100%;
      font-style: italic;
      font-size: smaller;
      text-indent: 0;
    }
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 8px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
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

	</style>

</head>
<body>
  <?php
  $mysqli = mysqli_connect("localhost", "root", "", "slt");
  $mysqli->set_charset("utf8");

    $strSQL = mysqli_query($mysqli,"SELECT * FROM product WHERE type_ID=2");

    while($objResult = mysqli_fetch_array($strSQL)){?>
      <div class="figure">
            <font face="TH SarabunPSK" color="green" size="4"><B><?php echo $objResult["product_Name"];?></B></font>
            <center><a href="pic/window/<?php echo $objResult["product_IMG"];?>"rel="lightbox[food]"><img src="pic/window/<?php echo $objResult["product_IMG"];?>" width="140" height="110" border="0" /></a></center>
            <font size = "4"><?php echo $objResult["Description"];?></font><br>
           <button class="button button4"><font face = "TH SarabunPSK">เลือก</font></button>
      </div>

<?php } ?>



  </body>
</html>
