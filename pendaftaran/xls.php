<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "kd_pendaftaran".$separator .
	"kd_periode".$separator .
	"kd_kursus".$separator .
	"nrp".$separator .
	"tanggal_daftar".$separator .
	"status".$separator; 
	"kd_kursus_dibuka".$separator; 
    $buffer .= $newline; 
    
  $sql="select `kd_pendaftaran`,`kd_periode`,`kd_kursus`,`nrp`,`tanggal_daftar`,`status`, `kd_kursus_dibuka` from `$tb_pendaftaran` order by `kd_pendaftaran` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["kd_pendaftaran"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kd_periode"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kd_kursus"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nrp"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["tanggal_daftar"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["status"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kd_kursus_dibuka"];$buffer .= "\"".$value."\"".$separator; 
				$buffer .= $newline; 
		}	
  }
  else{
    $buffer .= $newline; 
	  }
    header("Content-type: application/vnd.ms-excel"); 
    header("Content-Length: ".strlen($buffer)); 
    header("Content-Disposition: attachment; filename=report.csv"); 
    header("Expires: 0"); 
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
    header("Pragma: public"); 

    print $buffer;
	
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