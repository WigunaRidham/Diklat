<?php
$pro="simpan";
$tanggal_daftar=WKT(date("Y-m-d"));
?>   
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

<div id="accordion">
 
  
  <?php  
  $nrp=$_SESSION["cid"];
  
  $sqlq="select distinct(kd_kursus_dibuka) from `tb_pendaftaran` where nrp='$nrp' order by `kd_pendaftaran` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$kd_kursus_dibuka=$dq["kd_kursus_dibuka"];
	$NB= getKursusDibuka($conn,$dq["kd_kursus_dibuka"]);
	
	// $sqlb="select * from `$tb_nilai` where `kd_kursus_dibuka`='$kd_kursus_dibuka' and nrp='".$_SESSION["cid"]."'";
	//$db=getField($conn,$sqlb);
	//$arr1=getData($conn,$sqlb);
		
				
?>     

   <h2><a href="#">Data Nilai <?php echo"$NB";?></a></h2>
     <div>
<?php
	
	 $sqlb1="select * from `$tb_nilai` where `kd_kursus_dibuka`='$kd_kursus_dibuka' and nrp='".$_SESSION["cid"]."'";
	//$db=getField($conn,$sqlb);
	  $jum=getJum($conn,$sqlb1);
		if($jum > 0){

	$arr11=getData($conn,$sqlb1);
		foreach($arr11 as $db) {
			
			 	$kd_nilai=$db["kd_nilai"];
				$kd_nilai0=$db["kd_nilai"];
				$kd_pendaftaran=$db["kd_pendaftaran"];
				$kd_periode=$db["kd_periode"];
				$kd_kursus=$db["kd_kursus"];
				$kd_kursus_dibuka=$db["kd_kursus_dibuka"];
				$nrp=$db["nrp"];
				$keterangan=$db["keterangan"];
				
			?>	
Data Jadwal  <?php echo $keterangan;?>: 
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
   
  </tr>
  </thead>
  <tbody>
<?php  
$jpa=0;
   $sql="select * from `$tb_nilai_detail` where `kd_nilai`='$kd_nilai' order by `id` desc";
  $jumx=getJum($conn,$sql);
		if($jumx > 0){
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
				$jumlah_nilai_prestasi_akhir=$d["jumlah_nilai_prestasi_akhir"];
				$nilai_prestasi_akhir=$d["nilai_prestasi_akhir"];
				$keterangan=$d["keterangan"];
				 $jumlah_nilai_prestasi_akhir=$d["jumlah_nilai_prestasi_akhir"];
				$nilai_prestasi_akhir=$d["nilai_prestasi_akhir"];
				$keterangan=$d["keterangan"];
				 $jpa=$jpa+$prestasi_akhir;
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
        <tr><td colspan="8">
<?php echo"<p align='right'><strong>Jumlah Prestasi Akhir  :$jpa</strong> </p>" ?>
<?php echo"<p align='right'><strong>Nilai Prestasi Akhir  :".($jpa/10000)." </strong></p>" ?>
</td>
</tr>

		
</tbody>
</table>
<?php } }?>
</div>
<?php
		
	
		}
		?>
</div>

