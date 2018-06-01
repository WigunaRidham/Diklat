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

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('kursusdikopi13/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, kopi6=0'); } 
</script>
<script language="JavaScript">
function kopi13(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
  $sql="select `kopi1` from `$tb_pegawai` order by `kopi1` desc";
  $jum= getJum($conn,$sql);
  $kd="MHS";
		if($jum > 0){
				$d=getField($conn,$sql);
    			$idmax=$d['kopi1'];	
				$urut=substr($idmax,3,3)+1;//01
				if($urut<10){$idmax="$kd"."00".$urut;}
				else if($urut<100){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."01";}
		$kopi1=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$kopi1=$_GET["kode"];
	$sql="select * from `$tb_pegawai` where `kopi1`='$kopi1'";
	$d=getField($conn,$sql);
				$kopi1=$d["kopi1"];
				$kopi10=$d["kopi1"];
				
				$kopi2=$d["kopi2"];
				$kopi3=$d["kopi3"];
				$kopi4=$d["kopi4"];
				$kopi5=$d["kopi5"];
				$kopi6=$d["kopi6"];
				
				$kopi7=$d["kopi7"];
				$kopi8=$d["kopi8"];
				$kopi9=$d["kopi9"];
				$kopi10=$d["kopi10"];
				$kopi11=$d["kopi11"];
				$kopi12=$d["kopi12"];
				$kopi13=$d["kopi13"];
				$kopi14=$d["kopi14"];
				$kopi15=$d["kopi15"];
				$kopi16=$d["kopi16"];
				$kopi17=$d["kopi17"];
				
				$kopi18=$d["kopi18"];
				$kopi19=$d["kopi19"];
				$kopi20=$d["kopi20"];
				$kopi21=$d["kopi21"];
				$kopi22=$d["kopi22"];
				$kopi23=$d["kopi23"];
				$kopi24=$d["kopi24"];
				$kopi25=$d["kopi25"];
				$kopi26=$d["kopi26"];
				$kopi27=$d["kopi27"];
				
				$pro="ubah";		
}
?>


<form action="" method="post" enctype="multipart/form-data">
<table width="385">


<tr>
<th width="66"><label for="kopi1">kopi1</label>
<th width="9">:
<th colspan="2"><b><?php echo $kopi1;?></b>
</tr>

<tr>
<td><label for="kopi2">kopi2</label>
<td>:
<td colspan="2"><input name="kopi2" type="text" id="kopi2" value="<?php echo $kopi2;?>" size="30" /></td>
</tr>

<tr>
<td height="24"><label for="kopi3">kopi3</label>
<td>:<td colspan="2"><input name="kopi3" type="text" id="kopi3" value="<?php echo $kopi3;?>" size="15" />
</td>
</tr>

<tr>
<td height="24"><label for="kopi4">kopi4</label>
<td>:
<td><input name="kopi4" type="text" id="kopi4" value="<?php echo $kopi4;?>" size="30" />
  <label for="kode_barang"></label></td>
</tr>

<tr>
<td height="24"><label for="kopi5">kopi5</label>
<td>:<td colspan="2"><input name="kopi5" type="text" id="kopi5" value="<?php echo $kopi5;?>" size="25" />
</td>
</tr>

<tr>
<td><label for="kopi6">kopi6</label>
<td>:<td colspan="2"><input name="kopi6" type="text" id="kopi6" value="<?php echo $kopi6;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi7">kopi7</label>
<td>:<td colspan="2"><input name="kopi7" type="text" id="kopi7" value="<?php echo $kopi7;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi8">kopi8</label>
<td>:<td colspan="2"><input name="kopi8" type="text" id="kopi8" value="<?php echo $kopi8;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi9">kopi9</label>
<td>:<td colspan="2"><input name="kopi9" type="text" id="kopi9" value="<?php echo $kopi9;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi10">kopi10</label>
<td>:<td colspan="2"><input name="kopi10" type="text" id="kopi10" value="<?php echo $kopi10;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi11">kopi11</label>
<td>:<td colspan="2"><input name="kopi11" type="text" id="kopi11" value="<?php echo $kopi11;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi12">kopi12</label>
<td>:<td colspan="2"><input name="kopi12" type="text" id="kopi12" value="<?php echo $kopi12;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi13">kopi13</label>
<td>:<td colspan="2"><input name="kopi13" type="text" id="kopi13" value="<?php echo $kopi13;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi14">kopi14</label>
<td>:<td colspan="2"><input name="kopi14" type="text" id="kopi14" value="<?php echo $kopi14;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi15">kopi15</label>
<td>:<td colspan="2"><input name="kopi15" type="text" id="kopi15" value="<?php echo $kopi15;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi16">kopi16</label>
<td>:<td colspan="2"><input name="kopi16" type="text" id="kopi16" value="<?php echo $kopi16;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi17">kopi17</label>
<td>:<td colspan="2"><input name="kopi17" type="text" id="kopi17" value="<?php echo $kopi17;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi18">kopi18</label>
<td>:<td colspan="2"><input name="kopi18" type="text" id="kopi18" value="<?php echo $kopi18;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi19">kopi19</label>
<td>:<td colspan="2"><input name="kopi19" type="text" id="kopi19" value="<?php echo $kopi19;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi20">kopi20</label>
<td>:<td colspan="2"><input name="kopi20" type="text" id="kopi20" value="<?php echo $kopi20;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi21">kopi21</label>
<td>:<td colspan="2"><input name="kopi21" type="text" id="kopi21" value="<?php echo $kopi21;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi22">kopi22</label>
<td>:<td colspan="2"><input name="kopi22" type="text" id="kopi22" value="<?php echo $kopi22;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi23">kopi23</label>
<td>:<td colspan="2"><input name="kopi23" type="text" id="kopi23" value="<?php echo $kopi23;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi24">kopi24</label>
<td>:<td colspan="2"><input name="kopi24" type="text" id="kopi24" value="<?php echo $kopi24;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi25">kopi25</label>
<td>:<td colspan="2"><input name="kopi25" type="text" id="kopi25" value="<?php echo $kopi25;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi26">kopi26</label>
<td>:<td colspan="2"><input name="kopi26" type="text" id="kopi26" value="<?php echo $kopi26;?>" size="15" /></td></tr>

<tr>
<td><label for="kopi27">kopi27</label>
<td>:<td colspan="2"><input name="kopi27" type="text" id="kopi27" value="<?php echo $kopi27;?>" size="15" /></td></tr>

<tr>
<td>
<td>
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="kopi1" type="hidden" id="kopi1" value="<?php echo $kopi1;?>" />
        <input name="kopi10" type="hidden" id="kopi10" value="<?php echo $kopi10;?>" />
        <a href="?mnu=kursusdikopi13"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

Data kursusdikopi13: 
| <a href="kursusdikopi13/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="kursusdikopi13/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="kursusdikopi13/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0">
  <tr bgcolor="#036">
    <th width="3%"><center>no</th>
    <th width="10%"><center>kode</th>
    <th width="20%"><center>kopi2</th>
    <th width="10%"><center>kopi3</th>
    <th width="30%"><center>kopi4</th>
    <th width="15%"><center>kopi5</th>
    <th width="10%"><center>kopi6</th>
      <th width="10%"><center>kopi7</th>
        <th width="10%"><center>kopi8</th>
          <th width="10%"><center>kopi9</th>
            <th width="10%"><center>kopi10</th>
              <th width="10%"><center>kopi11</th>
                <th width="10%"><center>kopi12</th>
                  <th width="10%"><center>kopi13</th>
                    <th width="10%"><center>kopi14</th>
                      <th width="10%"><center>kopi15</th>
                        <th width="10%"><center>kopi16</th>
                          <th width="10%"><center>kopi17</th>
                            <th width="10%"><center>kopi18</th>
                              <th width="10%"><center>kopi19</th>
                                <th width="10%"><center>kopi20</th>
                                  <th width="10%"><center>kopi21</th>
                                    <th width="10%"><center>kopi22</th>
                                      <th width="10%"><center>kopi23</th>
                                        <th width="10%"><center>kopi24</th>
                                          <th width="10%"><center>kopi25</th>
                                            <th width="10%"><center>kopi26</th>
                                              <th width="10%"><center>kopi27</th>
    <th width="10%"><center>menu</th>
  </tr>
<?php  
  $sql="select * from `$tb_pegawai` order by `kopi1` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 2;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$kopi1=$d["kopi1"];
				$kopi2=$d["kopi2"];
				$kopi3=$d["kopi3"];
				$kopi4=$d["kopi4"];
				$kopi5=$d["kopi5"];
				$kopi6=$d["kopi6"];
				
				$kopi7=$d["kopi7"];
				$kopi8=$d["kopi8"];
				$kopi9=$d["kopi9"];
				$kopi10=$d["kopi10"];
				$kopi11=$d["kopi11"];
				$kopi12=$d["kopi12"];
				$kopi13=$d["kopi13"];
				$kopi14=$d["kopi14"];
				$kopi15=$d["kopi15"];
				$kopi16=$d["kopi16"];
				$kopi17=$d["kopi17"];
				
				$kopi18=$d["kopi18"];
				$kopi19=$d["kopi19"];
				$kopi20=$d["kopi20"];
				$kopi21=$d["kopi21"];
				$kopi22=$d["kopi22"];
				$kopi23=$d["kopi23"];
				$kopi24=$d["kopi24"];
				$kopi25=$d["kopi25"];
				$kopi26=$d["kopi26"];
				$kopi27=$d["kopi27"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$kopi1</td>
				<td>$kopi2</td>
				<td>$kopi3</td>
				<td>$kopi4</td>
				<td>$kopi5</td>
				<td align='center'>$kopi6</td>
				
				<td>$kopi7</td>
				<td>$kopi8</td>
				<td>$kopi9</td>
				<td>$kopi10</td>
				<td>$kopi11</td>
				<td>$kopi12</td>
				<td>$kopi13</td>
				<td>$kopi14</td>
				<td>$kopi15</td>
				<td>$kopi16</td>
				<td>$kopi17</td>
				
				<td>$kopi18</td>
				<td>$kopi19</td>
				<td>$kopi20</td>
				<td>$kopi21</td>
				<td>$kopi22</td>
				<td>$kopi23</td>
				<td>$kopi24</td>
				<td>$kopi25</td>
				<td>$kopi26</td>
				<td>$kopi27</td>
				<td align='center'>
<a href='?mnu=kursusdikopi13&pro=ubah&kode=$kopi1'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=kursusdikopi13&pro=hapus&kode=$kopi1'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $kopi2 pada data kursusdikopi13 ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data kursusdikopi13 belum tersedia...</blink></td></tr>";}
?>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=kursusdikopi13'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=kursusdikopi13'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=kursusdikopi13'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$kopi1=strip_tags($_POST["kopi1"]);
	$kopi10=strip_tags($_POST["kopi10"]);
	$kopi2=strip_tags($_POST["kopi2"]);
	$kopi3=strip_tags($_POST["kopi3"]);
	$kopi4=strip_tags($_POST["kopi4"]);
	$kopi5=strip_tags($_POST["kopi5"]);
	$kopi6=strip_tags($_POST["kopi6"]);
	
	$kopi7=strip_tags($_POST["kopi7"]);
	$kopi8=strip_tags($_POST["kopi8"]);
	$kopi9=strip_tags($_POST["kopi9"]);
	$kopi10=strip_tags($_POST["kopi10"]);
	$kopi11=strip_tags($_POST["kopi11"]);
	$kopi12=strip_tags($_POST["kopi12"]);
	$kopi13=strip_tags($_POST["kopi13"]);
	$kopi14=strip_tags($_POST["kopi14"]);
	$kopi15=strip_tags($_POST["kopi15"]);
	$kopi16=strip_tags($_POST["kopi16"]);
	$kopi17=strip_tags($_POST["kopi17"]);
	
	$kopi18=strip_tags($_POST["kopi18"]);
	$kopi19=strip_tags($_POST["kopi19"]);
	$kopi20=strip_tags($_POST["kopi20"]);
	$kopi21=strip_tags($_POST["kopi21"]);
	$kopi22=strip_tags($_POST["kopi22"]);
	$kopi23=strip_tags($_POST["kopi23"]);
	$kopi24=strip_tags($_POST["kopi24"]);
	$kopi25=strip_tags($_POST["kopi25"]);
	$kopi26=strip_tags($_POST["kopi26"]);
	$kopi27=strip_tags($_POST["kopi27"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tb_pegawai` (
`kopi1` ,
`kopi2` ,
`kopi3` ,
`kopi4` ,
`kopi5` ,
`kopi6` ,
`kopi7` ,
`kopi8` ,
`kopi9` ,
`kopi10` ,
`kopi11` ,
`kopi12` ,
`kopi13` ,
`kopi14` ,
`kopi15` ,
`kopi16` ,
`kopi17` ,
`kopi18` ,
`kopi19` ,
`kopi20` ,
`kopi21` ,
`kopi22` ,
`kopi23` ,
`kopi24` ,
`kopi25` ,
`kopi26` ,
`kopi27` 
) VALUES (
'$kopi1', 
'$kopi2', 
'$kopi3',
'$kopi4',
'$kopi5',
'$kopi6',

'$kopi7',
'$kopi8',
'$kopi9',
'$kopi10',
'$kopi11',
'$kopi12',
'$kopi13',
'$kopi14',
'$kopi15',
'$kopi16',
'$kopi17',
'$kopi18',
'$kopi19',
'$kopi20',
'$kopi21',
'$kopi22',
'$kopi23',
'$kopi24',
'$kopi25',
'$kopi26',
'$kopi27'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kopi1 berhasil disimpan !');document.location.href='?mnu=kursusdikopi13';</script>";}
		else{echo"<script>alert('Data $kopi1 gagal disimpan...');document.location.href='?mnu=kursusdikopi13';</script>";}
	}
	else{
$sql="update `$tb_pegawai` set 
`kopi2`='$kopi2',
`kopi3`='$kopi3' ,
`kopi4`='$kopi4',
`kopi6`='$kopi6',
`kopi5`='$kopi5',

`kopi7`='$kopi7',
`kopi8`='$kopi8',
`kopi9`='$kopi9',
`kopi10`='$kopi10',
`kopi11`='$kopi11',
`kopi12`='$kopi12',
`kopi13`='$kopi13',
`kopi14`='$kopi14',
`kopi15`='$kopi15',
`kopi16`='$kopi16',
`kopi17`='$kopi17',
`kopi18`='$kopi18',
`kopi19`='$kopi19',
`kopi20`='$kopi20',
`kopi21`='$kopi21',
`kopi22`='$kopi22',
`kopi23`='$kopi23',
`kopi24`='$kopi24',
`kopi25`='$kopi25',
`kopi26`='$kopi26',
`kopi27`='$kopi27'

where `kopi1`='$kopi10'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $kopi1 berhasil diubah !');document.location.href='?mnu=kursusdikopi13';</script>";}
	else{echo"<script>alert('Data $kopi1 gagal diubah...');document.location.href='?mnu=kursusdikopi13';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$kopi1=$_GET["kode"];
$sql="delete from `$tb_pegawai` where `kopi1`='$kopi1'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data kursusdikopi13 $kopi1 berhasil dihapus !');document.location.href='?mnu=kursusdikopi13';</script>";}
else{echo"<script>alert('Data kursusdikopi13 $kopi1 gagal dihapus...');document.location.href='?mnu=kursusdikopi13';</script>";}
}
?>

