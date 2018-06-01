<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "nrp".$separator .
	"nama".$separator .
	"pangkat".$separator .
	"korps".$separator .
	"golongan".$separator .
	"tempat_lahir".$separator .
	"tanggal_lahir".$separator .
	"agama".$separator .
	"jabatan".$separator .
	"kesatuan".$separator .
	"alamat_kantor".$separator .
	"telepon_kantor".$separator .
	"kota_kabupaten".$separator .
	"provinsi".$separator .
	"jenis_kelamin".$separator .
	"nama_pasangan".$separator .
	"alamat_rumah".$separator .
	"telepon".$separator .
	"pendidikan_umum".$separator .
	"fakultas".$separator .
	"jurusan".$separator .
	"nama_sekolah".$separator .
	"pendidikan_militer".$separator .
	"password".$separator .
	"username".$separator .
	"gambar".$separator .
	"status".$separator; 
    $buffer .= $newline; 
    
  $sql="select `nrp`,`nama`,`pangkat`,`korps`,`golongan`,`tempat_lahir` ,`tanggal_lahir` ,`agama` ,`jabatan` ,`kesatuan` ,`alamat_kantor` ,`telepon_kantor` ,`kota_kabupaten` ,`provinsi` ,`jenis_kelamin` ,`nama_pasangan` ,`alamat_rumah` ,`telepon` ,`pendidikan_umum` ,`fakultas` ,`jurusan` ,`nama_sekolah` ,`pendidikan_militer` ,`password` ,`username` ,`gambar` ,`status` from `$tb_peserta` order by `nrp` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["nrp"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nama"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["pangkat"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["korps"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["golongan"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["tempat_lahir"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["tanggal_lahir"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["agama"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["jabatan"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kesatuan"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["alamat_kantor"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["telepon_kantor"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["kota_kabupaten"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["provinsi"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["jenis_kelamin"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nama_pasangan"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["alamat_rumah"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["telepon"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["pendidikan_umum"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["fakultas"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["jurusan"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nama_sekolah"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["pendidikan_militer"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["password"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["username"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["gambar"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["status"];$buffer .= "\"".$value."\"".$separator; 
				$buffer .= $newline; 
		}	
  }
  else{
    $buffer .= $newline; 
	  }
    header("Content-type: application/vnd.ms-excel"); 
    header("Content-Length: ".strlen($buffer)); 
    header("Content-Disposition: attachment; filename=report.csv"); 
    header("Expires: 0"); 
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
    header("Pragma: public"); 

    print $buffer;
	
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