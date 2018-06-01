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
</script>


 
<div id="accordion">
  
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

