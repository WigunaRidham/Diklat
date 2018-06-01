<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data nilai_detail:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
   
    <th width="15%"><center>nrp</td>
    <th width="20%"><center>materi</td>
    <th width="5%"><center>murni</td>
    <th width="5%"><center>harga</td>
    <th width="5%"><center>prestasi</td>
    <th width="5%"><center>bobot</td>
    <th width="7%"><center>prestasi_akhir</td>
    <th width="15%"><center>keterangan</td>
   
  </tr>
<?php  
  $sql="select * from `$tb_nilai_detail` order by `id` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$nrp=$d["nrp"];
				$materi=$d["materi"];
				$murni=$d["murni"];
				$harga=$d["harga"];
				$prestasi=$d["prestasi"];
				$bobot=$d["bobot"];
				$prestasi_akhir=$d["prestasi_akhir"];
				$keterangan=$d["keterangan"];
				
				
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				
				<td>$nrp</td>
				<td>$materi</td>
				<td>$murni</td>
				<td>$harga</td>
				<td>$prestasi</td>
				<td>$bobot</td>
				<td>$prestasi_akhir</td>
				<td>$keterangan</td>
				
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				
				<td>$nrp</td>
				<td>$materi</td>
				<td>$murni</td>
				<td>$harga</td>
				<td>$prestasi</td>
				<td>$bobot</td>
				<td>$prestasi_akhir</td>
				<td>$keterangan</td>
				
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data nilai_detail belum tersedia...</blink></td></tr>";}
		
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

