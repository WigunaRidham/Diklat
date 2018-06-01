<?php
require_once"../konmysqli.php";
	if(isset($_GET["kode"])){
		$kd_pendaftaran=$_GET["kode"];
	}
		
	$sql="select * from `$tbpendaftaran` where `kd_pendaftaran`='$kd_pendaftaran'";
	$d=getField($conn,$sql);
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_pendaftaran0=$d["kd_pendaftaran"];
				$kd_periode=$d["kd_periode"];
				$kd_kursus=$d["kd_kursus"];
				$kd_kursus_dibuka=getKursusDibuka($conn, $d["kd_kursus_dibuka"]);
				$periode=getPeriode($conn,$d["kd_periode"]);
				$kursus=getKursus($conn,$d["kd_kursus"]);
				$sifat=getSifat($conn,$d["kd_kursus_dibuka"]);
				$tingkat=getTingkat($conn,$d["kd_kursus_dibuka"]);
				
				$ujian_masuk=getUjianMasuk($conn,$d["kd_kursus_dibuka"]);
				
				$total=getTotal($conn,$d["kd_kursus_dibuka"]);
				$buka=getBuka($conn,$d["kd_kursus_dibuka"]);
				$tutup=getTutup($conn,$d["kd_kursus_dibuka"]);
				$nrp=$d["nrp"];
				$nama=getNRP($conn,$d["nrp"]);
				$gbr=getGambar($conn,$d["nrp"]);
				$pangkat=getPangkat($conn,$d["nrp"]);
				$jabatan=getJabatan($conn,$d["nrp"]);
				$kesatuan=getKesatuan($conn,$d["nrp"]);
				$nrp=$d["nrp"];
				
							$sql2="select * from `tb_peserta` where `nrp`='$nrp'";
							$d2=getField($conn,$sql2);
								$nrp=$d2["nrp"];
								$nrp0=$d2["nrp"];
				
							$nama=$d2["nama"];
							$pangkat=$d2["pangkat"];
							$korps=$d2["korps"];
							$golongan=$d2["golongan"];
							$tempat_lahir=$d2["tempat_lahir"];
				
							$tanggal_lahir=$d2["tanggal_lahir"];
							$agama=$d2["agama"];
							$jabatan=$d2["jabatan"];
							$kesatuan=$d2["kesatuan"];
							$alamat_kantor=$d2["alamat_kantor"];
							$telepon_kantor=$d2["telepon_kantor"];
							$kota_kabupaten=$d2["kota_kabupaten"];
							$provinsi=$d2["provinsi"];
							$jenis_kelamin=$d2["jenis_kelamin"];
							$nama_pasangan=$d2["nama_pasangan"];
							$alamat_rumah=$d2["alamat_rumah"];
				
							$telepon=$d2["telepon"];
							$pendidikan_umum=$d2["pendidikan_umum"];
							$fakultas=$d2["fakultas"];
							$jurusan=$d2["jurusan"];
							$nama_sekolah=$d2["nama_sekolah"];
							$pendidikan_militer=$d2["pendidikan_militer"];
							$password=$d2["password"];
							$username=$d2["username"];
						
	
				$sql3="select * from `tb_kabadan` order by kd_kabadan desc limit 1";
				$d3=getField($conn,$sql3);
				$kd3_kabadan=$d3["kd_kabadan"];
				$nama_kabadan=$d3["nama_kabadan"];
				$pangkat2=$d3["pangkat"];
				$gambar=$d3["gambar"];
				$gambar0=$d3["gambar"];
				
				
				
				
				
				
				$tanggal_daftar=$d["tanggal_daftar"];
				$status=$d["status"];
?>
<body onLoad="window.print()">
  <table width="847" height="1000" border="3">
 <tr>
      <td align="center" valign="middle"><table width="600"  border="0">
   <tr>
    <td height="178" colspan="2"><table width="838" height="61" border="0">
      <tr>
        <td width="121"><img src="../img/logo.png" alt="" width="124" height="96" /></td>
        <td width="631">
        <div align="center">
        <h2>BADAN PENDIDIKAN DAN PELATIHAN KEMHAN</h2>
          <p>PUSAT PENDIDIKAN DAN PELATIHAN BAHASA<br>
         Jl. Jati No.1, Pondok Labu Jakarta Selatan 12450 <br>
         https://www.kemhan.go.id/badiklat/pusbahasa</p>
          </div>
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="29" colspan="2"  valign="top" align="center"><hr></td>
    </tr>
  <tr>
    <td width="77"><table width="446" border="0">
      <tr>
        <td width="121">Nomor</td>
        <td width="17">:</td>
        <td width="286"> <?php echo $kd_pendaftaran;?></td>
      </tr>
      <tr>
        <td>Lampiran</td>
        <td>:</td>
        <td>- Lembar</td>
      </tr>
      <tr>
        <td valign="top">Perihal</td>
        <td valign="top">:</td>
        <td><p>Undangan Pelatihan Pendidikan Bahasa</p>
          <p>Kompetensi <?php echo $kursus;?> </p></td>
      </tr>
    </table></td>
    <td width="386"><table width="386" border="0">
      <tr>
        <td colspan="3">Jakarta  </td>
        </tr>
      <tr>
        <td width="121">&nbsp;</td>
        <td width="13">&nbsp;</td>
        <td width="230">Kepada</td>
      </tr>
      <tr>
        <td>Yth.</td>
        <td>&nbsp;</td>
        <td>Kepala  <?php echo $kesatuan;?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>di <?php echo $kota_kabupaten;?></td>
      </tr>
      <tr>
        <td height="21">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="63" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="justify">Menindaklanjuti dari kegiatan ujian masuk yang telah dilakukan di kantor Pusbahasa Badiklat Kemhan pada tanggal $ujian_masuk, perihal pelatihan peningkatan kompetensi berbahasa. Bersama dengan ini kami mengutus saudara/i untuk mengikuti kegiatan Diklat bahasa dengan keterangan terdaftar sebagai berikut:</div></td>
  </tr>
  <tr>
    <td colspan="2"><table width="840" border="0">
      <tr>
        <td width="194">Nama</td>
        <td width="21">:</td>
        <td><?php echo $nama;?></td>
        <td width="251">&nbsp;</td>
      </tr>
      <tr>
        <td>Pangkat/Golongan</td>
        <td>: </td>
        <td><?php echo $pangkat;?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Korps</td>
        <td>: </td>
        <td><?php echo $korps;?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td>:</td>
        <td><?php echo $jabatan;?></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3">&nbsp;</td>
        </tr>
      <tr>
        <td>Kursus</td>
        <td>:</td>
        <td><?php echo $kd_kursus_dibuka;?> tingkat <?php echo $tingkat;?></td>
      </tr>
      <tr>
        <td>Buka</td>
        <td>:</td>
        <td><?php echo $buka;?></td>
      </tr>
      <tr>
        <td>Tutup</td>
        <td>:</td>
        <td><?php echo $tutup;?></td>
      </tr>
      <tr>
        <td>Lokasi </td>
        <td>:</td>
        <td><div align="justify">Pusat Pendidikan dan Pelatihan Bahasa Badan Pendidikan dan Pelatihan Kementerian Pertahanan. Pondok Labu, Jakarta Selatan.</div></td>
      </tr>
    </table>      <p>Dengan adanya informasi elekteronik ini maka Skep Diklat akan segera dikirim kepada setiap peserta yang terdaftar dalam kegiatan tersebut. Demikian atas bantuan dan kerjasamanya kami sampaikan terima kasih</p></td>
  </tr>
  <tr>
    <td colspan="2"><table width="838" height="49" border="0">
      <tr>
        <td width="408">&nbsp;</td><br>
        <td width="414"><p align="center">a.n Kepala </p>
          <p align="center">Badan Pendidikan dan Pelatihan</p>
          
          <p align="center"><img src='../ypathfile/<?php echo $gambar;?>' width='172' height='110' /></p>
          <p align="center"><?php echo $nama_kabadan;?></p>
          <p align="center"><?php echo $pangkat2 ;?></p></td>
      </tr>
    </table>      <p>&nbsp;</p></td>
  </tr>
</table>
</td>
    </tr>
  </table>
</body>
</html>
<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

function getAdmin($conn,$kode){
$field="username";
$sql="SELECT `$field` FROM `tb_admin` where `kode_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	
	function getKursus($conn,$kode){
$field="nama_kursus";
$sql="SELECT `$field` FROM `tb_kursus` where `kd_kursus`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
		function getPeriode($conn,$kode){
$field="nama_periode";
$sql="SELECT `$field` FROM `tb_periode` where `kd_periode`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
		function getKursusDibuka($conn,$kode){
$field="nama_subkursus"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kursus_dibuka` where `kd_kursus_dibuka`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	function getSifat($conn,$kode){
$field="sifat"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kursus_dibuka` where `kd_kursus_dibuka`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
		function getTingkat($conn,$kode){
$field="tingkat"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kursus_dibuka` where `kd_kursus_dibuka`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	function getTotal($conn,$kode){
$field="jampel"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kursus_dibuka` where `kd_kursus_dibuka`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
		function getBuka($conn,$kode){
$field="buka"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kursus_dibuka` where `kd_kursus_dibuka`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	function getUjianMasuk($conn,$kode){
$field="buka"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kursus_dibuka` where `kd_kursus_dibuka`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
		function getTutup($conn,$kode){
$field="tutup"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kursus_dibuka` where `kd_kursus_dibuka`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	function getPendaftaran($conn,$kode){
$field="nrp"; ////////////////////////
$sql="SELECT `$field` FROM `tb_pendaftaran` where `kd_pendaftaran`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
		function getNrp($conn,$kode){
$field="nama"; ////////////////////////
$sql="SELECT `$field` FROM `tb_peserta` where `nrp`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}function getGambar($conn,$kode){
$field="gambar"; ////////////////////////
$sql="SELECT `$field` FROM `tb_peserta` where `nrp`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
		
		function getPangkat($conn,$kode){
$field="pangkat"; ////////////////////////
$sql="SELECT `$field` FROM `tb_peserta` where `nrp`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
			function getJabatan($conn,$kode){
$field="jabatan"; ////////////////////////
$sql="SELECT `$field` FROM `tb_peserta` where `nrp`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
				function getKesatuan($conn,$kode){
$field="kesatuan"; ////////////////////////
$sql="SELECT `$field` FROM `tb_peserta` where `nrp`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
	
	function getNilai($conn,$kode){
$field="materi"; ////////////////////////
$sql="SELECT `$field` FROM `tb_nilai` where `kd_nilai`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
 function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>


