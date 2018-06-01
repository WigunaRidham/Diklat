
<?php
require_once"../konmysqli.php";
		if(isset($_GET["kode"])){
		$kd_sertifikat=$_GET["kode"];
	}
		$sql="select * from `$tb_sertifikat` where `kd_sertifikat`='$kd_sertifikat'";
	$d=getField($conn,$sql);
				$kd_sertifikat=$d["kd_sertifikat"];
				$kd_sertifikat0=$d["kd_sertifikat"];
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$periode=getPeriode($conn,$d["kd_periode"]);
				$kursus=getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka=$d["kd_kursus_dibuka"];
				$sifat=getSifat($conn,$d["kd_kursus_dibuka"]);
				$tingkat=getTingkat($conn,$d["kd_kursus_dibuka"]);
				$total=getTotal($conn,$d["kd_kursus_dibuka"]);
				$buka=getBuka($conn,$d["kd_kursus_dibuka"]);
				$tutup=getTutup($conn,$d["kd_kursus_dibuka"]);
				$nrp=$d["nrp"];
				$nama=getNRP($conn,$d["nrp"]);
				$gbr=getGambar($conn,$d["nrp"]);
				$golongan=getGolongan($conn,$d["nrp"]);
				$pangkat1=getPangkat($conn,$d["nrp"]);
				$jabatan=getJabatan($conn,$d["nrp"]);
				$kesatuan=getKesatuan($conn,$d["nrp"]);
				$status=$d["status"];
				
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$tanggal_pembuatan=WKT($d["tanggal_pembuatan"]);
				$nama_kabadan=getKabadan($conn,$d["kd_kabadan"],"nama_kabadan");
				$pangkat=getKabadan($conn,$d["kd_kabadan"],"pangkat");
				$gbr2=getKabadan($conn,$d["kd_kabadan"],"gambar");
				$pro="ubah";		

?>
<body onLoad="window.print()">
<form id="form1" name="form1" method="post" action="">
  
  <table width="847" height="1354" border="0" style="background:url(../img/aaaaaa.png);background-size:contain; background-position:center; background-repeat:no-repeat;">
    <tr>
      <td align="center" valign="middle"><table width="701"  border="0">
    <tr>
      <td height="199" colspan="3" align="center" bgcolor="#EED15F"><p><img src="../img/logo.png" width="105" height="101" /></p>
      <p>KEMENTERIAN PERTAHANAN RI<br />BADAN PENDIDIKAN DAN PELATIHAN</p></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#EED15F">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center" bgcolor="#EED15F"><h1>SERTIFIKAT</h1></td>
    </tr>
    <tr>
      <td colspan="3" align="center" bgcolor="#EED15F"><pre>Nomor : <?php echo $kd_sertifikat;?></pre></td>
    </tr>
    <tr>
      <td height="21" colspan="3" bgcolor="#EED15F">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#EED15F"><table width="693" border="0">
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td> <?php echo $nama;?></td>
        </tr>
        <tr>
          <td width="180">Pangkat/Golongan</td>
          <td width="8">:</td>
          <td width="481"><?php echo $pangkat1;?></td>
        </tr>
        <tr>
          <td>NRP/NIP</td>
          <td>:</td>
          <td><?php echo $nrp;?></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td>:</td>
          <td><?php echo $jabatan;?></td>
        </tr>
        <tr>
          <td>Kesatuan</td>
          <td>:</td>
          <td><?php echo $kesatuan;?></td>
        </tr>
  
      </table></td>
    </tr>
   
    <tr>
      <td colspan="3" bgcolor="#EED15F">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="center" bgcolor="#EED15F">dinyatakan :</td>
    </tr>
    <tr>
      <td colspan="3" align="center" bgcolor="#EED15F"><h2>LULUS</h2></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#EED15F">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#EED15F">pada kursus <?php echo "$sifat $kursus tingkat $tingkat periode $periode";?> yang diselenggarakan di Pusdiklat Bahasa Badiklat Kemhan sebanyak <?php echo $total;?> jam pelajaran mulai tanggal <?php echo WKT($buka);?> s.d. <?php echo WKT($tutup);?></td>
    </tr>
    <tr>
      <td colspan="3" bgcolor="#EED15F">&nbsp;</td>
    </tr>
    <tr>
      <td width="215" bgcolor="#EED15F">&nbsp;</td>
      <td width="158" align="center" bgcolor="#EED15F"><p><img src='../img/<?php echo $gbr;?>' width='80' height='80' alt="<?php echo $gbr;?>"/></a></p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
      <td width="308" align="center" valign="top" bgcolor="#EED15F"><p>Jakarta, <?php echo $tanggal_pembuatan;?><br />
        Kepala <br />
      Badan Pendidikan dan Pelatihan</p>
      <p><img src='../img/<?php echo $gbr2;?>' width='80' height='80' /></p>
      <p><?php echo $nama_kabadan;?><br />
	<?php echo $pangkat;?></p></td>
    </tr>
  </table></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
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
	

	function getGolongan($conn,$kode){
$field="golongan"; ////////////////////////
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
	function getKabadan($conn,$kode,$field){
$sql="SELECT `$field` FROM `tb_kabadan` where `kd_kabadan`='$kode'";
$rs=$conn->query($sql);	
	//$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	//$rs->free();
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


