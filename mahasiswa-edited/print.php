<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data kursusdikopi13:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>kopi1</td>
    <th width="25%"><center>kopi2</td>
    <th width="25%"><center>kopi3</td>
    <th width="20%"><center>kopi4</td>
    <th width="10%"><center>kopi5</td>
    <th width="5%"><center>kopi6</td>
    
    <th width="10%"><center>kopi7</td>
    <th width="10%"><center>kopi8</td>
    <th width="10%"><center>kopi9</td>
    <th width="10%"><center>kopi10</td>
    <th width="10%"><center>kopi11</td>
    <th width="10%"><center>kopi12</td>
    <th width="10%"><center>kopi13</td>
    <th width="10%"><center>kopi14</td>
    <th width="10%"><center>kopi15</td>
    <th width="10%"><center>kopi16</td>
    <th width="10%"><center>kopi17</td>
    <th width="10%"><center>kopi18</td>
    <th width="10%"><center>kopi19</td>
    <th width="10%"><center>kopi20</td>
    <th width="10%"><center>kopi21</td>
    <th width="10%"><center>kopi22</td>
    <th width="10%"><center>kopi23</td>
    <th width="10%"><center>kopi24</td>
    <th width="10%"><center>kopi25</td>
    <th width="10%"><center>kopi26</td>
    <th width="10%"><center>kopi27</td>
    
  </tr>
<?php  
  $sql="select * from `$tb_pegawai` order by `kopi1` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
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
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$kopi1</td>
				<td>$kopi2</td>
				<td>$kopi3</td>
				<td>$kopi4</td>
				<td>$kopi5</td>
				<td>$kopi6</td>
				
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
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$kopi1</td>
				<td>$kopi2</td>
				<td>$kopi3</td>
				<td>$kopi4</td>
				<td>$kopi5</td>
				<td>$kopi6</td>
								
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
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data kursusdikopi13 belum tersedia...</blink></td></tr>";}
		
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

