<?php 
include 'include/config.php';
include("include/include.php");
function get_desc_permohonan($slct_status){
	$status_desc = "";
	if($slct_status =="0"){
		$status_desc = "Pemohonan Masih Dalam Proses";
	}elseif($slct_status =="1"){
		$status_desc = "Suka cita dimaklumkan pemohonan telah Dilulus";
	}elseif($slct_status =="-1"){
		$status_desc = "Duka cita dimaklumkan pemohonan telah Tidak Dilulus";
	}
	return $status_desc;
}
$id_item_hidden = array();
		$id_item_hidden = $_POST['id_item_hidden'];
	for($i=0;$i< count ($id_item_hidden);$i++){
				$id_item = $id_item_hidden[$i]; 
				$slct_status = $_POST['slct_status'][$id_item];
				update($id_item,$slct_status,"status","id","daftar");
		$get_daftar = get_daftar_by_id($id_item);		
		$status = get_desc_permohonan($slct_status);		
		$mail = new PHPMailer();
		$mail->CharSet="windows-1251";
		$mail->CharSet="utf-8";
		$mail->IsHTML(true);
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = $smtp_secure; 
		$mail->Host = $smtp_host;
		$mail->Port = $smtp_port; 
		$mail->Username = $smtp_user; 
		$mail->Password = $smtp_pass;					
		$mail->From = $mail_address;
		$mail->FromName ="SPPK" ;
		$mail->AddAddress($get_daftar['email']);
		$mail->AddCC($mail_address);
		$subject = "Permohonan Pelekat Kenderaan - ".$get_daftar['nokenderaan'];
		$mail->Subject = $subject;
		
		$mailBody ="Hi ".$get_daftar['nama'].", <br/><br/>
			Permohonan Pelekat Kenderaan  untuk No Kenderaan ".$get_daftar['nokenderaan']." <br/>
			".$status.  "<br/>
			No Rujukan : ".$get_daftar['id']."<br/>
			Sila ke kaunter Pejabat Keselamatan UTHM untuk mengambil pelekat kenderaan anda.<br/><br/>
			Email ini dijana secara automatik . Jangan balas email ini. <br/><br/>
			Terima Kasih. <br/>
				";
		$mail->Body = $mailBody;
		if(!$mail->Send()) {
//echo("<SCRIPT LANGUAGE='JavaScript'>window.alert('Email was not sent because $mail->ErrorInfo')<SCRIPT>"); 
		}else{
		//
		}		
	}
	header("Location: sah_daftar.php");
		
		
		
?>
		