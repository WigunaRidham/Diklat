<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
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

function showNrp(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getNrp.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SC1 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SC1() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHint1c").innerHTML=xmlHttp.responseText 
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



function showPendaftaran(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getPendaftaran.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SCPendaftaran
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SCPendaftaran() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHintPendaftaran").innerHTML=xmlHttp.responseText 
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
win=window.open('nilai/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, nrp=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>



<script type="text/javascript">
var xmlHttp

function showPendaftaran(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getPendaftaran.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SC2 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SC2() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHint2").innerHTML=xmlHttp.responseText 
 } 
}

<script type="text/javascript">

var xmlHttp

function showNrp(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getNrp.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SC1 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SC1() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHint1").innerHTML=xmlHttp.responseText 
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

<div id="accordion">

   <?php  
  $sqlq="select distinct(keterangan) from `tb_nilai` order by `kd_nilai` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$keterangan=$dq["keterangan"];

?>     

   <h2><a href="#">Data Nilai <?php echo"$keterangan";?></a></h2>
     <div>
Data nilai: 
| <a href="nilai/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a>
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="1023" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
    <th width="3%"><center>No</th>
    <th width="6%"><center>Kode</th>
    <th width="16%"><center>
Pendaftaran</th>
    <th width="12%"><center>
Periode</th>
    <th width="11%"><center>
Kursus</th>
    <th width="17%"><center>Nama Sub Kursus</th>
    <th width="16%"><center>NRP/NIP</th>
    <th width="10%"><center>Keterangan Nilai</th>
    <th width="9%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tb_nilai` where keterangan='$keterangan' order by `kd_nilai` desc";
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
				$kd_nilai=$d["kd_nilai"];
				$kd_pendaftaran=getPendaftaran($conn,$d["kd_pendaftaran"]);
				$kd_periode= getPeriode($conn,$d["kd_periode"]);
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka= getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
				$nrp=$d["nrp"];
				$nrp0=getNrp($conn,$d["nrp"]);
				$keterangan=$d["keterangan"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kd_nilai</td>
				<td>$kd_pendaftaran</td>
				<td>$kd_periode</td>
				<td>$kd_kursus</td>
				<td>$kd_kursus_dibuka</td>
				<td>$nrp - $nrp0 ($status)</td>
				<td>$keterangan</td>
				<td align='center'>


<a href='?mnu=knilai_detail&kd=$kd_nilai'><img src='ypathicon/xls.png' alt='detail'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data nilai belum tersedia...</blink></td></tr>";}
?>
</tbody>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=nilai'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=nilai'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=nilai'>Next »</a></span>";
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
	$kd_nilai=strip_tags($_POST["kd_nilai"]);
	$kd_nilai0=strip_tags($_POST["kd_nilai0"]);
	$kd_pendaftaran=strip_tags($_POST["kd_pendaftaran"]);
	 $sql="select * from `$tbpendaftaran` where `kd_pendaftaran`='$kd_pendaftaran'";
	$d=getField($conn,$sql);
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$nrp=$d["nrp"];
				
	$keterangan=strip_tags($_POST["keterangan"]);
if($pro=="simpan"){
$sql=" INSERT INTO `$tb_nilai` (
`kd_nilai` ,
`kd_pendaftaran` ,
`kd_periode` ,
`kd_kursus` ,
`kd_kursus_dibuka` ,
`nrp` ,
`keterangan` 
) VALUES (
'$kd_nilai', 
'$kd_pendaftaran', 
'$kd_periode',
'$kd_kursus',
'$kd_kursus_dibuka',
'$nrp',
'$keterangan'

)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kd_nilai berhasil disimpan !');document.location.href='?mnu=nilai';</script>";}
		else{echo"<script>alert('Data $kd_nilai gagal disimpan...');document.location.href='?mnu=nilai';</script>";}
	}
	else{
$sql="update `$tb_nilai` set 
`kd_pendaftaran`='$kd_pendaftaran',
`kd_periode`='$kd_periode' ,
`kd_kursus`='$kd_kursus',
`kd_kursus_dibuka`='$kd_kursus_dibuka', 
`nrp`='$nrp',
`keterangan`='$keterangan'
where `kd_nilai`='$kd_nilai0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kd_nilai berhasil diubah !');document.location.href='?mnu=nilai';</script>";}
	else{echo"<script>alert('Data $kd_nilai gagal diubah...');document.location.href='?mnu=nilai';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kd_nilai=$_GET["kode"];
$sql="delete from `$tb_nilai` where `kd_nilai`='$kd_nilai'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data nilai $kd_nilai berhasil dihapus !');document.location.href='?mnu=nilai';</script>";}
else{echo"<script>alert('Data nilai $kd_nilai gagal dihapus...');document.location.href='?mnu=nilai';</script>";}
}
?>

