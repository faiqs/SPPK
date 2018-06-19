<?php 
include("include/include.php");
include ("include/config.php"); 
include("header.php");
?>


    <div id="wrapper">

        <?php
		include ("menu.php");
		
		?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <?php if($jenis_user == "1"){ ?> 
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo get_daftar_sah_bil()?></div>
                                    <div>Pelekat Kenderaan</div>
                                </div>
                            </div>
                        </div>
                        <a href="sah_daftar.php">
                            <div class="panel-footer">
                                <span class="pull-left">Permohonan Baru</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo get_saman_senarai_tindakan_bil() ?></div>
                                    <div>Saman</div>
                                </div>
                            </div>
                        </div>
                        <a href="tindakan_saman.php">
                            <div class="panel-footer">
                                <span class="pull-left">Belum Dijelaskan</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
<?php }?>
<!-- ------------------------------ -->

<?php if($jenis_user == "2" || $jenis_user == "3"){ ?> 
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo get_daftar_bil_individu($id_user)?></div>
                                    <div>Pelekat Kenderaan</div>
                                </div>
                            </div>
                        </div>
                        <a href="semak_daftar.php">
                            <div class="panel-footer">
                                <span class="pull-left">Dalam Proses</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo get_saman_senarai_tindakan_bil_individu($id_user) ?></div>
                                    <div>Saman</div>
                                </div>
                            </div>
                        </div>
                        <a href="semak_saman.php">
                            <div class="panel-footer">
                                <span class="pull-left">Belum Dijelaskan</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
<?php }?>

<!-- ------------------------------ -->
    </div>
    </div>
<?php include("footer.php");
?>
