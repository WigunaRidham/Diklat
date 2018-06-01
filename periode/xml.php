<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tb_periode`";
if(getJum($conn,$sql)>0){
	print "<periode>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kd_periode=$d["kd_periode"];
				$nama_periode=$d["nama_periode"];
			
			   $keterangan=$d["keterangan"];
				
												
				print "<record>\n";
				print "  <nama_periode>$nama_periode</nama_periode>\n";
				
				print "  <keterangan>$keterangan</keterangan>\n";

				print "  <kd_periode>$kd_periode</kd_periode>\n";
				print "</record>\n";
			}
	print "</periode>\n";
}
else{
	$null="null";
	print "<periode>\n";
		print "<record>\n";
				print "  <nama_periode>$null</nama_periode>\n";

				print "  <keterangan>$null</keterangan>\n";
				
				print "  <kd_periode>$null</kd_periode>\n";
		print "</record>\n";
	print "</periode>\n";
	}
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
	