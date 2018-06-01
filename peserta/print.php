<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data peserta:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>No</td>
    <th width="10%"><center>NRP/NIP</td>
    <th width="25%"><center>Nama</td>
    <th width="10%"><center>Pangkat</td>
    <th width="10%"><center>Golongan</td>
    <th width="15%"><center>Kesatuan</td>
    <th width="25%"><center>AlamatKantor</td>
    <th width="10%"><center>Telepon Kantor</td>
   
    
  </tr>
<?php  
  $sql="select * from `$tb_peserta` order by `nrp` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$nrp=$d["nrp"];
				$nama=$d["nama"];
				$pangkat=$d["pangkat"];
				
				$golongan=$d["golongan"];
				$kesatuan=$d["kesatuan"];
				$alamat_kantor=$d["alamat_kantor"];
				$telepon_kantor=$d["telepon_kantor"];
				
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$nrp</td>
				<td>$nama</td>
				<td>$pangkat</td>
				
				<td>$golongan</td>
				
				
				<td>$kesatuan</td>
				<td>$alamat_kantor</td>
				<td>$telepon_kantor</td>
				
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$nrp</td>
				<td>$nama</td>
				<td>$pangkat</td>
				
				<td>$golongan</td>
				
				<td>$kesatuan</td>
				<td>$alamat_kantor</td>
				<td>$telepon_kantor</td>
				
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data peserta belum tersedia...</blink></td></tr>";}
		
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
		
?>

</table>

