<?php 
include ("include/config.php"); 
include("include/include.php");

?>


<?php include("header.php");

$get_daftar = get_daftar($id_user);
?>

    <div id="wrapper">

         <?php
		include ("menu.php");
		?>


            </div>
            <!-- /.row -->
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Status Permohonan Pelekat Kenderaan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Status Permohonan Pelekat Kenderaan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="4%">Bil</th>
                                        <th width="17%">Tarikh Daftar</th>
                                        <th width="23%">Model Kenderaan</th>
                                        <th width="19%">No. Kenderaan</th>
                                        <th width="12%">No. Enjin</th>
                                        <th width="12%">No. Casis</th>
                                         <th colspan="2">Status</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php  if($get_daftar <> 0 ){ ?>
  										 <?php for ( $i=0;$i < count($get_daftar);$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i+1; ?></td>
                                        <td><?php echo $get_daftar[$i]['tarikh_daftar']; ?></td>
                                        <td><?php echo $get_daftar[$i]['model']; ?></td>
                                        <td><?php echo $get_daftar[$i]['nokenderaan']; ?></td>
                                        <td><?php echo $get_daftar[$i]['no_enjin']; ?></td>
                                        <td><?php echo $get_daftar[$i]['no_chasis']; ?></td>
                                        <td width="10%"><?php echo $get_daftar[$i]['status_desc']; ?></td>
                                        <td width="3%">&nbsp;<a  target="_new" href="<?php echo $get_daftar[$i]['upload_link']; ?>" style="cursor:pointer"><img src="img/re-k-view-icon.png" /></a></td>
                                    
                                    </tr>
                                    <?php } ?>
                                     <?php }else{ ?>
                                   <tr class="odd gradeX">
                                        <td colspan="8"><?php echo "Tiada Rekod"; ?></td>
                                    </tr>
                                      <?php } ?>
                                    </tbody>
                            </table>
   </div>
   </div></div></div></div>
   

</body>

</html>
