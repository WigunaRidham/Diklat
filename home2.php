	<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>



 <div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box blue-bg">
						<i class="fa fa-book"></i>
						<div class="count">
						<?php
						$sql="select kd_kursus from tb_kursus";
						$jum=getJum($conn,$sql);
						echo $jum;
						?></div>
						<div class="title">Kursus</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box brown-bg">
						<i class="fa fa-cubes"></i>
						<div class="count"><?php
						$sql="select kd_kursus_dibuka from tb_kursus_dibuka";
						$jum=getJum($conn,$sql);
						echo $jum;
						?></div>
						<div class="title">Kursus Dibuka</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->	
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box dark-bg">
						<i class="fa fa-thumbs-o-up"></i>
						<div class="count">
						<?php
						$sql="select nrp from tb_peserta";
						$jum=getJum($conn,$sql);
						echo $jum;
						?>
						</div>
						<div class="title">Peserta</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
				<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-cubes"></i>
						<div class="count">
						<?php
						$sql="select kd_sertifikat from tb_sertifikat";
						$jum=getJum($conn,$sql);
						echo $jum;
						?>
						</div>
						<div class="title">Alumni</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
				
</div><!--/.row-->


 <div class="row">
		    <div class="col-lg-9 col-md-12">
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-map-marker red"></i><strong>Countries</strong></h2>
							<div class="panel-actions">
								<a href="index.php#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
								<a href="index.php#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="index.php#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>	
						</div>
						<div class="panel-body-map">
							
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d495.702476284209!2d106.7896748427384!3d-6.313571891556587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ee3c5cf52ff7%3A0xb69a516b7b88f79e!2sPusdiklat+Bahasa+Kemhan!5e0!3m2!1sen!2sid!4v1524581912740" width="830" height="365" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
	
					</div>
				</div>
				
<?php
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
$d  = getField($conn,"SELECT COUNT(hits) as hits FROM `statistik`"); 
$totalpengunjung=$d["hits"];

$d  = getField($conn,"SELECT SUM(hits) as hits FROM `statistik` WHERE tanggal='$tanggal' GROUP BY tanggal");
$hits  =$d["hits"];
$d        = getField($conn,"SELECT SUM(hits) as hits FROM `statistik`");
$totalhits=$d["hits"];
$d       = getField($conn,"SELECT SUM(hits) as hits FROM `statistik`"); 
$tothitsgbr=$d["hits"];
$bataswaktu       = time() - 300;
$pengunjungonline = getJum($conn,"SELECT * FROM `statistik` WHERE online > '$bataswaktu'");

?>
				
				
              <div class="col-md-3">
              <!-- List starts -->
				<ul class="today-datas">
                <!-- List #1 -->
				<li>
                  <!-- Graph -->
                  <div><span id="todayspark1" class="spark"></span></div>
                  <!-- Text -->
                  <div class="datas-text"><?php echo $pengunjung;?> Hari Ini</div>
                </li>
                <li>
                  <div><span id="todayspark2" class="spark"></span></div>
                  <div class="datas-text"><?php echo $totalpengunjung;?> Total Pengunjung</div>
                </li>
                <li>
                  <div><span id="todayspark3" class="spark"></span></div>
                  <div class="datas-text"><?php echo $hits;?> Hits</div>
                </li>
                <li>
                  <div><span id="todayspark4" class="spark"></span></div>
                  <div class="datas-text"><?php echo $totalhits;?> Total Hits</div>
                </li> 
                <li>
                  <div><span id="todayspark5" class="spark"></span></div>
                  <div class="datas-text"><?php echo $pengunjungonline;?> Pengunjung Online</div>
                </li>                                                                                                              
              </ul>
              </div>
              
			 
</div>
		   

			  
			  
<!---------------------------------- -->

<div class="row">
            <div class="col-md-4 portlets">
              <!-- Widget -->
              <div class="panel panel-default">
				<div class="panel-heading">
                  <div class="pull-left">Obedients</div>
                  <div class="widget-icons pull-right">
                   <!----- <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a> ------------------>
                  </div>  
                  <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                  <!-- Widget content -->
                  <div class="padd sscroll">
                    
                    <ul class="chats">

                      <!-- Chat by us. Use the class "by-me". -->
                      <li class="by-me">
                        <!-- Use the class "pull-left" in avatar -->
                        <div class="avatar pull-left">
                          <img src="img/johnmaxwell.png" width="80"alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In meta area, first include "name" and then "time" -->
                          <div class="chat-meta">John Maxwell <span class="pull-right"></span></div>
                          Suatu sikap mental positif berakar dalam kepercayaan diri yang jelas, kalem, dan jujur.
                          <div class="clearfix"></div>
                        </div>
                      </li> 

                      <!-- Chat by other. Use the class "by-other". -->
                      <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                          <img src="img/marktwain.jpg" width="50" alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In the chat meta, first include "time" then "name" -->
                          <div class="chat-meta"><span class="pull-right">Mark Twain</span></div>
                         Tidak ada pemandangan yang menyedihkan daripada seorang pemuda yang pesimistis.
                          <div class="clearfix"></div>
                        </div>
                      </li>   

                      <li class="by-me">
                        <div class="avatar pull-left">
                          <img src="img/tanmalaka.jpg" width="50" alt=""/>
                        </div>

                        <div class="chat-content">
                          <div class="chat-meta"><span class="pull-right">Tan Malaka</span></div>
                        Tujuan pendidikan itu untuk mempertajam kecerdasan, memperkukuh kemauan serta memperhalus perasaan
                          <div class="clearfix"></div>
                        </div>
                      </li>  

                      <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                          <img src="img/soekarno.jpg" width="80" alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In the chat meta, first include "time" then "name" -->
                          <div class="chat-meta"><span class="pull-right">Soekarno</span></div>
                          Gantungkan cita-cita mu setinggi langit! Bermimpilah setinggi langit. Jika engkau jatuh, engkau akan jatuh di antara bintang-bintang.
                          <div class="clearfix"></div>
                        </div>
                      </li>                                                                                  




						<li class="by-me">
                        <!-- Use the class "pull-left" in avatar -->
                        <div class="avatar pull-left">
                         <img src="img/soekarno.jpg" width="80" alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In meta area, first include "name" and then "time" -->
                          <div class="chat-meta">Soekarno <span class="pull-right"></span></div>
                         Belajar tanpa berpikir itu tidaklah berguna, tapi berpikir tanpa belajar itu sangatlah berbahaya!
                          <div class="clearfix"></div>
                        </div>
                      </li> 

                      <!-- Chat by other. Use the class "by-other". -->
                      <li class="by-other">
                        <!-- Use the class "pull-right" in avatar -->
                        <div class="avatar pull-right">
                          <img src="img/kihajardewantara.jpg" width="50" alt=""/>
                        </div>

                        <div class="chat-content">
                          <!-- In the chat meta, first include "time" then "name" -->
                          <div class="chat-meta"><span class="pull-right">Ki Hajar Dewantara</span></div>
                         Ing ngarsa sung tulada, ing madya mangun karsa, tut wuri handayani. Di Depan, Seorang Pendidik harus memberi Teladan atau Contoh Tindakan Yang Baik, Di tengah atau di antara Murid, Guru harus menciptakan prakarsa dan ide, Dari belakang Seorang Guru harus Memberikan dorongan dan Arahan
                          <div class="clearfix"></div>
                        </div>
                      </li>   
                    </ul>

                  </div>
                  <!-- Widget footer -->
                  
                  
                 
                </div>


              </div> 
            </div>

<div class="col-lg-8">
	<!--Project Activity start-->
	<section class="panel">
	<div class="panel-body progress-panel">
	<div class="row">
		<div class="col-lg-8 task-progress pull-left">
				<h1>Daftar Peserta Kursus Terbaru</h1>                                  
		</div>
		<div class="col-lg-4">
			<span class="profile-ava pull-right">
					
							Mereka Bergabung
			</span>                                
		</div>
	</div>
	</div>
	<table class="table table-hover personal-task">
		<tbody>
		<tr>
				<td>No</td>
				<td>
						Nama
				</td>
				<td>
						<span>Mendaftar pada kursus</span>
				</td>
				<td>
					<span class="profile-ava">
					</span>
				</td>
		</tr>

<?php  
  $sql="select * from `$tbpendaftaran`  order by `kd_kursus_dibuka` asc limit 0,15";									
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
				$kd_pendaftaran=$d["kd_pendaftaran"];
				$kd_periode= getPeriode($conn,$d["kd_periode"]);
				$kd_kursus= getKursus($conn,$d["kd_kursus"]);
				$kd_kursus_dibuka= getKursusDibuka($conn,$d["kd_kursus_dibuka"]);
			
				$nrp=$d["nrp"];
				$tanggal_daftar=WKT($d["tanggal_daftar"]);
				$status=$d["status"];
				
				
				$sqlx="select nama,pangkat,golongan,gambar from `tb_peserta` where `nrp`='$nrp'";
	$dx=getField($conn,$sqlx);
				$nama=$dx["nama"];
				$pangkat=$dx["pangkat"];
				$golongan=$dx["golongan"];
				$gambar=$dx["gambar"];
				
echo"<tr>
	<td>$nrp</td>
    <td>$golongan $pangkat $nama</td>
    <td><span class='badge bg-success'>$kd_kursus_dibuka</span></td>
	<td>
	<span class='profile-ava'><img alt='' class='simple' src='ypathfile/$gambar' width='30' height='30'></span>
	</td>
 </tr>";
		}
		?>
 
 
                              </tbody>
                          </table>
                      </section>
                      <!--Project Activity end-->
                  </div>
              </div><br><br>
			  
			  
			  
			  
		
			  