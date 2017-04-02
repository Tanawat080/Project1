<?php
error_reporting(0);


include_once('phpjasperxml_0.9d/class/tcpdf/tcpdf.php');
include_once("phpjasperxml_0.9d/class/PHPJasperXML.inc.php");


$server = "localhost";
$user = "root";
$pass = "";
$db = "stl_report";
mysql_query("SET NAMES UTF8");

$PHPJasperXML = new PHPJasperXML();

$PHPJasperXML->arrayParameter=array("parameter1"=>1);
$PHPJasperXML->load_xml_file("yearr.jrxml");

$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");


?>
