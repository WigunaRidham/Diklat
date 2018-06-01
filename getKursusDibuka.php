<?php
session_start();
 $q=$_GET["q"];
$kd_periode=$_SESSION["cp"];
require_once"konmysqli.php";
  $s="select * from `tb_kursus_dibuka` where kd_kursus='$q' and kd_periode='$kd_periode'";

				
?>

<select class="form-control" name="kd_kursus_dibuka" id="kd_kursus_dibuka">
     <?php
 	$q=getData($conn,$s);
		foreach($q as $d){							
				$kd_kursus_dibuka0=$d["kd_kursus_dibuka"];
				$nama_subkursus =$d["nama_subkursus"]; ///////////////////////////////////
	
	echo"<option value='$kd_kursus_dibuka0' "; echo">$nama_subkursus  </option>";
	}

	?>
  
  </select>
  <?php 
function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}
	 function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}
?>
