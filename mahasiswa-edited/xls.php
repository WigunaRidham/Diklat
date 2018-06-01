<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "kopi1".$separator .
	"kopi2".$separator .
	"kopi3".$separator .
	"kopi4".$separator .
	"kopi5".$separator .
	"kopi6".$separator .
	"kopi7".$separator .
	"kopi8".$separator .
	"kopi9".$separator .
	"kopi10".$separator .
	"kopi11".$separator .
	"kopi12".$separator .
	"kopi13".$separator .
	"kopi14".$separator .
	"kopi15".$separator .
	"kopi16".$separator .
	"kopi17".$separator .
	"kopi18".$separator .
	"kopi19".$separator .
	"kopi20".$separator .
	"kopi21".$separator .
	"kopi22".$separator .
	"kopi23".$separator .
	"kopi24".$separator .
	"kopi25".$separator .
	"kopi26".$separator .
	"kopi27".$separator; 
    $buffer .= $newline; 
    
  $sql="select `kopi1`,`kopi2`,`kopi3`,`kopi4`,`kopi5`,`kopi6` ,`kopi7` ,`kopi8` ,`kopi9` ,`kopi10` ,`kopi11` ,`kopi12` ,`kopi13` ,`kopi14` ,`kopi15` ,`kopi16` ,`kopi17` ,`kopi18` ,`kopi19` ,`kopi20` ,`kopi21` ,`kopi22` ,`kopi23` ,`kopi24` ,`kopi25` ,`kopi26` ,`kopi27` from `$tb_pegawai` order by `kopi1` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["kopi1"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi2"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi3"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi4"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi5"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi6"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi7"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi8"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi9"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi10"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi11"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi12"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi13"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi14"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi15"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi16"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi17"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi18"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi19"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi20"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi21"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi22"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi23"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi24"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi25"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi26"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kopi27"];$buffer .= "\"".$value."\"".$separator; 
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