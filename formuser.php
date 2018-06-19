<?php 
include("include/include.php");
include ("include/config.php"); 
include("header.php");
?>

<div id="wrapper">

    <!-- Navigation -->
     <?php
		include ("menu.php");
		?>
 <form enctype="multipart/form-data" id="formuser" method="post" name="formuser" action="formuser_proces.php">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Pengguna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Pengguna
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  
                                        <div class="form-group">
                                            <label>Nama Penuh</label>
                                            <input type="text" class="form-control" name="txt_nama" placeholder="Sila masukkan nama anda" required>
                                        </div>
                                        <div class="form-group">
                                            <label>No Matrik/Staf</label>
                                            <input type="text" class="form-control" name="txt_matrik" placeholder="Sila masukkan No Matrik/Staf" required>
                                        </div>
                                        <div class="form-group">
                                            <label>No Kad Pengenalan</label>
                                            <input type="text" class="form-control" name="txt_ic" placeholder="Sila masukkan No Kad Pengenalan"required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control"  name="txt_email" placeholder="Sila masukkan Email"required>
                                        </div>
                                        <div class="form-group" >
                                            <label>Tahun Pengajian</label>
                                            <select class="form-control" name="slct_tahun">
                                             	<option value="" selected >-Pilih-</option>
                                                <option value="1" >1</option>
                                                <option value="2" >2</option>
                                                <option value="3" >3</option>
                                                <option value="4" >4</option>
                                                <option value="5" >5</option>
                                                <option value="6" >6</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fakluti</label>
                                            <select class="form-control" name="slct_fakulti">
                                           		<option value="-" selected >-Pilih-</option>
                                                <option value="FSKTM">FSKTM</option>
                                                <option value="FKEE">FKEE</option>
                                                <option value="FKAAS">FKAAS</option>
                                                <option value="FPTV">FPTV</option>
                                                <option value="FTK">FTK</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis</label>
                                            <select class="form-control" name="slct_jenis" required>
                                            	<option value="-" selected >-Pilih-</option>
                                                <option value="1">Pentadbir</option>
                                                <option value="2">Staf</option>
                                                <option value="3">Pelajar</option>
                                            </select>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-default">Simpan</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                  
                                </div>
                            
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
</form>
    </div>
    <!-- /#wrapper -->
  
<?php 

include("footer.php");
?>
