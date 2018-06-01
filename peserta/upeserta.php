<?php
$pro="simpan";
$tanggal_lahir=WKT(date("Y-m-d"));

$gambar0="avatar.jpg";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_lahir").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('peserta/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, tempat_lahir=0'); } 
</script>
<script language="JavaScript">
function kota_kabupaten(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>


<?php

	$nrp=$_SESSION["cid"];
	$sql="select * from `$tb_peserta` where `nrp`='$nrp'";
	$d=getField($conn,$sql);
				$nrp=$d["nrp"];
				$nrp0=$d["nrp"];
				
				$nama=$d["nama"];
				$pangkat=$d["pangkat"];
				$korps=$d["korps"];
				$golongan=$d["golongan"];
				$tempat_lahir=$d["tempat_lahir"];
				
				$tanggal_lahir=WKT($d["tanggal_lahir"]);
				$agama=$d["agama"];
				$jabatan=$d["jabatan"];
				$kesatuan=$d["kesatuan"];
				$alamat_kantor=$d["alamat_kantor"];
				$telepon_kantor=$d["telepon_kantor"];
				$kota_kabupaten=$d["kota_kabupaten"];
				$provinsi=$d["provinsi"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$nama_pasangan=$d["nama_pasangan"];
				$alamat_rumah=$d["alamat_rumah"];
				
				$telepon=$d["telepon"];
				$pendidikan_umum=$d["pendidikan_umum"];
				$fakultas=$d["fakultas"];
				$jurusan=$d["jurusan"];
				$nama_sekolah=$d["nama_sekolah"];
				$pendidikan_militer=$d["pendidikan_militer"];
				$password=$d["password"];
				$username=$d["username"];
					$gambar=$d["gambar"];
				$gambar0=$d["gambar"];$status=$d["status"];
				
?>

<div class="panel-body">
<div class="panel-group" id="accordion">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Profil</a>
</h4>
</div>
<div id="collapseOne" class="panel-collapse collapse in">
<div class="panel-body">



<form action="" method="post" enctype="multipart/form-data">
<table width="1078" border="0">
  <tr>
    <td width="523"><table width="507">
      <tr>
        <td width="172" height="34">NRP / NIP</td>
        <td width="18">:</td>
        <td width="301" colspan="2"><input class="form-control name="nrp" type="text" id="nrp" value="<?php echo $nrp;?>" size="20" /></td>
      </tr>
      <tr>
        <td height="31"><label for="nama">Nama</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control" name="nama" type="text" id="nama" value="<?php echo $nama;?>" size="35" /></td>
        
      </tr>
       <tr>
        <td height="32"><label for="tempat_lahir">Tempat Lahir</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control" name="tempat_lahir" type="text" id="tempat_lahir" value="<?php echo $tempat_lahir;?>" size="20" />
          
      </tr>
      <tr>
        <td height="42"><label for="tempat_lahir2">Tanggal Lahir</label></td>
        <td>:</td><td colspan="2"><input name="tanggal_lahir" class="form-control"  type="text" id="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" size="15" /></td>
      </tr>
      
      
      <tr>
        <td height="32"><label for="agama2">Agama</label></td>
        <td>:</td>
        <td colspan="2"><label for="agama2"></label>
          <select name="agama" id="agama2">
            <option value="Islam" <?php if($agama=="Islam"){echo"selected";} ?> >Islam</option>
            <option value="Kristen"  <?php if($agama=="Kristen"){echo"selected";} ?>>Kristen</option>
            <option value="Katolik"  <?php if($agama=="Katolik"){echo"selected";} ?>>Katolik</option>
            <option value="Hindu"  <?php if($agama=="Hindu"){echo"selected";} ?>>Hindu</option>
            <option value="Budha"  <?php if($agama=="Budha"){echo"selected";} ?>>Budha</option>
          </select></td>
      </tr>
      
      <tr>
        <td height="32"><label for="jenis_kelamin2">Jenis Kelamin</label></td>
        <td>:</td>
        <td colspan="2"><input type="radio" name="jenis_kelamin" id="jenis_kelamin2"  checked="checked" value="Laki-Laki" <?php if($jenis_kelamin=="Laki-Laki"){echo"checked";}?>/>
          Laki-Laki
          <input type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan" <?php if($jenis_kelamin=="Perempuan"){echo"checked";}?>/>
          Perempuan </td>
      </tr>
      
       <tr>
        <td height="30"><label for="pangkat2">Pangkat</label></td><td>:</td>
        <td colspan="2"><label for="pangkat2"></label>
          <select  class="form-control" name="pangkat" id="pangkat2">
           <option value="Kopral Dua"  <?php if($pangkat=="Kopral Dua"){echo"selected";} ?>>Kopral Dua</option>
          <option value="Kopral Satu"  <?php if($pangkat=="Kopral Satu"){echo"selected";} ?>>Kopral Satu</option>
          <option value="Kopral Kepala"  <?php if($pangkat=="Kopral Kepala"){echo"selected";} ?>>Kopral Kepala</option>
          
            <option value="Sersan Dua"  <?php if($pangkat=="Sersan Dua"){echo"selected";} ?>>Sersan Dua</option>
            <option value="Sersan Satu"  <?php if($pangkat=="Sersan Satu"){echo"selected";} ?>>Sersan Satu</option>
            <option value="Sersan Kepala"  <?php if($pangkat=="Sersan Kepala"){echo"selected";} ?>>Sersan Kepala</option>
            <option value="Sersan Mayor"  <?php if($pangkat=="Sersan Mayor"){echo"selected";} ?>>Sersan Mayor</option>
   <option value="Pembantu Letnan Dua"  <?php if($pangkat=="Pembantu Letnan Dua"){echo"selected";} ?>>Pembantu Letnan Dua</option>
   <option value="Pembantu Letnan Satu"  <?php if($pangkat=="Pembantu Letnan Satu"){echo"selected";} ?>>Pembantu Letnan Satu</option>
            <option value="Letnan Dua"  <?php if($pangkat=="Letnan Dua"){echo"selected";} ?>>Letnan Dua</option>
            <option value="Letnan Satu"  <?php if($pangkat=="Letnan Satu"){echo"selected";} ?>>Letnan Satu</option>
            <option value="Kapten"  <?php if($pangkat=="Kapten"){echo"selected";} ?>>Kapten</option>
            <option value="Mayor"  <?php if($pangkat=="Mayor"){echo"selected";} ?>>Mayor</option>
            <option value="Letnan Kolonel"  <?php if($pangkat=="Letnan Kolonel"){echo"selected";} ?>>Letnan Kolonel</option>
            <option value="Kolonel"  <?php if($pangkat=="Kolonel"){echo"selected";} ?>>Kolonel</option>
<option value="Brigadir Jenderal"  <?php if($pangkat=="Brigadir Jenderal"){echo"selected";} ?>>Brigadir Jenderal</option>
<option value="Mayor Jenderal"  <?php if($pangkat=="Mayor Jenderal"){echo"selected";} ?>>Mayor Jenderal</option>
<option value="Letnan Jenderal"  <?php if($pangkat=="Letnan Jenderal"){echo"selected";} ?>>Letnan Jenderal</option>
<option value="Jenderal"  <?php if($pangkat=="Jenderal"){echo"selected";} ?>>Jenderal</option>

			
            <option value="I - a"  <?php if($pangkat=="I - a"){echo"selected";} ?>>I - a</option>
            <option value="I - b"  <?php if($pangkat=="I - b"){echo"selected";} ?>>I - b</option>
            <option value="I - c"  <?php if($pangkat=="I - c"){echo"selected";} ?>>I - c</option>
            <option value="I - d"  <?php if($pangkat=="I - d"){echo"selected";} ?>>I - d</option>
            <option value="II - a"  <?php if($pangkat=="II - a"){echo"selected";} ?>>II - a</option>
            <option value="II - b"  <?php if($pangkat=="II - b"){echo"selected";} ?>>II - b</option>
            <option value="II - c"  <?php if($pangkat=="II - c"){echo"selected";} ?>>II - c</option>
            <option value="II - d"  <?php if($pangkat=="II - d"){echo"selected";} ?>>II - d</option>
            <option value="III - a"  <?php if($pangkat=="III - a"){echo"selected";} ?>>III - a</option>
            <option value="III - b"  <?php if($pangkat=="III - b"){echo"selected";} ?>>III - b</option>
            <option value="III - c"  <?php if($pangkat=="III - c"){echo"selected";} ?>>III - c</option>
            <option value="III - d"  <?php if($pangkat=="III - d"){echo"selected";} ?>>III - d</option>
            <option value="IV - a"  <?php if($pangkat=="IV - a"){echo"selected";} ?>>IV - a</option>
            <option value="IV - b"  <?php if($pangkat=="IV - b"){echo"selected";} ?>>IV - b</option>
            <option value="IV - c"  <?php if($pangkat=="IV - c"){echo"selected";} ?>>IV - c</option>
            <option value="IV - d"  <?php if($pangkat=="IV - d"){echo"selected";} ?>>IV - d</option>
            </select></td>
      </tr>
      
      <tr>
        <td height="31"><label for="korps2">Korps</label></td>
        <td>:</td>
        <td><input class="form-control"  name="korps" type="text" id="korps2" value="<?php echo $korps;?>" size="35" />
          <label for="kode_barang2"></label></td>
      </tr>
       <tr><tr>
        <td height="30"><label for="golongan2">Penggolongan</label></td><td>:</td>
        <td colspan="2"><label for="golongan2"></label>
          <select  class="form-control" name="golongan" id="golongan2">
            <option value="Tamtama"  <?php if($golongan=="Tamtama"){echo"selected";} ?>>Tamtama</option>
            <option value="Bintara"  <?php if($golongan=="Bintara"){echo"selected";} ?>>Bintara</option>
            <option value="Perwira"  <?php if($golongan=="Perwira"){echo"selected";} ?>>Perwira</option>
            <option value="Pamen"  <?php if($golongan=="Pamen"){echo"selected";} ?>>Pamen</option>
            <option value="Pati"  <?php if($golongan=="Pati"){echo"selected";} ?>>Pati</option>
            <option value="Juru"  <?php if($golongan=="Juru"){echo"selected";} ?>>Juru</option>
            <option value="Pengatur"  <?php if($golongan=="Pengatur"){echo"selected";} ?>>Pengatur</option>
            <option value="Penata"  <?php if($golongan=="Penata"){echo"selected";} ?>>Penata</option>
            <option value="Pembina"  <?php if($golongan=="Pembina"){echo"selected";} ?>>Pembina</option>
                      </select></td>
      </tr>
          </select></td>
      </tr>
     
      <tr>
        <td height="36"><label for="jabatan2">Jabatan</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="jabatan" type="text" id="jabatan2" value="<?php echo $jabatan;?>" size="35" /></td>
      </tr>
      <tr>
        <td height="36"><label for="kesatuan2">Kesatuan</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="kesatuan" type="text" id="kesatuan2" value="<?php echo $kesatuan;?>" size="35" /></td>
      </tr>
      <tr>
        <td height="60" valign="top"><label for="alamat_kantor2">Alamat Kantor</label></td>
        <td valign="top">:</td>
        <td colspan="2"><textarea class="form-control"  name="alamat_kantor" cols="35" rows="3" id="alamat_kantor2"><?php echo $alamat_kantor;?></textarea></td>
      </tr>
       <tr>
        
        <td height="31"><label for="telepon_kantor2">Telepon Kantor</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="telepon_kantor" type="text" id="telepon_kantor2" value="<?php echo $telepon_kantor;?>" size="15" /></td>
      </tr>
     
     <td height="28"><label for="pendidikan_umum2">Pendidikan Umum</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="pendidikan_umum" type="text" id="pendidikan_umum2" value="<?php echo $pendidikan_umum;?>" size="15" /></td>
      </tr>
      <tr>
        <td height="31"><label for="fakultas2">Fakultas</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="fakultas" type="text" id="fakultas2" value="<?php echo $fakultas;?>" size="35" /></td>
      </tr>
      <tr>
        <td height="32"><label for="jurusan2">Jurusan</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="jurusan" type="text" id="jurusan2" value="<?php echo $jurusan;?>" size="35" /></td>
      </tr>
      <tr>
        <td height="33"><label for="nama_sekolah2">Nama Sekolah</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="nama_sekolah" type="text" id="nama_sekolah2" value="<?php echo $nama_sekolah;?>" size="35" /></td>
      </tr>
      <tr>
        <td><label for="pendidikan_militer2">Pendidikan Militer</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="pendidikan_militer" type="text" id="pendidikan_militer2" value="<?php echo $pendidikan_militer;?>" size="35" /></td>
      </tr>
    
      <tr>      
    </table  width="50%"></td>
    <td width="545" align="left" valign="top"><table width="470" align="left">
      <tr>
        <td width="171" height="36"><label for="nama_pasangan2">Nama Pasangan</label></td>
        <td width="10">:</td>
        <td colspan="2"><input class="form-control"  name="nama_pasangan" type="text" id="nama_pasangan2" value="<?php echo $nama_pasangan;?>" size="35" /></td>
      </tr>
      <tr>
        <td height="63" valign="top"><label for="alamat_rumah2">Alamat Rumah</label></td>
        <td valign="top">:</td>
        <td colspan="2"><textarea class="form-control"  name="alamat_rumah" cols="35" rows="3" id="alamat_rumah2"><?php echo $alamat_rumah;?></textarea></td>
      </tr>
       <tr>
        <td height="32"><label for="kota_kabupaten2">Kota Kabupaten</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="kota_kabupaten" type="text" id="kota_kabupaten2" value="<?php echo $kota_kabupaten;?>" size="35" /></td>
      </tr>
      <tr>
        <td height="31"><label for="provinsi2">Provinsi</label></td>
        <td>:</td>
        <td colspan="2"><input class="form-control"  name="provinsi" type="text" id="provinsi2" value="<?php echo $provinsi;?>" size="35" /></td>
      </tr>
      <tr>
        <td height="32"><label for="telepon2">Telepon</label></td>
        <td>:</td>
        <td width="164" ><input class="form-control"  name="telepon" type="text" id="telepon2" value="<?php echo $telepon;?>" size="20" /></td>
        <td width="154" rowspan="4">
<center>
<?php 
echo"<a href='#' onclick='buka(\"admin/zoom.php?id=$kode_admin\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</td>
      </tr>
      
     
     
      <tr>
        <td height="31"><label for="username2">Username</label></td>
        <td>:</td>
        <td ><input class="form-control"  name="username" type="text" id="username2" value="<?php echo $username;?>" size="20" /></td>
      </tr>
       <tr>
        <td height="32"><label for="password2">Password</label></td>
        <td>:</td>
        <td ><input  class="form-control"  name="password" type="password" id="password2" value="<?php echo $password;?>" size="20" /></td>
      </tr>

<tr>
  <td height="38">Gambar
    <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("peserta/zoom.php?id=<?php echo $kd_peserta;?>")'><?php echo $gambar0;?></a></td>
</tr>

      <tr>
        <td height="36"><label for="status2">Status</label></td>
        <td>:</td>
        <td colspan="2"><input type="radio" name="status" id="status2"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>
          Aktif
          <input type="radio" name="status" id="status2" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>
          Tidak Aktif </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
          <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
           <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
       <input name="nrp0" type="hidden" id="nrp0" value="<?php echo $nrp0;?>" />
          <a href="?mnu=upeserta">
            <input name="Batal" type="button" id="Batal" value="Batal" />
          </a></td>
      </tr>
    </table></td>
  </tr>
</table>

</td></tr>
<table></table>
</form>

</div>
</div>
</div>
</div>
</div>
</div>

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$nrp=strip_tags($_POST["nrp"]);
	$nama=strip_tags($_POST["nama"]);
	$pangkat=strip_tags($_POST["pangkat"]);
	$korps=strip_tags($_POST["korps"]);
	$golongan=strip_tags($_POST["golongan"]);
	$tempat_lahir=strip_tags($_POST["tempat_lahir"]);

	$tanggal_lahir=BAL(strip_tags($_POST["tanggal_lahir"]));
	$agama=strip_tags($_POST["agama"]);
	$jabatan=strip_tags($_POST["jabatan"]);
	$kesatuan=strip_tags($_POST["kesatuan"]);
	$alamat_kantor=strip_tags($_POST["alamat_kantor"]);
	$telepon_kantor=strip_tags($_POST["telepon_kantor"]);
	$kota_kabupaten=strip_tags($_POST["kota_kabupaten"]);
	$provinsi=strip_tags($_POST["provinsi"]);
	$jenis_kelamin=strip_tags($_POST["jenis_kelamin"]);
	$nama_pasangan=strip_tags($_POST["nama_pasangan"]);
	$alamat_rumah=strip_tags($_POST["alamat_rumah"]);
	
	$telepon=strip_tags($_POST["telepon"]);
	$pendidikan_umum=strip_tags($_POST["pendidikan_umum"]);
	$fakultas=strip_tags($_POST["fakultas"]);
	$jurusan=strip_tags($_POST["jurusan"]);
	$nama_sekolah=strip_tags($_POST["nama_sekolah"]);
	$pendidikan_militer=strip_tags($_POST["pendidikan_militer"]);
	$password=strip_tags($_POST["password"]);
	$username=strip_tags($_POST["username"]);
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
		$status=strip_tags($_POST["status"]);
	echo $kesatuan;

$sql="update `$tb_peserta` set 
`nama`='$nama',
`pangkat`='$pangkat' ,
`korps`='$korps',
`tempat_lahir`='$tempat_lahir',
`golongan`='$golongan',

`tanggal_lahir`='$tanggal_lahir',
`agama`='$agama',
`jabatan`='$jabatan',
`kesatuan`='$kesatuan',
`alamat_kantor`='$alamat_kantor',
`telepon_kantor`='$telepon_kantor',
`kota_kabupaten`='$kota_kabupaten',
`provinsi`='$provinsi',
`jenis_kelamin`='$jenis_kelamin',
`nama_pasangan`='$nama_pasangan',
`alamat_rumah`='$alamat_rumah',
`telepon`='$telepon',
`pendidikan_umum`='$pendidikan_umum',
`fakultas`='$fakultas',
`jurusan`='$jurusan',
`nama_sekolah`='$nama_sekolah',
`pendidikan_militer`='$pendidikan_militer',
`password`='$password',
`username`='$username',
`gambar`='$gambar',
`status`='$status'

where `nrp`='$nrp0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $nrp berhasil diubah !');document.location.href='?mnu=upeserta';</script>";}
	else{echo"<script>alert('Data $nrp gagal diubah...');document.location.href='?mnu=upeserta';</script>";}
	}//else simpan

?>
