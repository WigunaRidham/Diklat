<style type="text/css">
.col-lg-12 .panel.panel-default .panel-body .timeline li p {
	font-family: Arial, Helvetica, sans-serif;
}
.col-lg-12 .panel.panel-default .panel-body .timeline li p strong {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
<?php  
  $sql="select * from `tb_peserta` ";
  $jum=getJum($conn,$sql);?>
                  
                
  
  
  
  
  
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                              </div>
                                <div class="col-xs-9 text-right">
                                <?php  
 								 $sql="select * from `tb_peserta` ";
 									 $jum=getJum($conn,$sql);?>
                                    <div class="huge"><?php echo $jum;?></div>
                                    <div>Data Peserta</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?mnu=kpeserta">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                              </div>
                                <div class="col-xs-9 text-right">
                                <?php  
 								 $sql="select * from `admin` ";
 									 $jum=getJum($conn,$sql);?>
                                    <div class="huge"><?php echo $jum;?></div>
                                    <div>Data Admin</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?mnu=kadmin">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                       <?php  
 								 $sql2="select * from `tb_kursus_dibuka` ";
 									 $jum2=getJum($conn,$sql2);?>
                                    <div class="huge"><?php echo $jum2;?></div>  <div>Kursus Dibuka</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?mnu=kkursusdibuka">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                
                 <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                              </div>
                                <div class="col-xs-9 text-right">
                                <?php  
 								 $sql="select * from `tb_jadwal` ";
 									 $jum=getJum($conn,$sql);?>
                                    <div class="huge"><?php echo $jum;?></div>
                                    <div>Data Jadwal</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?mnu=kjadwal">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                    <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                       <?php  
 								 $sql2="select * from `tb_pendaftaran` ";
 									 $jum2=getJum($conn,$sql2);?>
                                    <div class="huge"><?php echo $jum2;?></div>  <div>Pendaftaran</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?mnu=kpendaftaran">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                                             
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                       <?php  
 								 $sql2="select * from `tb_nilai` ";
 									 $jum2=getJum($conn,$sql2);?>
                                    <div class="huge"><?php echo $jum2;?></div>  <div>Data Nilai</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?mnu=knilai">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                    
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                       <?php  
 								 $sql2="select * from `tb_sertifikat` ";
 									 $jum2=getJum($conn,$sql2);?>
                                    <div class="huge"><?php echo $jum2;?></div>  <div>Sertifikat</div>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?mnu=ksertifikat">
                            <div class="panel-footer">
                                <span class="pull-left">Lihat Detail</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                
                
                
                
               
            </div>
            <!-- /.row -->
            <div class="row">
            <!-- /.col-lg-8 --><!-- /.col-lg-4 -->
