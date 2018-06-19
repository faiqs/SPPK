<?php 
include ("include/config.php"); 
include("include/include.php");




$txt_action = (isset($_POST['txt_action'])) ? $_POST['txt_action'] : "";

$searchtext  = (isset($_POST['txt_searchtext'])) ? $_POST['txt_searchtext'] : "";
?>


<?php include("header.php");
if ($txt_action == "cari"){
	$selectsearch   = (isset($_POST['selectsearch'])) ? $_POST['selectsearch'] : "0";
	$searchtext  = (isset($_POST['txt_searchtext'])) ? $_POST['txt_searchtext'] : "";
	$get_sys_user_list = get_sys_user_list_carian($selectsearch,$searchtext);
}else{
	
	$get_sys_user_list = get_sys_user_list();
}
?>


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


            </div>
            <!-- /.row -->
            <form enctype="multipart/form-data" id="frmSenaraiUser" name="frmSenaraiUser" action="" method="post">
             <input type="hidden" name="txt_action" id="txt_action" />
            <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Senarai Pengguna</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                         Senarai Pengguna
                        </div>
                        <div class="form-group"><br/>
                                  <label for="disabledSelect">Carian :</label>
                                  <select  class="form-control" name="selectsearch">
                                  <option>-Pilih-</option>
                                  <option value="a.matrik">No Matrik/Staf</option>
                                  <option value="a.nama">Nama</option>
                                  <option value="a.ic">No Kad Pengenalan</option>
                                  </select>
                                  <input class="form-control" id="txt_searchtext" type="text" value="" name="txt_searchtext" ><button type="submit" class="btn btn-default" onClick="return cari()">Cari</button>
                                </div> 
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Bil</th>
                                        <th>Nama</th>
                                        <th>No. Matrik/Staf</th>
                                        <th>No. Kad Pengenalan</th>
                                        <th>Email</th>
                                        <th>Tahun</th>
                                        <th>Fakulti</th>
                                        <th>Jenis</th>
                                         
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php  if($get_sys_user_list <> 0 ){ ?>
  										 <?php for ( $i=0;$i < count($get_sys_user_list);$i++){ ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $i+1; ?></td>
                                        <td><?php echo $get_sys_user_list[$i]['nama']; ?></td>
                                        <td><?php echo $get_sys_user_list[$i]['matrik']; ?></td>
                                        <td><?php echo $get_sys_user_list[$i]['ic']; ?></td>
                                        <td><?php echo $get_sys_user_list[$i]['email']; ?></td>
                                        <td><?php echo $get_sys_user_list[$i]['tahun']; ?></td>
                                        <td><?php echo $get_sys_user_list[$i]['fakulti']; ?></td>
                                        <td><?php echo $get_sys_user_list[$i]['jenis_desc']; ?></td>
                                    
                                    </tr>
                                    <?php } ?>
                                     <?php }else{ ?>
                                   <tr class="odd gradeX">
                                        <td colspan="7"><?php echo "Tiada Rekod"; ?></td>
                                    </tr>
                                      <?php } ?>
                                    </tbody>
                            </table>
   </div>
   </div></div></div></div>
   </form>

</body>

</html>
