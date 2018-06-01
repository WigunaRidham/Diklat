<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

define('FPDF_FONTPATH', '../ypathcss/bantuan/fpdf/font/');
require('../ypathcss/bantuan/fpdf/fpdf.php');

class PDF extends FPDF{
  function Header(){
    $this->SetTextColor(128,0,0);
    $this->SetFont('Arial','B','12');//	$this->SetFont('Times','',12);
    $this->Cell(20,0,'Data kursusdikopi13',0,0,'L');
    $this->Ln();
    $this->Cell(5,1,'Laporan data kursusdikopi13',0,0,'L');
    $this->Ln();
	

	
  }
  
  function Footer(){
	$this->SetY(-4,5);
	$this->Image("../ypathfile/avatar.jpg", (8.5/2)-1.5, 9.8, 3, 1, "JPG", "http://www.lp2maray.com");
    $this->SetY(-2,5);
    $this->Cell(0,1,$this->PageNo(),0,0,'C');
	
  }
} 

$sql = "select * from `$tb_pegawai`";
$jml =  getJum($conn,$sql);

$i=0;
$arr=getData($conn,$sql);
		foreach($arr as $d) {	
  $cell[$i][0]=$d["kopi1"];
  $cell[$i][1]=$d["kopi2"];
  $cell[$i][2]=$d["kopi3"];
  $cell[$i][3]=$d["kopi4"];
  $cell[$i][4]=$d["kopi5"];
  $cell[$i][5]=$d["kopi6"];
   $cell[$i][6]=$d["kopi7"];
    $cell[$i][7]=$d["kopi8"];
	 $cell[$i][8]=$d["kopi9"];
	  $cell[$i][9]=$d["kopi10"];
	   $cell[$i][10]=$d["kopi11"];
	    $cell[$i][11]=$d["kopi12"];
		 $cell[$i][12]=$d["kopi13"];
		  $cell[$i][13]=$d["kopi14"];
		   $cell[$i][14]=$d["kopi15"];
		    $cell[$i][15]=$d["kopi16"];
			 $cell[$i][16]=$d["kopi17"];
			 $cell[$i][17]=$d["kopi18"];
			 $cell[$i][18]=$d["kopi19"];
			 $cell[$i][19]=$d["kopi20"];
			 $cell[$i][20]=$d["kopi21"];
			 $cell[$i][21]=$d["kopi22"];
			 $cell[$i][22]=$d["kopi23"];
			 $cell[$i][23]=$d["kopi24"];
			 $cell[$i][24]=$d["kopi25"];
			 $cell[$i][25]=$d["kopi26"];
			 $cell[$i][26]=$d["kopi27"];
			 
  $i++;
}
				
				
$pdf=new PDF('L','cm','A4');
//$pdf=new PDF("P","in","Letter");
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B','9');
$pdf->SetFillColor(192,192,192);
$pdf->Cell(1,1,'no','LR',0,'L',1);
//$pdf->MultiCell(0, 0.5, $lipsum1, 'LR', "L");
$pdf->Cell(2,1,'kopi1','LR',0,'C',1);
$pdf->Cell(7,1,'kopi2','LR',0,'C',1);
$pdf->Cell(5,1,'kopi3','LR',0,'C',1);
$pdf->Cell(3,1,'kopi4','LR',0,'C',1);
$pdf->Cell(9,1,'kopi5','LR',0,'C',1);
$pdf->Cell(1,1,'kopi6','LR',0,'C',1);

$pdf->Cell(1,1,'kopi7','LR',0,'C',1);
$pdf->Cell(1,1,'kopi8','LR',0,'C',1);
$pdf->Cell(1,1,'kopi9','LR',0,'C',1);
$pdf->Cell(1,1,'kopi10','LR',0,'C',1);
$pdf->Cell(1,1,'kopi11','LR',0,'C',1);
$pdf->Cell(1,1,'kopi12','LR',0,'C',1);
$pdf->Cell(1,1,'kopi13','LR',0,'C',1);
$pdf->Cell(1,1,'kopi14','LR',0,'C',1);
$pdf->Cell(1,1,'kopi15','LR',0,'C',1);
$pdf->Cell(1,1,'kopi16','LR',0,'C',1);
$pdf->Cell(1,1,'kopi17','LR',0,'C',1);
$pdf->Cell(1,1,'kopi18','LR',0,'C',1);
$pdf->Cell(1,1,'kopi19','LR',0,'C',1);
$pdf->Cell(1,1,'kopi20','LR',0,'C',1);
$pdf->Cell(1,1,'kopi21','LR',0,'C',1);
$pdf->Cell(1,1,'kopi22','LR',0,'C',1);
$pdf->Cell(1,1,'kopi23','LR',0,'C',1);
$pdf->Cell(1,1,'kopi24','LR',0,'C',1);
$pdf->Cell(1,1,'kopi25','LR',0,'C',1);
$pdf->Cell(1,1,'kopi26','LR',0,'C',1);
$pdf->Cell(1,1,'kopi27','LR',0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','','8');

for ($j=0;$j<$i;$j++){
  $pdf->Cell(1,1,$j+1,'B',0,'L');         // no
  $pdf->Cell(2,1,$cell[$j][0],'B',0,'L'); // kopi1
  $pdf->Cell(7,1,$cell[$j][1],'B',0,'L'); // kopi2
  $pdf->Cell(5,1,$cell[$j][2],'B',0,'L'); // kopi3
  $pdf->Cell(3,1,$cell[$j][3],'B',0,'L'); // kopi4
  $pdf->Cell(9,1,$cell[$j][4],'B',0,'L'); // kopi5
  $pdf->Cell(1,1,$cell[$j][5],'B',0,'L'); // kopi6
  
   $pdf->Cell(1,1,$cell[$j][6],'B',0,'L'); // kopi7
    $pdf->Cell(1,1,$cell[$j][7],'B',0,'L'); // kopi8
	 $pdf->Cell(1,1,$cell[$j][8],'B',0,'L'); // kopi9
	  $pdf->Cell(1,1,$cell[$j][9],'B',0,'L'); // kopi10
	   $pdf->Cell(1,1,$cell[$j][10],'B',0,'L'); // kopi11
	    $pdf->Cell(1,1,$cell[$j][11],'B',0,'L'); // kopi12
		 $pdf->Cell(1,1,$cell[$j][12],'B',0,'L'); // kopi13
		  $pdf->Cell(1,1,$cell[$j][13],'B',0,'L'); // kopi14
		   $pdf->Cell(1,1,$cell[$j][14],'B',0,'L'); // kopi15
		    $pdf->Cell(1,1,$cell[$j][15],'B',0,'L'); // kopi16
			 $pdf->Cell(1,1,$cell[$j][16],'B',0,'L'); // kopi17
			 $pdf->Cell(1,1,$cell[$j][17],'B',0,'L'); // kopi18
			 $pdf->Cell(1,1,$cell[$j][18],'B',0,'L'); // kopi19
			 $pdf->Cell(1,1,$cell[$j][19],'B',0,'L'); // kopi20
			 $pdf->Cell(1,1,$cell[$j][20],'B',0,'L'); // kopi21
			 $pdf->Cell(1,1,$cell[$j][21],'B',0,'L'); // kopi22
			 $pdf->Cell(1,1,$cell[$j][22],'B',0,'L'); // kopi23
			 $pdf->Cell(1,1,$cell[$j][23],'B',0,'L'); // kopi24
			 $pdf->Cell(1,1,$cell[$j][24],'B',0,'L'); // kopi25
			 $pdf->Cell(1,1,$cell[$j][25],'B',0,'L'); // kopi26
			 $pdf->Cell(1,1,$cell[$j][26],'B',0,'L'); // kopi27
  $pdf->Ln();
}
$pdf->Output();
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
?>

