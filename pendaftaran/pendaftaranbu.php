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
        $("#tanggal_daftar").datepicker({
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
?>
<! ---->

<?php
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
				
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Data Pendaftaran</h3>
  <div>


<form action="" method="post" enctype="multipart/form-data">
<table width="604" height="368">


<tr>
<td width="174" height="40"><label for="kd_pendaftaran">Kode Pendaftaran</label>
<td width="23">:
<td width="246" colspan="2"><input   class="form-control" name="kd_pendaftaran" type="text" id="kd_pendaftaran" value="<?php echo $kd_pendaftaran;?>" size="20" /></td>
</tr>

<tr>
<td height="39"><label>NRP/NIP</label>
<td>:
<td> <div class="form-group input-group"> <input name="nrp" id="nrp" onchange="showPendaftaran(nrp.value)" type="text" class="form-control" value="<?php echo $nrp;?>"><span class="input-group-btn"><button class="btn btn-default" onClick="showPendaftaran(nrp.value) " type="button"><i class="fa fa-search"></i>
</button></span></div></td>
</tr>


<tr>
<tr>
<td height="38"><label for="kd_periode">Pilih Periode</label>
<td>:
<td colspan="2"><label for="kd_periode"></label>
  <select  class="form-control" name="kd_periode" id="kd_periode">
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
<td colspan="2"><label for="kd_kursus"></label>
  <select class="form-control" name="kd_kursus" id="kd_kursus">
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
    
  </select></td></tr>
<tr>
<td height="53"><label for="kd_kursus_dibuka">Nama Kursus Dibuka</label>
<td>:
<td colspan="2"><label for="kd_kursus_dibuka"></label>
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
    
  </select></td></tr>




<tr>
<div id="txtHint"></div></tr>
<tr>
<td height="38"><label for="tanggal_daftar">Tanggal Daftar</label>
<td>:<td colspan="2"><input   class="form-control" name="tanggal_daftar" type="text" id="tanggal_daftar" value="<?php echo $tanggal_daftar;?>" size="25" />
</td>
</tr>

<tr>
<td height="37"><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Proses" <?php if($status=="Proses"){echo"checked";}?>/>Proses
 <input type="radio" name="status" id="status"  value="Diterima" <?php if($status=="Diterima"){echo"checked";}?>/>Diterima 
<input type="radio" name="status" id="status" value="Tidak Diterima" <?php if($status=="Tidak Diterima"){echo"checked";}?>/>Tidak Diterima
</td></tr>


<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kd_pendaftaran" type="hidden" id="kd_pendaftaran" value="<?php echo $kd_pendaftaran;?>" />
        <input name="kd_pendaftaran0" type="hidden" id="kd_pendaftaran0" value="<?php echo $kd_pendaftaran0;?>" />
        <a href="?mnu=pendaftaran"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

  </div>
  
  <?php  
  $sqlq="select distinct(kd_kursus) from `tb_pendaftaran` order by `kd_pendaftaran` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$kd_kursus=$dq["kd_kursus"];
	$NB= getKursus($conn,$d["kd_kursus"]);
?>     

   <h2><a href="#">Data Pendaftaran <?php echo"$NB";?></a></h2>
     <div>

<?php
$sql="select * from `$tbkursus_dibuka` where `kd_kursus_dibuka`='$kd_kursus_dibuka'";
	$d=getField($conn,$sql);
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$kd_kursus_dibuka0=$d["kd_kursus_dibuka"];
				
				$kd_kursus=$d["kd_kursus"];
				$nama_subkursus=$d["nama_subkursus"];
				$kd_periode=$d["kd_periode"];
				$gelombang=$d["gelombang"];
				$tingkat=$d["tingkat"];
				
				$sifat=$d["sifat"];
				$bulan=$d["bulan"];
				$jampel=$d["jampel"];
				$siswa=$d["siswa"];
				$kelas=$d["kelas"];
				$ujian_masuk=WKT($d["ujian_masuk"]);
				$buka=WKT($d["buka"]);
				$ujian_tengah=WKT($d["ujian_tengah"]);
				$ujian_akhir=WKT($d["ujian_akhir"]);
				$tutup=WKT($d["tutup"]);
				$keterangan=$d["keterangan"];

				$nk= getKursus($conn,$d["kd_kursus"]);///gettt
				$nama_subkursus=$d["nama_subkursus"];
				$np=getPeriode($conn,$d["kd_periode"]);
?>

<table width="469" height="361">


<tr>
<td width="170" height="35"><label for="kd_kursus_dibuka">Kode Kursus Dibuka</label>
<td width="11">:<td width="272" colspan="2"><input class="form-control"  name="kd_kursus_dibuka" type="text" id="kd_kursus_dibuka" value="<?php echo $kd_kursus_dibuka;?>" size="20" />
</td></tr>
<!------------------------------------------------------------->
<tr>
<td height="24"><label for="kd_kursus">Nama Kursus</label>
<td>:
<td colspan="2" valign="top"><?php echo $nk." ($nama_subkursus)";?></td></tr>
<!----------------------------------------------->




<tr>
<td height="34"><label for="kd_periode">Nama Periode</label>
<td>:
<td colspan="2"><?php echo $np;?></td></tr>



<tr>
        <td height="43"><label for="tingkat">Tingkat</label></td>
        <td>:</td>
        <td ><?php echo $tingkat;?></td>
    </tr>
      
      <tr>
<td height="32"><label for="nama_subkursus">Nama Subkursus</label>
<td>:<td colspan="2"><?php echo $nama_subkursus;?>
</td>
</tr>

<tr>
<td height="46"><label for="gelombang">Gelombang</label>
<td>:<td colspan="2"><?php echo $gelombang;?></td>
</tr>

<td height="39"><label for="sifat">Sifat</label>
<td>:<td colspan="2"><?php echo $sifat;?></td></tr>

<tr>
<td height="34"><label for="bulan">Bulan</label>
<td>:<td colspan="2"><?php echo $bulan;?></td></tr>

<tr>
<td height="52"><label for="jampel">Jam Pelajaran (Total)</label><td>:<td colspan="2"><?php echo $jampel;?></td></tr>
</table></td>
    <td width="50%"><table width="505">
<tr>
<td width="164" height="51"><label for="siswa">Jumlah Siswa</label>
<td width="10">:<td width="322" colspan="2"><?php echo $siswa;?></td></tr>

<tr>
<td height="48"><label for="kelas">Kelas</label>
<td>:<td colspan="2"><?php echo $kelas;?></td></tr>

<tr>
<td height="42"><label for="ujian_masuk">Ujian Masuk</label>
<td>:<td colspan="2"><?php echo $ujian_masuk;?></td></tr>

<tr>
<td height="51"><label for="buka">Buka</label>
<td>:<td colspan="2"><?php echo $buka;?></td></tr>

<tr>
<td height="44"><label for="ujian_tengah">Ujian Tengah</label>
<td>:<td colspan="2"><?php echo $ujian_tengah;?></td></tr>

<tr>
<td height="48"><label for="ujian_akhir">Ujian Akhir</label>
<td>:<td colspan="2"><?php echo $ujian_akhir;?></td></tr>

<tr>
<td height="49"><label for="tutup">Tutup</label>
<td>:<td colspan="2"><?php echo $tutup;?></td></tr>

</table>

Data Pendaftaran: 
| <a href="pendaftaran/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="pendaftaran/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="pendaftaran/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>
 <table width="80%" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
    <th width="3%"><center>No</th>
       <th width="13%"><center>Kode Kursus Dibuka</th>
    <th width="14%">NRP/NIP</th>
    <th width="14%"><center>Tanggal Daftar</th>
    <th width="8%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tbpendaftaran` where kd_kursus_dibuka='$kd_kursus_dibuka' order by `kd_pendaftaran` desc";
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
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode= getPeriode($conn,$d["kd_periode"]);
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);
			
				$nrp=$d["nrp"];
				$nrp0=getNrp($conn,$d["nrp"]);
				$tanggal_daftar=WKT($d["tanggal_daftar"]);
				$status=$d["status"];
				
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$nrp - $nrp0 ($status)</td>
				<td>$tanggal_daftar</td>
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
	$kd_pendaftaran=strip_tags($_POST["kd_pendaftaran"]);
	$kd_pendaftaran0=strip_tags($_POST["kd_pendaftaran0"]);
	$kd_periode=strip_tags($_POST["kd_periode"]);
	$kd_kursus=strip_tags($_POST["kd_kursus"]);
	$kd_kursus_dibuka=strip_tags($_POST["kd_kursus_dibuka"]);
	$nrp=strip_tags($_POST["nrp"]);
	$tanggal_daftar=BAL(strip_tags($_POST["tanggal_daftar"]));
	$status=strip_tags($_POST["status"]);

if($pro=="simpan"){
$sql=" INSERT INTO `$tbpendaftaran` (
`kd_pendaftaran` ,
`kd_periode` ,
`kd_kursus` ,
`kd_kursus_dibuka` ,
`nrp` ,
`tanggal_daftar` ,
`status` 

) VALUES (
'$kd_pendaftaran', 
'$kd_periode', 
'$kd_kursus',
'$kd_kursus_dibuka',
'$nrp',
'$tanggal_daftar',
'$status'
 
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
`status`='$status'

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

