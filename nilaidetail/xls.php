<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "id".$separator ."nrp".$separator ."materi".$separator ."murni".$separator ."harga".$separator ."prestasi".$separator; 
    $buffer .= $newline; 
    
  $sql="select `id`,`nrp`,`materi`,`murni`,`harga`,`prestasi` from `$tb_nilai_detail` order by `id` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["id"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nrp"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["materi"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["murni"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["harga"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["prestasi"];$buffer .= "\"".$value."\"".$separator; 
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