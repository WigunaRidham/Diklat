<script type="text/javascript">
var xmlHttp

function showKursusDibuka(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getKodePendaftaran.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SC1c
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SC1c() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHintv").innerHTML=xmlHttp.responseText 
 } 
}

function GetXmlHttpObject(){
var xmlHttp=null;
try{xmlHttp=new XMLHttpRequest();}
catch (e){
	try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}
 	catch (e){xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}
 }
return xmlHttp;
}
</script>

<?php
 $q=$_GET["q"];



require_once"konmysqli.php";
  $s="select * from `tb_pendaftaran` where `nrp`='".$_GET["q"]."'";

				
?>


 
  
<select onChange="showKursusDibuka(this.value)" class="form-control" name="kd_pendaftaran" id="kd_pendaftaran">
	 <?php
	$q=getData($conn,$s);
		foreach($q as $d){	
				$kd_kursus=$d["kd_kursus"];
				$kd_periode=getPeriode($conn,$d["kd_periode"]);
				$kd_kursus=getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka=getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
										
				$kd_pendaftaran0=$d["kd_pendaftaran"];
				$nrp=$d["nrp"];/////////////////////////////
	echo"<option value='$kd_pendaftaran0' "; echo">$kd_periode |$kd_kursus-> $kd_kursus_dibuka ($kd_pendaftaran0)"." </option>"; //////////////////
	}
	?>


  
  </select>
 <div id='txtHintv'></div>

 
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
