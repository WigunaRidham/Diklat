<?php
$pro="simpan";
$tanggal_daftar=WKT(date("Y-m-d"));
$tanggal_surat=WKT(date("Y-m-d"));

?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_daftar").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });	
      });
    </script>    
    
    
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
function PRINT(){ 
win=window.open('pendaftaran/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
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
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
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
$nrp="";
if($_GET["pro"]=="ubah"){
	$kd_pendaftaran=$_GET["kode"];
	$sql="select * from `$tbpendaftaran` where `kd_pendaftaran`='$kd_pendaftaran'";
	$d=getField($conn,$sql);
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_pendaftaran0=$d["kd_pendaftaran"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$nrp=$d["nrp"];
				$tanggal_daftar=WKT($d["tanggal_daftar"]);
				$status=$d["status"];
				
				
				$no_sprint=$d["no_sprint"];
				$no_surat=$d["no_surat"];
				$tanggal_surat=WKT($d["tanggal_surat"]);
				$surat=$d["surat"];
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Data Pendaftaran</h3>
  <div>


<form action="" method="post" enctype="multipart/form-data">
<table width="604" height="368">


<tr>
<td height="39" valign="top"><label>NRP/NIP</label>
<td valign="top">:
<td> <div class="form-group input-group"> <input name="nrp" id="nrp" onchange="showNrp(nrp.value)" type="text" class="form-control" value="<?php echo $nrp;?>"><span class="input-group-btn"><button class="btn btn-default" onClick="showNrp(nrp.value) " type="button">
<i class="fa fa-search"></i>
</button></span></div>

<div id="txtHint"></div>
</td>
</tr>


<tr>
<tr>
<td height="38"><label for="kd_periode">Pilih Periode</label>
<td>:
<td colspan="2"><label for="kd_periode"></label>
  <select  class="form-control" name="kd_periode" id="kd_periode"  onChange="showKursus(this.value)">
    <option value="Pilih ">Pilih</option>
     <?php
	  $s="select * from `tb_periode`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$kd_periode0=$d["kd_periode"];
				$nama_periode=$d["nama_periode"];
	echo"<option value='$kd_periode0' ";if($kd_periode0==$kd_periode){echo"selected";} echo">$nama_periode</option>";
	}
	?>
   
  </select></td></tr>
<tr>
<td height="38"><label for="kd_kursus">Pilih Kursus</label>
<td>:
<td colspan="2"><div id="txtHintKursus">
  <select class="form-control" name="kd_kursus" id="kd_kursus"  onChange="showKursusDibuka(this.value)">
    <option value="Pilih">Pilih</option>
     <?php
	  $s="select * from `tb_kursus`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$kd_kursus0=$d["kd_kursus"];
				$nama_kursus=$d["nama_kursus"];
	echo"<option value='$kd_kursus0' ";if($kd_kursus0==$kd_kursus){echo"selected";} echo">$kd_kursus0 - $nama_kursus  </option>";
	}
	?>
    
  </select></div>
  </td></tr>
<tr>
<td height="53"><label for="kd_kursus_dibuka">Nama Kursus Dibuka</label>
<td>:
<td colspan="2"><div id="txtHintKursusDibuka">
 <select class="form-control" name="kd_kursus_dibuka" id="kd_kursus_dibuka">
    <option value="Pilih">Pilih</option>
     <?php
	  $s="select * from `tb_kursus_dibuka`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$kd_kursus_dibuka0=$d["kd_kursus_dibuka"];
				$nama_subkursus =$d["nama_subkursus"]; ///////////////////////////////////
	echo"<option value='$kd_kursus_dibuka0' ";if($kd_kursus_dibuka0==$kd_kursus_dibuka){echo"selected";} echo">$kd_kursus_dibuka0 - $nama_subkursus  </option>";//////////////////////////////
	}
	?>
    
  </select></div></td></tr>




<tr>
</tr>
<tr>
<td height="38"><label for="tanggal_daftar">Tanggal Daftar</label>
<td>:<td colspan="2"><input   class="form-control" name="tanggal_daftar" type="text" id="tanggal_daftar" value="<?php echo $tanggal_daftar;?>" size="25" />
</td>
</tr>


<td height="40"><label for="no_sprint">Nomor SPRINT</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="no_sprint" type="text" id="no_sprint" value="<?php echo $no_sprint;?>" size="20" />
    </td>
      </tr>

<tr>
<td height="37"><label for="status">Status</label>
<td>:<td colspan="2">
<!--<input type="radio" name="status" id="status"  value="Tidak Sesuai" <?php if($status=="Tidak Sesuai"){echo"checked";}?>/>Tidak Sesuai--> 
<input type="radio" name="status" id="status" checked="checked"  value="Proses" <?php if($status=="Proses"){echo"checked";}?>/>Proses
 <input type="radio" name="status" id="status"  value="Diterima" <?php if($status=="Diterima"){echo"checked";}?>/>Diterima 
<input type="radio" name="status" id="status" value="Tidak Diterima" <?php if($status=="Tidak Diterima"){echo"checked";}?>/>Tidak Diterima
</td></tr>
<tr>


        <td height="40"><label for="no_surat">Nomor Surat</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="no_surat" type="text" id="no_surat" value="<?php echo $no_surat;?>" size="20" />
    </td>
      </tr>

<tr>
</tr>
<tr>
<td height="38"><label for="tanggal_surat">Tanggal Surat</label>
<td>:<td colspan="2"><input   class="form-control" name="tanggal_surat" type="text" id="tanggal_surat" value="<?php echo $tanggal_surat;?>" size="25" />
</td>
</tr>
<tr>
        <td height="30"><label for="surat">Jenis Surat</label></td><td>:</td>
        <td colspan="2"><label for="surat"></label>
          <select  class="form-control" name="surat" id="surat">
          <!--  <option value="SK-Tidak Sesuai" <?php if($surat=="SK-Tidak Sesuai"){echo"selected";} ?> >SK-Tidak Sesuai</option> -->
           <!-- <option value="SK-Ujian Masuk"  <?php if($surat=="SK-Ujian Masuk"){echo"selected";} ?>>SK-Ujian Masuk</option> -->
            <option value="SK-Diterima"  <?php if($surat=="SK-Diterima"){echo"selected";} ?>>SK-Diterima</option>
            <option value="SK-Tidak Diterima"  <?php if($surat=="SK-Tidak Diterima"){echo"selected";} ?>>SK-Tidak Diterima</option>
           
          </select></td>
      </tr>
<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" onclick="MM_validateForm('nrp','','R','tanggal_daftar','','R');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kd_pendaftaran0" type="hidden" id="kd_pendaftaran0" value="<?php echo $kd_pendaftaran0;?>" />
        <a href="?mnu=pendaftaran"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

  </div>
  
  <?php  
  $sqlq="select distinct(kd_kursus) from `tb_pendaftaran` order by `kd_pendaftaran` desc ";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$kd_kursus=$dq["kd_kursus"];
	$NB= getKursus($conn,$dq["kd_kursus"]);
?>     

   <h2><a href="#">Data Pendaftaran <?php echo"$NB";?></a></h2>
     <div>

Data Pendaftaran <?php echo $NB;?>: 
| <a href="pendaftaran/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 

| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>
 <table width="100%" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
    <th width="4%"><center>No</th>
       <th width="29%"><center>Data Pendaftaran</th>
    <th width="31%"><div align="center">Data Surat Masuk</div></th>
    <th width="28%"><center>Data Surat Keluar</th>
    <th width="8%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tbpendaftaran` where kd_kursus='$kd_kursus' order by `kd_kursus_dibuka` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 15;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode= getPeriode($conn,$d["kd_periode"]);
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka= getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
			
				$nrp=$d["nrp"];
				$nrp0=getNrp($conn,$d["nrp"]);
				$tanggal_daftar=WKT($d["tanggal_daftar"]);
				$status=$d["status"];
				$no_surat=$d["no_surat"];
				$gambar=$d["gambar"];
				$tanggal_surat=WKT($d["tanggal_surat"]);
				$surat=$d["surat"];
				$no_sprint=$d["no_sprint"];
				
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kd_kursus <br>$kd_kursus_dibuka <br> $nrp - $nrp0  
				<td>Nomor SPRINT: 
				<a href='downloadget.php?file=$gambar' title='$gambar'>$no_sprint</a>
				<br> Tanggal Daftar:$tanggal_daftar <br> Status: $status</td>
				<td>Nomor Surat: $no_surat<br> Tanggal Surat: $tanggal_surat <br> Jenis Surat: $surat </td>
				<td align='center'>
<a href='?mnu=pendaftaran&pro=ubah&kode=$kd_pendaftaran'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=pendaftaran&pro=hapus&kode=$kd_pendaftaran'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kd_periode pada data pendaftaran ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data pendaftaran belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pendaftaran'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pendaftaran'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pendaftaran'>Next »</a></span>";
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
	
	$sql="select `kd_pendaftaran` from `$tbpendaftaran` order by `kd_pendaftaran` desc";
 $jum= getJum($conn,$sql);
   $th=date("y");
  $bl=date("m");
  $kd="R".$th.$bl;//T1108001
		if($jum > 0){
		$d=getField($conn,$sql);
    		$idmax=$d["kd_pendaftaran"];
			$urut=substr($idmax,5,5)+1;
				if($urut<10){$idmax="$kd"."0000".$urut;}
				else if($urut<100){$idmax="$kd"."000".$urut;}
				else if($urut<1000){$idmax="$kd"."00".$urut;}
				else if($urut<10000){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."00001";}
		$kd_pendaftaran=$idmax;
		
		
	$kd_pendaftaran0=strip_tags($_POST["kd_pendaftaran0"]);
	$kd_periode=strip_tags($_POST["kd_periode"]);
	$kd_kursus=strip_tags($_POST["kd_kursus"]);
	$kd_kursus_dibuka=strip_tags($_POST["kd_kursus_dibuka"]);
	$nrp=strip_tags($_POST["nrp"]);
	$tanggal_daftar=BAL(strip_tags($_POST["tanggal_daftar"]));
	$status=strip_tags($_POST["status"]);
	
	$no_sprint=strip_tags($_POST["no_sprint"]);
	$no_surat=strip_tags($_POST["no_surat"]);
	$tanggal_surat=BAL(strip_tags($_POST["tanggal_surat"]));
	$surat=strip_tags($_POST["surat"]);

if($pro=="simpan"){
$sql=" INSERT INTO `$tbpendaftaran` (
`kd_pendaftaran` ,
`kd_periode` ,
`kd_kursus` ,
`kd_kursus_dibuka` ,
`nrp` ,
`tanggal_daftar` ,
`status`,
`no_sprint`, 
`no_surat`,
`tanggal_surat`,
`surat`

) VALUES (
'$kd_pendaftaran', 
'$kd_periode', 
'$kd_kursus',
'$kd_kursus_dibuka',
'$nrp',
'$tanggal_daftar',
'$status',
'$no_sprint',
'$no_surat',
'$tanggal_surat',
'$surat'
 
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kd_pendaftaran berhasil disimpan !');document.location.href='?mnu=pendaftaran';</script>";}
		else{echo"<script>alert('Data $kd_pendaftaran gagal disimpan...');document.location.href='?mnu=pendaftaran';</script>";}
	}
	else{
$sql="update `$tbpendaftaran` set 
`kd_periode`='$kd_periode',
`kd_kursus`='$kd_kursus' ,
`kd_kursus_dibuka`='$kd_kursus_dibuka' ,
`nrp`='$nrp',
`tanggal_daftar`='$tanggal_daftar', 
`status`='$status',
`no_sprint`='$no_sprint',
`no_surat`='$no_surat',
`tanggal_surat`='$tanggal_surat',
`surat`='$surat'



where `kd_pendaftaran`='$kd_pendaftaran0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kd_pendaftaran berhasil diubah !');document.location.href='?mnu=pendaftaran';</script>";}
	else{echo"<script>alert('Data $kd_pendaftaran gagal diubah...');document.location.href='?mnu=pendaftaran';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kd_pendaftaran=$_GET["kode"];
$sql="delete from `$tbpendaftaran` where `kd_pendaftaran`='$kd_pendaftaran'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data pendaftaran $kd_pendaftaran berhasil dihapus !');document.location.href='?mnu=pendaftaran';</script>";}
else{echo"<script>alert('Data pendaftaran $kd_pendaftaran gagal dihapus...');document.location.href='?mnu=pendaftaran';</script>";}
}
?>

