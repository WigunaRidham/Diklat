
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

    <?php
$pro="simpan";
$tanggal_surat=WKT(date("Y-m-d"));
?>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_surat").datepicker({
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
  $sql="select `kd_surat` from `$tb_surat` order by `kd_surat` desc";
 $jum= getJum($conn,$sql);
   $th=date("y");
  $bl=date("m");
  $kd="Msg".$th.$bl;//T1108001
		if($jum > 0){
		$d=getField($conn,$sql);
    		$idmax=$d["kd_surat"];
			$urut=substr($idmax,5,5)+1;
				if($urut<10){$idmax="$kd"."0000".$urut;}
				else if($urut<100){$idmax="$kd"."000".$urut;}
				else if($urut<1000){$idmax="$kd"."00".$urut;}
				else if($urut<10000){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."00001";}
		$kd_surat=$idmax;
?> 


<?php
$nrp="";
$tanggal_surat="";
if($_GET["pro"]=="ubah"){
	$kd_surat=$_GET["kode"];
	$sql="select * from `$tb_surat` where `kd_surat`='$kd_surat'";
	$d=getField($conn,$sql);
				$kd_surat=$d["kd_surat"];
				$kd_surat0=$d["kd_surat"];
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$nrp=$d["nrp"];
				$status=$d["status"];
				$nomor_surat=$d["nomor_surat"];
				
				//$gambar=$d["gambar"];
				//$gambar0=$d["gambar"];
				$tanggal_surat=WKT($d["tanggal_surat"]);
				
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Data Surat</h3>
  <div>
<form action="" method="post" enctype="multipart/form-data">
<table width="754" height="388">


<tr>
<th width="197">Kode Surat<th width="10">:<th width="532" colspan="2">
<b><?php echo $kd_surat;?></b>
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
  <td height="26"><label>Surat</label>
    <td>:<td ><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $kd_surat;?>")'><?php echo $gambar0;?></a></td>
</tr>
-->

<tr>
<div id="txtHint"></div></tr>
<tr>
<td height="38"><label for="tanggal_surat">Tanggal Surat</label>
<td>:<td colspan="2"><input   class="form-control" name="tanggal_surat" type="text" id="tanggal_surat" value="<?php echo $tanggal_surat;?>" size="25" />
</td>
</tr>


<tr>
<td height="24"><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  value="Tidak sesuai" <?php if($status=="Tidak sesuai"){echo"checked";}?>/>Tidak sesuai 
<input type="radio" name="status" id="status"  value="Proses" <?php if($status=="Proses"){echo"checked";}?>/>Proses 
<input type="radio" name="status" id="status"  value="Diterima" <?php if($status=="Diterima"){echo"checked";}?>/>Diterima 
<input type="radio" name="status" id="status" value="Tidak Diterima" <?php if($status=="Tidak Diterima"){echo"checked";}?>/>Tidak Diterima
</td></tr>

 <tr>
        <td height="40"><label for="nama2">Nomor Surat</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="nomor_surat" type="text" id="nomor_surat2" value="<?php echo $nomor_surat;?>" size="35" /></td>
      </tr>


<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan"  value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kd_surat" type="hidden" id="kd_surat" value="<?php echo $kd_surat;?>" />
      <!--- <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />---->
         <input name="kd_surat0" type="hidden" id="kd_surat0" value="<?php echo $kd_surat0;?>" />
        <a href="?mnu=surat"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
 </div>
 
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
      <th width="4%"><center>No</th>
    <th width="6%"><center>Kode Surat</th>
    
    <th width="8%"><center>Nama Periode</th>
    <th width="18%"><center>Nama Kursus</th>
   <th width="15%"><center>NRP/NIP</th>
    <th width="5%"><center>Status</th>
     <th width="8%">Tanggal Surat</td>
    <th width="5%"><center>Nomor Surat</th>
     
  <th width="9%"><center>Menu</th>
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
				$nama=getNrp($conn,$d["nrp"]);
				$status=$d["status"];
				$tanggal_surat=WKT($d["tanggal_surat"]);
				$nomor_surat=$d["nomor_surat"];
				//$gambar=$d["gambar"];
				//$gambar0=$d["gambar0"];
				
				$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kd_surat</td>
				
				<td>$kd_periode</td>
				<td>$kd_kursus - $kd_kursus_dibuka</td>
				
				<td align='center'>$nrp - $nama</td>
				<td>$status</td>
				<td>$tanggal_surat</td>
				<td>$nomor_surat</td>
			
				<td align='center'>
<a href='?mnu=surat&pro=ubah&kode=$kd_surat'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=surat&pro=hapus&kode=$kd_surat'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kd_surat pada data sertfikat ?..\")'></a></td>
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
	
	$tanggal_surat=BAL(strip_tags($_POST["tanggal_surat"]));
	$nomor_surat=strip_tags($_POST["$nomor_surat"]);
	/**$gambar=strip_tags($_POST["gambar"]);
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}*/
	
	

				
				
if($pro=="simpan"){
	  $sql="select * from `$tb_surat` where status='$status' AND nrp='$nrp' AND kd_kursus_dibuka='$kd_kursus_dibuka' order by `kd_surat` desc";
  $jum=getJum($conn,$sql);
		if($jum == 0){
$sql=" INSERT INTO `$tb_surat` (
`kd_surat` ,
`kd_pendaftaran` ,
`kd_periode` ,
`kd_kursus` ,
`kd_kursus_dibuka` ,
`nrp` ,
`status` ,
`tanggal_surat` ,
`nomor_surat`

) VALUES (
'$kd_surat', 
'$kd_pendaftaran', 
'$kd_periode',
'$kd_kursus',
'$kd_kursus_dibuka',
'$nrp',
'$status',
'$tanggal_surat',
'$nomor_surat'

)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kd_surat berhasil disimpan !');document.location.href='?mnu=surat';</script>";}
		else{echo"<script>alert('Data $kd_surat gagal disimpan...');document.location.href='?mnu=surat';</script>";}
	}else{
		echo"<script>alert('Data dengan Status $status sudah tersedia...');document.location.href='?mnu=surat';</script>";
	}
}
	else{
$sql="update `$tb_surat` set 
`kd_pendaftaran`='$kd_pendaftaran',
`kd_periode`='$kd_periode' ,
`kd_kursus`='$kd_kursus',
`kd_kursus_dibuka`='$kd_kursus_dibuka', 
`nrp`='$nrp',
`status`='$status',
`tanggal_surat`='$tanggal_surat',
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

