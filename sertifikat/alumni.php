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



<p>Data alumni: 
  | <a href="sertifikat/pdfa.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
  | <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
</p>
<form id="form1" name="form1" method="post" action="">
  <p>Cari berdasarkan
    <label for="txtpilih"></label>
    <select name="txtpilih" id="txtpilih">
      <option value="nrp">nrp</option>
      <option value="kota_kabupaten">kota_kabupaten</option>
      <option value="provinsi">provinsi</option>
    </select>
    <label for="txtitem"></label>
  <input type="text" name="txtitem" id="txtitem" />
  <input type="submit" name="Cari" id="Cari" value="Cari" />
  </p>
  <p>&nbsp;</p>
</form>
<table width="956" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
      <th width="3%"><center>No</th>
    <th width="41%"><center>
      <div align="center">Identitas</div></th>
    

     <th width="46%"><div align="center">Lulus Pada
       </td>
       
     </div>
     <th width="10%"><div align="center">Nilai Akhir
       </td>
       
     </div>
     </tr>
  </thead>
  <tbody>
<?php  
//$sql="select tb_peserta.nrp,tb_peserta.nama,tb_peserta.pangkat,tb_peserta.golongan,tb_peserta.alamat_kantor,tb_peserta.golongan,tb_peserta.golongan,tb_peserta.golongan, from `$tb_sertifikat` where status='Lulus' order by `kd_sertifikat` desc";
$sql="select * from tb_peserta,tb_sertifikat,tb_nilai where tb_nilai.nrp=tb_sertifikat.nrp and tb_nilai.nrp=tb_peserta.nrp and tb_peserta.nrp=tb_sertifikat.nrp and tb_sertifikat.status='Lulus' order by tb_nilai.nilai desc";
if (isset($_POST["Cari"])){
	$pilih=$_POST["txtpilih"];
	$item=$_POST["txtitem"];
	
	$sql="select * from tb_peserta,tb_sertifikat,tb_nilai where tb_nilai.nrp=tb_sertifikat.nrp and tb_nilai.nrp=tb_peserta.nrp and tb_peserta.nrp=tb_sertifikat.nrp and tb_sertifikat.status='Lulus' and tb_peserta.$pilih like '%$item%' order by tb_nilai.nilai desc";
	
	//$sql="select * from tb_peserta,tb_sertifikat where tb_peserta.nrp=tb_sertifikat.nrp and tb_sertifikat.status='Lulus' and tb_peserta.$pilih like '%$item%'";

	}
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
				$kd_sertifikat=$d["kd_sertifikat"];
				
				$kd_periode=getPeriode($conn,$d["kd_periode"]);
				$kd_kursus=getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka=getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
				$nrp=$d["nrp"];
				
				$nilai=round($d["nilai"],2);
					
	$sqlq="select * from `tb_peserta` where `nrp`='$nrp'";
	$dq=getField($conn,$sqlq);
				$nrp=$dq["nrp"];
				$nrp0=$dq["nrp"];
				
				$nama=$dq["nama"];
				$pangkat=$dq["pangkat"];
				$korps=$dq["korps"];
				$golongan=$dq["golongan"];
				$tempat_lahir=$dq["tempat_lahir"];
				
				$tanggal_lahir=WKT($dq["tanggal_lahir"]);
				$agama=$dq["agama"];
				$jabatan=$dq["jabatan"];
				$kesatuan=$dq["kesatuan"];
				$alamat_kantor=$dq["alamat_kantor"];
				$telepon_kantor=$dq["telepon_kantor"];
				$kota_kabupaten=$dq["kota_kabupaten"];
				$provinsi=$dq["provinsi"];
				$jenis_kelamin=$dq["jenis_kelamin"];
				$nama_pasangan=$dq["nama_pasangan"];
				$alamat_rumah=$dq["alamat_rumah"];
				
				$telepon=$dq["telepon"];
				$pendidikan_umum=$dq["pendidikan_umum"];
				$fakultas=$dq["fakultas"];
				$jurusan=$dq["jurusan"];
				$nama_sekolah=$dq["nama_sekolah"];
				$pendidikan_militer=$dq["pendidikan_militer"];
				$password=$dq["password"];
				$username=$dq["username"];
				
				
				
				
				$status=$d["status"];
				$tanggal_pembuatan=WKT($d["tanggal_pembuatan"]);
				
				$gambar=$d["gambar"];
				$gambar0=$d["gambar0"];
				
				$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
					<td>Nama :$nrp - $nama ($pangkat. $korps)<br>
					Alamat Kantor : $alamat_kantor , $kota_kabupaten , $provinsi telp. $telepon_kantor<br>
			
					 Alamat : $alamat_rumah, telp. $telepon</td>
				
				<td>Periode : $kd_periode<br>
				Kursus : $kd_kursus - $kd_kursus_dibuka</td>
			
				<td>$nilai
				
				
				
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data alumni tidak tersedia...</blink></td></tr>";}
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

?>


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
	
	$tanggal_pembuatan=BAL(strip_tags($_POST["tanggal_pembuatan"]));
	
	$gambar=strip_tags($_POST["gambar"]);
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
	
	$sql="select * from `$tb_kabadan` order by kd_kabadan desc";
	$d=getField($conn,$sql);
				$kd_kabadan=$d["kd_kabadan"];
				
				
if($pro=="simpan"){
$sql=" INSERT INTO `$tb_sertifikat` (
`kd_sertifikat` ,`kd_kabadan` ,
`kd_pendaftaran` ,
`kd_periode` ,
`kd_kursus` ,
`kd_kursus_dibuka` ,
`nrp` ,
`status` ,
`tanggal_pembuatan`,

`gambar` 


) VALUES (
'$kd_sertifikat', '$kd_kabadan', 
'$kd_pendaftaran', 
'$kd_periode',
'$kd_kursus',
'$kd_kursus_dibuka',
'$nrp',
'$status',
'$tanggal_pembuatan',


'$gambar'

)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kd_sertifikat berhasil disimpan !');document.location.href='?mnu=sertifikat';</script>";}
		else{echo"<script>alert('Data $kd_sertifikat gagal disimpan...');document.location.href='?mnu=sertifikat';</script>";}
	}
	else{
$sql="update `$tb_sertifikat` set 
`kd_pendaftaran`='$kd_pendaftaran',
`kd_periode`='$kd_periode' ,
`kd_kursus`='$kd_kursus',`kd_kabadan`='$kd_kabadan',
`kd_kursus_dibuka`='$kd_kursus_dibuka', 
`nrp`='$nrp',
`status`='$status',
`tanggal_pembuatan`='$tanggal_pembuatan',
`gambar`='$gambar'
 
	
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

