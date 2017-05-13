<?php
$svg_file = file_get_contents("a.svg");

$find_string   = '<svg';
$position = strpos($svg_file, $find_string);

$svg_file_new = substr($svg_file, $position);

echo "<div style='width:100%; height:100%;' >" . $svg_file_new . "</div>";

?>
