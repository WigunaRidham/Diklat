<?php
$q=$_GET["q"];

$con = mysql_connect('localhost', 'root', '');
if (!$con){ die('Koneksi gagal: ' . mysql_error());}

mysql_select_db("db_coba", $con);
$sql="SELECT * FROM pegawai WHERE IdKar = '".$q."'";
$d=getField($conn,$sql);
	
echo "<table border='1'>
<tr>
<th>Nama Depan</th>
<th>Jenis Kelamin</th>
</tr>";

 echo "<tr>";
 echo "<td>" . $d['nama'] . "</td>";
 echo "<td>" . $d['jenis_kelamin'] . "</td>";
 echo "</tr>";

echo "</table>";

?>
