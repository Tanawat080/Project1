<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<style>
input[type=text] {
    width: 30%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid grey;
}
.data {
  font-family: "TH SarabunPSK";
  font-size: 20px;
}
html{
    padding:0px;
    margin:0px;
}
div#map_canvas{
    margin:auto;
    width:800px;
    height:550px;
    overflow:hidden;
    font-family: "TH SarabunPSK";
}
</style>
</head>
<body>



<center><form class="data">
  <!--<label for="idorder">รหัสการสั่งสินค้า</label><?php   $price=$_POST['Price']; ?>&nbsp;&nbsp;-->
  <input type="text" id="idoder" name="idorder"><br>
  <label for="name">ชื่อ-นามสกุล </label> &nbsp;&nbsp;
  <input type="text" id="name" name="name" placeholder="ใส่ชื่อและนามสกุล"><br>
  <label for="tel">เบอร์โทร</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" id="tel" name="tel"  placeholder="ใส่เบอร์โทรศัพท์ที่ติดต่อได้"><br><br>
  <label for="idorder"><B>กรุณากรอกจุดสังเกตใกล้เคียงและที่อยู่และ ปักหมุดบนที่อยูลงบนแผนที่</B></label><br>

  <label for="name">กรอกจุดสังเกตที่ใกล้เคียง</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text" id="aa" name="aa" placeholder="กรอกจุดสังเกตหรือสถานที่ที่ใกล้เคียง เช่น โรงเรียน วัด"> <br><br>

</form></center>
<?php
  $mysqli = mysqli_connect("localhost", "root", "", "stl");
  $mysqli->set_charset("utf8");?>

<div id="map_canvas"></div>

<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyB604ioym5bF296ScxXRyD7SzTCYU7uO-I" type="text/javascript"></script>
<script type="text/javascript">
navigator.geolocation.getCurrentPosition(
    function(position) {
     var lat = position.coords.latitude;
    var lon = position.coords.longitude;

    localStorage.setItem("lat",lat);
    localStorage.setItem("lon",lon);

    console.log(lat);
    console.log(lon);
    },
    function () {
     alert('Error locating your device');
    },
    {enableHighAccuracy: true}
);

function initialize() {
  if (GBrowserIsCompatible()) {
    var lat = localStorage.getItem("lat");
    var lon = localStorage.getItem("lon");
    var map = new GMap2(document.getElementById("map_canvas"));
    var center = new GLatLng(lat,lon); // การกำหนดจุดเริ่มต้น
    map.setCenter(center, 13);  // เลข 13 คือค่า zoom  สามารถปรับตามต้องการ
    map.setUIToDefault();

    var marker = new GMarker(center, {draggable: true});
    map.addOverlay(marker);


    GEvent.addListener(marker, "dragend", function() {
        var point = marker.getPoint();
        map.panTo(point);

        $("#lat_value").val(point.lat());
        $("#lon_value").val(point.lng());
        $("#zoom_value").val(map.getZoom());

    });

  }
}
</script>
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(function(){
    initialize();
    $(document.body).unload(function(){
            GUnload();
    });
});
</script>
<div id="showDD" style="margin:auto;padding-top:5px;width:600px;">
  <form id="form_get_detailMap" name="form_get_detailMap" method="post" action="">
    Latitude
    <input name="lat_value" type="text" id="lat_value" value="0" />
    Longitude
    <input name="lon_value" type="text" id="lon_value" value="0" />
  Zoom
  <input name="zoom_value" type="text" id="zoom_value" value="0" size="5" />
  <input type="submit" name="button" id="button" value="บันทึก" />
  </form>
</div>



</body>
</html>
