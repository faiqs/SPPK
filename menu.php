
<?php 

$jenis_user = getsinglevalue("jenis","sys_user","matrik",$username);
//echo $jenis_user;
?>



    
<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="utama.php">Sistem Pemantauan Pelekat Kenderaan</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
               
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
 					<?php 
					$home_menu = 'utama.php';
					/*
					if($jenis_user == "1"){
						 $home_menu = 'utama.php';
						}elseif($jenis_user == "2"){
						 $home_menu = 'utamastf.php';
						}elseif($jenis_user == "3"){ 
						 $home_menu = 'utamastd.php';
						}
						*/?>
						
						
                        <li>
                            <a href="<?php echo $home_menu ?>"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                        </li>
                        <?php if($jenis_user == "1"){ ?>
                        <li>
                                <a href="#"><i class="fa fa-edit fa-fw"></i>Pengguna<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="formuser.php">Tambah</a>
                                    </li>
                                    <li>
                                        <a href="userlist.php">Senarai</a>
                                    </li>
                                   
                                </ul>
                                <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href=""><i class="fa fa-table fa-fw"></i>Saman</a>
                             <ul class="nav nav-second-level">
                                    <li>
                                        <a href="tambahsaman.php">Tambah</a>
                                    </li>
                                    <li>
                                        <a href="tindakan_saman.php">Tindakan</a>
                                    </li>
                                    
                                    <li>
                                        <a href="listsaman.php">Senarai</a>
                                    </li>
                                    
                                    
                                </ul>
                        </li>
                        
                         <li>
                               <a href="#"><i class="fa fa-edit fa-fw"></i>Pelekat Kenderaan<span class="fa arrow"></span></a>
                               <ul class="nav nav-second-level">
                              
                                   <li>
                                       <a href="sah_daftar.php">Pengesahan Permohonan</a>
                                   </li>
                                 
                                   <li>
                                       <a href="senarai_daftar.php">Senarai Permohonan</a>
                                   </li>
                                  
                               </ul>
                               <!-- /.nav-second-level -->
                       </li>
                        <?php } ?>
                        <?php if($jenis_user == "2" || $jenis_user == "3"){ ?>
                         <li>
                               <a href="#"><i class="fa fa-edit fa-fw"></i>Pelekat Kenderaan<span class="fa arrow"></span></a>
                               <ul class="nav nav-second-level">
                                <?php if($jenis_user == "2"){ ?>
                                   <li>
                                       <a href="daftar.php">Permohonan</a>
                                   </li>
                                   <?php } ?> 
                                  <?php if( $jenis_user == "3"){ ?>  
                                   <li>
                                       <a href="daftar.php">Permohonan</a>
                                   </li>
                                   <?php } ?> 
                                   <li>
                                       <a href="semak_daftar.php">Status Permohonan</a>
                                   </li>
                                  
                               </ul>
                               <!-- /.nav-second-level -->
                       </li>
                       <li>
                            <a href="semak_saman.php"><i class="fa fa-table fa-fw"></i>Saman</a>
                        </li>
				<?php } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>