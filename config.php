<?php


//database conection config start ///
	$host="sql108.lamanrasmi.com"; // Host name 
	$usernameDB="lmnr_22114413"; // Mysql username 
	$passwordDB="faiqsudin"; // Mysql password 
	$db_name="lmnr_22114413_psm"; // Database name 
	$db = @mysql_connect($host, $usernameDB, $passwordDB); 
	$link = mysql_select_db($db_name,$db);
	
//database conection config--- end----- ///
//-----email config----start---//
	$smtp_host = 'smtp.gmail.com';
	$smtp_user = 'psmdegree@gmail.com';
	$smtp_pass = 'Faiqsudin2312';
	$smtp_port = '587';
	$link_path = "https://";
	$mail_address = 'psmdegree@gmail.com';
	$smtp_secure = "tls";

//-----email config----end---//	
//// login secure/////

//// login secure/////
?>