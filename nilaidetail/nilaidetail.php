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
function PRINT(){ 
win=window.open('nilai_detail/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, prestasi=0'); } 
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
	$kd_nilai=$_GET["kd"];
	$sql="select * from `$tb_nilai` where `kd_nilai`='$kd_nilai'";
	$d=getField($conn,$sql);
				$kd_nilai=$d["kd_nilai"];
				$kd_nilai0=$d["kd_nilai"];
					$kd_pendaftaran=getPendaftaran($conn,$d["kd_pendaftaran"]);
					$kd_pendaftaran0=$d["kd_pendaftaran"];
				$kd_periode= getPeriode($conn,$d["kd_periode"]);
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka= getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
				$nrp=$d["nrp"];
				$keterangan=$d["keterangan"];
				
			
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="675" height="326">


<tr>
<td width="154"><label for="kd_nilai">Kode Nilai</label>
<td width="20">:
<td width="195" colspan="2"><label><?php echo $kd_nilai;?></label></td>
</tr>

<tr>
<tr>
<td height="38"><label for="kd_pendaftaran"> Kode Pendaftaran</label>
<td>:
<td colspan="2"><label><?php echo $kd_pendaftaran0 ;?></label></td></tr>

<tr>
<td height="38"><label for="kd_periode"> Periode</label>
<td>:
<td colspan="2"><label><?php echo $kd_periode;?></label></td></tr>

<tr>
<td height="38"><label for="kd_kursus"> Kursus</label>
<td>:
<td colspan="2"><label><?php echo $kd_kursus;?></label></td></tr>

<tr>
<td height="39"><label for="kd_kursus_dibuka">Pilih Kursus Dibuka</label>
<td>:
<td colspan="2"><label><?php echo $kd_kursus_dibuka;?></label></td></tr>

<tr>
<td><label for="nrp">NRP/NIP</label>
<td>:<td colspan="2"><label><?php echo $nrp. " - ". getNrp($conn,$nrp);?></label></td></tr>

<tr>
<td height="39"><label for="keterangan">Keterangan Nilai</label>
<td>:
<td colspan="2"><label><?php echo $keterangan;?></label></td></tr>

</table>
</form>
<br />
















<?php
if($_GET["pro"]=="ubah"){
	$id=$_GET["kode"];
	$sql="select * from `$tb_nilai_detail` where `id`='$id'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$id0=$d["id"];
				$kd_nilai=$d["kd_nilai"];
				$materi=$d["materi"];
				$murni=$d["murni"];
				$harga=$d["harga"];
				$prestasi=$d["prestasi"];
				$bobot=$d["bobot"];
				$prestasi_akhir=$d["prestasi_akhir"];
				$keterangan2=$d["keterangan"];
				
				
				
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Nilai Detail</h3>
  <div>

<form action="" method="post" enctype="multipart/form-data">
<table width="497" height="391">


<td height="35"><label for="materi">Materi</label>
<td>:<td colspan="2"><input class="form-control"  name="materi" type="text" id="materi" value="<?php echo $materi;?>" size="15" />
</td>
</tr>

<tr>
<td height="35"><label for="murni">Murni</label>
<td>:
<td><input class="form-control"  name="murni" type="text" id="murni" value="<?php echo $murni;?>" size="30" />
  <label for="murni"></label></td>
</tr>

<tr>
<td height="35"><label for="harga">Harga</label>
<td>:<td colspan="2"><input class="form-control"  name="harga" type="text" id="harga" value="<?php echo $harga;?>" size="25" />
</td>
</tr>


<tr>
<td><label for="bobot">Bobot</label>
<td>:<td colspan="2"><input class="form-control" name="bobot" type="text" id="bobot" value="<?php echo $bobot;?>" size="15" /></td></tr>



<tr>
<td><label for="keterangan">Keterangan</label>
<td>:<td colspan="2"><input class="form-control"  name="keterangan" type="text" id="keterangan" value="<?php echo $keterangan2;?>" size="15" /></td></tr>


<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" onclick="MM_validateForm('materi','','R','murni','','RisNum','harga','','RisNum','prestasi','','RisNum','bobot','','RisNum');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id0" type="hidden" id="id0" value="<?php echo $id0;?>" />
       <input name="kd_nilai" type="hidden" id="kd_nilai" value="<?php echo $kd_nilai;?>" />
        <a href="?mnu=nilai"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

<hr>

 <table width="1092" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
    <th width="3%"><center>No</th>
    <th width="22%"><center>Materi</th>
    <th width="7%"><center>Murni</th>
    <th width="8%"><center>Harga</th>
    <th width="8%"><center>Prestasi</th>
    <th width="7%"><center>Bobot</th>
    <th width="13%"><center>Prestasi Akhir</th>
    <th width="10%"><center>Keterangan</th>
   
    <th width="7%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  

$jpa=0;
$npa=0;
  $sql="select * from `$tb_nilai_detail` where `kd_nilai`='$kd_nilai' order by `id` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
			$no=1;
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$id=$d["id"];
				$kd_nilai=$d["kd_nilai"];
				$materi=$d["materi"];
				$murni=$d["murni"];
				$harga=$d["harga"];
				$prestasi=$d["prestasi"];
				$bobot=$d["bobot"];
				 $prestasi_akhir=$d["prestasi_akhir"];
				$keterangan=$d["keterangan"];
				 $jpa+=$prestasi_akhir;
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				
				<td>$materi</td>
				<td>$murni</td>
				<td>$harga</td>
				<td>$prestasi</td>
				<td>$bobot</td>
				<td>$prestasi_akhir</td>
			
				<td>$keterangan</td>
				
				<td align='center'>
<a href='?mnu=nilai_detail&kd=$kd_nilai&pro=ubah&kode=$id'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=nilai_detail&kd=$kd_nilai&pro=hapus&kode=$id'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kd_nilai pada data nilai_detail ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data nilai_detail belum tersedia...</blink></td></tr>";}
?>
</tbody>
</table>
<?php echo"<p align='right'><strong>Jumlah Prestasi Akhir  :$jpa</strong> </p>" ?>
<?php 
$nilai=$jpa/10000;
echo"<p align='right'><strong>Nilai Prestasi Akhir  :".($nilai)." </strong></p>" ?>
</div>
</div>


<?php

$sql="update   `$tb_nilai` set  jumlah='$jpa', nilai='$nilai' where `kd_nilai`='$kd_nilai'";
$up=process($conn,$sql);


if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id=strip_tags($_POST["id"]);
	$id0=strip_tags($_POST["id0"]);
	$kd_nilai=strip_tags($_POST["kd_nilai"]);
	$materi=strip_tags($_POST["materi"]);
	$murni=strip_tags($_POST["murni"]);
	$harga=strip_tags($_POST["harga"]);
	$bobot=strip_tags($_POST["bobot"]);
	
	$prestasi=($murni *$harga);
	$prestasi_akhir= ($prestasi*$bobot);
	
	$jumlah_nilai_prestasi_akhir= "";
	$nilai_prestasi_akhir="";
	$keterangan=strip_tags($_POST["keterangan"]);
	
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tb_nilai_detail` (
`id` ,
`kd_nilai` ,
`materi` ,
`murni` ,
`harga` ,
`prestasi`,
`bobot`,
`prestasi_akhir`,
`keterangan`

) VALUES (
'', 
'$kd_nilai', 
'$materi',
'$murni',
'$harga',
'$prestasi',
'$bobot',
'$prestasi_akhir',
'$keterangan'

)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id berhasil disimpan !');document.location.href='?mnu=nilai_detail&kd=$kd_nilai';</script>";}
		else{echo"<script>alert('Data $id gagal disimpan...');document.location.href='?mnu=nilai_detail&kd=$kd_nilai';</script>";}
	}
	else{
$sql="update `$tb_nilai_detail` set 
`kd_nilai`='$kd_nilai',
`materi`='$materi' ,
`murni`='$murni',
`harga`='$harga' ,
`prestasi`='$prestasi',
`bobot`='$bobot' ,
`prestasi_akhir`='$prestasi_akhir' ,
`keterangan`='$keterangan' 


where `id`='$id0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id berhasil diubah !');document.location.href='?mnu=nilai_detail&kd=$kd_nilai';</script>";}
	else{echo"<script>alert('Data $id gagal diubah...');document.location.href='?mnu=nilai_detail&kd=$kd_nilai';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id=$_GET["kode"];
$kode=$_GET["id"];
$sql="delete from `$tb_nilai_detail` where `id`='$id'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data nilai_detail $id berhasil dihapus !');document.location.href='?mnu=nilai_detail&kd=$kd_nilai';</script>";}
else{echo"<script>alert('Data nilai_detail $id gagal dihapus...');document.location.href='?mnu=nilai_detail&kd=$kd_nilai';</script>";}
}
?>

