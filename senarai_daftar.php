<?php 
include ("include/config.php"); 
include("include/include.php");

$txt_action = (isset($_POST['txt_action'])) ? $_POST['txt_action'] : "";
?>


<?php include("header.php");
if ($txt_action == "cari"){
	$txt_nokenderaan  = (isset($_POST['txt_nokenderaan'])) ? $_POST['txt_nokenderaan'] : "";
	$get_daftar = get_daftar_senarai_carian('0',$txt_nokenderaan,'0','10000');
}else{
	$get_daftar = get_daftar_senarai();
}
?>

<script type="text/javascript">
function cari(){
	
	document.getElementById('txt_action').value = "cari";
	
}
</script>

    <div id="wrapper">

         <?php
		include ("menu.php");
		?>


            </div> <form enctype="multipart/form-data" id="frmSenarai" name="frmSenarai" action="" method="post">
            <input type="hidden" name="txt_action" id="txt_action" />
            <!-- /.row -->
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Senarai Permohonan Pelekat Kenderaan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Senarai Permohonan Pelekat Kenderaan
                        </div>
                        <!-- /.panel-heading -->
                        
                        <div class="form-group"><br/>
                                  <label for="disabledSelect">No. Kenderaan:</label>
                                  <input class="form-control" id="txt_nokenderaan" type="text" value="" name="txt_nokenderaan" ><button type="submit" class="btn btn-default" onClick="return cari()">Cari</button>
                                </div> 
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th width="4%">Bil</th>
                                        <th width="18%">Tarikh Daftar</th>
                                        <th width="24%">Model Kenderaan</th>
                                        <th width="20%">No. Kenderaan</th>
                                        <th width="12%">No. Enjin</th>
                                        <th width="13%">No. Casis</th>
                                         <th colspan="2">Status</th>
                                          <th >QR</th>
                                      
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
                                        <td width="7%"><?php echo $get_daftar[$i]['status_desc']; ?></td>
                                        <td width="2%">&nbsp;<a  target="_new" href="<?php echo $get_daftar[$i]['upload_link']; ?>" style="cursor:pointer"><img src="img/re-k-view-icon.png" /></a></td>
                                    <td width= valign="top">&nbsp;<img src="qr_code_img/<?php echo $get_daftar[$i]['id']; ?>.png" /></td>
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
   
</form>
</body>

</html>
