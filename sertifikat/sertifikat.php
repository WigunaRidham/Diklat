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
  $sql="select `kd_sertifikat` from `tb_sertifikat` order by `kd_sertifikat` desc";
 $jum= getJum($conn,$sql);
   $th=date("y");
  $bl=date("m");
  $kd="S".$th.$bl;//T1108001
		if($jum > 0){
		$d=getField($conn,$sql);
    		$idmax=$d["kd_sertifikat"];
			$urut=substr($idmax,5,5)+1;
				if($urut<10){$idmax="$kd"."0000".$urut;}
				else if($urut<100){$idmax="$kd"."000".$urut;}
				else if($urut<1000){$idmax="$kd"."00".$urut;}
				else if($urut<10000){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."00001";}
		$kd_sertifikat=$idmax;
?> 


<?php
$nrp="";
$tanggal_pembuatan="";
if($_GET["pro"]=="ubah"){
	$kd_sertifikat=$_GET["kode"];
	$sql="select * from `$tb_sertifikat` where `kd_sertifikat`='$kd_sertifikat'";
	$d=getField($conn,$sql);
				$kd_sertifikat=$d["kd_sertifikat"];
				$kd_sertifikat0=$d["kd_sertifikat"];
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$nrp=$d["nrp"];
				$no_sertifikat=$d["no_sertifikat"];
				$status=$d["status"];
				//$gambar=$d["gambar"];
				//$gambar0=$d["gambar"];
				$tanggal_pembuatan=WKT($d["tanggal_pembuatan"]);
				
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Data Sertifikat</h3>
  <div>
<form action="" method="post" enctype="multipart/form-data">
<table width="754" height="388">


<tr>
<th width="197">Kode Sertifikat<th width="10">:<th width="532" colspan="2">
<b><?php echo $kd_sertifikat;?></b>
</tr>


<tr>
<td height="39" valign="top"><label>NRP/NIP</label>
<td valign="top">:
<td> <div class="form-group input-group"> <input name="nrp" id="nrp" onchange="showNrp(nrp.value)" type="text" class="form-control" value="<?php echo $nrp;?>"><span class="input-group-btn"><button class="btn btn-default" onClick="showNrp(nrp.value) " type="button">
<i class="fa fa-search"></i>
</button></span></div>

<div id="txtHintNRP"></div>
</td>
</tr>



  <!--
<tr>
  <td height="26"><label>Sertifikat</label>
    <td>:<td ><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $kd_sertifikat;?>")'><?php echo $gambar0;?></a></td>
</tr>
-->

<tr>
<div id="txtHint"></div></tr>
<tr>
<td height="38"><label for="tanggal_pembuatan">Tanggal Pembuatan</label>
<td>:<td colspan="2"><input   class="form-control" name="tanggal_pembuatan" type="text" id="tanggal_pembuatan" value="<?php echo $tanggal_pembuatan;?>" size="25" />
</td>
</tr>


<tr>
<td height="24"><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Proses" <?php if($status=="Proses"){echo"checked";}?>/>Proses 
<input type="radio" name="status" id="status"  value="Lulus" <?php if($status=="Lulus"){echo"checked";}?>/>Lulus 
<input type="radio" name="status" id="status" value="Tidak Lulus" <?php if($status=="Tidak Lulus"){echo"checked";}?>/>Tidak Lulus
</td></tr>

<td height="40"><label for="no_sertifikat">Nomor Sertifikat</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="no_sertifikat" type="text" id="no_sertifikat" value="<?php echo $no_sertifikat;?>" size="20" />
    </td>
      </tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" onclick="MM_validateForm('nrp','','R','tanggal_pembuatan','','R');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kd_sertifikat" type="hidden" id="kd_sertifikat" value="<?php echo $kd_sertifikat;?>" />
       <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
         <input name="kd_sertifikat0" type="hidden" id="kd_sertifikat0" value="<?php echo $kd_sertifikat0;?>" />
        <a href="?mnu=sertifikat"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
 </div>
 
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
      <th width="4%"><center>No</th>
    
    
    <th width="22%"><center>Kursus Diikuti</th>
    <th width="22%"><center>Peserta</th>
    <th width="11%"><center>Status</th>
    <th width="14%"><center>Nomor Sertifikat</th>
     <th width="12%">Tanggal Pembuatan</td>
    
     
  <th width="15%"><center>Menu</th>
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
				
				
				<td>$kd_periode <br> $kd_kursus <br>$kd_kursus_dibuka</td>
				<td>$nrp - $nama</td>
				<td>$status</td>
				<td>$no_sertifikat</td>
				<td>$tanggal_pembuatan</td>
				
			
				<td align='center'>
<a href='?mnu=sertifikat&pro=ubah&kode=$kd_sertifikat'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=sertifikat&pro=hapus&kode=$kd_sertifikat'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kd_sertifikat pada data sertfikat ?..\")'></a></td>
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

	$status=strip_tags($_POST["status"]);
	$no_sertifikat=strip_tags($_POST["no_sertifikat"]);
	$tanggal_pembuatan=BAL(strip_tags($_POST["tanggal_pembuatan"]));
	
	$gambar=strip_tags($_POST["gambar"]);
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
	
	// $sql="select * from `$tb_kabadan` order by kd_kabadan desc";
	//$d=getField($conn,$sql);
		//		$kd_kabadan=$d["kd_kabadan"];
				
				
if($pro=="simpan"){
	  $sql="select * from `$tb_sertifikat` where status='$status' AND nrp='$nrp' AND kd_kursus_dibuka='$kd_kursus_dibuka' order by `kd_sertifikat` desc";
  $jum=getJum($conn,$sql);
		if($jum == 0){
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
	}else{
		echo"<script>alert('Data dengan Status $status sudah tersedia...');document.location.href='?mnu=sertifikat';</script>";
	}
}
	else{
$sql="update `$tb_sertifikat` set 
`kd_pendaftaran`='$kd_pendaftaran',
`kd_periode`='$kd_periode' ,
`kd_kursus`='$kd_kursus',
`kd_kursus_dibuka`='$kd_kursus_dibuka', 
`nrp`='$nrp',
`status`='$status',
`no_sertifikat`='$no_sertifikat',
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

