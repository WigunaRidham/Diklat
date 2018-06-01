<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tb_nilai`";
if(getJum($conn,$sql)>0){
	print "<nilai>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kd_nilai=$d["kd_nilai"];
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
			    $kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$nrp=$d["nrp"];
												
				print "<record>\n";
				print "  <kd_pendaftaran>$kd_pendaftaran</kd_pendaftaran>\n";
				print "  <kd_periode>$kd_periode</kd_periode>\n";
				print "  <kd_kursus>$kd_kursus</kd_kursus>\n";
				print "  <kd_kursus_dibuka>$kd_kursus_dibuka</kd_kursus_dibuka>\n";
				print "  <nrp>$nrp</nrp>\n";
				print "  <kd_nilai>$kd_nilai</kd_nilai>\n";
				print "</record>\n";
			}
	print "</nilai>\n";
}
else{
	$null="null";
	print "<nilai>\n";
		print "<record>\n";
				print "  <kd_pendaftaran>$null</kd_pendaftaran>\n";
				print "  <kd_periode>$null</kd_periode>\n";
				print "  <kd_kursus>$null</kd_kursus>\n";
				print "  <kd_kursus_dibuka>$null</kd_kursus_dibuka>\n";
				print "  <nrp>$null</nrp>\n";
				print "  <kd_nilai>$null</kd_nilai>\n";
		print "</record>\n";
	print "</nilai>\n";
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
	