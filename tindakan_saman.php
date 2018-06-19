<?php
include("include/include.php");
include ("include/config.php"); 
include("header.php");


$get_saman_senarai = get_saman_senarai_tindakan();
$slct_status_saman = get2darray("id","status_desc","status_saman");
?>



    <div id="wrapper">

         <?php
		include ("menu.php");
		?>


            </div>
            <!-- /.row -->
             <form enctype="multipart/form-data" id="frmDaftar" name="frmDaftar" method="post" action="tindakan_saman_proces.php">
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tindakan Saman</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tindakan Saman
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama</th>
                                        <th>No Plat</th>
                                        <th>Kesalahan</th>
                                        <th>Lokasi</th>
                                        <th>Tarikh Kesalahan</th>
                                        <th>Kompaun</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  if($get_saman_senarai <> 0 ){ ?>
                                    <input type="hidden" name="txt_count" value="<?php echo count($get_saman_senarai)?>">
  										 <?php for ( $i=0;$i < count($get_saman_senarai);$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i+1; ?><input type="hidden" name="id_item_hidden[<?php echo $i?>]" value="<?php echo $get_saman_senarai[$i]['id']?>"></td>
                                        <td><?php echo $get_saman_senarai[$i]['nama']; ?></td>
                                        <td><?php echo $get_saman_senarai[$i]['nokenderaan']; ?></td>
                                        <td><?php echo $get_saman_senarai[$i]['kesalahan']; ?></td>
                                        <td><?php echo $get_saman_senarai[$i]['namalokasi']; ?></td>
                                        <td><?php echo $get_saman_senarai[$i]['tarikh']; ?></td>
                                        <td>RM<?php echo $get_saman_senarai[$i]['kompaun']; ?></td>
                                        <td><select class="form-control" name="slct_status[<?php echo $get_saman_senarai[$i]['id']?>]">
                                        <?php for ( $k=0;$k < count($slct_status_saman);$k++){ ?> 
										<option <?php if($get_saman_senarai[$i]['status'] == $slct_status_saman[$k][0]){ ?> selected="selected" <?php } ?> value="<?php echo $slct_status_saman[$k][0]?>"><?php echo $slct_status_saman[$k][1]?></option>
                                        <?php } ?>
                                        </select>
										</td>
                                    
                                    </tr>
                                    <?php } }else{ ?>
                                    <tr class="odd gradeX"> <td colspan="8">Tiada Rekod </td> </tr>
                                    <?php } ?>
                                    </tbody>
                            </table>
                            <div>
                                            <button type="submit" class="btn btn-default">Simpan</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div> 
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
<?php include("footer.php"); ?>
