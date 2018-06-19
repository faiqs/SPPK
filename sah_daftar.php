<?php 
include ("include/config.php"); 
include("include/include.php");

?>


<?php include("header.php");

$get_daftar = get_daftar_sah();
$slct_status_daftar = get2darray("status_id","status_desc","status_daftar");
?>

    <div id="wrapper">

         <?php
		include ("menu.php");
		?>


            </div>
             <form enctype="multipart/form-data" id="frmDaftar" name="frmDaftar" method="post" action="sah_daftar_proces.php">
            <!-- /.row -->
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pengesahan Permohonan Pelekat Kenderaan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Pengesahan Permohonan Pelekat Kenderaan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="7%">Bil</th>
                                        <th width="16%">Tarikh Daftar</th>
                                        <th width="21%">Model Kenderaan</th>
                                        <th width="18%">No. Kenderaan</th>
                                        <th width="11%">No. Enjin</th>
                                        <th width="12%">No. Casis</th>
                                         <th colspan="2">Status</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php  if($get_daftar <> 0 ){?>
										  <input type="hidden" name="txt_count" value="<?php echo count($get_daftar)?>">
  										 <?php for ( $i=0;$i < count($get_daftar);$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i+1; ?> <input type="hidden" name="id_item_hidden[<?php echo $i?>]" value="<?php echo $get_daftar[$i]['id']?>"></td>
                                        <td><?php echo $get_daftar[$i]['tarikh_daftar']; ?></td>
                                        <td><?php echo $get_daftar[$i]['model']; ?></td>
                                        <td><?php echo $get_daftar[$i]['nokenderaan']; ?></td>
                                        <td><?php echo $get_daftar[$i]['no_enjin']; ?></td>
                                        <td><?php echo $get_daftar[$i]['no_chasis']; ?></td>
                                        <td width="11%"><select class="form-control" name="slct_status[<?php echo $get_daftar[$i]['id']?>]">
                                        <?php for ( $k=0;$k < count($slct_status_daftar);$k++){ ?> 
										<option <?php if($get_daftar[$i]['status'] == $slct_status_daftar[$k][0]){ ?> selected="selected" <?php } ?> value="<?php echo $slct_status_daftar[$k][0]?>"><?php echo $slct_status_daftar[$k][1]?></option>
                                        <?php } ?>
                                        </select></td>
                                        <td width="4%">&nbsp;<a target="_new" href="<?php echo $get_daftar[$i]['upload_link']; ?>" style="cursor:pointer"><img src="img/re-k-view-icon.png" /></a></td>
                                        
										
                                    
                                    </tr>
                                    <?php } ?>
                                     <?php }else{ ?>
                                   <tr class="odd gradeX">
                                        <td colspan="8"><?php echo "Tiada Rekod"; ?></td>
                                    </tr>
                                      <?php } ?>
                                    </tbody>
                            </table>
                            <div>
                              <button type="submit" class="btn btn-default">Simpan</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div> 
   </div>
   </div></div></div></div>
   
</form>
</body>

</html>
