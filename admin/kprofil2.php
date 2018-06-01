<?php

$tanggal=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";
$status="Aktif";
//$PATH="ypathcss";
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
  
  <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
  
<script type="text/javascript"> 
function PRINT(){ 
win=window.open('admin/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<?php
	$kode_admin=$_SESSION["cid"];
	$sql="select * from `$tbadmin` where `kode_admin`='$kode_admin'";
	$d=getField($conn,$sql);
				$kode_admin=$d["kode_admin"];
				$username=$d["username"];
				$password=$d["password"];
				$telepon=$d["telepon"];
				$email=$d["email"];
				$status=$d["status"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$pro="ubah";		

?>

<div id="accordion">
  <h3>Update Data Profil</h3>
  <div>


<form action="" method="post" enctype="multipart/form-data">
<table width="58%" >
<tr>
<th width="116"><label for="kode_admin">Kode Admin</label>
<th width="28">:
<th colspan="2"><b><?php echo $kode_admin;?></b></tr>
<tr>
<td height="53"><label for="username">Username</label>
<td>:<td width="403"><input class="form-control" name="username" type="text" id="username" value="<?php echo $username;?>" size="30" />
</td>
<td width="144" rowspan="4">
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
<td height="46"><label for="password">Password</label>
<td>:<td><input class="form-control"  name="password" type="password" id="password" value="<?php echo $password;?>" size="30" /></td>
</tr>


<tr>
<td height="51"><label for="telepon">Telepon</label>
<td>:<td><input class="form-control"  name="telepon" type="text" id="telepon" value="<?php echo $telepon;?>" size="25" />
</td>
</tr>

<tr>
<td height="48"><label for="email">Email</label>
<td>:<td><input class="form-control" name="email" type="text" id="email" value="<?php echo $email;?>" size="30" />
</td>
</tr>

<tr>
<td height="33"><label for="status">Status</label>
<td>:<td colspan="2"><?php echo $status;?>
</td></tr>

<tr>
  <td height="44"><label>Gambar</label>
    <td>:<td ><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $kode_admin;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td height="43">
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Update Profil" />
        <a href="?mnu=kprofil"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>


  </div>
</div>

  
<!-- ----------------------->               
<?php
if(isset($_POST["Simpan"])){
	$kode_admin=strip_tags($_SESSION["cid"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$telepon=strip_tags($_POST["telepon"]);
	$email=strip_tags($_POST["email"]);
	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
	$sql="update `$tbadmin` set `username`='$username',`password`='$password',`telepon`='$telepon' ,`email`='$email',
	`gambar`='$gambar'  where `kode_admin`='$kode_admin'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $kode_admin berhasil diubah !');document.location.href='?mnu=kprofil';</script>";}
		else{echo"<script>alert('Data $kode_admin gagal diubah...');document.location.href='?mnu=kprofil';</script>";}
	
}
?>