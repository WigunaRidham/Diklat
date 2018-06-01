<?php
$pro="simpan";
$tanggal_pembuatan=WKT(date("Y-m-d"));
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
win=window.open('surat/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, nrp=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<div id="accordion">
 
 
 <?php  
  $sqlq="select distinct(status) from `tb_surat` order by `kd_surat` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];

?>     
  <h2><a href="#">Data surat <?php echo"$status";?></a></h2>
   <div>


Data surat: 
| <a href="surat/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="1079" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
      <th width="6%"><center>No</th>
    <th width="11%"><center>Kode Surat</th>
    
    <th width="15%"><center>Nama Periode</th>
    <th width="15%"><center>Nama Kursus</th>
    <th width="23%"><center>Nama Subkursus </th>
    <th width="13%"><center>NRP/NIP</th>
    <th width="7%"><center>Status</th>
     <th width="10%">Tanggal Pembuatan</td>
    <th width="7%"><center>Nomor Surat</th>
       <!---- <th width="7%">Gambar</td> ---->
  </tr>
   </thead>
  <tbody>
<?php  
  $sql="select * from `$tb_surat` where status='$status' order by `kd_surat` desc";
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
				$kd_surat=$d["kd_surat"];
				
				$kd_periode=getPeriode($conn,$d["kd_periode"]);
				$kd_kursus=getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka=getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
				$nrp=$d["nrp"];
				$status=$d["status"];
				$nomor_surat=$d["nomor_surat"];
				$tanggal_pembuatan=WKT($d["tanggal_pembuatan"]);
				
				//$gambar=$d["gambar"];
				//$gambar0=$d["gambar0"];
				
				$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kd_surat</td>
				
				<td>$kd_periode</td>
				<td>$kd_kursus</td>
				<td>$kd_kursus_dibuka</td>
				<td align='center'>$nrp</td>
				<td>$status</td>
				<td>$nomor_surat</td>
				<td>$tanggal_pembuatan</td>
				
				<!----- <td><div align='center'>";
echo" <a href='downloadget.php?file=$gambar' title='$gambar'>Download</a>
<a href='#' onclick='buka(\"surat/zoom.php?id=$kd_surat\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div> ---->
				
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data surat belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=surat'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=surat'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=surat'>Next »</a></span>";
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
	$kd_surat=strip_tags($_POST["kd_surat"]);
	$kd_surat0=strip_tags($_POST["kd_surat0"]);
	$kd_pendaftaran=strip_tags($_POST["kd_pendaftaran"]);

 $sql="select * from `$tbpendaftaran` where `kd_pendaftaran`='$kd_pendaftaran'";
	$d=getField($conn,$sql);
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$nrp=$d["nrp"];

	$status=strip_tags($_POST["status"]);
	$nomor_surat=strip_tags($_POST["nomor_surat"]);
	$tanggal_pembuatan=BAL(strip_tags($_POST["tanggal_pembuatan"]));
	
	//$gambar=strip_tags($_POST["gambar"]);
	//$gambar0=strip_tags($_POST["gambar0"]);
	//if ($_FILES["gambar"] != "") {
		//@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		//$gambar=$_FILES["gambar"]["name"];
//		} 
	//else {$gambar=$gambar0;}
	//if(strlen($gambar)<1){$gambar=$gambar0;}
	
	
				
				
if($pro=="simpan"){
$sql=" INSERT INTO `$tb_surat` (
`kd_surat` ,
`kd_pendaftaran` ,
`kd_periode` ,
`kd_kursus` ,
`kd_kursus_dibuka` ,
`nrp` ,
`status` ,
`tanggal_pembuatan`,
`nomor_surat` 



) VALUES (
'$kd_surat', 
'$kd_pendaftaran', 
'$kd_periode',
'$kd_kursus',
'$kd_kursus_dibuka',
'$nrp',
'$status',
'$tanggal_pembuatan',
'$nomor_surat'


)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kd_surat berhasil disimpan !');document.location.href='?mnu=surat';</script>";}
		else{echo"<script>alert('Data $kd_surat gagal disimpan...');document.location.href='?mnu=surat';</script>";}
	}
	else{
$sql="update `$tb_surat` set 
`kd_pendaftaran`='$kd_pendaftaran',
`kd_periode`='$kd_periode' ,
`kd_kursus`='$kd_kursus',
`kd_kursus_dibuka`='$kd_kursus_dibuka', 
`nrp`='$nrp',
`status`='$status',
`tanggal_pembuatan`='$tanggal_pembuatan',
`nomor_surat`='$nomor_surat'
 
	
where `kd_surat`='$kd_surat0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kd_surat berhasil diubah !');document.location.href='?mnu=surat';</script>";}
	else{echo"<script>alert('Data $kd_surat gagal diubah...');document.location.href='?mnu=surat';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kd_surat=$_GET["kode"];
$sql="delete from `$tb_surat` where `kd_surat`='$kd_surat'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data surat $kd_surat berhasil dihapus !');document.location.href='?mnu=surat';</script>";}
else{echo"<script>alert('Data surat $kd_surat gagal dihapus...');document.location.href='?mnu=surat';</script>";}
}
?>

