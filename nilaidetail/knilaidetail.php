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













 <table width="1092" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
    <th width="3%"><center>No</th>
    <th width="22%"><center>Materi</th>
    <th width="7%"><center>Murni</th>
    <th width="8%"><center>Harga</th>
    <th width="8%"><center>Prestasi</th>
    <th width="7%"><center>Bobot</th>
    <th width="13%"><center>Prestasi</th>
    <th width="10%"><center>Keterangan</th>
   
  </tr>
  </thead>
  <tbody>
<?php  
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
				
			
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data nilai_detail belum tersedia...</blink></td></tr>";}
?>
</tbody>

</table>
<?php echo"<p align='right'><strong>Jumlah Prestasi Akhir  :$jpa</strong> </p>" ?>
<?php echo"<p align='right'><strong>Nilai Prestasi Akhir  :".($jpa/10000)." </strong></p>" ?>

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

