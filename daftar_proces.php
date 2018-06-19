<?php 
include 'include/config.php';
include("include/include.php");
include('phpqrcode/qrlib.php'); 
    

	$attachment = (isset($_FILES['browsedFile']['name'])) ? $_FILES['browsedFile']['name'] : "";
	$attachment_size = (isset($_FILES['browsedFile']['size'])) ? $_FILES['browsedFile']['size'] : "";
	$limit_size=300000;
	$attachment_type  =  substr(strrchr($attachment,'.'),1); 
	
		if ($attachment_type <>'pdf'){
			$error = 2;
			header("Location: daftar.php?error=".$error);
		}else{
		//$tarikh_daftar = (isset($_POST['txt_tarikh_daftar'])) ? $_POST['txt_tarikh_daftar'] : "";
		$tarikh_daftar = date("Y-m-d");
		$model = (isset($_POST['txt_model'])) ? $_POST['txt_model'] : "";
		$nokenderaan = (isset($_POST['txt_nokenderaan'])) ? $_POST['txt_nokenderaan'] : "";
		$no_enjin = (isset($_POST['txt_no_enjin'])) ? $_POST['txt_no_enjin'] : "";
		$no_chasis = (isset($_POST['txt_no_chasis'])) ? $_POST['txt_no_chasis'] : "";	
		$id = insert($id_user,"id_user","daftar");
		update($id,$tarikh_daftar,"tarikh_daftar","id","daftar");
		update($id,$model,"model","id","daftar");
		update($id,$nokenderaan,"nokenderaan","id","daftar");
		update($id,$no_enjin,"no_enjin","id","daftar");
		update($id,$no_chasis,"no_chasis","id","daftar");
		
		$qr_code = md5($id.$id_user.$nokenderaan);
		update($id,$qr_code,"qr_code","id","daftar");	
		QRcode::png($qr_code, "qr_code_img/".$id.".png", QR_ECLEVEL_L, 3); 
		update($id,"0","status","id","daftar");
		
		$target_path = "upload/".$username."-".$id.".".$attachment_type;
		if(move_uploaded_file($_FILES['browsedFile']['tmp_name'], $target_path)){		
			update($id,$target_path,"upload_link","id","daftar");
			header("Location: semak_daftar.php");
		} else{
			$error = 1;
			delete($id,"id","daftar");
			header("Location: daftar.php?error=".$error);
			
		}
		}
?>
		