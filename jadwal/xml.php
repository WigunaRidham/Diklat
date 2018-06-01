<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tb_jadwal`";
if(getJum($conn,$sql)>0){
	print "<jadwal>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kd_jadwal=$d["kd_jadwal"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
			    $hari=$d["hari"];
				$waktu=$d["waktu"];
												
				print "<record>\n";
				print "  <kd_periode>$kd_periode</kd_periode>\n";
				print "  <kd_kursus>$kd_kursus</kd_kursus>\n";
				print "  <kd_kursus_dibuka>$kd_kursus_dibuka</kd_kursus_dibuka>\n";
				print "  <hari>$hari</hari>\n";
				print "  <waktu>$waktu</waktu>\n";
				print "  <kd_jadwal>$kd_jadwal</kd_jadwal>\n";
				print "</record>\n";
			}
	print "</jadwal>\n";
}
else{
	$null="null";
	print "<jadwal>\n";
		print "<record>\n";
				print "  <kd_periode>$null</kd_periode>\n";
				print "  <kd_kursus>$null</kd_kursus>\n";
				print "  <kd_kursus_dibuka>$null</kd_kursus_dibuka>\n";
				print "  <hari>$null</hari>\n";
				print "  <waktu>$null</waktu>\n";
				print "  <kd_jadwal>$null</kd_jadwal>\n";
		print "</record>\n";
	print "</jadwal>\n";
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
	