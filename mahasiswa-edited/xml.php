<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tb_pegawai`";
if(getJum($conn,$sql)>0){
	print "<kursusdikopi13>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$kopi1=$d["kopi1"];
				$kopi2=$d["kopi2"];
				$kopi3=$d["kopi3"];
				$kopi4=$d["kopi4"];
			    $kopi5=$d["kopi5"];
				$kopi6=$d["kopi6"];
												
				print "<record>\n";
				print "  <kopi2>$kopi2</kopi2>\n";
				print "  <kopi3>$kopi3</kopi3>\n";
				print "  <kopi4>$kopi4</kopi4>\n";
				print "  <kopi5>$kopi5</kopi5>\n";
				print "  <kopi6>$kopi6</kopi6>\n";
				print "  <kopi1>$kopi1</kopi1>\n";
				print "</record>\n";
			}
	print "</kursusdikopi13>\n";
}
else{
	$null="null";
	print "<kursusdikopi13>\n";
		print "<record>\n";
				print "  <kopi2>$null</kopi2>\n";
				print "  <kopi3>$null</kopi3>\n";
				print "  <kopi4>$null</kopi4>\n";
				print "  <kopi5>$null</kopi5>\n";
				print "  <kopi6>$null</kopi6>\n";
				print "  <kopi1>$null</kopi1>\n";
		print "</record>\n";
	print "</kursusdikopi13>\n";
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
	