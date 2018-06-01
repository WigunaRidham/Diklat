<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tb_nilai_detail`";
if(getJum($conn,$sql)>0){
	print "<nilai_detail>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id=$d["id"];
				$nrp=$d["nrp"];
				$materi=$d["materi"];
				$murni=$d["murni"];
			    $harga=$d["harga"];
				$prestasi=$d["prestasi"];
												
				print "<record>\n";
				print "  <nrp>$nrp</nrp>\n";
				print "  <materi>$materi</materi>\n";
				print "  <murni>$murni</murni>\n";
				print "  <harga>$harga</harga>\n";
				print "  <prestasi>$prestasi</prestasi>\n";
				print "  <id>$id</id>\n";
				print "</record>\n";
			}
	print "</nilai_detail>\n";
}
else{
	$null="null";
	print "<nilai_detail>\n";
		print "<record>\n";
				print "  <nrp>$null</nrp>\n";
				print "  <materi>$null</materi>\n";
				print "  <murni>$null</murni>\n";
				print "  <harga>$null</harga>\n";
				print "  <prestasi>$null</prestasi>\n";
				print "  <id>$null</id>\n";
		print "</record>\n";
	print "</nilai_detail>\n";
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
	