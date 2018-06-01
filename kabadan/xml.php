<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tb_kabadan`";
if(getJum($conn,$sql)>0){
	print "<kabadan>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kd_kabadan=$d["kd_kabadan"];
				$nama_kabadan=$d["nama_kabadan"];
				$pangkat=$d["pangkat"];
				
				
				$gambar=$d["gambar"];
												
				print "<record>\n";
				print "  <nama_kabadan>$nama_kabadan</nama_kabadan>\n";
				print "  <pangkat>$pangkat</pangkat>\n";
				
				
				print "  <gambar>$gambar</gambar>\n";
				print "  <kd_kabadan>$kd_kabadan</kd_kabadan>\n";
				print "</record>\n";
			}
	print "</kabadan>\n";
}
else{
	$null="null";
	print "<kabadan>\n";
				print "<record>\n";
				print "  <nama_kabadan>$null</nama_kabadan>\n";
				print "  <pangkat>$null</pangkat>\n";
				
				print "  <gambar>$null</gambar>\n";
				print "  <kd_kabadan>$null</kd_kabadan>\n";
				print "</record>\n";
	print "</kabadan>\n";

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
	