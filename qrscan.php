<?php 
include 'include/config.php';
include 'include/include.php';





$showdata = 20;//
$searchtext = (isset($_POST['searchtext'])) ? $_POST['searchtext'] : "";
$action = (isset($_POST['txt_action'])) ? $_POST['txt_action'] : "";
$limit2 = (isset($_POST['limit2'])) ? $_POST['limit2'] : $showdata;

//echo get_auth($employee_id);
//$get_daftar_senarai = get_daftar_senarai();

if($action == 'cari'){
$id_daftar = getsinglevalue("id","daftar","qr_code",$searchtext);
$nama  = getsinglevalue("nama","sys_user","id",getsinglevalue("id_user","daftar","qr_code",$searchtext));
$nokenderaan  = getsinglevalue("nokenderaan","daftar","qr_code",$searchtext);
}


?>
<?php include 'header.php'; ?>
<?php
if($action == 'cari'){
?>
<script type="text/javascript" language="JavaScript">
window.opener.document.frmSaman.txt_id_daftar.value ='<?php echo $id_daftar; ?>';
window.opener.document.frmSaman.txt_nama.value = '<?php  echo $nama; ?>';
window.opener.document.frmSaman.txt_nokenderaan.value = '<?php echo $nokenderaan;?>';
window.close ();	
</script>
<?php
}
?>
<script type="text/javascript" language="JavaScript">

function searchdaftar(){
	document.form_daftar_search.txt_action.value = 'cari';
	document.form_daftar_search.submit();
}

</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
      <form action="qrscan.php" id="form_daftar_search" name="form_daftar_search" method="post">
      <tr>
        <td class="kotak_head"  align="left"><input name="searchtext" type="text" class="" id="searchtext" value="<?php echo $searchtext  ?>" />
          <input type="button" name="search_button" id="search_button" value="OK"  onclick="return searchdaftar()"/>
          <input type="hidden" name="txt_action" id="txt_action" /></td>
        </tr></form>
      
        </tr>
    </table>