<?php 
include 'include/config.php';
include("include/include.php");
$nama  = (isset($_POST['txt_nama'])) ? $_POST['txt_nama'] : "";
$txt_matrik  = (isset($_POST['txt_matrik'])) ? $_POST['txt_matrik'] : "";
$ic  = (isset($_POST['txt_ic'])) ? $_POST['txt_ic'] : "";
$email  = (isset($_POST['txt_email'])) ? $_POST['txt_email'] : "";
$tahun  = (isset($_POST['slct_tahun'])) ? $_POST['slct_tahun'] : "";
$fakulti  = (isset($_POST['slct_fakulti'])) ? $_POST['slct_fakulti'] : "";
$jenis  = (isset($_POST['slct_jenis'])) ? $_POST['slct_jenis'] : "";
echo  $nama;
		$id = getsinglevalue("id","sys_user","matrik",$txt_matrik);
		if ($id == '0'){
		$id = insert($txt_matrik,"matrik","sys_user");
		update($id,$nama,"nama","id","sys_user");
		update($id,$ic,"ic","id","sys_user");
		update($id,$email,"email","id","sys_user");
		if ($jenis == '3'){
		update($id,$tahun,"tahun","id","sys_user");
		update($id,$fakulti,"fakulti","id","sys_user");
		}else{
		update($id,"-","tahun","id","sys_user");
		update($id,"-","fakulti","id","sys_user");	
		}
		update($id,$jenis,"jenis","id","sys_user");
		
		header("Location: userlist.php");
		}else{
			$error = "0";
			header("Location: formuser.php?error=".$error);
		}
?>
		