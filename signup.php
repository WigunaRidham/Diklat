<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once"konmysqli.php";

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aplikasi Pendaftaran Kursus">
    <meta name="author" content="Aplikasi Pendaftaran Kursus">
    <meta name="keyword" content="Aplikasi Pendaftaran Kursus">
    <link rel="shortcut icon" href="img/favicon.png">

   
    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
    </script>
</head>
   <form class="login-form" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
		
              <input type="text" id="user" name="user" class="form-control" placeholder="Username" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
			
                <input type="text" id="pass" name="pass" class="form-control" placeholder="Password" required>
            </div>
			    <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
			
                <input type="text" id="nrp" name="nrp" class="form-control" placeholder="NRP / NIP" required>
            </div>
			            <div class="input-group">
                <span class="input-group-addon"><i class="icon_profile"></i></span>
			
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" required>
            </div>
			
			           <!--- <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
			
                <input type="text" id="pangkat" name="pangkat" class="form-control" placeholder="Pangkat">
            </div>
			
			            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
			
                <input type="text" id="golongan" name="golongan" class="form-control" placeholder="Golongan">
            </div> ------->
			
			            
	
            <button name="Registrasi" type="submit" class="btn btn-primary btn-lg btn-block" id="Registrasi" onClick="MM_validateForm('user','','R','pass','','R','nrp','','R','nama','','R');return document.MM_returnValue">Registrasi</button>
          <a href="?mnu=login"><button class="btn btn-info btn-lg btn-block" type="button">Batal</button></a>
        </div>
      </form>
      
</html>
<?php
if(isset($_POST["Registrasi"])){
	$username=$_POST["user"];
	$password=$_POST["pass"];
		$nrp=$_POST["nrp"];
	$nama=$_POST["nama"];
		//$pangkat=$_POST["pangkat"];//
	//$golongan=$_POST["golongan"]; //
	
	$sql=" INSERT INTO `$tb_peserta` (
`nrp` ,
`nama` ,
`pangkat` ,
`golongan` ,
`password` ,
`username` ,
`gambar` ,
`status` 
) VALUES (
'$nrp', 
'$nama', 
'$pangkat',
'$golongan',
'$password',
'$username',
'avatar.jpg',
'Aktif'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $nrp berhasil Registrasi !');document.location.href='?mnu=login';</script>";}
		else{echo"<script>alert('Data $nrp gagal Registrasi...');document.location.href='?mnu=login';</script>";}
}


?>