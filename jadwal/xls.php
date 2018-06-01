<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "kd_jadwal".$separator ."kd_periode".$separator ."kd_kursus".$separator ."kd_kursus_dibuka".$separator ."hari".$separator ."waktu".$separator; 
    $buffer .= $newline; 
    
  $sql="select `kd_jadwal`,`kd_periode`,`kd_kursus`,`kd_kursus_dibuka`,`hari`,`waktu` from `$tb_jadwal` order by `kd_jadwal` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["kd_jadwal"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kd_periode"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kd_kursus"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kd_kursus_dibuka"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["hari"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["waktu"];$buffer .= "\"".$value."\"".$separator; 
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