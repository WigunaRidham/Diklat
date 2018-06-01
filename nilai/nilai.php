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
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
<?php
  $sql="select `kd_nilai` from `$tb_nilai` order by `kd_nilai` desc";
 $jum= getJum($conn,$sql);
   $th=date("y");
  $bl=date("m");
  $kd="N".$th.$bl;//T1108001
		if($jum > 0){
		$d=getField($conn,$sql);
    		$idmax=$d["kd_nilai"];
			$urut=substr($idmax,5,5)+1;
				if($urut<10){$idmax="$kd"."0000".$urut;}
				else if($urut<100){$idmax="$kd"."000".$urut;}
				else if($urut<1000){$idmax="$kd"."00".$urut;}
				else if($urut<10000){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."00001";}
		$kd_nilai=$idmax;
?>

<?php

$nrp="";

if($_GET["pro"]=="ubah"){
	$kd_nilai=$_GET["kode"];
	$sql="select * from `$tb_nilai` where `kd_nilai`='$kd_nilai'";
	$d=getField($conn,$sql);
				$kd_nilai=$d["kd_nilai"];
				$kd_nilai0=$d["kd_nilai"];
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$nrp=$d["nrp"];
				$keterangan=$d["keterangan"];
				$pro="ubah";		
}
?>
<div id="accordion">
  <h3>Input Nilai</h3>
  <div>

<form action="" method="post" enctype="multipart/form-data">
<table width="587" height="439">


<tr>
<td width="232" height="60"><label for="kd_nilai">Kode Nilai</label><td width="19" colspan="2">:
<b><?php echo $kd_nilai;?> </b> 
</tr>

<tr>
<td height="39" valign="top"><label>NRP/NIP</label>
<td valign="top">:
<td> <div class="form-group input-group"> <input name="nrp" id="nrp" onchange="showPendaftaran(nrp.value)"  type="text" class="form-control" value="<?php echo $nrp;?>"><span class="input-group-btn"><button class="btn btn-default" onClick="showNrp(nrp.value) " type="button">
<i class="fa fa-search"></i>
</button></span></div>
<div id="txtHint1c"></div>
</td>
</tr>
<tr>

<tr>
<td height="60" valign="top"><label for="kd_pendaftaran">Pilih Pendaftaran</label><td>:<td colspan="2">
<label for="kd_pendaftaran"></label>
 <div id="txtHintPendaftaran">
  <select class="form-control"  name="kd_pendaftaran" id="kd_pendaftaran">
    <option value="Pilih">Pilih</option>
     <?php
	  $s="select * from `tb_pendaftaran`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$kd_pendaftaran0=$d["kd_pendaftaran"];
				$nrp=$d["nrp"];/////////////////////////////
	echo"<option value='$kd_pendaftaran0' ";if($kd_pendaftaran0==$kd_pendaftaran){echo"selected";} echo">$kd_pendaftaran0 | $nrp - ".getNrp($conn,$nrp)." </option>"; 
	}
	?>
  </select></div></td></tr>

<tr>
<td height="37"><label for="keterangan">Keterangan Nilai</label>
<td>:<td colspan="2">
<input type="radio" name="keterangan" id="keterangan"  checked="checked" value="Ujian Masuk" <?php if($keterangan=="Ujian Masuk"){echo"checked";}?>/>Ujian Masuk
 <input type="radio" name="keterangan" id="keterangan"  value="Tengah" <?php if($keterangan=="Tengah"){echo"checked";}?>/>Tengah 
<input type="radio" name="keterangan" id="keterangan" value="Akhir" <?php if($keterangan=="Akhir"){echo"checked";}?>/>Akhir
</td></tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" onclick="MM_validateForm('nrp','','R');MM_validateForm('nrp','','R');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kd_nilai0" type="hidden" id="kd_nilai0" value="<?php echo $kd_nilai0;?>" /> 
         <input name="kd_nilai" type="hidden" id="kd_nilai" value="<?php echo $kd_nilai;?>" />
        <a href="?mnu=nilai"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

 </div>
 
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

<table width="1082" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
    <th width="4%"><center>No</th>
    <th width="11%"><center>Kode</th>
    <th width="15%"><center>

Periode</th>
    <th width="14%"><center>
Kursus</th>
    <th width="23%"><center>Nama Sub Kursus</th>
    <th width="21%"><center>NRP/NIP</th>
    
    <th width="12%"><center>Menu</th>
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
				///$status=getStatus($conn,$d["kd_pendaftaran"]);//
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
				 
				<td>$kd_periode</td>
				<td>$kd_kursus</td>
				<td>$kd_kursus_dibuka</td>
				<td>$nrp - $nrp0 <!---- //($status)</td>--------------->
				
				<td align='center'>
<a href='?mnu=nilai&pro=ubah&kode=$kd_nilai'><img src='ypathicon/u.png' alt='ubah'></a>
  
<a href='?mnu=nilai&pro=hapus&kode=$kd_nilai'><img src='ypathicon/h.png' alt='hapus'
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kd_pendaftaran pada data nilai ?..\")'></a>

<a href='?mnu=nilai_detail&kd=$kd_nilai'><img src='ypathicon/xls.png' alt='detail'></a></td>
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
	echo $sqlb1="select * from `$tb_nilai` where `kd_kursus_dibuka`='$kd_kursus_dibuka' and nrp='".$nrp."' AND keterangan='".$keterangan."'";
	//$db=getField($conn,$sqlb);
	  $jum=getJum($conn,$sqlb1);
		if($jum == 0){
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
		}else{
			echo"<script>alert('Data $keterangan sudah tersedia...');document.location.href='?mnu=nilai';</script>";
		}
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

