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
            
            
            
  
			</table>
            
            
            
            
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
