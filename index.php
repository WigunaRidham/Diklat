<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";
$gambar=$_SESSION["cgbr"];
$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");


$sql="select * from `$tbperiode` where `status`='Aktif'";
	$d=getField($conn,$sql);
				$ckd_periode=$d["kd_periode"];
				$nama_periode=$d["nama_periode"];
				
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Sistem Informasi Pendidikan Dan Pelatihan Pusdiklat Bahasa Badiklat Kemhan</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      
      <header class="header " align="left" valign="topS"><a href="index.php" class="logo" ><font color="#FFFFFF" >
      <h5><strong>Pusdiklat Bahasa Badiklat Kemhan</strong><strong><h5>Sistem Informasi Pendidikan Dan Pelatihan</strong></h5></h5>
            </font></a> <?php if(isset($_SESSION["cid"])){?>
            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                  
                   

<?php
$nrp=$_SESSION["cid"];

$sql="select * from `$tbpendaftaran` where nrp='$nrp' and status='Diterima' order by `kd_kursus_dibuka` desc";
  $jumskep=getJum($conn,$sql);
  $i=0;
  $arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode= getPeriode($conn,$d["kd_periode"]);
				$kk=$d["kd_kursus"];
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka= getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
			
				$tanggal_daftar=WKT($d["tanggal_daftar"]);
				$status=$d["status"];
				
				$sqld="select gambar from `$tbkursus` where `kd_kursus`='$kk'";
				$dd=getField($conn,$sqld);
				$gambars=$dd["gambar"];
				$arGB[$i]=$gambars;
				$arKD[$i]=$kd_kursus_dibuka;
				$arKK[$i]=$kd_kursus;
				$arTG[$i]=$tanggal_daftar;
				$arDAF[$i]=$kd_pendaftaran;
				

$i++;				
		}//for
  
$sql="select * from `tb_sertifikat` where status='Lulus' AND nrp='$nrp'";
  $jum=getJum($conn,$sql)+$jumskep;
		?>
				
				 <!-- inbox notificatoin start-->
                    <li id="mail_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-envelope-l"></i>
                            <span class="badge bg-important"><?php echo $jum;?></span>
                        </a>
                     
					 <ul class="dropdown-menu extended inbox">
						<div class="notify-arrow notify-arrow-blue"></div>
						
						<li><p class="blue">You have <?php echo $jum;?> new messages</p></li>
<?php
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kd_sertifikat=$d["kd_sertifikat"];
				$kd_periode= getPeriode($conn,$d["kd_periode"]);
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka= getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
			
				$tanggal_daftar=WKT($d["tanggal_pembuatan"]);
				$gambars=getDataKursus($conn,$d["kd_kursus"],'gambar')
?>					 
                            <li>
                                <a href="sertifikat/prints.php?kode=<?php echo $kd_sertifikat;?>">
                                    <span class="photo"><img alt="avatar" src="ypathfile/<?php echo $gambars;?>" width='10' height='10'></span>
                                    <span class="subject">
                                    <span class="from"><?php echo $kd_kursus;?></span>
                                    <span class="time"><?php echo $tanggal_daftar;?></span>
                                    </span>
                                    <span class="message">
                                       <?php echo $kd_kursus_dibuka;?>
                                    </span>
                                </a>
                            </li>
  <?php
		}
		if($i>0){
			for($j=0;$j<$i;$j++){
				$gambars=$arGB[$j];
				$kd_kursus_dibuka=$arKD[$j];
				$kd_kursus=$arKK[$j];
				$tanggal_daftar=$arTG[$j];
				$kd_pendaftaran=$arDAF[$j];
				?>
				
				  <li>
                                <a href="pendaftaran/printskep.php?kode=<?php echo $kd_pendaftaran;?>">
                                    <span class="photo"><img alt="avatar" src="ypathfile/<?php echo $gambars;?>" width='10' height='10'></span>
                                    <span class="subject">
                                   
									<span class="from">
									<?php echo $kd_kursus;?></span>
									
                                    <span class="time"><?php echo $tanggal_daftar;?></span>
                                    <br>
                                    
                                    <?php echo $kd_kursus_dibuka;?>
                                    </span>
                                    
                                    <span class="message">
                                   
                                   </span>
                                </a>
                            </li>
							
			
			
			
			<?php
			}//loop
		}
?>		
						   
						   
                        </ul>
                    </li>
                    <!-- inbox notificatoin end -->
                    <!-- alert notification start-->
					

<?php
$nrp=$_SESSION["cid"];
$sql="select * from `$tbpendaftaran` where nrp='$nrp' and status='Proses' order by `kd_kursus_dibuka` desc";
  $jum=getJum($conn,$sql);
		?>
		
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important"><?php echo $jum;?></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                           
                  <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have <?php echo $jum;?> new proses</p>
                            </li>	
                            
<?php
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode= getPeriode($conn,$d["kd_periode"]);
				$kk=$d["kd_kursus"];
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka= getKursusDibuka($conn,$d["kd_kursus_dibuka"]);

			$kdk=$d["kd_kursus_dibuka"];
			$sqlc="select * from `$tbkursus_dibuka` where `kd_kursus_dibuka`='$kdk'";
			$notifikasi = "select * from notifikasi";
			$dc=getField($conn,$sqlc);
				$test = $d["pegawai"];
				$tanggal_daftar=WKT($dc["ujian_masuk"]);
				$status=$d["status"];
				$test = "test";
				$sqld="select gambar from `$tbkursus` where `kd_kursus`='$kk'";
	$dd=getField($conn,$sqld);
				$gambars=$dd["gambar"];

				
				
?>					 

                            <li >
							<!-- Notifikasi Peserta -->
                                <a  href="#" onclick="notifikasi(' <?php echo $kd_kursus_dibuka; ?>  ' ,' <?php echo $tanggal_daftar;?>')  ">
                                    <span class="photo"><img alt="avatar" src="ypathfile/<?php echo $gambars;?>" width='20' height='20'></span>

                                    <span class="subject">
                                    <span class="from"><?php echo $kd_kursus;?></span>
                                    <span class="time"><?php echo $tanggal_daftar;?></span>
                                    </span>
                                    <span class="message" id="message"><br>
                                       <?php echo $kd_kursus_dibuka; ?>
                                    </span>
                                </a>
                            </li>
  <?php
		}
?>									
		 
							</ul>
                    </li>
                       <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="ypathfile/<?php echo$gambar;?>" width="40" height="40">
                            </span>
                            <span class="username"><?php echo $_SESSION["cnama"];?> </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                           
                            <li class="eborder-top">
                                <a href="index.php?mnu=upeserta"><i class="icon_profile"></i>Profil</a>
                            </li>
                            
                           
                           
                            <li>
                                <a href="index.php?mnu=logout"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                           
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
              </ul>
                <!-- notificatoin dropdown end-->
        </div><?php } else{}?>
  </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                <br>
                     <li><p align="center"><img src="img/PSBS.png" width="100" height="100">  </p>   </li>   
    
  <?php if($_SESSION["cstatus"]=="Kabid Rendiklat"){//menu ?>  

                        <li><a href="index.php?mnu=home"><i class="fa fa-home fa-fw"></i><strong> Home</strong></a></li>
                      	<li><a href="index.php?mnu=laporan"><i class="fa fa-users"></i> <strong>Laporan</strong></a></li>
                  	<li><a href="index.php?mnu=alumni"><i class="fa fa-search fa-fw"></i><strong>Alumni</strong></a></li>
                        

<?php }
  else if($_SESSION["cstatus"]=="Administrator"){//menu ?>  

                        <li><a href="index.php?mnu=home"><i class="fa fa-home fa-fw"></i><strong> Home</strong></a></li>
                      	<li><a href="index.php?mnu=admin"><i class="fa fa-user fa-fw"></i> <strong>Admin</strong></a></li>
                      	<li><a href="index.php?mnu=peserta"><i class="fa fa-users"></i> <strong>Peserta</strong></a></li>
                      	 <li class="sub-menu">
                      		<a href="javascript:;" class="">
                            <span><i class="fa fa-book"></i><strong>Kursus Bahasa</strong></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a href="index.php?mnu=periode">Periode</a></li>
                       <li><a href="index.php?mnu=kursus">Kursus</a></li>
                      	<li><a href="index.php?mnu=kursusdibuka">Kursus Dibuka</a></li>
                        </ul>
                  </li>
                  	<li><a href="index.php?mnu=jadwal"><i class="fa fa-calendar fa-fw"></i><strong>Jadwal</strong></a></li>
                        
                      <li><a href="index.php?mnu=pendaftaran"><i class="fa fa-sign-in fa-fw"></i> <strong>Pendaftaran</strong></a></li>
                      <!--<li><a href="index.php?mnu=surat"><i class="fa fa-file fa-fw"></i> <strong>Pendataan Surat</strong></a></li> ---->
                       <li><a href="index.php?mnu=nilai"><i class="fa fa-bar-chart-o fa-fw"></i> <strong>Nilai</strong></a></li>
                       <!---- <li><a href="index.php?mnu=kabadan"><i class="fa fa-star-o fa-fw"></i> <strong>Kabadan</strong></a></li>----->
                        <li><a href="index.php?mnu=sertifikat"><i class="fa fa-print fa-fw"></i> <strong>Sertifikat</strong></a></li>
                         
                         <li><a href="index.php?mnu=alumni"><i class="fa fa-search fa-fw"></i><strong>Alumni</strong></a></li>

              
<?php }
else if($_SESSION["cstatus"]=="Peserta"){//menu ?>               
 <li><a href="index.php?mnu=home"><i class="fa fa-home fa-fw"></i> <strong>Home</strong></a></li>
 <li><a href="index.php?mnu=pendaftaranPeserta"><i class="fa fa-cube fa-fw"></i> <strong>Pendaftaran</strong></a></li>
 <li><a href="index.php?mnu=pjadwal"><i class="fa fa-calendar fa-fw"></i> <strong>Jadwal</strong></a></li>
 <li><a href="index.php?mnu=pnilai"><i class="fa fa-bar-chart-o fa-fw"></i> <strong>Nilai</strong></a></li>

  <?php }else{?>
  <li><a href="index.php?mnu=home"><i class="fa fa-home fa-fw"></i> Home</a></li>
  <li><a href="index.php?mnu=login"><i class="fa fa-key fa-fw"></i> Login</a></li>
  <?php }?>
  </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->      
      <section id="main-content">
        <section class="wrapper">
		
            <div class="row">
              <!-- chart morris start -->
              <div class="col-lg-12">
                  <section class="panel">
                      <header class="panel-heading">
                          <h3><?php 
						  $mnus=$_GET["mnu"];
						  if($mnus=="pjadwal"){$mnus="Jadwal";}
						  else if($mnus=="pnilai"){$mnus="Nilai";}
						  
						  echo $mnus;
						  
						  ?></Char>
                      </header>
                      <div class="panel-body">
                 
                      
                                     <?php 
				
if($mnu=="admin"){require_once"admin/admin.php";}
else if($mnu=="kadmin"){require_once"admin/kadmin.php";}
else if($mnu=="upeserta"){require_once"peserta/upeserta.php";}
else if($mnu=="kprofil"){require_once"admin/kprofil.php";}
else if($mnu=="kprofil2"){require_once"admin/kprofil2.php";}

else if($mnu=="peserta"){require_once"peserta/peserta.php";}
else if($mnu=="kursus"){require_once"kursus/kursus.php";}
else if($mnu=="kursusdibuka"){require_once"kursusdibuka/kursusdibuka.php";}
else if($mnu=="jadwal"){require_once"jadwal/jadwal.php";}

else if($mnu=="pjadwal"){require_once"jadwal/pjadwal.php";}
else if($mnu=="pnilai"){require_once"nilai/pnilai.php";}


else if($mnu=="pendaftaran"){require_once"pendaftaran/pendaftaran.php";}
else if($mnu=="periode"){require_once"periode/periode.php";}
else if($mnu=="nilai"){require_once"nilai/nilai.php";}
//else if($mnu=="kabadan"){require_once"kabadan/kabadan.php";}
else if($mnu=="nilai_detail"){require_once"nilaidetail/nilaidetail.php";}
else if($mnu=="sertifikat"){require_once"sertifikat/sertifikat.php";}
//else if($mnu=="surat"){require_once"surat/surat.php";}

else if($mnu=="kpeserta"){require_once"peserta/kpeserta.php";}
else if($mnu=="kkursus"){require_once"kursus/kkursus.php";}
else if($mnu=="kkursusdibuka"){require_once"kursusdibuka/kkursusdibuka.php";}
else if($mnu=="kjadwal"){require_once"jadwal/kjadwal.php";}
else if($mnu=="kpendaftaran"){require_once"pendaftaran/kpendaftaran.php";}
else if($mnu=="kperiode"){require_once"periode/kperiode.php";}
else if($mnu=="knilai"){require_once"nilai/knilai.php";}
//else if($mnu=="kkabadan"){require_once"kabadan/kkabadan.php";}
else if($mnu=="knilai_detail"){require_once"nilaidetail/knilaidetail.php";}
else if($mnu=="ksertifikat"){require_once"sertifikat/ksertifikat.php";}
//else if($mnu=="ksurat"){require_once"surat/ksurat.php";}

// Pendaftaran Peserta
else if($mnu=="pendaftaranPeserta"){require_once"pendaftaran/ppendaftaran.php";}

else if($mnu=="alumni"){require_once"sertifikat/alumni.php";}
else if($mnu=="alumni"){require_once"sertifikat/alumni.php";}


else if($mnu=="laporan"){require_once"laporan.php";}
else if($mnu=="login"){require_once"login.php";}
else if($mnu=="signup"){require_once"signup.php";}
else if($mnu=="logout"){require_once"logout.php";}

else {
	if($_SESSION["cstatus"]=="Peserta"){require_once"home2.php";}
	else{
	require_once"home.php";
	}	
	}
			
 ?>
                      </div>
                    </section>
              </div>
              <!-- chart morris start -->
            </div>
      </section>
      <!--main content end-->
    </section>
    <!-- container section end -->
    <!-- javascripts -->
 <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
  <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
  <script src="js/calendar-custom.js"></script>
  <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
  <script src="js/jquery.customSelect.min.js" ></script>
  <script src="assets/chart-master/Chart.js"></script>
   
  <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
  <script src="js/sparkline-chart.js"></script>
  <script src="js/easy-pie-chart.js"></script>
  <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="js/xcharts.min.js"></script>
  <script src="js/jquery.autosize.min.js"></script>
  <script src="js/jquery.placeholder.min.js"></script>
  <script src="js/gdp-data.js"></script>	
  <script src="js/morris.min.js"></script>
  <script src="js/sparklines.js"></script>	
  <script src="js/charts.js"></script>
  <script src="js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>
</body>
</html>

<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
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
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Januari" || $arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari" ||$arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret" ||$arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April" ||$arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei" ||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni" ||$arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli" ||$arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus" || $arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September" || $arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober" || $arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November" || $arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember" ){$bul="11";}
	else if($arr[1]=="Desember" || $arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>


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
	//echo $sql;
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
	
	function getDataKursus($conn,$kode,$field){
//$field="nama_kursus";
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
/*function getKabadan($conn,$kode){
$field="nama_kabadan"; ////////////////////////
$sql="SELECT `$field` FROM `tb_kabadan` where `kd_kabadan`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}*/
?>


	  <?php
	if(isset($_POST["DAFTAR"])){
$nrp=$_SESSION["cid"];
		$kd_kursus_dibuka=$_POST["kd_kursus_dibuka"];

$sqlb="select * from `$tbpendaftaran` where `kd_kursus_dibuka`='$kd_kursus_dibuka' and nrp='$nrp'";
 $jumb= getJum($conn,$sqlb);	
if($jumb>0){
	echo "<script>alert('Maaf anda sudah mendaftar sebelumnya ');document.location.href='?mnu=pendaftaranPeserta';</script>";	
	}				
else{				
				
	$sql="select `kd_pendaftaran` from `$tbpendaftaran` order by `kd_pendaftaran` desc";
 $jum= getJum($conn,$sql);
   $th=date("y");
  $bl=date("m");
  $kd="R".$th.$bl;//T1108001
		if($jum > 0){
		$d=getField($conn,$sql);
    		$idmax=$d["kd_pendaftaran"];
			$urut=substr($idmax,5,5)+1;
				if($urut<10){$idmax="$kd"."0000".$urut;}
				else if($urut<100){$idmax="$kd"."000".$urut;}
				else if($urut<1000){$idmax="$kd"."00".$urut;}
				else if($urut<10000){$idmax="$kd"."0".$urut;}
				else{$idmax="$kd".$urut;}
			}
		else{$idmax="$kd"."00001";}
		$kd_pendaftaran=$idmax;

		$nrp=$_SESSION["cid"];
		$tanggal_daftar=date("Y-m-d");
		$status="Proses";
		
		$kd_kursus_dibuka=$_POST["kd_kursus_dibuka"];
		$kd_periode=$_POST["kd_periode"];
		$kd_kursus=$_POST["kd_kursus"];

		$sql2="select `tingkat` from `$tbkursus_dibuka` where kd_kursus_dibuka='$kd_kursus_dibuka'";
		$d2=getField($conn,$sql2);
		$tingkatnow=$d2["tingkat"];
		$hasil="salah";
		
		$sql="select * from `tb_sertifikat` where `nrp`='$nrp' and kd_kursus_dibuka='$kd_kursus_dibuka' order by kd_kursus_dibuka desc";
$sdh=getJum($conn,$sql);
// 
if($sdh>0){		
	$d=getField($conn,$sql);
	$kd_kursus_dibuka0=$d["kd_kursus_dibuka"];
	$tanggal_pembuatan=WKT($d["tanggal_pembuatan"]);
		 $sql2="select `tingkat` from `$tbkursus_dibuka` where kd_kursus_dibuka='$kd_kursus_dibuka0'";
		$d2=getField($conn,$sql2);
		$tingkatold=$d2["tingkat"];
		
		if($tingkatold=="Beginner" && $tingkatnow !="Beginner"){$hasil="benar";}
		else if($tingkatold=="Elementary"){
			if($tingkatnow=="Intermediate" or $tingkatnow=="Advanced" ){$hasil="benar";}
			else{$hasil="salah";}
		}
		
		else if($tingkatold=="Intermediate"){
			if($tingkatnow=="Advanced" ){$hasil="benar";}
			else{$hasil="salah";}
			}
			
		else if($tingkatold=="Advanced"){$hasil="salah";}
}
if($sdh<1){	
	$hasil="benar";
}

		/*	
		echo"<h1>OLD=$tingkatold ($kd_kursus_dibuka0)</h1>";
		echo"<h1>NEW=$tingkatnow ($kd_kursus_dibuka)#$hasil</h1>";
		*/
			
		if($hasil=="benar"){	
		
			
	$gambar0="avatar.jpg";
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	$no_sprint=$_POST["no_sprint"];
	
	
	$sql="select golongan from `tb_peserta` where `nrp`='$nrp'";
	$d=getField($conn,$sql);
				$golongan=$d["golongan"];
					$golgab="Pa-men-ti";
					if($golongan=="Pati" ||$golongan=="Pamen" ||$golongan=="Perwira"){$golgab="Pa-men-ti";}
					else if($golongan=="Bintara" ||$golongan=="Tamtama"){$golgab="Bin-tam";}
					else if($golongan=="Juru" ||$golongan=="Pengatur" ){$golgab="Ju-tur";}
					else if($golongan=="Penata" ||$golongan=="Pembina" ){$golgab="Pen-pe";}
					
		$tgls=date("Y-m-d");
		
		$sql=" INSERT INTO `$tbpendaftaran` (
`kd_pendaftaran` ,
`kd_periode` ,
`kd_kursus` ,
`kd_kursus_dibuka` ,
`nrp` ,`golongan` ,`no_sprint` ,`gambar` , `tanggal_surat` ,
`tanggal_daftar` ,
`status` 

) VALUES (
'$kd_pendaftaran', 
'$kd_periode', 
'$kd_kursus',
'$kd_kursus_dibuka',
'$nrp','$golgab','$no_sprint','$gambar','$tgls',
'$tanggal_daftar',
'$status'
 
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $kd_pendaftaran berhasil didaftarkan !');document.location.href='?mnu=home';</script>";}
		else{echo"<script>alert('Data $kd_pendaftaran gagal didaftarkan...');document.location.href='?mnu=home';</script>";}
	
	}//benar 
else{
	echo "<script>alert('Anda tidak dapat mendaftar pada tingkat $tingkatnow karena telah lulus pada tingkat $tingkatold Tanggal $tanggal_pembuatan silakan mendaftar pada tingkat yang lebih tinggi  ');document.location.href='?mnu=home';</script>";	}	
}
}//sudah daftar
	
			?>
<script>
function notifikasi(val,val2){
	alert("Anda dapat mengikuti ujian masuk pada kursus "+ val + "Pada Tanggal" + val2)
}
</script>