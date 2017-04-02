<?php
require('fpdf1/fpdf.php');
$dbc = mysqli_connect("localhost", "root" , "", "stl");
$dbc->set_charset("utf8");

Class PDF extends FPDF{
	function Header(){
		$this->AddFont('angsa','','angsa.php');
  		$this->SetFont('angsa','',36);
		$this ->SetLeftMargin(10);
		$this ->Cell(0,5,iconv("UTF-8","TIS-620",'STL CREATIVE'),0,1);
		$this ->Cell(0,5,iconv("UTF-8","TIS-620",'ร้านสุรพล สแตนเลส'),0,1);
		$this ->Cell(0,5,iconv("UTF-8","TIS-620",'รายงานสุปยอดรายเดือน พ.ศ.2560'),0,1);
		$this ->line(5,28,200,28);
		$this ->SetLeftMargin(5);
	}
	function Footer(){
		$this ->Setlinewidth(0,5);
		$this->AddFont('angsa','','angsa.php');
  		$this->SetFont('angsa','',10);
  		$this->SetY(-12);
  		$this ->Cell(0,5,iconv("UTF-8","TIS-620",'แบบทดสอบ'),0,0,"L");
  		$this ->Cell(0,5,iconv("UTF-8","TIS-620",'STL CREATIVE'),0,1);
 		
	}
}
$pdf = new PDF('P','',)