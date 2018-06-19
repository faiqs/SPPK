<?php 
include 'include/config.php';
include("include/include.php");
		$tarikh = date("Y-m-d");
		$id_daftar = (isset($_POST['txt_id_daftar'])) ? $_POST['txt_id_daftar'] : "";
		$id_lokasi = (isset($_POST['slct_lokasi'])) ? $_POST['slct_lokasi'] : "";
		$id_saman = (isset($_POST['slct_saman'])) ? $_POST['slct_saman'] : "";
		
		$id = insert($id_daftar,"id_daftar","daftarsaman");
		update($id,$id_lokasi,"id_lokasi","id","daftarsaman");
		update($id,$id_saman,"id_saman","id","daftarsaman");
		update($id,$tarikh,"tarikh","id","daftarsaman");
		update($id,'0',"status","id","daftarsaman");
		$get_daftar = get_daftar_by_id($id_daftar);
		
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
		$subject = "SPPK - ".$get_daftar['nokenderaan'];
		$mail->Subject = $subject;
		
		$mailBody ="Hi ".$get_daftar['nama'].", <br/><br/>
			No Kenderaan ".$get_daftar['nokenderaan']." milik anda telah di kompaun <br/>
			atas kesalahan ".getsinglevalue("kesalahan","saman","id",$id_saman)."<br/> 
			dan di kompaun RM ".getsinglevalue("kompaun","saman","id",$id_saman)."<br/>
			This is automatically generated email notification. Please do not reply to this email. <br/><br/>
			Terima Kasih. <br/>
				";
		$mail->Body = $mailBody;
		if(!$mail->Send()) {
//echo("<SCRIPT LANGUAGE='JavaScript'>window.alert('Email was not sent because $mail->ErrorInfo')<SCRIPT>"); 
		}else{
		header("Location: listsaman.php");
		}
		
		
		
?>
		