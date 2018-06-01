
<?php
session_start();
 $q=$_GET["q"];
$_SESSION["cp"]=$q;
require_once"konmysqli.php";
  $s="select distinct(kd_kursus) from `tb_kursus_dibuka` where kd_periode='$q'";

?>
<select class="form-control" name="kd_kursus" id="kd_kursus" onChange="showKursusDibuka(this.value)">
    <option>Pilih</option>
     <?php
 	$q=getData($conn,$s);
		foreach($q as $d){							
				$kd_kursus=$d["kd_kursus"];
			$nama_kursus =getKursus($conn,$d["kd_kursus"]); ///////////////////////////////////
	
	echo"<option value='$kd_kursus' "; echo">$nama_kursus</option>";
	}

	?>
  
  </select>
  <?php 
  
  
  
	function getKursus($conn,$kode){
$field="nama_kursus";
$sql="SELECT `$field` FROM `tb_kursus` where `kd_kursus`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
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
