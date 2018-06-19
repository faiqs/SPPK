
<?php
//include("include/include.php");
include ("include/config.php");
function getsinglevalue($getfield,$table,$condition,$inputfield){  //get single value with single codition.
	$sqlstr = " SELECT $getfield FROM $table WHERE $condition ='$inputfield' LIMIT 0 , 1";
	//echo  $sqlstr ;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield=$rows[$getfield];
	//echo  $getfield ;
	}
	return $getfield;	
	}else{
		return 0;
	}
}
// Define $myusername and $mypassword 
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 


$sql="SELECT * FROM sys_user  WHERE matrik = '$myusername' and ic = '$mypassword'";
echo $sql;
$result=mysql_query($sql);
$count=mysql_num_rows($result);

if($count==1){
session_start();
$_SESSION['user_name'] = $myusername;
$_SESSION['user_password'] = $mypassword;
$id_user = getsinglevalue("id","sys_user","matrik",$myusername);
$_SESSION['id_user'] = $id_user;
//$jenis_user = getsinglevalue("jenis","sys_user","matrik",$myusername);
header("Location: utama.php");
/*
if ($jenis_user == '1'){;
header("Location: utama.php");
}elseif ($jenis_user == '2'){
header("Location: utamastf.php");
}elseif ($jenis_user == '3'){
header("Location: utamastd.php");
}
*/
//////////
}else {
echo "Wrong Username or Password";
header("Location: login.php?error=1");
}

?>