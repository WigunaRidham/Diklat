<?php
$periode="";
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
win=window.open('periode/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
  $sql="select `kd_periode` from `$tbperiode` order by `kd_periode` desc";
 $jum= getJum($conn,$sql);
   $th=date("y");
  $bl=date("m");
  $kd="P".$th.$bl;//T1108001
		if($jum > 0){
		$d=getField($conn,$sql);
    		$idmax=$d["kd_periode"];
			$urut=substr($idmax,5,5)+1;
				if($urut<10){$idmax="$kd"."0000".$urut;}
				else if($urut<100){$idmax="$kd"."000".$urut;}
				else if($urut<1000){$idmax="$kd"."00".$urut;}
				else if($urut<10000){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."00001";}
		$kd_periode=$idmax;
?>


<?php
$nama_periode="";
$status="";

if($_GET["pro"]=="ubah"){
	$kd_periode=$_GET["kode"];
	$sql="select * from `$tbperiode` where `kd_periode`='$kd_periode'";
	$d=getField($conn,$sql);
				$kd_periode=$d["kd_periode"];
				$kd_periode0=$d["kd_periode"];
				$nama_periode=$d["nama_periode"];
				$status=$d["status"];
				$pro="ubah";		
}
?>
<div id="accordion">
  <h3>Input Periode</h3>
  <div>


<form action="" method="post" enctype="multipart/form-data">
<table width="520" height="196">


<tr>
<td width="134" height="33"><label for="kd_periode">Kode Periode</label>
<td width="30">:
<td width="491" colspan="2"> <b><?php echo $kd_periode;?></b>
</tr>

<tr>
<td height="35"><label for="nama_periode">Nama Periode</label>
<td>:
<td colspan="2"><input class="form-control"  name="nama_periode" type="text" id="nama_periode" value="<?php echo $nama_periode;?>" size="30" /></td>
</tr>


<tr>
<td height="33"><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td>
</tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" onclick="MM_validateForm('nama_periode','','R');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kd_periode" type="hidden" id="kd_periode" value="<?php echo $kd_periode;?>" />
        <input name="kd_periode0" type="hidden" id="kd_periode0" value="<?php echo $kd_periode0;?>" />
        <a href="?mnu=periode"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
  </div>
  <h3>Data Periode</h3>
  <div>

Data periode: 
| <a href="periode/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="37%" class="table table-striped table-bordered table-hover">
     <thead>
  <tr bgcolor="#cccccc">
    <th width="12%"><center>No</th>
    <th width="16%"><center>Kode</th>
    <th width="34%"><center>Nama Periode</th>
    <th width="21%"><center>Status</th>
  
    <th width="17%"><center>Menu</th>
  </tr>
  </thead>
  <tbody>
<?php  
  $sql="select * from `$tbperiode` order by `kd_periode` desc";
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
				$kd_periode=$d["kd_periode"];
				$nama_periode=$d["nama_periode"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kd_periode</td>
				<td>$nama_periode</td>
				
				<td>$status</td>
			
				<td align='center'>
<a href='?mnu=periode&pro=ubah&kode=$kd_periode'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=periode&pro=hapus&kode=$kd_periode'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_periode pada data periode ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data periode belum tersedia...</blink></td></tr>";}
?>
<tbody>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=periode'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=periode'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=periode'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>

</div>
</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	
	$kd_periode=strip_tags($_POST["kd_periode"]);
	$kd_periode0=strip_tags($_POST["kd_periode"]);
	$nama_periode=strip_tags($_POST["nama_periode"]);
	
	$status=strip_tags($_POST["status"]);
	
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbperiode` (
`kd_periode` ,
`nama_periode` ,
`status` 

) VALUES (
'$kd_periode', 
'$nama_periode', 
'$status'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kd_periode berhasil disimpan !');document.location.href='?mnu=periode';</script>";}
		else{echo"<script>alert('Data $kd_periode gagal disimpan...');document.location.href='?mnu=periode';</script>";}
	}
	else{
$sql="update `$tbperiode` set 
`nama_periode`='$nama_periode',
`status`='$status' 
where `kd_periode`='$kd_periode0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kd_periode berhasil diubah !');document.location.href='?mnu=periode';</script>";}
	else{echo"<script>alert('Data $kd_periode gagal diubah...');document.location.href='?mnu=periode';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kd_periode=$_GET["kode"];
$sql="delete from `$tbperiode` where `kd_periode`='$kd_periode'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data periode $kd_periode berhasil dihapus !');document.location.href='?mnu=periode';</script>";}
else{echo"<script>alert('Data periode $kd_periode gagal dihapus...');document.location.href='?mnu=periode';</script>";}
}
?>

