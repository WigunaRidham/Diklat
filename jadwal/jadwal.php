

<?php
if(isset($_SESSION["ckd_periode"])){
	$kd_periode=$_SESSION["ckd_periode"];
	$kd_kursus=$_SESSION["ckd_kursus"];
	$kd_kursus_dibuka=$_SESSION["ckd_kursus_dibuka"];
	$hari=$_SESSION["chari"];
	
	
}
		?>
        
        
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
  
    
   <?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>

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
</script>

  
<script type="text/javascript"> 
function PRINT(){ 
win=window.open('jadwal/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
$kd_periode="";
$kd_kursus="";
$kd_kursus_dibuka="";

if($_GET["pro"]=="ubah"){
	$kd_jadwal=$_GET["kode"];
	 $sql="select * from `$tbjadwal` where `kd_jadwal`='$kd_jadwal'";
	$d=getField($conn,$sql);
				$kd_jadwal=$d["kd_jadwal"];
				$kd_jadwal0=$d["kd_jadwal"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$hari=$d["hari"];
				$tanggal=WKT($d["tanggal"]);
				$tanggal=BAL(strip_tags($_POST["tanggal"]));
				$waktu=$d["waktu"];
				$pertemuan_ke=$d["pertemuan_ke"];
				//$jumlah=$d["jumlah"];//
				//$dari=$d["dari"];
				$mata_pelajaran=$d["mata_pelajaran"];
				$tema=$d["tema"];
				$guru=$d["guru"];
				$tempat=$d["tempat"];
				$modul=$d["modul"];				
				$pro="ubah";		
}

?>
<div id="accordion">
  <h3>Input Jadwal</h3>
  <div>


<form action="" method="post" enctype="multipart/form-data">
<table width="408" height="586">

<tr>
<tr>
<tr>
<td height="38"><label for="kd_periode">Nama Periode</label>
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
<td height="38"><label for="kd_kursus">Jenis Kursus</label>
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
<td height="53"><label for="kd_kursus_dibuka">Nama Subkursus</label>
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
	echo"<option value='$kd_kursus_dibuka0' ";if($kd_kursus_dibuka0==$kd_kursus_dibuka){echo"selected";} echo">$kd_kursus_dibuka0 - $nama_subkursus </option>";//////////////////////////////
	}
	?>
    
  </select></div></td></tr>

<tr>
<td height="42"><label for="hari">Hari</label>
<td>:<td colspan="2"><select class="form-control" name="hari" id="hari">
  <option value="Senin" <?php if($hari=="Senin"){echo"selected";}?>>Senin</option>
  <option value="Selasa" <?php if($hari=="Selasa"){echo"selected";}?>>Selasa</option>
  <option value="Rabu" <?php if($hari=="Rabu"){echo"selected";}?>>Rabu</option>
  <option value="Kamis" <?php if($hari=="Kamis"){echo"selected";}?>>Kamis</option>
  <option value="Jumat " <?php if($hari=="Jumat"){echo"selected";}?>>Jumat</option>
  </select></td></td></td></tr>
   
   <tr>
<td height="42"><label for="tanggal">Tanggal</label>
<td>:<td colspan="2"><input class="form-control"  name="tanggal" type="text" id="tanggal" value="<?php echo $tanggal;?>" size="15" /></td></tr>

<tr>
<td height="42"><label for="waktu">Waktu</label>
<td>:<td colspan="2"><select class="form-control" name="waktu" id="waktu">
  <option value="07.15 - 08.45" <?php if($waktu=="07.15 - 08.45"){echo"selected";}?>>07.15 - 08.45</option>
  <option value="08.55 - 10.25" <?php if($waktu=="08.55 - 10.25"){echo"selected";}?>>08.55 - 10.25</option>
  <option value="10.45 - 12.15" <?php if($waktu=="10.45 - 12.15"){echo"selected";}?>>10.45 - 12.15</option>
  <option value="13.15 - 14.45" <?php if($waktu=="13.15 - 14.45"){echo"selected";}?>>13.15 - 14.45</option>
  </select></td></td></td></tr>

<tr>
<td height="42"><label for="pertemuan_ke"> (Jam) Pertemuan Ke</label>
<td>:<td colspan="2"><select class="form-control" name="pertemuan_ke" id="pertemuan_ke">
  <option value="1 - 2" <?php if($waktu=="1 - 2"){echo"selected";}?>>1 - 2</option>
  <option value="3 - 4" <?php if($waktu=="3 - 4"){echo"selected";}?>>3 - 4</option>
  <option value="5 - 6" <?php if($waktu=="5 - 6"){echo"selected";}?>>5 - 6</option>
  <option value="7 - 8" <?php if($waktu=="7 - 8"){echo"selected";}?>>7 - 8</option>
      <option value="9 - 10" <?php if($waktu=="9 - 10"){echo"selected";}?>>9 - 10</option>
  <option value="11 - 12" <?php if($waktu=="11 - 12"){echo"selected";}?>>11 - 12</option>
    </select></td></td></td></tr>

<!---

<tr>
<td height="36"><label for="jumlah">Jumlah</label>
<td>:<td colspan="2"><input class="form-control"  name="jumlah" type="text" id="jumlah" value="" size="15" /></td></tr>


<tr>
<td height="42"><label for="dari">Dari (Min)</label>
<td>:<td colspan="2"><select class="form-control" name="dari" id="dari">
  <option value="12" <?php if($waktu=="12"){echo"selected";}?>>12</option>
  <option value="78" <?php if($waktu=="78"){echo"selected";}?>>78</option>
  <option value="98" <?php if($waktu=="98"){echo"selected";}?>>98</option>
  <option value="125" <?php if($waktu=="125"){echo"selected";}?>>125</option>
  </select></td></td></td></tr>
---------------------------------------->

<tr>
<td height="37"><label for="mata_pelajaran">Mata Pelajaran</label>
<td>:<td colspan="2"><input class="form-control"  name="mata_pelajaran" type="text" id="mata_pelajaran" value="<?php echo $mata_pelajaran;?>" size="35" /></td></tr>


<tr>
<td height="38"><label for="tema">Tema</label>
<td>:<td colspan="2"><input class="form-control"  name="tema" type="tema" id="tema" value="<?php echo $tema;?>" size="35" /></td></tr>


<tr>
<td height="37"><label for="guru">Instruktur</label>
<td>:<td colspan="2"><input class="form-control"  name="guru" type="text" id="guru" value="<?php echo $guru;?>" size="35" /></td></tr>


<tr>
<td height="42"><label for="tempat2">Tempat</label></td>
        <td>:</td>
        <td colspan="2"><input type="radio" name="tempat" id="tempat2"  checked="checked" value="Kelas" <?php if($tempat=="Kelas"){echo"checked";}?>/>
          Kelas
          <input type="radio" name="tempat" id="tempat2" value="Lapangan" <?php if($tempat=="Lapangan"){echo"checked";}?>/>
          Lapangan </td></tr>
<tr>

<tr>
  <td height="53"><label>Modul</label>
    <td>:<td colspan="2"><label for="modul"></label>
        <input name="modul" type="file" id="modul" size="20" /> 
  </td>
</tr>

<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" onclick="MM_validateForm('jumlah','','R','tanggal',','R','mata_pelajaran','','R','guru','','R');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kd_jadwal0" type="hidden" id="kd_jadwal0" value="<?php echo $kd_jadwal0;?>" />
        <a href="?mnu=jadwal"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

 </div>
 
 <?php
  $sqlv="select distinct(kd_kursus_dibuka) from `$tbjadwal` order by `kd_jadwal` desc";
  	$arrv=getData($conn,$sqlv);
		foreach($arrv as $dv) {							
				$kd_kursus_dibuka=$dv["kd_kursus_dibuka"];
				$NKD= getKursusDibuka($conn,$dv["kd_kursus_dibuka"]);
			
			?>
  <h3>Data Jadwal <?php echo $NKD;?></h3>
  <div>

Data jadwal: 
| <a href="jadwal/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

 <table width="1086" class="table table-striped table-bordered table-hover">
     <thead> 
     <tr bgcolor="#cccccc">
    <th width="3%"><center>No</th>
    <th width="30%"><center>Jadwal </th><th width="50" > Kegiatan</th>
    <th width="15%"><center>Modul </th>
    <th width="10%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tbjadwal` where kd_kursus_dibuka='$kd_kursus_dibuka' order by `kd_jadwal` desc";
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
				$kd_jadwal=$d["kd_jadwal"];
				$kd_periode= getPeriode($conn,$d["kd_periode"]);
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);
			    $kkb= getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
				$hari=$d["hari"];
				$tanggal=WKT($d["tanggal"]);
				$waktu=$d["waktu"];
				$pertemuan_ke=$d["pertemuan_ke"];
				//$jumlah=$d["jumlah"];//
				//$dari=$d["dari"];//
				$mata_pelajaran=$d["mata_pelajaran"];
				$tema=$d["tema"];
				$guru=$d["guru"];
				$tempat=$d["tempat"];
				$modul=$d["modul"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>Periode : $kd_periode
				<br>Waktu : $hari, $tanggal
				<br> $waktu 
				<br> Pertemuan ke : $pertemuan_ke </br>
				Mata pelajaran : $mata_pelajaran </td>
				<td>Instruktur: $guru <br>
				Tema : $tema<br>Tempat : $tempat </td><td> <a href='downloadget.php?file=$modul' title='$modul'>Download</a>
				</td>
				
				<td align='center'>
<a href='?mnu=jadwal&pro=ubah&kode=$kd_jadwal'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=jadwal&pro=hapus&kode=$kd_jadwal'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kkb pada data jadwal ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data jadwal belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=jadwal'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=jadwal'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=jadwal'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>

</div>
<?php
		}//LOOP
		?>
</div>


<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kd_jadwal=strip_tags($_POST["kd_jadwal"]);
	$kd_jadwal0=strip_tags($_POST["kd_jadwal0"]);
	$kd_periode=strip_tags($_POST["kd_periode"]);
	$kd_kursus=strip_tags($_POST["kd_kursus"]);
	$kd_kursus_dibuka=strip_tags($_POST["kd_kursus_dibuka"]);
	$hari=strip_tags($_POST["hari"]);
	
	$_SESSION["ckd_periode"]=$kd_periode;
	$_SESSION["ckd_kursus"]=$kd_kursus;
	$_SESSION["ckd_kursus_dibuka"]=$kd_kursus_dibuka;
	$_SESSION["chari"]=$hari;
	
	$tanggal=BAL(strip_tags($_POST["tanggal"]));
	
	
	
	$waktu=strip_tags($_POST["waktu"]);
	
	$pertemuan_ke=strip_tags($_POST["pertemuan_ke"]);
	//$jumlah=strip_tags($_POST["jumlah"]);//
	//$dari=strip_tags($_POST["dari"]);
	$mata_pelajaran=strip_tags($_POST["mata_pelajaran"]);
	$tema=strip_tags($_POST["tema"]);
	$guru=strip_tags($_POST["guru"]);
	$tempat=strip_tags($_POST["tempat"]);
	$modul0=strip_tags($_POST["modul0"]);
	if ($_FILES["modul"] != "") {
		@copy($_FILES["modul"]["tmp_name"],"$YPATH/".$_FILES["modul"]["name"]);
		$modul=$_FILES["modul"]["name"];
		} 
	else {$modul=$modul0;}
	if(strlen($modul)<1){$modul=$modul0;}
		$status=strip_tags($_POST["status"]);
	echo $kesatuan;
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbjadwal` (
`kd_jadwal` ,
`kd_periode` ,
`kd_kursus` ,
`kd_kursus_dibuka` ,
`hari` ,
`tanggal` ,
`waktu`,
`pertemuan_ke`,

`mata_pelajaran`,
`tema`,
`guru`,
`tempat`,
`modul`
) VALUES (
'', 
'$kd_periode', 
'$kd_kursus',
'$kd_kursus_dibuka',
'$hari',
'$tanggal',
'$waktu',
'$pertemuan_ke',

'$mata_pelajaran',
'$tema',
'$guru',
'$tempat',
'$modul'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kd_jadwal berhasil disimpan !');document.location.href='?mnu=jadwal';</script>";}
		else{echo"<script>alert('Data $kd_jadwal gagal disimpan...');document.location.href='?mnu=jadwal';</script>";}
	}
	else{
$sql="update `$tbjadwal` set 
`kd_periode`='$kd_periode',
`kd_kursus`='$kd_kursus' ,
`kd_kursus_dibuka`='$kd_kursus_dibuka',
`hari`='$hari' ,
`tanggal`='$tanggal' ,
`waktu`='$waktu',
`pertemuan_ke`='$pertemuan_ke' ,


`mata_pelajaran`='$mata_pelajaran' ,
`tema`='$tema' ,
`guru`='$guru' ,
`tempat`='$tempat',
`modul`='$modul'

where `kd_jadwal`='$kd_jadwal0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kd_jadwal berhasil diubah !');document.location.href='?mnu=jadwal';</script>";}
	else{echo"<script>alert('Data $kd_jadwal gagal diubah...');document.location.href='?mnu=jadwal';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kd_jadwal=$_GET["kode"];
$sql="delete from `$tbjadwal` where `kd_jadwal`='$kd_jadwal'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data jadwal $kd_jadwal berhasil dihapus !');document.location.href='?mnu=jadwal';</script>";}
else{echo"<script>alert('Data jadwal $kd_jadwal gagal dihapus...');document.location.href='?mnu=jadwal';</script>";}
}
?>

