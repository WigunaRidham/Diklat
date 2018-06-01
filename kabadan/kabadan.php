<?php

$tanggal=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";

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
win=window.open('kabadan/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
  $sql="select `kd_kabadan` from `$tb_kabadan` order by `kd_kabadan` desc";
  $jum= getJum($conn,$sql);
  $kd="KBD";
		if($jum > 0){
				$d=getField($conn,$sql);
    			$idmax=$d['kd_kabadan'];	
				$urut=substr($idmax,3,2)+1;//01
				if($urut<10){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."01";}
		$kd_kabadan=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$kd_kabadan=$_GET["kode"];
	$sql="select * from `$tb_kabadan` where `kd_kabadan`='$kd_kabadan'";
	$d=getField($conn,$sql);
				$kd_kabadan=$d["kd_kabadan"];
				$nama_kabadan=$d["nama_kabadan"];
				$pangkat=$d["pangkat"];
				
				
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$pro="ubah";		
}
?>

<div id="accordion">
  <h3>Input Data Kabadan</h3>
  <div>


<form action="" method="post" enctype="multipart/form-data">
<table width="58%" >
<tr>
<th width="116"><label for="kd_kabadan">Kode Kabadan</label>
<th width="28">:
<th colspan="2"><b><?php echo $kd_kabadan;?></b></tr>
<tr>
<td height="53"><label for="nama_kabadan">Nama Kabadan</label>
<td>:<td width="403"><input class="form-control" name="nama_kabadan" type="text" id="nama_kabadan" value="<?php echo $nama_kabadan;?>" size="30" />
</td>
<td width="144" rowspan="4">
<center>
<?php 
echo"<a href='#' onclick='buka(\"kabadan/zoom.php?id=$kd_kabadan\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
<td height="46"><label for="pangkat">pangkat</label>
<td>:<td><input class="form-control"  name="pangkat" type="pangkat" id="pangkat" value="<?php echo $pangkat;?>" size="30" / ></td>
</tr>




<tr>
  <td height="44"><label>Gambar</label>
    <td>:<td ><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("kabadan/zoom.php?id=<?php echo $kd_kabadan;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td height="43">
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" onclick="MM_validateForm('nama_kabadan','','R');return document.MM_returnValue" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="kd_kabadan" type="hidden" id="kd_kabadan" value="<?php echo $kd_kabadan;?>" />
        <input name="kd_kabadan0" type="hidden" id="kd_kabadan0" value="<?php echo $kd_kabadan0;?>" />
        <a href="?mnu=kabadan"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>


  </div>
  <h3>Data Kabadan</h3>
  <div>

Data Kabadan: 
| <a href="kabadan/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

 <table width="71%" class="table table-striped table-bordered table-hover">
     <thead>
        <tr bgcolor="#036">
    <th width="4%" bgcolor="#CCCCCC">No</td>
    <th width="14%" bgcolor="#CCCCCC">Kode Kabadan</td>
    <th width="16%" bgcolor="#CCCCCC">Nama Kabadan</td>
   <th width="16%" bgcolor="#CCCCCC">Pangkat</td>
   
    <th width="12%" bgcolor="#CCCCCC">Gambar</td>
    <th width="12%" bgcolor="#CCCCCC">Menu</td>
  </tr>
     </thead>
     <tbody>
<?php  
  $sql="select * from `$tb_kabadan` order by `kd_kabadan` desc";
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
				$kd_kabadan=$d["kd_kabadan"];
				$nama_kabadan=$d["nama_kabadan"];
				$pangkat=$d["pangkat"];
			
				
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kd_kabadan</td>
				<td>$nama_kabadan</td>
				<td>$pangkat</td>
			
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"kabadan/zoom.php?id=$kd_kabadan\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td><div align='center'>
<a href='?mnu=kabadan&pro=ubah&kode=$kd_kabadan'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=kabadan&pro=hapus&kode=$kd_kabadan'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data kabadan ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data kabadan belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=kabadan'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=kabadan'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=kabadan'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>

<!-- ----------------------->
</div>
</div>

  
<!-- ----------------------->               
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kd_kabadan=strip_tags($_POST["kd_kabadan"]);
	$kd_kabadan0=strip_tags($_POST["kd_kabadan"]);
	$nama_kabadan=strip_tags($_POST["nama_kabadan"]);
	$pangkat=strip_tags($_POST["pangkat"]);


	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tb_kabadan` (
`kd_kabadan` ,
`nama_kabadan` ,
`pangkat` ,



`gambar` 
) VALUES (
'$kd_kabadan', 
'$nama_kabadan',
'$pangkat', 


 
'$gambar'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $kd_kabadan berhasil disimpan !');document.location.href='?mnu=kabadan';</script>";}
		else{echo"<script>alert('Data $kd_kabadan gagal disimpan...');document.location.href='?mnu=kabadan';</script>";}
	}
	else{
	$sql="update `$tb_kabadan` set `nama_kabadan`='$nama_kabadan',`pangkat`='$pangkat',
	`gambar`='$gambar'  where `kd_kabadan`='$kd_kabadan0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $kd_kabadan berhasil diubah !');document.location.href='?mnu=kabadan';</script>";}
		else{echo"<script>alert('Data $kd_kabadan gagal diubah...');document.location.href='?mnu=kabadan';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kd_kabadan=$_GET["kode"];
$sql="delete from `$tb_kabadan` where `kd_kabadan`='$kd_kabadan'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $kd_kabadan berhasil dihapus !');document.location.href='?mnu=kabadan';</script>";}
	else{echo"<script>alert('Data $kd_kabadan gagal dihapus...');document.location.href='?mnu=kabadan';</script>";}
}
?>

