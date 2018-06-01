<?php

$tanggal=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";
$status="Aktif";
//$PATH="ypathcss";
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
win=window.open('kursus/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>
<!---- >
<?php
  $sql="select `kd_kursus` from `$tbkursus` order by `kd_kursus` desc";
  $jum= getJum($conn,$sql);
  $kd="KDK";
		if($jum > 0){
				$d=getField($conn,$sql);
    			$idmax=$d['kd_kursus'];	
				$urut=substr($idmax,3,3)+1;//01
				if($urut<10){$idmax="$kd"."00".$urut;}
				else if($urut<100){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."001";}
		$kd_kursus=$idmax;
?>
<!--->

<?php
if($_GET["pro"]=="ubah"){
	$kd_kursus=$_GET["kode"];
	$sql="select * from `$tbkursus` where `kd_kursus`='$kd_kursus'";
	$d=getField($conn,$sql);
				$kd_kursus=$d["kd_kursus"];
				$nama_kursus=$d["nama_kursus"];
				
				$keterangan=$d["keterangan"];
				
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$pro="ubah";		
}
?>
<div id="accordion">
  <h3>Input Data Kursus</h3>
  <div>

<form action="" method="post" enctype="multipart/form-data">
<table width="56%" height="272" >
<tr>
<td width="129" height="41"><label for="kd_kursus">Kode Kursus</label>
<td width="12">:<td width="343" colspan="2"> <b> <?php echo $kd_kursus;?></b>
</td>
</tr>

<tr>
<td height="39"><label for="nama_kursus">Nama Kursus</label>
<td>:<td><input class="form-control" name="nama_kursus" type="text" id="nama_kursus" value="<?php echo $nama_kursus;?>" size="40" />
</td>
<td width="109" rowspan="4">
<center>
<?php 
echo"<a href='#' onclick='buka(\"kursus/zoom.php?id=$kd_kursus\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</td>
</tr>


   
      

<tr>
<td height="58"><label for="keterangan">Keterangan</label>
<td>:<td><textarea class="form-control"  name="keterangan" cols="35" rows="2" id="keterangan"><?php echo $keterangan;?></textarea>
</td>
</tr>


<tr>
  <td height="38"><label>Gambar</label>
    <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("kursus/zoom.php?id=<?php echo $kd_kursus;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="kd_kursus" type="hidden" id="kd_kursus" value="<?php echo $kd_kursus;?>" />
        <input name="kd_kursus0" type="hidden" id="kd_kursus0" value="<?php echo $kd_kursus0;?>" />
        <a href="?mnu=kursus"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

 </div>
  <h3>Data Kursus</h3>
  <div>

<br />
Data kursus: 
| <a href="kursus/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="742" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
    <th width="4%">No</td>
    <th width="15%">Kode Kursus
      </td>
    <th width="28%">Nama Kursus</td>
   
    <th width="15%">Keterangan</td>
    <th width="12%">Gambar</td>
    <th width="13%">Menu</td>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tbkursus` order by `kd_kursus` desc";
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
				$kd_kursus=$d["kd_kursus"];
				$nama_kursus=$d["nama_kursus"];
			
				$keterangan=$d["keterangan"];
				
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kd_kursus</td>
				<td>$nama_kursus</td>
				
				<td>$keterangan</td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"kursus/zoom.php?id=$kd_kursus\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td><div align='center'>
<a href='?mnu=kursus&pro=ubah&kode=$kd_kursus'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=kursus&pro=hapus&kode=$kd_kursus'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data kursus ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data kursus belum tersedia...</blink></td></tr>";}
?>
</tbody>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=kursus'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=kursus'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=kursus'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>

</div>
</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kd_kursus=strip_tags($_POST["kd_kursus"]);
	$kd_kursus0=strip_tags($_POST["kd_kursus"]);
	$nama_kursus=strip_tags($_POST["nama_kursus"]);
	
	$keterangan=strip_tags($_POST["keterangan"]);

	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbkursus` (
`kd_kursus` ,
`nama_kursus` ,

`keterangan` ,

`gambar` 
) VALUES (
'$kd_kursus', 
'$nama_kursus',

'$keterangan',

'$gambar'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $kd_kursus berhasil disimpan !');document.location.href='?mnu=kursus';</script>";}
		else{echo"<script>alert('Data $kd_kursus gagal disimpan...');document.location.href='?mnu=kursus';</script>";}
	}
	else{
	
	
	$sql="update `$tbkursus` set 
	
	`nama_kursus`='$nama_kursus',
	
	`keterangan`='$keterangan' ,
	`gambar`='$gambar' 
	 where `kd_kursus`='$kd_kursus0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $kd_kursus berhasil diubah !');document.location.href='?mnu=kursus';</script>";}
		else{echo"<script>alert('Data $kd_kursus gagal diubah...');document.location.href='?mnu=kursus';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kd_kursus=$_GET["kode"];
$sql="delete from `$tbkursus` where `kd_kursus`='$kd_kursus'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $kd_kursus berhasil dihapus !');document.location.href='?mnu=kursus';</script>";}
	else{echo"<script>alert('Data $kd_kursus gagal dihapus...');document.location.href='?mnu=kursus';</script>";}
}
?>

