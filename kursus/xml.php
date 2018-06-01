<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbkursus`";
if(getJum($conn,$sql)>0){
	print "<kursus>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kd_kursus=$d["kd_kursus"];
				$nama_kursus=$d["nama_kursus"];
			
				$keterangan=$d["keterangan"];
				
				$gambar=$d["gambar"];
												
				print "<record>\n";
				print "  <nama_kursus>$nama_kursus</nama_kursus>\n";
			
				print "  <keterangan>$keterangan</keterangan>\n";
				
				print "  <gambar>$gambar</gambar>\n";
				print "  <kd_kursus>$kd_kursus</kd_kursus>\n";
				print "</record>\n";
			}
	print "</kursus>\n";
}
else{
	$null="null";
	print "<kursus>\n";
				print "<record>\n";
				print "  <nama_kursus>$null</nama_kursus>\n";
			
				print "  <keterangan>$null</keterangan>\n";				
					
				print "  <gambar>$null</gambar>\n";
				print "  <kd_kursus>$null</kd_kursus>\n";
				print "</record>\n";
	print "</kursus>\n";

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
	