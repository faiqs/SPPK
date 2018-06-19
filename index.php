<?php
include("include/include.php");
include ("include/config.php");
$username = $_SESSION['user_name'];
$jenis_user1 = getsinglevalue("jenis","sys_user","matrik",$username);

if ($jenis_user1 == '0'){
	 header( 'Location: login.php' ) ;
}else {
header("Location: utama.php");
}
			


 ?>