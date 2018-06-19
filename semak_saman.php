<?php
include("include/include.php");
include ("include/config.php"); 
include("header.php");


$get_saman_senarai = get_saman_senarai_individu($id_user);

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
                    <h1 class="page-header">Senarai Saman</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Senarai Saman
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
  										 <?php for ( $i=0;$i < count($get_saman_senarai);$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i+1; ?></td>
                                        <td><?php echo $get_saman_senarai[$i]['nama']; ?></td>
                                        <td><?php echo $get_saman_senarai[$i]['nokenderaan']; ?></td>
                                        <td><?php echo $get_saman_senarai[$i]['kesalahan']; ?></td>
                                        <td><?php echo $get_saman_senarai[$i]['namalokasi']; ?></td>
                                        <td><?php echo $get_saman_senarai[$i]['tarikh']; ?></td>
                                        <td>RM<?php echo $get_saman_senarai[$i]['kompaun']; ?></td>
                                        <td><?php echo $get_saman_senarai[$i]['status_desc']; ?></td>
                                    
                                    </tr>
                                    <?php } } ?>
                                    </tbody>
                            </table>
    
<?php include("footer.php"); ?>
