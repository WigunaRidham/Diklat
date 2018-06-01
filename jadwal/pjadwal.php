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
?>     

   <h2><a href="#">Data Jadwal <?php echo"$NB";?></a></h2>
     <div>

Data Jadwal  <?php echo $NB;?>: 
 <table width="1086" class="table table-striped table-bordered table-hover">
     <thead> 
     <tr bgcolor="#cccccc">
    <th width="3%"><center>No</th>
    <th width="30%"><center>Jadwal </th>
    <th width="50" > Kegiatan</th>
    <th width="15%"><center>Modul </th>
  </tr>
  </thead>
  <tbody>
<?php  
$no=1;
  $sql="select * from `$tbjadwal` where kd_kursus_dibuka='$kd_kursus_dibuka' order by `kd_jadwal` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kd_jadwal=$d["kd_jadwal"];
				//$kd_periode= getPeriode($conn,$d["kd_periode"]);
				//$kd_kursus= getKursus($conn,$d["kd_kursus"]);
			    //$kkb= getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
				$hari=$d["hari"];
				$waktu=$d["waktu"];
				$pertemuan_ke=$d["pertemuan_ke"];
				$jumlah=$d["jumlah"];
				$dari=$d["dari"];
				$mata_pelajaran=$d["mata_pelajaran"];
				$tema=$d["tema"];
				$guru=$d["guru"];
				$tempat=$d["tempat"];
				$modul=$d["modul"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>
				Hari : $hari, jam $waktu <br>Pertemuan ke : $pertemuan_ke ($jumlah jam / $dari)</br>
				Mata pelajaran : $mata_pelajaran ($guru)</td>
				<td>Tema : $tema<br>Tempat : $tempat </td><td> <a href='downloadget.php?file=$modul' title='$modul'>Download</a>
				</td>
			
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data jadwal belum tersedia...</blink></td></tr>";}
?>
</tbody>
</table>
</div>
<?php
		}
		?>
</div>