<?php 
include("include/include.php");
include ("include/config.php"); 
?>
<?


?>




<?php include("header.php");

?>

<?php
$action = (isset($_POST['txt_action'])) ? $_POST['txt_action'] : "";
	$get_sys_user = get_sys_user($username);
	$slct_lokasi = get2darray("id","namalokasi","lokasi");
	$slct_saman = get2darray("id","kesalahan","saman");
	$id_daftar = "";
	$nama = "";
	$nokenderaan  = "";
	
	if ($action == 'cari'){
		$searchtext = (isset($_POST['searchtext'])) ? $_POST['searchtext'] : "";
		$id_daftar = getsinglevalue("id","daftar","qr_code",$searchtext);
		$nama  = getsinglevalue("nama","sys_user","id",getsinglevalue("id_user","daftar","qr_code",$searchtext));
		$nokenderaan  = getsinglevalue("nokenderaan","daftar","qr_code",$searchtext);
	}
?>
<script language="javascript">
function popupDaftar(element,element2){
		var element_1;
		var element2_1;
		element_1 = element;
		 element2_1 = element2;
		var popup=window.open('daftarlist.php?action='+ element_1 +'&id='+element2_1,'Locations','height=600,width=720,resizable=1,scrollbars=1');
        if(!popup.opener) popup.opener=self;
		
	}
function popupQR(){
	var popup=window.open('qrscan.php','Locations','height=20,width=300,resizable=1,scrollbars=1');
        if(!popup.opener) popup.opener=self;
}
</script>
<script type="text/javascript">
function check_value(){
	
	if (document.getElementById('txt_id_daftar').value =="")
			{
				alert("xxxx");
				document.getElementById('btn_cari').focus();
				return false;
			}
	
}

function searchdaftar(){
	document.frmSaman.txt_action.value = 'cari';
	document.frmSaman.action = 'tambahsaman.php';
	document.frmSaman.submit();
}
</script>
<div id="wrapper">

    <?php include("menu.php");
?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Borang Saman</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Borang Saman
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                  <form enctype="multipart/form-data" id="frmSaman" name="frmSaman" action="tambahsaman_proces.php" method="post">
                                        <div class="form-group">
                                            <label for="disabledSelect">Nama Penuh:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="<?php echo $nama ?>" name="txt_nama"   disabled><input class="form-control" id="searchtext" type="text" value="" name="searchtext" size="10" placeholder="Paste QR Code Here"  ><input name="" type="button" value="QR" class="btn btn-default" onclick="return searchdaftar()"><input name="btn_cari" id="btn_cari" type="button" value=".." class="btn btn-default" onClick="popupDaftar('2','<?php echo $username ?>')">
                                        <input type="hidden" name="txt_id_daftar"  id="txt_id_daftar" class="form-control" value="<?php echo $id_daftar ?>" >
                                        <input type="hidden" name="txt_action" id="txt_action" />
                                        </div>

                                        <div class="form-group" style="display:none">
                                            <label for="disabledSelect">No. Matrik:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="" disabled>
                                        </div>

                                        <div class="form-group" style="display:none">
                                            <label for="disabledSelect">No. IC:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="" disabled>
                                        </div>

                                        <div class="form-group" style="display:none">
                                            <label for="disabledSelect">Emel:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="" disabled>
                                        </div>

                                        <div class="form-group" style="display:none" >
                                            <label for="disabledSelect">Tahun Pengajian:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="" disabled>
                                        </div>

                                        <div class="form-group" style="display:none">
                                            <label for="disabledSelect">Fakulti:</label>
                                            <input class="form-control" id="disabledInput" type="text" value="" disabled>
                                        </div>

                                       

                                                  
                                <div class="form-group" style="display:none">
                                            <label>Tarikh Permohonan: </label>
                                           <input name="txt_tarikh_daftar" type="text" class="tcal" id="txt_tarikh_daftar" value="" readonly/> 
                                        </div>                        
                                                 
							 <div class="form-group" style="display:none">
                                            <label>Model Kereta: </label>
                                            <input class="form-control" placeholder="" name ="txt_model">
                                        </div>
                                <div class="form-group">
                                  <label for="disabledSelect">No. Kenderaan:</label>
                                  <input class="form-control" id="disabledInput2" type="text" value="<?php echo $nokenderaan ?>" name="txt_nokenderaan" disabled>
                                </div> 
                                       
                                
                                 <div class="form-group" style="display:none">
                                            <label>No Enjin Kenderaan: </label>
                                            <input class="form-control" placeholder="" name ="txt_no_enjin">
                                        </div> 
                                   <div class="form-group" style="display:none">
                                            <label>No Casis Kenderaan: </label>
                                            <input class="form-control" placeholder=""  name ="txt_no_chasis">
                                        </div>                                     
                                                    <div class="form-group">
                                                        <label>Lokasi: </label>
                                                        <select class="form-control" name="slct_lokasi" required>
                                         <option value=""   >--Pilih--</option>             
                                        <?php for ( $k=0;$k < count($slct_lokasi);$k++){ ?> 
										<option value="<?php echo $slct_lokasi[$k][0]?>"><?php echo $slct_lokasi[$k][1]?></option>
                                        <?php } ?>
                                        </select>
                                                    </div>
                                                                                    
                                                    <div class="form-group">
                                                        <label>Kesalahan: </label>
                                                       <select class="form-control" name="slct_saman" required>
                                                       <option value=""   >--Pilih--</option>  
                                        <?php for ( $k=0;$k < count($slct_saman);$k++){ ?> 
										<option  value="<?php echo $slct_saman[$k][0]?>"><?php echo $slct_saman[$k][1]?></option>
                                        <?php } ?>
                                        </select> 
                                                    </div>
                                        <div>
                                            <button type="submit" class="btn btn-default" onClick="return check_value()">Simpan</button>
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
	alert("#")
<?php } ?>

</script>
<?php include("footer.php");
?>
