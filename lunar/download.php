<?php
header("Content-Disposition: attachment; filename=".$_GET["accessory_IMG"].""); 
readfile($_GET["accessory"]);
?>