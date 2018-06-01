<?php
 $q=$_GET["q"];


require_once"konmysqli.php";

$sql="SELECT * FROM tb_peserta WHERE nrp = '".$q."'";
$ada=getJum($conn,$sql);
if($ada>0){
$d=getField($conn,$sql);
$nama=$d["nama"];
$pangkat=$d["pangkat"];
$golongan=$d["golongan"];
				
?>
			<table>
			<tr>
			<td width="188" ><label for="nama">Nama </label>
			<td width="10" >:<td width="178" > <label><?php echo $nama;?> </label></td>
			</tr>
			<tr>
			<td ><label for="pangkat">Pangkat</label>
			<td >:<td > <label><?php echo $pangkat;?> </label></td>
			</tr>
			<tr>
			<td ><label for="golongan">Penggolongan</label>
			<td >:<td > <label><?php echo $golongan;?> </label></td>
			</tr>
            
            
            

<tr>
<td height="24"><label for="kd_pendaftaran">Pilih  Pendaftar</label><td>:<td colspan="2">
<label for="kd_pendaftaran"></label>
 <div id="txtHint">
  <select class="form-control"  name="kd_pendaftaran" id="kd_pendaftaran">
    <option value="Pilih">Pilih</option>
     <?php
	  $s="select * from `tb_pendaftaran` where nrp='$q'";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$kd_pendaftaran0=$d["kd_pendaftaran"];
				$nrp=$d["nrp"];/////////////////////////////
				$kd_periode=getPeriode($conn,$d["kd_periode"]);
				$kd_kursus=getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka=getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
										
				$kd_pendaftaran0=$d["kd_pendaftaran"];
				$nrp=$d["nrp"];/////////////////////////////
	echo"<option value='$kd_pendaftaran0' "; echo">$kd_periode |$kd_kursus-> $kd_kursus_dibuka ($kd_pendaftaran0)"." </option>"; 
	}
	?>
  </select></div></td>
  
  </tr>
  
  
			</table>
            
            
            
            
<?php 
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

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}
function getKursus($conn,$kode){
$field="nama_kursus";
$sql="SELECT `$field` FROM `tb_kursus` where `kd_kursus`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
		function getPeriode($conn,$kode){
$field="nama_periode";
$sql="SELECT `$field` FROM `tb_periode` where `kd_periode`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
function getNrp($conn,$kode){
$field="nama"; ////////////////////////
$sql="SELECT `$field` FROM `tb_peserta` where `nrp`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	function getKursusDibuka($conn,$kode){
$field="nama_subkursus"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kursus_dibuka` where `kd_kursus_dibuka`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
?>
