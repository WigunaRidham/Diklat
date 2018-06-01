<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tb_peserta`";
if(getJum($conn,$sql)>0){
	print "<pegawai>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$nrp=$d["nrp"];
				$nama=$d["nama"];
				$pangkat=$d["pangkat"];
				$korps=$d["korps"];
			    $golongan=$d["golongan"];
				$tempat_lahir=$d["tempat_lahir"];
												
				print "<record>\n";
				print "  <nama>$nama</nama>\n";
				print "  <pangkat>$pangkat</pangkat>\n";
				print "  <korps>$korps</korps>\n";
				print "  <golongan>$golongan</golongan>\n";
				print "  <tempat_lahir>$tempat_lahir</tempat_lahir>\n";
				print "  <nrp>$nrp</nrp>\n";
				print "</record>\n";
			}
	print "</pegawai>\n";
}
else{
	$null="null";
	print "<pegawai>\n";
		print "<record>\n";
				print "  <nama>$null</nama>\n";
				print "  <pangkat>$null</pangkat>\n";
				print "  <korps>$null</korps>\n";
				print "  <golongan>$null</golongan>\n";
				print "  <tempat_lahir>$null</tempat_lahir>\n";
				print "  <nrp>$null</nrp>\n";
		print "</record>\n";
	print "</pegawai>\n";
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
	