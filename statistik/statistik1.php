<?php
$path = "statistik/counter0";
$pathicon = "statistik/counter1";
$ext = ".gif";//GUNAKAN EXTENSI BARU DISINI

$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
$waktu   = time(); // 

$sql="SELECT * FROM `statistik` WHERE ip='$ip' AND tanggal='$tanggal'";
$jum=getJum($conn,$sql);
if($jum == 0){
	process($conn,"INSERT INTO `statistik`(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
	} 
else{
	process($conn,"UPDATE `statistik` SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
	}

$pengunjung       = getJum($conn,"SELECT * FROM `statistik` WHERE tanggal='$tanggal' GROUP BY ip");
$totalpengunjung  = getJum($conn,"SELECT COUNT(hits) FROM `statistik`"); 
$hits             = getJum($conn,"SELECT SUM(hits) FROM `statistik` WHERE tanggal='$tanggal' GROUP BY tanggal");
$totalhits        = getJum($conn,"SELECT SUM(hits) FROM `statistik`");
$tothitsgbr       = getJum($conn,"SELECT SUM(hits) FROM `statistik`"); 
$bataswaktu       = time() - 300;
$pengunjungonline = getJum($conn,"SELECT * FROM `statistik` WHERE online > '$bataswaktu'");





$tothitsgbr2 = sprintf("%06d", $tothitsgbr)+0;
for ( $i = 0; $i <= 9; $i++ ){//XX1.gif/0.gif' alt='XX0.gif'>
	$tothitsgbr2 = str_replace($i, "<img src='$pathicon/$i.gif'>", $tothitsgbr2);
}

if($tothitsgbr2<10){$tothitsgbr2="<img src='$pathicon/0.gif'><img src='$pathicon/0.gif'>".$tothitsgbr2;}
else if($tothitsgbr2<100){$tothitsgbr2="<img src='$pathicon/0.gif'>".$tothitsgbr2;}
else {$tothitsgbr2=$tothitsgbr2;}

echo "<p align=left>$tothitsgbr2 </p>
      <img src='$path/hariini.png'> Pengunjung hari ini : $pengunjung <br>
      <img src='$path/total.png'> Total pengunjung    : $totalpengunjung <br><br>
      <img src='$path/hariini.png'> Hits hari ini    : $hits <br>
      <img src='$path/total.png'> Total Hits       : $totalhits <br><br>
      <img src='$path/online.png'> Pengunjung Online: $pengunjungonline";
?>