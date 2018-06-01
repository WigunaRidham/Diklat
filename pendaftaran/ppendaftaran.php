<div class="row">
               	
				<div class="col-lg-12 col-md-12">	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-flag-o red"></i><strong>Jadwal Periode Kursus Dibuka <?php echo $nama_periode;?></td></tr> </td></tr> </strong></h2> 
                                                   
							<div class="panel-actions">
								<a href="index.php#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
								<a href="index.php#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="index.php#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
                        
<div class="panel-body">
<?php
if($_GET["pro"]=="detail"){
	
	$kd_kursus_dibuka=$_GET["id"];
	$kd_kursus_dibuka0=$kd_kursus_dibuka;
	$sql="select * from `$tbkursus_dibuka` where `kd_kursus_dibuka`='$kd_kursus_dibuka'";
	$d=getField($conn,$sql);
				
				
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

				
				$kd_kursus0= $d["kd_kursus"];///gettt
				$kd_periode0=$d["kd_periode"];
				
				
?>
 
<h3>Info Data Kursus Dibuka</h3>

<form action="" method="post" enctype="multipart/form-data">


<table width="80%" >
<tr>
<th width="170"><label for="kd_kursus_dibuka">Kode Kursus Dibuka</label>
<th width="11">:<th width="272" colspan="2"><?php echo $kd_kursus_dibuka;?></th></tr>
<!------------------------------------------------------------->

<tr>
<td><label for="kd_periode">Nama Periode</label>
<td>:
<td colspan="2"><?php echo $kd_periode;?></td></tr>

<tr>
<td><label for="kd_kursus">Jenis Kursus</label>
<td>:
<td colspan="2" valign="top"><?php echo $kd_kursus;?></td></tr>

<tr><td ><label for="tingkat">Tingkat</label></td>
<td>:</td>
<td colspan="2"><?php echo $tingkat;?></td></tr>
      
<tr>
<td height="32"><label for="nama_subkursus">Nama Subkursus</label>
<td>:<td colspan="2"><?php echo $nama_subkursus;?></td></tr>

<tr>
<td><label for="gelombang">Gelombang</label>
<td>:<td colspan="2">
<?php echo $gelombang;?></td>
</tr>

<tr>
        <td><label for="sifat2">Sifat</label></td>
        <td>:</td>
        <td colspan="2"><?php echo $sifat;?></td></tr>
      

<tr>
<td>Jumlah Bulan
<td>:<td colspan="2"><?php echo $bulan;?></td></tr>

<tr>
<td ><label for="jampel">Jumlah Jam Pelajaran </label><td>:<td colspan="2">
<?php echo $jampel;?></td></tr>

<tr>
<td width="164" ><label for="siswa">Jumlah Siswa</label>
<td width="10">:<td width="322" colspan="2"><?php echo $siswa;?></td></tr>

<tr>
<td><label for="kelas">Jumlah Kelas</label>
<td>:<td colspan="2"><?php echo $kelas;?></td></tr>

<tr>
<td><label for="ujian_masuk">Ujian Masuk</label>
<td>:<td colspan="2"><?php echo $ujian_masuk;?></td></tr>

<tr>
<td ><label for="buka">Buka</label>
<td>:<td colspan="2"><?php echo $buka;?></td></tr>

<tr>
<td ><label for="ujian_tengah">Ujian Tengah</label>
<td>:<td colspan="2"><?php echo $ujian_tengah;?></td></tr>

<tr>
<td ><label for="ujian_akhir">Ujian Akhir</label>
<td>:<td colspan="2">
<?php echo $ujian_akhir;?></td></tr>

<tr>
<td ><label for="tutup">Tutup</label>
<td>:<td colspan="2">
<?php echo $tutup;?></td></tr>

<tr>
<td ><label for="keterangan">Keterangan</label>
<td>:<td colspan="2">
<?php echo $keterangan;?></td></tr>




<tr>
<td ><label for="keterangan">No SPRINT</label>
<td>:<td colspan="2"><input class="form-control" name="no_sprint" type="text" id="no_sprint" value="" size="30" /></td></tr>


<tr>
  <td height="44"><label>Dokumen/File</label>
    <td>:<td ><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
     </td>
</tr>

<tr>
<td >
<td>:<td colspan="2">

<input type="submit" value="DAFTAR" name="DAFTAR">
<input type="hidden" value="<?php echo $kd_kursus_dibuka;?>" name="kd_kursus_dibuka">
<input type="hidden" value="<?php echo $kd_periode0;?>" name="kd_periode">
<input type="hidden" value="<?php echo $kd_kursus0;?>" name="kd_kursus">



</td></tr>

</table>

</form>

<?php
	
}
else{
?>

<table class="table bootstrap-datatable countries">
								<thead>
									<tr>
										<th></th>
										<th>Kursus</th>
										<th>Sub Kursus</th>
										<th>Gelombang</th>
									</tr>
								</thead>   
<tbody>


<?php  
  $sql="select * from `$tbkursus_dibuka`  where kd_periode='$ckd_periode' order  by `gelombang` asc limit 0,50";
 	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$kd_kursus=$d["kd_kursus"];///gettt
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
				
				
				$sqlc="select * from `$tbkursus` where `kd_kursus`='$kd_kursus'";
	$dc=getField($conn,$sqlc);
				$kd_kursus=$dc["kd_kursus"];
				$nama_kursus=$dc["nama_kursus"];
				
				$keterangan=$dc["keterangan"];
				
				$gambar=$dc["gambar"];
				
				
				?>
				
<tr>
	<td><img src="ypathfile/<?php echo $gambar;?>" style="height:18px; margin-top:-2px;"></td>
										<td><?php echo getKursus($conn,$kd_kursus);?></td>
										<td><?php echo $nama_subkursus;?></td>
										<td><?php echo $gelombang;?></td>
										<td align='center'>
											
<?php 
echo"<a href='?mnu=pendaftaranPeserta&pro=detail&id=$kd_kursus_dibuka' ><img src='ypathicon/xml.png' width='15' height='15' title='info detail' />
</a>";


?>
										 	
										</td>
</tr>
<?php
		}
		?>

								</tbody>
							</table>
							
<?php
}
?>							
</div>
</div>	

				</div><!--/col-->
				
			
				
              </div>
