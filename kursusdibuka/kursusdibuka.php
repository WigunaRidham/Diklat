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
        $("#ujian_masuk").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    
 <script type="text/javascript"> 
      $(document).ready(function(){
        $("#ujian_tengah").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>     <script type="text/javascript"> 
      $(document).ready(function(){
        $("#ujian_akhir").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>     <script type="text/javascript"> 
      $(document).ready(function(){
        $("#buka").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>     <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tutup").datepicker({
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
win=window.open('kursusdibuka/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, tingkat=0'); } 
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

  $sql="select `kd_kursus_dibuka` from `$tbkursus_dibuka` order by `kd_kursus_dibuka` desc";
 $jum= getJum($conn,$sql);
   $th=date("y");
  $bl=date("m");
  $kd="D".$th.$bl;//T1108001
		if($jum > 0){
		$d=getField($conn,$sql);
    		$idmax=$d["kd_kursus_dibuka"];
			$urut=substr($idmax,5,5)+1;
				if($urut<10){$idmax="$kd"."0000".$urut;}
				else if($urut<100){$idmax="$kd"."000".$urut;}
				else if($urut<1000){$idmax="$kd"."00".$urut;}
				else if($urut<10000){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."00001";}
		$kd_kursus_dibuka=$idmax;
?>

<?php

if($_GET["pro"]=="ubah"){
	$kd_kursus_dibuka=$_GET["kode"];
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
				
				$pro="ubah";		
}
?>
 
<div id="accordion">
  <h3>Input Data Kursus Dibuka</h3>
  <div>

<form action="" method="post" enctype="multipart/form-data">
<br />
<table width="100%" border="0">
  <tr>
    <td width="50%" valign="top">
    
    <table width="469" height="361">


<tr>
<td width="170" height="35"><label for="kd_kursus_dibuka">Kode Kursus Dibuka</label>
<td width="11">:<td width="272" colspan="2"> <b><?php echo $kd_kursus_dibuka;?></b>
</td></tr>
<!------------------------------------------------------------->

<tr>
<td height="34"><label for="kd_periode">Nama Periode</label>
<td>:
<td colspan="2"><label for="kd_periode"></label>
  <select class="form-control"  name="kd_periode" id="kd_periode">
    <option value="Pilih">Pilih</option>
     <?php
	  $s="select * from `tb_periode`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$kd_periode0=$d["kd_periode"];
				$nama_periode=$d["nama_periode"];
	echo"<option value='$kd_periode0' ";if($kd_periode0==$kd_periode){echo"selected";} echo">$kd_periode0 - $nama_periode  </option>";
	}
	?>
    
  </select></td></tr>

<tr>
<td height="24"><label for="kd_kursus">Jenis Kursus</label>
<td>:
<td colspan="2" valign="top"><label for="kd_kursus"></label>
  <select   class="form-control" name="kd_kursus" id="kd_kursus">
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
<!----------------------------------------------->








<tr>
        <td height="43"><label for="tingkat">Tingkat</label></td>
        <td>:</td>
        <td ><label for="tingkat"></label>
          <select class="form-control"  name="tingkat" id="tingkat">
            <option value="Beginner" <?php if($tingkat=="Beginner"){echo"selected";} ?> >Beginner</option>
            <option value="Elementary"  <?php if($tingkat=="Elementary"){echo"selected";} ?>>Elementary</option>
            <option value="Intermediate"  <?php if($tingkat=="Intermediate"){echo"selected";} ?>>Intermediate</option>
            <option value="Advanced"  <?php if($tingkat=="Advanced"){echo"selected";} ?>>Advanced</option>
          </select></td>
    </tr>
      
      <tr>
<td height="32"><label for="nama_subkursus">Nama Subkursus</label>
<td>:<td colspan="2"><input class="form-control"  name="nama_subkursus" type="text" id="nama_subkursus" value="<?php echo $nama_subkursus;?>" size="30" />
</td>
</tr>

<tr>
<td height="46"><label for="gelombang">Gelombang</label>
<td>:<td colspan="2"><input class="form-control"  name="gelombang" type="text" id="gelombang" value="<?php echo $gelombang;?>" size="30" />
</td>
<tr>
        <td height="42"><label for="sifat2">Sifat</label></td>
        <td>:</td>
        <td colspan="2"><input type="radio" name="sifat" id="sifat2"  checked="checked" value="Intensif" <?php if($sifat=="Intensif"){echo"checked";}?>/>
          Intensif
          <input type="radio" name="sifat" id="sifat2" value="Non-intensif" <?php if($sifat=="Non-intesif"){echo"checked";}?>/>
          Non-intensif </td>
      </tr>
      

<tr>
<td height="34">Jumlah Bulan
<td>:<td colspan="2"><input class="form-control" name="bulan" type="text" id="bulan" value="<?php echo $bulan;?>" size="5" /></td></tr>

<tr>
<td height="52"><label for="jampel">Jumlah Jam Pelajaran </label><td>:<td colspan="2"><input class="form-control"  name="jampel" type="text" id="jampel" value="<?php echo $jampel;?>" size="5" /></td></tr>
</table></td>
    <td width="50%"><table width="505">
<tr>
<td width="164" height="51"><label for="siswa">Jumlah Siswa</label>
<td width="10">:<td width="322" colspan="2"><input class="form-control"  name="siswa" type="text" id="siswa" value="<?php echo $siswa;?>" size="5" /></td></tr>

<tr>
        <td height="43"><label for="kelas">Jumlah Kelas</label></td>
        <td>:</td>
        <td ><label for="kelas"></label>
          <select class="form-control"  name="kelas" id="kelas">
            <option value="1" <?php if($kelas=="1"){echo"selected";} ?> >1</option>
            <option value="2"  <?php if($kelas=="2"){echo"selected";} ?>>2</option>
            <option value="3"  <?php if($kelas=="3"){echo"selected";} ?>>3</option>
            <option value="4"  <?php if($kelas=="4"){echo"selected";} ?>>4</option>
            </select></td>
    </tr>

<tr>
<td height="42"><label for="ujian_masuk">Ujian Masuk</label>
<td>:<td colspan="2"><input class="form-control"  name="ujian_masuk" type="text" id="ujian_masuk" value="<?php echo $ujian_masuk;?>" size="15" /></td></tr>

<tr>
<td height="51"><label for="buka">Buka</label>
<td>:<td colspan="2"><input class="form-control"  name="buka" type="text" id="buka" value="<?php echo $buka;?>" size="15" /></td></tr>

<tr>
<td height="44"><label for="ujian_tengah">Ujian Tengah</label>
<td>:<td colspan="2"><input class="form-control"  name="ujian_tengah" type="text" id="ujian_tengah" value="<?php echo $ujian_tengah;?>" size="15" /></td></tr>

<tr>
<td height="48"><label for="ujian_akhir">Ujian Akhir</label>
<td>:<td colspan="2"><input class="form-control"  name="ujian_akhir" type="text" id="ujian_akhir" value="<?php echo $ujian_akhir;?>" size="15" /></td></tr>

<tr>
<td height="49"><label for="tutup">Tutup</label>
<td>:<td colspan="2"><input class="form-control"  name="tutup" type="text" id="tutup" value="<?php echo $tutup;?>" size="15" /></td></tr>

<tr>
<td height="57"><label for="keterangan">Keterangan</label>
<td>:<td colspan="2"><textarea class="form-control"  name="keterangan" cols="30" id="keterangan"><?php echo $keterangan;?></textarea></td></tr>


<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" onclick="MM_validateForm('nama_subkursus','','R','gelombang','','R','bulan','','R','jampel','','R','siswa','','R','kelas','','R','ujian_masuk','','R','buka','','R','ujian_tengah','','R','ujian_akhir','','R','tutup','','R');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kd_kursus_dibuka" type="hidden" id="kd_kursus_dibuka" value="<?php echo $kd_kursus_dibuka;?>" />
       <input name="kd_kursus_dibuka0" type="hidden" id="kd_kursus_dibuka0" value="<?php echo $kd_kursus_dibuka0;?>" />
        <a href="?mnu=kursusdibuka"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</td>
  </tr>
</table>
 </div>
 
 <?php  
  $sqlq="select distinct(kd_kursus) from `tb_kursus_dibuka` order by `kd_kursus_dibuka` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
			$kd_kursus= $dq["kd_kursus"];///gettt
			$nama_kursus= getKursus($conn,$dq["kd_kursus"]);///gettt
				
?>     
  <h2><a href="#">Data kursus <?php echo $nama_kursus;?></a></h2>
   <div>

Data Kursus Dibuka: 
| <a href="kursusdibuka/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 

| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="750" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
    <th width="4%" height="24"><center>No</th>
    <th width="40%"><center>Uraian 1</th>
   <th width="40%"><center>Uraian 2</th>
    <th width="13%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tbkursus_dibuka` where kd_kursus='$kd_kursus' order  by `kd_kursus_dibuka` desc";
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
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);///gettt
				$nama_subkursus=$d["nama_subkursus"];
				$kd_periode=getPeriode($conn,$d["kd_periode"]);
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
				

					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td> Kode 			: $kd_kursus_dibuka<br>
				Nama Periode 		: $kd_periode <br>
				Nama Sub Kursus 	:  $nama_subkursus ($tingkat) <br>
				Gelombang			: $gelombang<br>
				
				Sifat						: $sifat <br>
				Jumlah Bulan				: $bulan <br>
				Jumlah Jam Pelajaran		: $jampel <br>
				Jumlah Siswa				: $siswa<br>
				Jumlah Kelas			: $kelas
				</td>
				<td>Ujian Masuk		: $ujian_masuk<br>
				Buka			:$buka <br>
				Ujian Tengah	: $ujian_tengah</br>
				Ujian Akhir		: $ujian_akhir</br>
				Tutup			: $tutup  <br>
				Keterangan		: $keterangan</br>
				</td>
				
				<td align='center'>
<a href='?mnu=kursusdibuka&pro=ubah&kode=$kd_kursus_dibuka'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=kursusdibuka&pro=hapus&kode=$kd_kursus_dibuka'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kd_kursus pada data kursus dibuka ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data kursus dibuka belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=kursusdibuka'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=kursusdibuka'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=kursusdibuka'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>
	
</div>
	";
		}
?>

</div>


<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kd_kursus_dibuka=strip_tags($_POST["kd_kursus_dibuka"]);
	$kd_kursus_dibuka0=strip_tags($_POST["kd_kursus_dibuka0"]);
	$kd_kursus=strip_tags($_POST["kd_kursus"]);
	$nama_subkursus=strip_tags($_POST["nama_subkursus"]);
	$kd_periode=strip_tags($_POST["kd_periode"]);
	$gelombang=strip_tags($_POST["gelombang"]);
	$tingkat=strip_tags($_POST["tingkat"]);
	
	$sifat=strip_tags($_POST["sifat"]);
	$bulan=strip_tags($_POST["bulan"]);
	$jampel=strip_tags($_POST["jampel"]);
	$siswa=strip_tags($_POST["siswa"]);
	$kelas=strip_tags($_POST["kelas"]);
	$ujian_masuk=BAL(strip_tags($_POST["ujian_masuk"]));
	$buka=BAL(strip_tags($_POST["buka"]));
	$ujian_tengah=BAL(strip_tags($_POST["ujian_tengah"]));
	$ujian_akhir=BAL(strip_tags($_POST["ujian_akhir"]));
	$tutup=BAL(strip_tags($_POST["tutup"]));
	$keterangan=strip_tags($_POST["keterangan"]);
		

	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbkursus_dibuka` (
`kd_kursus_dibuka` ,
`kd_kursus` ,
`nama_subkursus` ,
`kd_periode` ,
`gelombang` ,
`tingkat` ,
`sifat` ,
`bulan` ,
`jampel` ,
`siswa` ,
`kelas` ,
`ujian_masuk` ,
`buka` ,
`ujian_tengah` ,
`ujian_akhir` ,
`tutup` ,
`keterangan`
) VALUES (
'$kd_kursus_dibuka', 
'$kd_kursus', 
'$nama_subkursus',
'$kd_periode',
'$gelombang',
'$tingkat',

'$sifat',
'$bulan',
'$jampel',
'$siswa',
'$kelas',
'$ujian_masuk',
'$buka',
'$ujian_tengah',
'$ujian_akhir',
'$tutup',
'$keterangan'

)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kd_kursus_dibuka berhasil disimpan !');document.location.href='?mnu=kursusdibuka';</script>";}
		else{echo"<script>alert('Data $kd_kursus_dibuka gagal disimpan...');document.location.href='?mnu=kursusdibuka';</script>";}
	}
	else{
$sql="update `$tbkursus_dibuka` set 
`kd_kursus`='$kd_kursus',
`nama_subkursus`='$nama_subkursus' ,
`kd_periode`='$kd_periode',
`tingkat`='$tingkat',
`gelombang`='$gelombang',

`sifat`='$sifat',
`bulan`='$bulan',
`jampel`='$jampel',
`siswa`='$siswa',
`kelas`='$kelas',
`ujian_masuk`='$ujian_masuk',
`buka`='$buka',
`ujian_tengah`='$ujian_tengah',
`ujian_akhir`='$ujian_akhir',
`tutup`='$tutup',
`keterangan`='$keterangan'
 
where `kd_kursus_dibuka`='$kd_kursus_dibuka0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kd_kursus_dibuka berhasil diubah !');document.location.href='?mnu=kursusdibuka';</script>";}
	else{echo"<script>alert('Data $kd_kursus_dibuka gagal diubah...');document.location.href='?mnu=kursusdibuka';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kd_kursus_dibuka=$_GET["kode"];
$sql="delete from `$tbkursus_dibuka` where `kd_kursus_dibuka`='$kd_kursus_dibuka'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data kursusdibuka $kd_kursus_dibuka berhasil dihapus !');document.location.href='?mnu=kursusdibuka';</script>";}
else{echo"<script>alert('Data kursusdibuka $kd_kursus_dibuka gagal dihapus...');document.location.href='?mnu=kursusdibuka';</script>";}
}
?>

