<?php
 $q=$_GET["q"];


require_once"konmysqli.php";

$sql="SELECT * FROM tb_peserta WHERE nrp = '".$q."'";
$ada=getJum($conn,$sql);
if($ada>0){
$d=getField($conn,$sql);
$nama=$d["nama"];
$pangkat=$d["pangkat"];
				
?>
<table>
<tr>
<td width="188" ><label for="nama">Nama</label>
<td width="10" >:<td width="178" > <label><?php echo $nama;?> </label></td>
</tr>
<tr>
<td ><label for="pangkat">Pangkat</label>
<td >:<td > <label><?php echo $pangkat;?> </label></td>
</tr>




<tr>
<td height="60"><label for="kd_pendaftaran">Pilih  Pendaftar</label><td>:<td colspan="2">
<label for="kd_pendaftaran"></label>
  <select class="form-control"  name="kd_pendaftaran" id="kd_pendaftaran">
    <option value="Pilih">Pilih</option>
     <?php
	  $s="select * from `tb_pendaftaran` where nrp='$q'";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$kd_pendaftaran0=$d["kd_pendaftaran"];
				$nrp=$d["nrp"];/////////////////////////////
	echo"<option value='$kd_pendaftaran0' ";if($kd_pendaftaran0==$kd_pendaftaran){echo"selected";} echo"> $nrp - ".getNrp($conn,$nrp)." </option>"; 
	}
	?>
  </select></td></tr></table>
<?php 
}


function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

?>
