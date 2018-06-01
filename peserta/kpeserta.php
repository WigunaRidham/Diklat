<?php
$pro="simpan";
//$tanggal_lahir=WKT(date("Y-m-d"));

$gambar0="avatar.jpg";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_lahir").datepicker({
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
win=window.open('peserta/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, tempat_lahir=0'); } 
</script>
<script language="JavaScript">
function kota_kabupaten(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


<div id="accordion">
 
  <?php  
  $sqlq="select distinct(status) from `tb_peserta` order by `nrp` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];

?>     
   <h2><a href="#">Data Peserta <?php echo"$status";?></a></h2>

  <div>
  
Data Peserta: 
| <a href="peserta/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="1079" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
    <th width="4%"><center>No</th>
    <th width="37%"><center>Uraian 1</th>
    <th width="29%"><center>Uraian 2</th>
    <th width="10%"><center>Gambar</th>
    <th width="11%"><center>Status</th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `tb_peserta`  where status='$status' order by `nrp` desc";
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
				$nrp=$d["nrp"];
				$nama=$d["nama"];
				$pangkat=$d["pangkat"];
				$korps=$d["korps"];
				$golongan=$d["golongan"];
				$tempat_lahir=$d["tempat_lahir"];
				
				$tanggal_lahir=WKT($d["tanggal_lahir"]);
				$agama=$d["agama"];
				$jabatan=$d["jabatan"];
				$kesatuan=$d["kesatuan"];
				$alamat_kantor=$d["alamat_kantor"];
				$telepon_kantor=$d["telepon_kantor"];
				$kota_kabupaten=$d["kota_kabupaten"];
				$provinsi=$d["provinsi"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$nama_pasangan=$d["nama_pasangan"];
				$alamat_rumah=$d["alamat_rumah"];
				
				$telepon=$d["telepon"];
				$pendidikan_umum=$d["pendidikan_umum"];
				$fakultas=$d["fakultas"];
				$jurusan=$d["jurusan"];
				$nama_sekolah=$d["nama_sekolah"];
				$pendidikan_militer=$d["pendidikan_militer"];
				$password=$d["password"];
				$username=$d["username"];
				$gambar=$d["gambar"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>Nama :$nrp - $nama (<em>$username</em>)<br>
				Pangkat : $pangkat , $korps<br>
				Golongan : $golongan<br>
				TTL : $tempat_lahir , $tanggal_lahir<br>
				Agama : $agama<br>
				 
				Jabatan : $jabatan - $kesatuan<br>
				Alamat Kantor : $alamat_kantor , $kota_kabupaten , $provinsi<br>
					Kontak :	$telepon_kantor</td>
				
				<td>Jenis Kelamin : $jenis_kelamin <br>
				Nama Pasangan : $nama_pasangan<br>
				 Alamat : $alamat_rumah<br>
				
				Telepon : $telepon<br>
				 Pendidikan Umum Terakhir: $pendidikan_umum <br>
				 Nama Sekolah : $nama_sekolah <br>
				Fakultas : $fakultas , $jurusan<br>
				Pendidikan Militer : $pendidikan_militer</td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"peserta/zoom.php?id=$nrp\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td>$status</td>
				
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data peserta belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=kpeserta'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=kpeserta'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=kpeserta'>Next »</a></span>";
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
