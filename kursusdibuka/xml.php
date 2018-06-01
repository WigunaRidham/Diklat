<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tb_kursus_dibuka`";
if(getJum($conn,$sql)>0){
	print "<kursusdibuka>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$kd_kursus=$d["kd_kursus"];
				$nama_subkursus=$d["nama_subkursus"];
				$kd_periode=$d["kd_periode"];
			    $gelombang=$d["gelombang"];
				$tingkat=$d["tingkat"];
												
				print "<record>\n";
				print "  <kd_kursus>$kd_kursus</kd_kursus>\n";
				print "  <nama_subkursus>$nama_subkursus</nama_subkursus>\n";
				print "  <kd_periode>$kd_periode</kd_periode>\n";
				print "  <gelombang>$gelombang</gelombang>\n";
				print "  <tingkat>$tingkat</tingkat>\n";
				print "  <kd_kursus_dibuka>$kd_kursus_dibuka</kd_kursus_dibuka>\n";
				print "</record>\n";
			}
	print "</kursusdibuka>\n";
}
else{
	$null="null";
	print "<kursusdibuka>\n";
		print "<record>\n";
				print "  <kd_kursus>$null</kd_kursus>\n";
				print "  <nama_subkursus>$null</nama_subkursus>\n";
				print "  <kd_periode>$null</kd_periode>\n";
				print "  <gelombang>$null</gelombang>\n";
				print "  <tingkat>$null</tingkat>\n";
				print "  <kd_kursus_dibuka>$null</kd_kursus_dibuka>\n";
		print "</record>\n";
	print "</kursusdibuka>\n";
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
	