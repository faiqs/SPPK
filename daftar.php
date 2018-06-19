<?php 
include("include/include.php");
include ("include/config.php"); 
?>
<?


?>




<?php include("header.php");
		$tarikh_daftar = (isset($_POST['txt_tarikh_daftar'])) ? $_POST['txt_tarikh_daftar'] : "";
		$model = (isset($_POST['txt_model'])) ? $_POST['txt_model'] : "";
		$nokenderaan = (isset($_POST['txt_nokenderaan'])) ? $_POST['txt_nokenderaan'] : "";
		$no_enjin = (isset($_POST['txt_no_enjin'])) ? $_POST['txt_no_enjin'] : "";
		$no_chasis = (isset($_POST['txt_no_chasis'])) ? $_POST['txt_no_chasis'] : "";	
?>

<?php
	$get_sys_user = get_sys_user($username);
?>

<script type="text/javascript">

</script>
<div id="wrapper">

    <?php include("menu.php");
?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Borang Permohonan Pelekat Kenderaan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Borang Permohonan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <form enctype="multipart/form-data" id="frmDaftar" name="frmDaftar" action="daftar_proces.php" method="post">
                                        <div class="form-group">
                                            <label for="disabledSelect">Nama Penuh:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="<?php echo $get_sys_user['nama']; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="disabledSelect">No. Matrik:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="<?php echo $get_sys_user['matrik']; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="disabledSelect">No. IC:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="<?php echo $get_sys_user['ic']; ?>" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="disabledSelect">Emel:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="<?php echo $get_sys_user['email']; ?>" disabled>
                                        </div>

                                        <div class="form-group" <?php if($jenis_user == "2"){?> style="display:none"  <?php }?> >
                                            <label for="disabledSelect">Tahun Pengajian:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="<?php echo $get_sys_user['tahun']; ?>" disabled>
                                        </div>

                                        <div class="form-group" <?php if($jenis_user == "2"){?> style="display:none"  <?php }?>  >
                                            <label for="disabledSelect">Fakulti:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="<?php echo $get_sys_user['fakulti']; ?>" disabled>
                                        </div>

                                       

                                                  
                                <div class="form-group" style="display:none">
                                            <label>Tarikh Permohonan: </label>
                                           <input name="txt_tarikh_daftar"  type="text" class="tcal" id="txt_tarikh_daftar" value="<?php echo $tarikh_daftar; ?>"  readonly/> 
                                        </div>                        
                                                 
							 <div class="form-group">
                                            <label>Model Kereta: </label>
                                            <input class="form-control" placeholder="" name ="txt_model" id ="txt_model" value="<?php echo $model; ?>" required>
                                        </div>
                              <div class="form-group">
                                            <label>No Pendaftaran Kenderaan: </label>
                                            <input class="form-control" placeholder="eg : ABC123" name ="txt_nokenderaan" id ="txt_nokenderaan" value="<?php echo $nokenderaan; ?>" required>
                                        </div>  
                                
                                 <div class="form-group">
                                            <label>No Enjin Kenderaan: </label>
                                            <input class="form-control" placeholder="" name ="txt_no_enjin" id ="txt_no_enjin" value="<?php echo $no_enjin; ?>">
                                        </div> 
                                   <div class="form-group">
                                            <label>No Casis Kenderaan: </label>
                                            <input class="form-control" placeholder=""  name ="txt_no_chasis" id ="txt_no_chasis" value="<?php echo $no_chasis; ?>">
                                        </div>                                     
                                                    <div class="form-group">
                                                        <label>Gambar Kenderaan: </label>
                                                        <input type="file" name="browsedFile" id="browsedFile" required >
                                                        <p class="help-block">Sila sertakan PDF mengandungi:
                                                            1. Gambar Kenderaan
                                                            2. Salinan Lesen
                                                            3. Salinan IC
                                                        </p>
                                                    </div>
                                        <div>
                                            <button type="submit" name="submit" class="btn btn-default">Simpan</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        </div>            
                                        
                                    </form>
                                </div>

                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
   </div>
  <?php
  $error = (isset($_GET['error'])) ? $_GET['error'] : "";

?>
<script >
<?php if($error =='1'){ ?>
	alert("Fail problem")
<?php } ?>
<?php if($error =='2'){ ?>
	alert("PDF file sahaje")
<?php } ?>
</script>
<?php include("footer.php");
?>
