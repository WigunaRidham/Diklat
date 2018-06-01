<?php
$pro="simpan";
$tanggal_pembuatan=WKT(date("Y-m-d"));

$gambar0="avatar.jpg";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
    
    <script type="text/javascript">
var xmlHttp

function showNrp(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getNrpkp.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SC1 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SC1() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHintNRP").innerHTML=xmlHttp.responseText 
 } 
}


function showKursus(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getKursus.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SCKursus 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SCKursus() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHintKursus").innerHTML=xmlHttp.responseText 
 } 
}



function showKursusDibuka(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getKursusDibuka.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SCKursusDibuka 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SCKursusDibuka() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHintKursusDibuka").innerHTML=xmlHttp.responseText 
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
    
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_pembuatan").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    
  <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
  
<script type="text/javascript">
var xmlHttp




function showKursusDibuka(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getKursusDibuka.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SCKursusDibuka 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SCKursusDibuka() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHintKursusDibuka").innerHTML=xmlHttp.responseText 
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

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('sertifikat/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, nrp=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<div id="accordion">
 
 
 <?php  
  $sqlq="select distinct(status) from `tb_sertifikat` order by `kd_sertifikat` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];

?>     
  <h2><a href="#">Data sertifikat <?php echo"$status";?></a></h2>
   <div>


Data sertifikat: 
| <a href="sertifikat/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="1079" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
      <th width="5%"><center>No</th>
    
    
    <th width="29%"><center>Kursus Diikuti</th>
    <th width="25%"><center>Peserta </th>
    <th width="10%"><center>Status</th>
    <th width="16%"><center>Nomor Sertifikat</th>
     <th width="15%">Tanggal Pembuatan</td>
    
       <!---- <th width="7%">Gambar</td> ---->
  </tr>
   </thead>
  <tbody>
<?php  
  $sql="select * from `$tb_sertifikat` where status='$status' order by `kd_sertifikat` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$kd_sertifikat=$d["kd_sertifikat"];
				
				$kd_periode=getPeriode($conn,$d["kd_periode"]);
				$kd_kursus=getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka=getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
				$nrp=$d["nrp"];
				$nama=getNrp($conn,$d["nrp"]);
				
				$status=$d["status"];
				$no_sertifikat=$d["no_sertifikat"];
				$tanggal_pembuatan=WKT($d["tanggal_pembuatan"]);
				
				//$gambar=$d["gambar"];
				//$gambar0=$d["gambar0"];
				
				$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				
				
				<td>$kd_periode <br> $kd_kursus <br> $kd_kursus_dibuka</td>
				<td>$nrp - $nama </td>
				<td>$status</td>
				<td>$no_sertifikat</td>
				<td>$tanggal_pembuatan</td>
				
				<!----- <td><div align='center'>";
echo" <a href='downloadget.php?file=$gambar' title='$gambar'>Download</a>
<a href='#' onclick='buka(\"sertifikat/zoom.php?id=$kd_sertifikat\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div> ---->
				
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data sertifikat belum tersedia...</blink></td></tr>";}
?>
</table>
</tbody>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=sertifikat'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=sertifikat'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=sertifikat'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
echo"</div>";
		}
?>
</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kd_sertifikat=strip_tags($_POST["kd_sertifikat"]);
	$kd_sertifikat0=strip_tags($_POST["kd_sertifikat0"]);
	$kd_pendaftaran=strip_tags($_POST["kd_pendaftaran"]);

 $sql="select * from `$tbpendaftaran` where `kd_pendaftaran`='$kd_pendaftaran'";
	$d=getField($conn,$sql);
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$nrp=$d["nrp"];
				

	$no_sertifikat=strip_tags($_POST["no_sertifikat"]);
	$status=strip_tags($_POST["status"]);
	
	$tanggal_pembuatan=BAL(strip_tags($_POST["tanggal_pembuatan"]));
	
	//$gambar=strip_tags($_POST["gambar"]);
	//$gambar0=strip_tags($_POST["gambar0"]);
	//if ($_FILES["gambar"] != "") {
		//@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		//$gambar=$_FILES["gambar"]["name"];
//		} 
	//else {$gambar=$gambar0;}
	//if(strlen($gambar)<1){$gambar=$gambar0;}
	
	
//	$sql="select * from `$tb_kabadan` order by kd_kabadan desc";
	//$d=getField($conn,$sql);
				//$kd_kabadan=$d["kd_kabadan"];
				
				
if($pro=="simpan"){
$sql=" INSERT INTO `$tb_sertifikat` (
`kd_sertifikat` ,
`kd_pendaftaran` ,
`kd_periode` ,
`kd_kursus` ,
`kd_kursus_dibuka` ,
`nrp` ,
`status` ,
`no_sertifikat` ,
`tanggal_pembuatan`


) VALUES (
'$kd_sertifikat', 
'$kd_pendaftaran', 
'$kd_periode',
'$kd_kursus',
'$kd_kursus_dibuka',
'$nrp',
'$status',
'$no_sertifikat',
'$tanggal_pembuatan'

)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kd_sertifikat berhasil disimpan !');document.location.href='?mnu=sertifikat';</script>";}
		else{echo"<script>alert('Data $kd_sertifikat gagal disimpan...');document.location.href='?mnu=sertifikat';</script>";}
	}
	else{
$sql="update `$tb_sertifikat` set 
`kd_pendaftaran`='$kd_pendaftaran',
`kd_periode`='$kd_periode' ,
`kd_kursus`='$kd_kursus',
`kd_kursus_dibuka`='$kd_kursus_dibuka', 
`nrp`='$nrp',

`status`='$status',
`sertifikat`='$no_sertifikat',
`tanggal_pembuatan`='$tanggal_pembuatan'
 
	
where `kd_sertifikat`='$kd_sertifikat0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kd_sertifikat berhasil diubah !');document.location.href='?mnu=sertifikat';</script>";}
	else{echo"<script>alert('Data $kd_sertifikat gagal diubah...');document.location.href='?mnu=sertifikat';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kd_sertifikat=$_GET["kode"];
$sql="delete from `$tb_sertifikat` where `kd_sertifikat`='$kd_sertifikat'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data sertifikat $kd_sertifikat berhasil dihapus !');document.location.href='?mnu=sertifikat';</script>";}
else{echo"<script>alert('Data sertifikat $kd_sertifikat gagal dihapus...');document.location.href='?mnu=sertifikat';</script>";}
}
?>

