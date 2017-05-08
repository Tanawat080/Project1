<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <style type="text/css">
        img.resize  {
        	width: 32px;
        	height: 32px;
        	border: 0;
        }
        img:hover.resize  {
        	width: 128px;
        	height: 128px;
        	border: 0;
        }

      </style>
      <script>
        var nW,nH,oH,oW;
        function zoomToggle(iWideSmall,iHighSmall,iWideLarge,iHighLarge,whichImage){
        oW=whichImage.style.width;oH=whichImage.style.height;
        if((oW==iWideLarge)||(oH==iHighLarge)){
        nW=iWideSmall;nH=iHighSmall;}else{
        nW=iWideLarge;nH=iHighLarge;}
        whichImage.style.width=nW;whichImage.style.height=nH;
        }
    </script>
    </head>
<body>

<?php
$mysqli = mysqli_connect("localhost", "root", "", "slt");
$mysqli->set_charset("utf8");

  $strSQL = mysqli_query($mysqli,"SELECT * FROM product");

  while($objResult = mysqli_fetch_array($strSQL)){

    echo $objResult["product_ID"];
  	echo $objResult["product_Name"]; ?>
    <img src="pic/<?php echo $objResult["product_IMG"];?>" width="140"height="110" BORDER=0  id="image1" onclick="zoomToggle('200px','210px','300px','320px',this);";>

<?php } ?>


</body>
</html>
