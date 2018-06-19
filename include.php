<?php
include ("PHPMailer_v5.0.2/class.phpmailer.php");
error_reporting(E_ALL);
ini_set('display_errors', 'off');
ini_set('html_errors', 'Off'); 
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
if(!$_SESSION['user_name']){
header("location:login.php");
}
$username = $_SESSION['user_name'];
$id_user = $_SESSION['id_user'];
//echo $username."<br/>";

$currentmount = date("m");
$currentYear = date('Y');


function checkDateT($date) //convert yy-mm-dd to dd-mm-yy
{
    if (!isset($date) || $date=="")
    {
        return false;
    }
   
    list($yy,$mm,$dd)=explode("-",$date);
    if ($dd!="" && $mm!="" && $yy!="")
    {
        $result="$dd-$mm-$yy";
		return $result;
    }
   
    return false;
}

function checkDateY($date) //convert dd-mm-yy to yy-mm-dd
{
    if (!isset($date) || $date=="")
    {
        return false;
    }
   
    list($dd,$mm,$yy)=explode("-",$date);
    if ($dd!="" && $mm!="" && $yy!="")
    {  
        $result="$yy-$mm-$dd";
		return $result;
    }
   
    return false;
}
function checkDateSAP($date) //convert yy-mm-dd to Ymd
{
    if (!isset($date) || $date=="")
    {
        return false;
    }
   
    list($dd,$mm,$yy)=explode("-",$date);
    if ($dd!="" && $mm!="" && $yy!="")
    {  
        $result="$yy$mm$dd";
		return $result;
    }
   
    return false;
}
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

function getsinglevalue2($getfield,$table,$condition1,$inputfield1,$condition2,$inputfield2){  //get single value with 2 codition.
	$sqlstr = " SELECT $getfield FROM $table WHERE $condition1 ='$inputfield1' AND $condition2 ='$inputfield2' LIMIT 0 , 1";
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	//echo $sqlstr ;
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

function getsinglevalue3($getfield,$table,$condition1,$inputfield1,$condition2,$inputfield2,$condition3,$inputfield3){  //get single value with 2 codition.
	$sqlstr = " SELECT $getfield FROM $table WHERE $condition1 ='$inputfield1' AND $condition2 ='$inputfield2' AND $condition3 ='$inputfield3' LIMIT 0 , 1";
	//echo $sqlstr;
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
//////-----------------sending email----------------////

/////---------------

function replace_decimal($data){
	if($data == ''){
	$data = '0.00';	
	}	
	return $data;
}
function replace_date($data){
	if($data == ''){
	$data = '0000-00-00';	
	}	
	return $data;
}

///------------

function update($id,$inputfield,$updatefield,$condition,$table){
	$inputfield = replace_single_quote_2($inputfield);
$sql = "UPDATE $table  SET $updatefield='$inputfield' WHERE $condition = '$id' ";
//echo $sql."<br/>" ;
mysql_query($sql);

}
function update2condition($id1,$id2,$inputfield,$updatefield,$condition1,$condition2,$table){
	$inputfield = replace_single_quote_2($inputfield);
$sql = "UPDATE $table  SET $updatefield='$inputfield' WHERE $condition1 = '$id1' AND  $condition2 = '$id2'";
//echo $sql."<br/>" ;
mysql_query($sql);

}

function delete($id,$condition,$table){
$sql = "DELETE FROM $table WHERE $condition = '$id' ";
//echo $sql."<br/>" ;
mysql_query($sql);

}
function delete2($id1,$condition1,$id2,$condition2,$table){ // with 2 condition
$sql = "DELETE FROM $table WHERE $condition1 = '$id1' AND  $condition2 = '$id2'";
//echo $sql."<br/>" ;
mysql_query($sql);

}

function update_proces_upload($id,$updatefield,$inputfield,$condition,$table){
	$inputfield = replace_single_quote_2($inputfield);
$sql = "UPDATE $table  SET $updatefield='$inputfield' WHERE $condition = '$id' ";
//echo $sql."<br/>" ;
mysql_query($sql);

}

function insert($inputfield,$fieldname,$table){
	$inputfield = replace_single_quote_2($inputfield);
	$insert="INSERT $table ($fieldname) 
			values
			('$inputfield')";
	//echo $insert;
	
	mysql_query($insert) or die(mysql_error());
	$next_id = mysql_insert_id();

	return $next_id;	
}
function getmonth($date) //using yy-mm-dd
{
    if (!isset($date) || $date=="")
    {
        return false;
    }
   
    list($yy,$mm,$dd)=explode("-",$date);
    if ($dd!="" && $mm!="" && $yy!="")
    {
        $result= $mm;
		return $result;
    }
   
    return false;
}
function getday($date) //using yy-mm-dd
{
    if (!isset($date) || $date=="")
    {
        return false;
    }
   
    list($yy,$mm,$dd)=explode("-",$date);
    if ($dd!="" && $mm!="" && $yy!="")
    {
        $result= $dd;
		return $result;
    }
   
    return false;
}
function getyear($date) //using yy-mm-dd
{
    if (!isset($date) || $date=="")
    {
        return false;
    }
   
    list($yy,$mm,$dd)=explode("-",$date);
    if ($dd!="" && $mm!="" && $yy!="")
    {
        $result= $yy;
		return $result;
    }
   
    return false;
}
function get2darray($getfield1,$getfield2,$table){ //get 2D array- use for selection item..
	$sqlstr = " SELECT $getfield1,$getfield2 FROM $table ORDER BY $getfield2 ASC ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i][0]=$rows[$getfield1];
	$getfield[$i][1]=$rows[$getfield2];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
}
function get2darray_flag($getfield1,$getfield2,$table){ //get 2D array- use for selection item..
	$sqlstr = " SELECT $getfield1,$getfield2 FROM $table Where flag = 1 ORDER BY $getfield2 ASC ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i][0]=$rows[$getfield1];
	$getfield[$i][1]=$rows[$getfield2];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
}
function get3darray_flag($getfield1,$getfield2,$getfield3,$table){ //get 3D array- use for selection item..
	$sqlstr = " SELECT $getfield1,$getfield2,$getfield3 FROM $table Where flag = 1 ORDER BY $getfield2 ASC ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i][0]=$rows[$getfield1];
	$getfield[$i][1]=$rows[$getfield2];
	$getfield[$i][2]=$rows[$getfield3];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
}
function get2darraywithcondition($getfield1,$getfield2,$table,$condition,$conditionfield){ //get 2D array- use for selection item with one condition..
	$sqlstr = " SELECT $getfield1,$getfield2 FROM $table WHERE $conditionfield='$condition'  ORDER BY $getfield1 ASC ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i][0]=$rows[$getfield1];
	$getfield[$i][1]=$rows[$getfield2];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
}

function get2darraywith2condition($getfield1,$getfield2,$table,$condition1,$conditionfield1,$condition2,$conditionfield2){ //get 2D array- use for selection item with 2 condition..
//echo $condition2;
	$sqlstr = " SELECT $getfield1,$getfield2 FROM $table WHERE $conditionfield1='$condition1' and $conditionfield2='$condition2'  ORDER BY $getfield2 ASC ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i][0]=$rows[$getfield1];
	$getfield[$i][1]=$rows[$getfield2];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
}
function get3darraywith2condition($getfield1,$getfield2,$getfield3,$table,$condition1,$conditionfield1,$condition2,$conditionfield2){ //get 2D array- use for selection item with 2 condition..
//echo $condition2;
	$sqlstr = " SELECT $getfield1,$getfield2,$getfield3 FROM $table WHERE $conditionfield1='$condition1' and $conditionfield2='$condition2'  ORDER BY $getfield2 ASC ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i][0]=$rows[$getfield1];
	$getfield[$i][1]=$rows[$getfield2];
	$getfield[$i][2]=$rows[$getfield3];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
}
function get4darraywith2condition($getfield1,$getfield2,$getfield3,$getfield4,$table,$condition1,$conditionfield1,$condition2,$conditionfield2){ //get 2D array- use for selection item with 2 condition..
//echo $condition2;
	$sqlstr = " SELECT $getfield1,$getfield2,$getfield3,$getfield4 FROM $table WHERE $conditionfield1='$condition1' and $conditionfield2='$condition2'  ORDER BY $getfield2 ASC ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i][0]=$rows[$getfield1];
	$getfield[$i][1]=$rows[$getfield2];
	$getfield[$i][2]=$rows[$getfield3];
	$getfield[$i][3]=$rows[$getfield4];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
}



function checkemp_ic_id($emp_ic_id){
	$countstring = strlen($emp_ic_id);
	
	if ($countstring == 12){
		return true ;
	}else{
		return false;
	}
	
}




function replace_single_quote_2($data){
	$data = str_replace("'","''",$data);
	return $data;
}

function get_calender_month($period){
	$month = "";
	if ($period == '6'){
		$month  = "June";
	}elseif  ($period == '7'){
		$month  = "July";	
	}elseif  ($period == '11'){
		$month  = "November";
	}
	return $month;
}

function get_sys_user($matrik){
	$sqlstr = " SELECT * FROM sys_user WHERE matrik = '$matrik' LIMIT 0 , 1";
	//echo $sqlstr."<br/>";
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield['id']=$rows['id'];
	$getfield['nama']=$rows['nama'];
	$getfield['matrik']=$rows['matrik'];
	$getfield['ic']=$rows['ic'];
	$getfield['email']=$rows['email'];
	$getfield['tahun']=$rows['tahun'];
	$getfield['fakulti']=$rows['fakulti'];
	$getfield['jenis']=$rows['jenis'];

	}
	return $getfield;	
	}else{
		return 0;
	}
}
function get_sys_user_list(){
	$sqlstr = " SELECT * FROM sys_user a , sys_user_jenis b WHERE a.jenis = b.jenis";
	//echo $sqlstr."<br/>";
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['id']=$rows['id'];
	$getfield[$i]['nama']=$rows['nama'];
	$getfield[$i]['matrik']=$rows['matrik'];
	$getfield[$i]['ic']=$rows['ic'];
	$getfield[$i]['email']=$rows['email'];
	$getfield[$i]['tahun']=$rows['tahun'];
	$getfield[$i]['fakulti']=$rows['fakulti'];
	$getfield[$i]['jenis']=$rows['jenis'];
	$getfield[$i]['jenis_desc']=$rows['jenis_desc'];
	
	$i++;
	}
	return $getfield;	
	}else{
		return 0;
	}
}
function get_sys_user_list_carian($selectsearch,$searchtext){
	
	if ($selectsearch == "0"){//set default $selectsearch == emp_firstname
		$selectsearch = 'a.nama' ;
	}
	$sqlstr = " SELECT * FROM sys_user a , sys_user_jenis b WHERE a.jenis = b.jenis AND $selectsearch LIKE  '%$searchtext%' ";
	//echo $sqlstr."<br/>";
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['id']=$rows['id'];
	$getfield[$i]['nama']=$rows['nama'];
	$getfield[$i]['matrik']=$rows['matrik'];
	$getfield[$i]['ic']=$rows['ic'];
	$getfield[$i]['email']=$rows['email'];
	$getfield[$i]['tahun']=$rows['tahun'];
	$getfield[$i]['fakulti']=$rows['fakulti'];
	$getfield[$i]['jenis']=$rows['jenis'];
	$getfield[$i]['jenis_desc']=$rows['jenis_desc'];
	
	$i++;
	}
	return $getfield;	
	}else{
		return 0;
	}
}
function get_daftar($id_user){
	$sqlstr = "SELECT a.id as id,a.id_user as id_user, a.nokenderaan as nokenderaan , a.tarikh_daftar as tarikh_daftar,
				a.model as model, a.no_enjin as no_enjin, a.no_chasis as no_chasis, a.upload_link as upload_link , 
				a.status as status , a.qr_code as qr_code,
				b.status_id as status_id,b.status_desc as status_desc
				FROM daftar a , status_daftar b
				WHERE 
				a.id_user = '$id_user' AND 
				a.status = b.status_id";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['id']=$rows['id'];
	$getfield[$i]['id_user']=$rows['id_user'];
	$getfield[$i]['nokenderaan']=$rows['nokenderaan'];
	$getfield[$i]['tarikh_daftar']=checkDateT($rows['tarikh_daftar']);
	$getfield[$i]['model']=$rows['model'];
	$getfield[$i]['no_enjin']=$rows['no_enjin'];
	$getfield[$i]['no_chasis']=$rows['no_chasis'];
	$getfield[$i]['upload_link']=$rows['upload_link'];
	$getfield[$i]['status']=$rows['status'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$getfield[$i]['qr_code']=$rows['qr_code'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}
function get_daftar_by_id($id){
	$sqlstr = "SELECT a.id as id,a.id_user as id_user, a.nokenderaan as nokenderaan , a.tarikh_daftar as tarikh_daftar,
				a.model as model, a.no_enjin as no_enjin, a.no_chasis as no_chasis, a.upload_link as upload_link , 
				a.status as status , a.qr_code as qr_code,
				b.status_id as status_id,b.status_desc as status_desc,
				c.nama as nama,  c.matrik as matrik, c.ic as ic, c.email as email, c.tahun as tahun, c.fakulti as fakulti
				
				FROM daftar a , status_daftar b , sys_user c
				WHERE 
				a.id = '$id' AND 
				a.id_user = c.id AND
				a.status = b.status_id";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield['id']=$rows['id'];
	$getfield['id_user']=$rows['id_user'];
	$getfield['nokenderaan']=$rows['nokenderaan'];
	$getfield['tarikh_daftar']=checkDateT($rows['tarikh_daftar']);
	$getfield['model']=$rows['model'];
	$getfield['no_enjin']=$rows['no_enjin'];
	$getfield['no_chasis']=$rows['no_chasis'];
	$getfield['upload_link']=$rows['upload_link'];
	$getfield['status']=$rows['status'];
	$getfield['status_desc']=$rows['status_desc'];
	$getfield['qr_code']=$rows['qr_code'];
	$getfield['nama']=$rows['nama'];
	$getfield['matrik']=$rows['matrik'];
	$getfield['ic']=$rows['ic'];
	$getfield['email']=$rows['email'];
	$getfield['tahun']=$rows['tahun'];
	$getfield['fakulti']=$rows['fakulti'];
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}
function get_daftar_bil_individu($id_user){
	$sqlstr = "SELECT a.id as id,a.id_user as id_user, a.nokenderaan as nokenderaan , a.tarikh_daftar as tarikh_daftar,
				a.model as model, a.no_enjin as no_enjin, a.no_chasis as no_chasis, a.upload_link as upload_link , 
				a.status as status , a.qr_code as qr_code,
				b.status_id as status_id,b.status_desc as status_desc
				FROM daftar a , status_daftar b
				WHERE 
				a.id_user = '$id_user' AND 
				a.status = '0' AND 
				a.status = b.status_id";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	return $numrows;
	
}


function get_daftar_sah(){
	$sqlstr = "SELECT a.id as id,a.id_user as id_user, a.nokenderaan as nokenderaan , a.tarikh_daftar as tarikh_daftar,
				a.model as model, a.no_enjin as no_enjin, a.no_chasis as no_chasis, a.upload_link as upload_link , 
				a.status as status , a.qr_code as qr_code ,
				b.status_id as status_id,b.status_desc as status_desc
				FROM daftar a , status_daftar b
				WHERE  
				a.status = b.status_id AND
				a.status = '0' ";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['id']=$rows['id'];
	$getfield[$i]['id_user']=$rows['id_user'];
	$getfield[$i]['nokenderaan']=$rows['nokenderaan'];
	$getfield[$i]['tarikh_daftar']=checkDateT($rows['tarikh_daftar']);
	$getfield[$i]['model']=$rows['model'];
	$getfield[$i]['no_enjin']=$rows['no_enjin'];
	$getfield[$i]['no_chasis']=$rows['no_chasis'];
	$getfield[$i]['upload_link']=$rows['upload_link'];
	$getfield[$i]['status']=$rows['status'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$getfield[$i]['qr_code']=$rows['qr_code'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}

function get_daftar_sah_bil(){
	$sqlstr = "SELECT a.id as id,a.id_user as id_user, a.nokenderaan as nokenderaan , a.tarikh_daftar as tarikh_daftar,
				a.model as model, a.no_enjin as no_enjin, a.no_chasis as no_chasis, a.upload_link as upload_link , 
				a.status as status , a.qr_code as qr_code ,
				b.status_id as status_id,b.status_desc as status_desc
				FROM daftar a , status_daftar b
				WHERE  
				a.status = b.status_id AND
				a.status = '0' ";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	
	return $numrows;	
	
	
}
function get_daftar_senarai(){
	$sqlstr = "SELECT a.id as id,a.id_user as id_user, a.nokenderaan as nokenderaan , a.tarikh_daftar as tarikh_daftar,
				a.model as model, a.no_enjin as no_enjin, a.no_chasis as no_chasis, a.upload_link as upload_link , 
				a.status as status ,
				b.status_id as status_id,b.status_desc as status_desc ,a.qr_code as qr_code,
				c.nama as nama,  c.matrik as matrik, c.ic as ic, c.email as email, c.tahun as tahun, c.fakulti as fakulti
				FROM daftar a , status_daftar b , sys_user c
				WHERE  
				a.status = b.status_id AND
				a.id_user = c.id";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['id']=$rows['id'];
	$getfield[$i]['id_user']=$rows['id_user'];
	$getfield[$i]['nokenderaan']=$rows['nokenderaan'];
	$getfield[$i]['tarikh_daftar']=checkDateT($rows['tarikh_daftar']);
	$getfield[$i]['model']=$rows['model'];
	$getfield[$i]['no_enjin']=$rows['no_enjin'];
	$getfield[$i]['no_chasis']=$rows['no_chasis'];
	$getfield[$i]['upload_link']=$rows['upload_link'];
	$getfield[$i]['status']=$rows['status'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$getfield[$i]['qr_code']=$rows['qr_code'];
	$getfield[$i]['nama']=$rows['nama'];
	$getfield[$i]['matrik']=$rows['matrik'];
	$getfield[$i]['ic']=$rows['ic'];
	$getfield[$i]['email']=$rows['email'];
	$getfield[$i]['tahun']=$rows['tahun'];
	$getfield[$i]['fakulti']=$rows['fakulti'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}
function get_daftar_senarai_carian($selectsearch,$searchtext,$limit1,$limit2){
	if ($selectsearch == "0"){//set default $selectsearch == emp_firstname
		$selectsearch = 'a.nokenderaan' ;
	}
	$sqlstr = "SELECT a.id as id,a.id_user as id_user, a.nokenderaan as nokenderaan , a.tarikh_daftar as tarikh_daftar,
				a.model as model, a.no_enjin as no_enjin, a.no_chasis as no_chasis, a.upload_link as upload_link , 
				a.status as status ,
				b.status_id as status_id,b.status_desc as status_desc ,a.qr_code as qr_code,
				c.nama as nama,  c.matrik as matrik, c.ic as ic, c.email as email, c.tahun as tahun, c.fakulti as fakulti
				FROM daftar a , status_daftar b , sys_user c
				WHERE $selectsearch LIKE  '%$searchtext%'  AND
				a.status = b.status_id AND
				a.id_user = c.id
				ORDER BY  c.nama ASC LIMIT $limit1 , $limit2 ";
				
				 
	 //echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['id']=$rows['id'];
	$getfield[$i]['id_user']=$rows['id_user'];
	$getfield[$i]['nokenderaan']=$rows['nokenderaan'];
	$getfield[$i]['tarikh_daftar']=checkDateT($rows['tarikh_daftar']);
	$getfield[$i]['model']=$rows['model'];
	$getfield[$i]['no_enjin']=$rows['no_enjin'];
	$getfield[$i]['no_chasis']=$rows['no_chasis'];
	$getfield[$i]['upload_link']=$rows['upload_link'];
	$getfield[$i]['status']=$rows['status'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$getfield[$i]['qr_code']=$rows['qr_code'];
	$getfield[$i]['nama']=$rows['nama'];
	$getfield[$i]['matrik']=$rows['matrik'];
	$getfield[$i]['ic']=$rows['ic'];
	$getfield[$i]['email']=$rows['email'];
	$getfield[$i]['tahun']=$rows['tahun'];
	$getfield[$i]['fakulti']=$rows['fakulti'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}
function get_saman_senarai(){
	$sqlstr = "SELECT 
				a.id	as	id	,
				a.id_daftar	as	id_daftar	,
				a.id_lokasi	as	id_lokasi	,
				a.id_saman	as	id_saman	,
				a.tarikh	as	tarikh	,
				a.status	as	status	,
				b.id_user	as	id_user	,
				b.nokenderaan	as	nokenderaan	,
				b.tarikh_daftar	as	tarikh_daftar	,
				b.model	as	model	,
				b.no_enjin	as	no_enjin	,
				b.no_chasis	as	no_chasis	,
				b.upload_link	as	upload_link	,
				b.qr_code	as	qr_code	,
				b.status	as	status_daftar	,
				c.namalokasi	as	namalokasi	,
				d.kesalahan	as	kesalahan	,
				d.kompaun	as	kompaun	,
				e.status_desc as status_desc,
				f.nama as nama,
				f.matrik as matrik,
				f.ic as ic,
				f.email as email,
				f.tahun as tahun,
				f.fakulti as fakulti,
				g.status_desc as status_desc
				FROM daftarsaman a,daftar b , lokasi c ,saman d ,status_daftar e, sys_user f, status_saman g
				WHERE  
				a.id_daftar = b.id AND
				a.id_lokasi = c.id AND
				a.id_saman =  d.id AND
				b.status = e.status_id AND
				a.status = g.id AND
				b.id_user = f.id"
				;
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['id']=$rows['id'];
	$getfield[$i]['id_daftar']=$rows['id_daftar'];
	$getfield[$i]['id_lokasi']=$rows['id_lokasi'];
	$getfield[$i]['id_saman']=$rows['id_saman'];
	$getfield[$i]['tarikh']=checkDateT($rows['tarikh']);
	$getfield[$i]['namalokasi']=$rows['namalokasi'];
	$getfield[$i]['kesalahan']=$rows['kesalahan'];
	$getfield[$i]['kompaun']=$rows['kompaun'];
	$getfield[$i]['id_user']=$rows['id_user'];
	$getfield[$i]['nokenderaan']=$rows['nokenderaan'];
	$getfield[$i]['tarikh_daftar']=checkDateT($rows['tarikh_daftar']);
	$getfield[$i]['model']=$rows['model'];
	$getfield[$i]['no_enjin']=$rows['no_enjin'];
	$getfield[$i]['no_chasis']=$rows['no_chasis'];
	$getfield[$i]['upload_link']=$rows['upload_link'];
	$getfield[$i]['status']=$rows['status'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$getfield[$i]['qr_code']=$rows['qr_code'];
	$getfield[$i]['nama']=$rows['nama'];
	$getfield[$i]['matrik']=$rows['matrik'];
	$getfield[$i]['ic']=$rows['ic'];
	$getfield[$i]['email']=$rows['email'];
	$getfield[$i]['tahun']=$rows['tahun'];
	$getfield[$i]['fakulti']=$rows['fakulti'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}


function get_saman_senarai_carian($nokenderaan){
	$sqlstr = "SELECT 
				a.id	as	id	,
				a.id_daftar	as	id_daftar	,
				a.id_lokasi	as	id_lokasi	,
				a.id_saman	as	id_saman	,
				a.tarikh	as	tarikh	,
				a.status	as	status	,
				b.id_user	as	id_user	,
				b.nokenderaan	as	nokenderaan	,
				b.tarikh_daftar	as	tarikh_daftar	,
				b.model	as	model	,
				b.no_enjin	as	no_enjin	,
				b.no_chasis	as	no_chasis	,
				b.upload_link	as	upload_link	,
				b.qr_code	as	qr_code	,
				b.status	as	status_daftar	,
				c.namalokasi	as	namalokasi	,
				d.kesalahan	as	kesalahan	,
				d.kompaun	as	kompaun	,
				e.status_desc as status_desc,
				f.nama as nama,
				f.matrik as matrik,
				f.ic as ic,
				f.email as email,
				f.tahun as tahun,
				f.fakulti as fakulti,
				g.status_desc as status_desc
				FROM daftarsaman a,daftar b , lokasi c ,saman d ,status_daftar e, sys_user f, status_saman g
				WHERE  
				b.nokenderaan LIKE '%$nokenderaan%' AND
				a.id_daftar = b.id AND
				a.id_lokasi = c.id AND
				a.id_saman =  d.id AND
				b.status = e.status_id AND
				a.status = g.id AND
				b.id_user = f.id"
				;
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['id']=$rows['id'];
	$getfield[$i]['id_daftar']=$rows['id_daftar'];
	$getfield[$i]['id_lokasi']=$rows['id_lokasi'];
	$getfield[$i]['id_saman']=$rows['id_saman'];
	$getfield[$i]['tarikh']=checkDateT($rows['tarikh']);
	$getfield[$i]['namalokasi']=$rows['namalokasi'];
	$getfield[$i]['kesalahan']=$rows['kesalahan'];
	$getfield[$i]['kompaun']=$rows['kompaun'];
	$getfield[$i]['id_user']=$rows['id_user'];
	$getfield[$i]['nokenderaan']=$rows['nokenderaan'];
	$getfield[$i]['tarikh_daftar']=checkDateT($rows['tarikh_daftar']);
	$getfield[$i]['model']=$rows['model'];
	$getfield[$i]['no_enjin']=$rows['no_enjin'];
	$getfield[$i]['no_chasis']=$rows['no_chasis'];
	$getfield[$i]['upload_link']=$rows['upload_link'];
	$getfield[$i]['status']=$rows['status'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$getfield[$i]['qr_code']=$rows['qr_code'];
	$getfield[$i]['nama']=$rows['nama'];
	$getfield[$i]['matrik']=$rows['matrik'];
	$getfield[$i]['ic']=$rows['ic'];
	$getfield[$i]['email']=$rows['email'];
	$getfield[$i]['tahun']=$rows['tahun'];
	$getfield[$i]['fakulti']=$rows['fakulti'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}
function get_saman_senarai_individu($id_user){
	$sqlstr = "SELECT 
				a.id	as	id	,
				a.id_daftar	as	id_daftar	,
				a.id_lokasi	as	id_lokasi	,
				a.id_saman	as	id_saman	,
				a.tarikh	as	tarikh	,
				a.status	as	status	,
				b.id_user	as	id_user	,
				b.nokenderaan	as	nokenderaan	,
				b.tarikh_daftar	as	tarikh_daftar	,
				b.model	as	model	,
				b.no_enjin	as	no_enjin	,
				b.no_chasis	as	no_chasis	,
				b.upload_link	as	upload_link	,
				b.qr_code	as	qr_code	,
				b.status	as	status_daftar	,
				c.namalokasi	as	namalokasi	,
				d.kesalahan	as	kesalahan	,
				d.kompaun	as	kompaun	,
				e.status_desc as status_desc,
				f.nama as nama,
				f.matrik as matrik,
				f.ic as ic,
				f.email as email,
				f.tahun as tahun,
				f.fakulti as fakulti,
				g.status_desc as status_desc
				FROM daftarsaman a,daftar b , lokasi c ,saman d ,status_daftar e, sys_user f, status_saman g
				WHERE  
				a.id_daftar = b.id AND
				a.id_lokasi = c.id AND
				a.id_saman =  d.id AND
				b.status = e.status_id AND
				a.status = g.id AND
				b.id_user = '$id_user' AND
				b.id_user = f.id"
				;
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['id']=$rows['id'];
	$getfield[$i]['id_daftar']=$rows['id_daftar'];
	$getfield[$i]['id_lokasi']=$rows['id_lokasi'];
	$getfield[$i]['id_saman']=$rows['id_saman'];
	$getfield[$i]['tarikh']=checkDateT($rows['tarikh']);
	$getfield[$i]['namalokasi']=$rows['namalokasi'];
	$getfield[$i]['kesalahan']=$rows['kesalahan'];
	$getfield[$i]['kompaun']=$rows['kompaun'];
	$getfield[$i]['id_user']=$rows['id_user'];
	$getfield[$i]['nokenderaan']=$rows['nokenderaan'];
	$getfield[$i]['tarikh_daftar']=checkDateT($rows['tarikh_daftar']);
	$getfield[$i]['model']=$rows['model'];
	$getfield[$i]['no_enjin']=$rows['no_enjin'];
	$getfield[$i]['no_chasis']=$rows['no_chasis'];
	$getfield[$i]['upload_link']=$rows['upload_link'];
	$getfield[$i]['status']=$rows['status'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$getfield[$i]['qr_code']=$rows['qr_code'];
	$getfield[$i]['nama']=$rows['nama'];
	$getfield[$i]['matrik']=$rows['matrik'];
	$getfield[$i]['ic']=$rows['ic'];
	$getfield[$i]['email']=$rows['email'];
	$getfield[$i]['tahun']=$rows['tahun'];
	$getfield[$i]['fakulti']=$rows['fakulti'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}
function get_saman_senarai_tindakan(){
	$sqlstr = "SELECT 
				a.id	as	id	,
				a.id_daftar	as	id_daftar	,
				a.id_lokasi	as	id_lokasi	,
				a.id_saman	as	id_saman	,
				a.tarikh	as	tarikh	,
				a.status	as	status	,
				b.id_user	as	id_user	,
				b.nokenderaan	as	nokenderaan	,
				b.tarikh_daftar	as	tarikh_daftar	,
				b.model	as	model	,
				b.no_enjin	as	no_enjin	,
				b.no_chasis	as	no_chasis	,
				b.upload_link	as	upload_link	,
				b.qr_code	as	qr_code	,
				b.status	as	status_daftar	,
				c.namalokasi	as	namalokasi	,
				d.kesalahan	as	kesalahan	,
				d.kompaun	as	kompaun	,
				e.status_desc as status_desc,
				f.nama as nama,
				f.matrik as matrik,
				f.ic as ic,
				f.email as email,
				f.tahun as tahun,
				f.fakulti as fakulti,
				g.status_desc as status_desc
				FROM daftarsaman a,daftar b , lokasi c ,saman d ,status_daftar e, sys_user f, status_saman g
				WHERE  
				a.status = '0' AND
				a.id_daftar = b.id AND
				a.id_lokasi = c.id AND
				a.id_saman =  d.id AND
				b.status = e.status_id AND
				a.status = g.id AND
				b.id_user = f.id"
				;
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['id']=$rows['id'];
	$getfield[$i]['id_daftar']=$rows['id_daftar'];
	$getfield[$i]['id_lokasi']=$rows['id_lokasi'];
	$getfield[$i]['id_saman']=$rows['id_saman'];
	$getfield[$i]['tarikh']=checkDateT($rows['tarikh']);
	$getfield[$i]['namalokasi']=$rows['namalokasi'];
	$getfield[$i]['kesalahan']=$rows['kesalahan'];
	$getfield[$i]['kompaun']=$rows['kompaun'];
	$getfield[$i]['id_user']=$rows['id_user'];
	$getfield[$i]['nokenderaan']=$rows['nokenderaan'];
	$getfield[$i]['tarikh_daftar']=checkDateT($rows['tarikh_daftar']);
	$getfield[$i]['model']=$rows['model'];
	$getfield[$i]['no_enjin']=$rows['no_enjin'];
	$getfield[$i]['no_chasis']=$rows['no_chasis'];
	$getfield[$i]['upload_link']=$rows['upload_link'];
	$getfield[$i]['status']=$rows['status'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$getfield[$i]['qr_code']=$rows['qr_code'];
	$getfield[$i]['nama']=$rows['nama'];
	$getfield[$i]['matrik']=$rows['matrik'];
	$getfield[$i]['ic']=$rows['ic'];
	$getfield[$i]['email']=$rows['email'];
	$getfield[$i]['tahun']=$rows['tahun'];
	$getfield[$i]['fakulti']=$rows['fakulti'];
	$getfield[$i]['status_desc']=$rows['status_desc'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}

function get_saman_senarai_tindakan_bil(){
	$sqlstr = "SELECT 
				a.id	as	id	,
				a.id_daftar	as	id_daftar	,
				a.id_lokasi	as	id_lokasi	,
				a.id_saman	as	id_saman	,
				a.tarikh	as	tarikh	,
				a.status	as	status	,
				b.id_user	as	id_user	,
				b.nokenderaan	as	nokenderaan	,
				b.tarikh_daftar	as	tarikh_daftar	,
				b.model	as	model	,
				b.no_enjin	as	no_enjin	,
				b.no_chasis	as	no_chasis	,
				b.upload_link	as	upload_link	,
				b.qr_code	as	qr_code	,
				b.status	as	status_daftar	,
				c.namalokasi	as	namalokasi	,
				d.kesalahan	as	kesalahan	,
				d.kompaun	as	kompaun	,
				e.status_desc as status_desc,
				f.nama as nama,
				f.matrik as matrik,
				f.ic as ic,
				f.email as email,
				f.tahun as tahun,
				f.fakulti as fakulti,
				g.status_desc as status_desc
				FROM daftarsaman a,daftar b , lokasi c ,saman d ,status_daftar e, sys_user f, status_saman g
				WHERE  
				a.status = '0' AND
				a.id_daftar = b.id AND
				a.id_lokasi = c.id AND
				a.id_saman =  d.id AND
				b.status = e.status_id AND
				a.status = g.id AND
				b.id_user = f.id"
				;
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	 return $numrows; 
	
}
function get_saman_senarai_tindakan_bil_individu($id_user){
	$sqlstr = "SELECT 
				a.id	as	id	,
				a.id_daftar	as	id_daftar	,
				a.id_lokasi	as	id_lokasi	,
				a.id_saman	as	id_saman	,
				a.tarikh	as	tarikh	,
				a.status	as	status	,
				b.id_user	as	id_user	,
				b.nokenderaan	as	nokenderaan	,
				b.tarikh_daftar	as	tarikh_daftar	,
				b.model	as	model	,
				b.no_enjin	as	no_enjin	,
				b.no_chasis	as	no_chasis	,
				b.upload_link	as	upload_link	,
				b.qr_code	as	qr_code	,
				b.status	as	status_daftar	,
				c.namalokasi	as	namalokasi	,
				d.kesalahan	as	kesalahan	,
				d.kompaun	as	kompaun	,
				e.status_desc as status_desc,
				f.nama as nama,
				f.matrik as matrik,
				f.ic as ic,
				f.email as email,
				f.tahun as tahun,
				f.fakulti as fakulti,
				g.status_desc as status_desc
				FROM daftarsaman a,daftar b , lokasi c ,saman d ,status_daftar e, sys_user f, status_saman g
				WHERE  
				a.status = '0' AND
				a.id_daftar = b.id AND
				a.id_lokasi = c.id AND
				a.id_saman =  d.id AND
				b.status = e.status_id AND
				a.status = g.id AND
				b.id_user = '$id_user' AND
				b.id_user = f.id"
				;
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	 return $numrows; 
	
}
function get_single_claim_expenses_flag($wage_type){
$sqlstr = "SELECT *
				FROM hs_hr_claim_expenses
				WHERE 
				wage_type = '$wage_type' and flag='1' LIMIT 0 ,1";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield['claim_expenses_id']=$rows['claim_expenses_id'];
	$getfield['wage_type']=$rows['wage_type'];
	$getfield['descp']=$rows['descp'];
	$getfield['gl_code']=$rows['gl_code'];
	$getfield['gst_code']=$rows['gst_code'];
	$getfield['gst_tax']=$rows['gst_tax'];
	$getfield['gst_wage_type']=$rows['gst_wage_type'];
	$getfield['mileage_able']=$rows['mileage_able'];
	$getfield['mileage_rate']=$rows['mileage_rate'];
	$getfield['flag']=$rows['flag'];
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}


function get_single_claim_form_item($claim_form_item_id){
	$sqlstr = "SELECT *
				FROM hs_hr_claim_form_item
				WHERE 
				claim_form_item_id = '$claim_form_item_id' LIMIT 0 ,1";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield['claim_form_item_id']=$rows['claim_form_item_id'];
	$getfield['claim_form_id']=$rows['claim_form_id'];
	$getfield['claim_action_status_id']=$rows['claim_action_status_id'];
	$getfield['claim_item_date']=$rows['claim_item_date'];
	$getfield['location']=$rows['location'];
	$getfield['expenses']=$rows['expenses'];
	$getfield['wage_type']=$rows['wage_type'];
	$getfield['gl_code']=$rows['gl_code'];
	$getfield['wbs_project']=$rows['wbs_project'];
	$getfield['back_charge']=$rows['back_charge'];
	$getfield['remark']=$rows['remark'];
	$getfield['gst_code']=$rows['gst_code'];
	$getfield['gst_wage_type']=$rows['gst_wage_type'];
	$getfield['mileage_km']=$rows['mileage_km'];
	$getfield['mileage_rate']=$rows['mileage_rate'];
	$getfield['currency']=$rows['currency'];
	$getfield['exchange_rate']=$rows['exchange_rate'];
	$getfield['foreign_amount']=$rows['foreign_amount'];
	$getfield['local_amount']=$rows['local_amount'];
	$getfield['local_gst_amount']=$rows['local_gst_amount'];
	$getfield['entitlement_limit']=$rows['entitlement_limit'];
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}

function dashreturn1($value){
	if($value == "0"){
		return 	""	;
	}else{
		return $value;
	}
}

function claim_audit_log($claim_form_id,$action_by,$action_taken){
	
	$insert="INSERT hs_hr_claim_action_log ( claim_form_id, action_by, action_taken) 
			values
			('$claim_form_id','$action_by','$action_taken')";
	//echo $insert;
	
	mysql_query($insert) or die(mysql_error());
}

function get_form_approval($claim_form_id){  //get single value with 2 codition.
	$sqlstr = "SELECT a.claim_form_approval_id as claim_form_approval_id ,a.claim_status_id as claim_status_id  , a.time_stamp as time_stamp, b.descp as descp , b.descp2 as descp2
				FROM hs_hr_claim_form_approval a, hs_hr_claim_status b
				WHERE 
				a.claim_status_id = b.claim_status_id AND
				a.claim_form_id = '$claim_form_id'";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['claim_form_approval_id']=$rows['claim_form_approval_id'];
	$getfield[$i]['claim_status_id']=$rows['claim_status_id'];
	$getfield[$i]['time_stamp']=$rows['time_stamp'];
	$getfield[$i]['descp']=$rows['descp'];
	$getfield[$i]['descp2']=$rows['descp2'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}

function get_claim_form_resp($claim_form_id){  //get single value with 2 codition.
	$sqlstr = "SELECT *
				FROM hs_hr_claim_form_resp
				WHERE 
				claim_form_id = '$claim_form_id'";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['claim_form_id']=$rows['claim_form_id'];
	$getfield[$i]['claim_responsibility_id']=$rows['claim_responsibility_id'];
	$getfield[$i]['emp_id']=$rows['emp_id'];
	$getfield[$i]['emp_name']=$rows['emp_name'];
	$getfield[$i]['emp_email']=$rows['emp_email'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}





function get_claim_expenses(){
	$sqlstr = "SELECT *
				FROM hs_hr_claim_expenses
				WHERE 
				flag = '1'
				ORDER BY  descp ASC ";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['claim_expenses_id']=$rows['claim_expenses_id'];
	$getfield[$i]['wage_type']=$rows['wage_type'];
	$getfield[$i]['descp']=$rows['descp'];
	$getfield[$i]['gl_code']=$rows['gl_code'];
	$getfield[$i]['gst_code']=$rows['gst_code'];
	$getfield[$i]['gst_tax']=$rows['gst_tax'];
	$getfield[$i]['gst_wage_type']=$rows['gst_wage_type'];
	$getfield[$i]['mileage_able']=$rows['mileage_able'];
	
	$getfield[$i]['flag']=$rows['flag'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}

function insert_claim_form_approval ($claim_form_id,$claim_status_id){
$insert="INSERT hs_hr_claim_form_approval (claim_form_id,claim_status_id,time_stamp) 
values
('$claim_form_id','$claim_status_id',NOW())";
//echo $insert ;
mysql_query($insert) or die(mysql_error());

}

function insert_claim_form_resp ($claim_form_id,$claim_responsibility_id,$emp_id,$emp_name,$emp_email){
$emp_name = replace_single_quote_2($emp_name);
$insert="INSERT hs_hr_claim_form_resp (claim_form_id,claim_responsibility_id,emp_id,emp_name,emp_email) 
values
('$claim_form_id','$claim_responsibility_id','$emp_id','$emp_name','$emp_email')";
//echo $insert."<br/> ";
mysql_query($insert) or die(mysql_error());
}
function getexpenseslist($selectsearch,$searchtext,$limit1,$limit2,$emp_job_grade,$emp_company_code){
	if ($selectsearch == "0"){//set default $selectsearch == emp_firstname
		$selectsearch = 'a.wage_type' ;
	}
	$sqlstr = "SELECT * FROM hs_hr_claim_expenses a , hs_hr_claim_rules_regulations b WHERE a.wage_type=b.wage_type and a.flag ='1' and b.flag ='1' AND $selectsearch LIKE  '%$searchtext%'
	AND (b.claim_job_grade_descp = 'ALL' or claim_job_grade_descp='$emp_job_grade')  and (b.company_code='ALL' or company_code='$emp_company_code')	
	ORDER BY  a.descp ASC LIMIT $limit1 , $limit2 ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getexpenseslist[$i]['claim_expenses_id']=$rows['claim_expenses_id'];
	$getexpenseslist[$i]['wage_type']=$rows['wage_type'];
	$getexpenseslist[$i]['descp']=$rows['descp'];
	$getexpenseslist[$i]['gl_code']=$rows['gl_code'];
	$getexpenseslist[$i]['gst_code']=$rows['gst_code'];
	$getexpenseslist[$i]['gst_tax']=$rows['gst_tax'];
	$getexpenseslist[$i]['gst_wage_type']=$rows['gst_wage_type'];
	$getexpenseslist[$i]['mileage_able']=$rows['mileage_able'];	
	$getexpenseslist[$i]['claim_job_grade_descp']=$rows['claim_job_grade_descp'];
	$getexpenseslist[$i]['company_code']=$rows['company_code'];
	$getexpenseslist[$i]['entitlement_limit']=$rows['entitlement_limit'];
	$i++;
	}
	return $getexpenseslist;	
	}
	else{
	return 0 ;	
		
	}
}
function getexpenseslistadmin($selectsearch,$searchtext,$limit1,$limit2,$emp_job_grade,$emp_company_code){
	if ($selectsearch == "0"){//set default $selectsearch == emp_firstname
		$selectsearch = 'wage_type' ;
	}
	if ($selectsearch =='a.wage_type'){
		$selectsearch = 'wage_type' ;
	}
	if ($selectsearch =='a.descp'){
		$selectsearch = 'descp' ;
	}
	if ($selectsearch =='a.gl_code'){
		$selectsearch = 'gl_code' ;
	}
	$sqlstr = "SELECT * FROM hs_hr_claim_expenses WHERE flag ='1'  AND $selectsearch LIKE  '%$searchtext%'
	ORDER BY descp ASC LIMIT $limit1 , $limit2 ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getexpenseslist[$i]['claim_expenses_id']=$rows['claim_expenses_id'];
	$getexpenseslist[$i]['wage_type']=$rows['wage_type'];
	$getexpenseslist[$i]['descp']=$rows['descp'];
	$getexpenseslist[$i]['gl_code']=$rows['gl_code'];
	$getexpenseslist[$i]['gst_code']=$rows['gst_code'];
	$getexpenseslist[$i]['gst_tax']=$rows['gst_tax'];
	$getexpenseslist[$i]['gst_wage_type']=$rows['gst_wage_type'];
	$getexpenseslist[$i]['mileage_able']=$rows['mileage_able'];	
	$i++;
	}
	return $getexpenseslist;	
	}
	else{
	return 0 ;	
		
	}
}
function getexpenseslist_selection($emp_job_grade,$emp_company_code){

	$sqlstr = "SELECT * FROM hs_hr_claim_expenses a , hs_hr_claim_rules_regulations b WHERE a.wage_type=b.wage_type and a.flag ='1' and b.flag ='1' 
	AND (b.claim_job_grade_descp = 'ALL' or claim_job_grade_descp='$emp_job_grade')  and (b.company_code='ALL' or company_code='$emp_company_code')	
	ORDER BY  a.descp ASC";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getexpenseslist[$i]['claim_expenses_id']=$rows['claim_expenses_id'];
	$getexpenseslist[$i]['wage_type']=$rows['wage_type'];
	$getexpenseslist[$i]['descp']=$rows['descp'];
	$getexpenseslist[$i]['gl_code']=$rows['gl_code'];
	$getexpenseslist[$i]['gst_code']=$rows['gst_code'];
	$getexpenseslist[$i]['gst_tax']=$rows['gst_tax'];
	$getexpenseslist[$i]['gst_wage_type']=$rows['gst_wage_type'];
	$getexpenseslist[$i]['mileage_able']=$rows['mileage_able'];	
	$getexpenseslist[$i]['claim_job_grade_descp']=$rows['claim_job_grade_descp'];
	$getexpenseslist[$i]['company_code']=$rows['company_code'];
	$getexpenseslist[$i]['entitlement_limit']=$rows['entitlement_limit'];
	$i++;
	}
	return $getexpenseslist;	
	}
	else{
	return 0 ;	
		
	}
}

function getexpenseslist_selection_single($emp_job_grade,$emp_company_code,$claim_expenses_id){

	$sqlstr = "SELECT * FROM hs_hr_claim_expenses a , hs_hr_claim_rules_regulations b WHERE a.wage_type=b.wage_type and a.flag ='1' and b.flag ='1' 
	AND (b.claim_job_grade_descp = 'ALL' or claim_job_grade_descp='$emp_job_grade')  and (b.company_code='ALL' or company_code='$emp_company_code' ) AND a.claim_expenses_id='$claim_expenses_id'	
	ORDER BY  a.descp ASC";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getexpenseslist['claim_expenses_id']=$rows['claim_expenses_id'];
	$getexpenseslist['wage_type']=$rows['wage_type'];
	$getexpenseslist['descp']=$rows['descp'];
	$getexpenseslist['gl_code']=$rows['gl_code'];
	$getexpenseslist['gst_code']=$rows['gst_code'];
	$getexpenseslist['gst_tax']=$rows['gst_tax'];
	$getexpenseslist['gst_wage_type']=$rows['gst_wage_type'];
	$getexpenseslist['mileage_able']=$rows['mileage_able'];	
	$getexpenseslist['mileage_rate']=$rows['mileage_rate'];	
	$getexpenseslist['year_limit']=$rows['year_limit'];	
	$getexpenseslist['claim_job_grade_descp']=$rows['claim_job_grade_descp'];
	$getexpenseslist['company_code']=$rows['company_code'];
	$getexpenseslist['entitlement_limit']=$rows['entitlement_limit'];
	$i++;
	}
	return $getexpenseslist;	
	}
	else{
	return 0 ;	
		
	}
}
function getexpenseslist_selection_emp($employee_id){

	$sqlstr = "SELECT * FROM hs_hr_claim_expenses a , hs_hr_claim_rules_regulations_employee b WHERE a.claim_expenses_id=b.claim_expenses_id and a.flag ='1' and b.flag ='1'
	and b.on_selection ='1' and b.employee_id='$employee_id'
	ORDER BY  a.descp ASC";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getexpenseslist[$i]['claim_expenses_id']=$rows['claim_expenses_id'];
	$getexpenseslist[$i]['wage_type']=$rows['wage_type'];
	$getexpenseslist[$i]['descp']=$rows['descp'];
	$getexpenseslist[$i]['gl_code']=$rows['gl_code'];
	$getexpenseslist[$i]['gst_code']=$rows['gst_code'];
	$getexpenseslist[$i]['gst_tax']=$rows['gst_tax'];
	$getexpenseslist[$i]['gst_wage_type']=$rows['gst_wage_type'];
	$getexpenseslist[$i]['mileage_able']=$rows['mileage_able'];	
	//$getexpenseslist[$i]['claim_job_grade_descp']=$rows['claim_job_grade_descp'];
	//$getexpenseslist[$i]['company_code']=$rows['company_code'];
	$getexpenseslist[$i]['entitlement_limit']=$rows['entitlement_limit'];
	$i++;
	}
	return $getexpenseslist;	
	}
	else{
	return 0 ;	
		
	}
}
function getexpenseslist_selection_single_emp($employee_id,$claim_expenses_id){

	$sqlstr = "SELECT * FROM hs_hr_claim_expenses a , hs_hr_claim_rules_regulations_employee b WHERE a.claim_expenses_id=b.claim_expenses_id and a.flag ='1' and b.flag ='1'
	AND b.claim_expenses_id='$claim_expenses_id'
	ORDER BY  a.descp ASC";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getexpenseslist['claim_expenses_id']=$rows['claim_expenses_id'];
	$getexpenseslist['wage_type']=$rows['wage_type'];
	$getexpenseslist['descp']=$rows['descp'];
	$getexpenseslist['gl_code']=$rows['gl_code'];
	$getexpenseslist['gst_code']=$rows['gst_code'];
	$getexpenseslist['gst_tax']=$rows['gst_tax'];
	$getexpenseslist['gst_wage_type']=$rows['gst_wage_type'];
	$getexpenseslist['mileage_able']=$rows['mileage_able'];	
	$getexpenseslist['mileage_rate']=$rows['mileage_rate'];	
	$getexpenseslist['year_limit']=$rows['year_limit'];	
	//$getexpenseslist['claim_job_grade_descp']=$rows['claim_job_grade_descp'];
	//$getexpenseslist['company_code']=$rows['company_code'];
	$getexpenseslist['entitlement_limit']=$rows['entitlement_limit'];
	$i++;
	}
	return $getexpenseslist;	
	}
	else{
	return 0 ;	
		
	}
}
function getwbsprojectlist($selectsearch,$searchtext,$limit1,$limit2){
	if ($selectsearch == "0"){//set default $selectsearch == emp_firstname
		$selectsearch = 'wbs_project' ;
	}
	$sqlstr = "SELECT * FROM hs_hr_claim_wbs_project WHERE flag ='1' AND $selectsearch LIKE  '%$searchtext%'  
	
	ORDER BY  descp ASC LIMIT $limit1 , $limit2 ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getwbsprojectlist[$i]['claim_wbs_project_id']=$rows['claim_wbs_project_id'];
	$getwbsprojectlist[$i]['wbs_project']=$rows['wbs_project'];
	$getwbsprojectlist[$i]['descp']=$rows['descp'];
	$getwbsprojectlist[$i]['flag']=$rows['flag'];
	$i++;
	}
	return $getwbsprojectlist;	
	}
	else{
	return 0 ;	
		
	}
}

function getbackchargelist($selectsearch,$searchtext,$limit1,$limit2){
	if ($selectsearch == "0"){//set default $selectsearch == emp_firstname
		$selectsearch = 'back_charge' ;
	}
	$sqlstr = "SELECT * FROM hs_hr_claim_back_charge WHERE flag ='1' AND $selectsearch LIKE  '%$searchtext%'  
	
	ORDER BY  descp ASC LIMIT $limit1 , $limit2 ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getbackchargelist[$i]['claim_back_charge_id']=$rows['claim_back_charge_id'];
	$getbackchargelist[$i]['back_charge']=$rows['back_charge'];
	$getbackchargelist[$i]['descp']=$rows['descp'];
	$getbackchargelist[$i]['flag']=$rows['flag'];
	$i++;
	}
	return $getbackchargelist;	
	}
	else{
	return 0 ;	
		
	}
}

function get_claim_rules_regulations($selectsearch,$searchtext,$limit1,$limit2){
	if ($selectsearch == "0"){//set default $selectsearch == emp_firstname
		$selectsearch = 'a.wage_type' ;
	}
	$sqlstr = "SELECT a.claim_rules_regulations_id as claim_rules_regulations_id, a.wage_type as wage_type, a.claim_job_grade_descp as claim_job_grade_descp, a.company_code as company_code,
				a.entitlement_limit as entitlement_limit, b.descp as descp , c.company_name as company_name , a.flag as flag
				
				FROM hs_hr_claim_rules_regulations a, hs_hr_claim_expenses b ,hs_hr_claim_company c
				WHERE
				 a.`wage_type` = b.`wage_type` AND 
				 (a.company_code= c.company_code OR a.company_code ='ALL' ) AND
				 a.flag = '1' and b.flag = '1' AND
				 $selectsearch LIKE  '%$searchtext%'
				GROUP BY  b.descp, a.company_code , a.claim_job_grade_descp 
				ORDER BY  b.descp, a.company_code , a.claim_job_grade_descp  ASC LIMIT $limit1 , $limit2 ";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['claim_rules_regulations_id']=$rows['claim_rules_regulations_id'];
	$getfield[$i]['wage_type']=$rows['wage_type'];
	$getfield[$i]['claim_job_grade_descp']=$rows['claim_job_grade_descp'];
	$getfield[$i]['company_code']=$rows['company_code'];
	$getfield[$i]['company_name']=$rows['company_name'];
	$getfield[$i]['entitlement_limit']=$rows['entitlement_limit'];
	$getfield[$i]['descp']=$rows['descp'];
	$getfield[$i]['flag']=$rows['flag'];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}
function get_claim_rules_regulations_emp($selectsearch,$searchtext,$limit1,$limit2){
	if ($selectsearch == "0"){//set default $selectsearch == emp_firstname
		$selectsearch = 'a.employee_id' ;
	}
	$sqlstr = "SELECT a.rules_regulations_employee_id as rules_regulations_employee_id, a.claim_expenses_id as claim_expenses_id, a.employee_id as employee_id, b.wage_type as wage_type, 
				a.entitlement_limit as entitlement_limit, b.descp as descp ,c.emp_name as emp_name,a.on_selection as on_selection
				
				FROM hs_hr_claim_rules_regulations_employee a, hs_hr_claim_expenses b ,hs_hr_salary_emp c
				WHERE
				
				 a.`claim_expenses_id` = b.`claim_expenses_id` AND 
				 a.flag = '1' and b.flag = '1' AND
				 a.employee_id = c.employee_id AND
				 $selectsearch LIKE  '%$searchtext%'
				
				ORDER BY  a.employee_id  ASC LIMIT $limit1 , $limit2 ";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['rules_regulations_employee_id']=$rows['rules_regulations_employee_id'];
	$getfield[$i]['claim_expenses_id']=$rows['claim_expenses_id'];
	$getfield[$i]['employee_id']=$rows['employee_id'];
	$getfield[$i]['emp_name']=$rows['emp_name'];
	$getfield[$i]['wage_type']=$rows['wage_type'];
	$getfield[$i]['on_selection']=$rows['on_selection'];
	$getfield[$i]['entitlement_limit']=$rows['entitlement_limit'];
	$getfield[$i]['descp']=$rows['descp'];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}
function get_claim_expenses_direct_hr($selectsearch,$searchtext,$limit1,$limit2){
	if ($selectsearch == "0"){
		$selectsearch = 'a.wage_type' ;
	}
	$sqlstr = "SELECT a.claim_expenses_direct_hr_id as claim_expenses_direct_hr_id, a.wage_type as wage_type,a.company_code as company_code,
				b.descp as descp , c.company_name as company_name , a.flag as flag
				
				FROM hs_hr_claim_expenses_direct_hr a, hs_hr_claim_expenses b ,hs_hr_claim_company c
				WHERE
				 a.`wage_type` = b.`wage_type` AND 
				a.flag = '1' and b.flag = '1' AND
				a.company_code= c.company_code AND
				$selectsearch LIKE  '%$searchtext%'
				GROUP BY  b.descp, a.company_code
				ORDER BY  b.descp, a.company_code   ASC LIMIT $limit1 , $limit2 ";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['claim_expenses_direct_hr_id']=$rows['claim_expenses_direct_hr_id'];
	$getfield[$i]['wage_type']=$rows['wage_type'];
	$getfield[$i]['company_code']=$rows['company_code'];
	$getfield[$i]['company_name']=$rows['company_name'];
	$getfield[$i]['descp']=$rows['descp'];
	$getfield[$i]['flag']=$rows['flag'];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}

function get_sum_total_claim($claim_form_id){
	$sqlstr = "SELECT SUM(local_amount) AS local_amount, SUM(local_gst_amount) AS local_gst_amount, SUM(local_amount) + SUM(local_gst_amount) AS total
				FROM  hs_hr_claim_form_item  
				WHERE claim_form_id = '$claim_form_id'LIMIT 0 , 1";
	
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	//echo $sqlresult;
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield['local_amount']=$rows['local_amount'];
	$getfield['local_gst_amount']=$rows['local_gst_amount'];
	$getfield['total']=$rows['total'];
	//echo  $getfield ;
	}
	return $getfield;	
	}else{
		return 0;
	}
}
function get_my_claim_form($employee_id,$claim_status_id_bulk){ // ALL->all status,TO_ACT -> other than 5 n 0 n -1 , number -> by status
	if ($claim_status_id_bulk =='ALL'){
		$empcontion = "AND a.employee_id = '$employee_id'" ;
		$condition = "AND a.flag ='1'";	
		$condition1 = "";
		$condition2 = "";
	}elseif($claim_status_id_bulk =='TO_ACT'){
		$empcontion = "AND a.employee_id = '$employee_id'" ;
		$condition = "AND (a.claim_status_id <> '5' AND a.claim_status_id <> '-1')";
		$condition1 = "";
		$condition2 = "";	
	}elseif($claim_status_id_bulk =='MY_CLAIM'){
		$empcontion = "AND a.employee_id = '$employee_id'" ;
		$condition = "";
		$condition1 = "";
		$condition2 = "";	
	}elseif($claim_status_id_bulk =='TO_ACT_ONBEHALF'){	
		$empcontion = "" ;
		$condition = "AND (a.claim_status_id <> '5' AND a.claim_status_id <> '-1')";
		$condition1 =	" , hs_hr_claim_form_resp c ";
		$condition2 =	" AND a.claim_form_id = c.claim_form_id AND c.emp_id = '$employee_id' AND c.claim_responsibility_id ='0' ";
	}else{
		$empcontion = "AND a.employee_id = '$employee_id'" ;
		$condition = "AND a.flag ='1' AND a.claim_status_id='$claim_status_id_bulk'";
		$condition1 = "";
		$condition2 = "";	
	}
	$sqlstr = "SELECT 
					a.claim_form_id  as claim_form_id ,	  
					a.employee_id as employee_id ,	  
					a.id_SAP  as id_SAP ,	  
					a.claim_form_date as claim_form_date ,	  
					a.claim_advance  as claim_advance ,	  	
					a.emp_company_code  as emp_company_code ,	  
					a.emp_company  as emp_company ,	  
					a.emp_name 	 as emp_name ,	  
					a.emp_department as emp_department ,	   		
					a.emp_position  as emp_position ,	  
					a.emp_job_grade  as emp_job_grade ,	  
					a.emp_cost_center as emp_cost_center ,	  	 	
					a.claim_descp  as claim_descp ,	  
					a.emp_project as emp_project ,	  	 
					a.claim_status_id as claim_status_id ,	  
					b.descp  as claim_status_descp ,
					b.descp2  as claim_status_descp2 ,  	
					a.remark as remark ,
					a.current_change  as current_change ,	
					a.claim_form_app_date  as claim_form_app_date ,   		
					a.flag as flag
				FROM hs_hr_claim_form a,hs_hr_claim_status b $condition1
				WHERE 
				 a.claim_status_id = b.claim_status_id 
				 $empcontion 
				 $condition
				 $condition2
				 ORDER BY a.claim_form_id ASC ";
				
				 
	//echo $sqlstr."<br/>";
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	$i=0;
	if ($numrows> 0){
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['claim_form_id']=$rows['claim_form_id'];
	$getfield[$i]['employee_id']=$rows['employee_id'];
	$getfield[$i]['id_SAP']=$rows['id_SAP'];
	$getfield[$i]['claim_form_date']=$rows['claim_form_date'];
	$getfield[$i]['claim_advance']=$rows['claim_advance'];
	$getfield[$i]['emp_company_code']=$rows['emp_company_code'];
	$getfield[$i]['emp_company']=$rows['emp_company'];
	$getfield[$i]['emp_name']=$rows['emp_name'];
	$getfield[$i]['emp_department']=$rows['emp_department'];
	$getfield[$i]['emp_position']=$rows['emp_position'];
	$getfield[$i]['emp_job_grade']=$rows['emp_job_grade'];
	$getfield[$i]['emp_cost_center']=$rows['emp_cost_center'];
	$getfield[$i]['claim_descp']=$rows['claim_descp'];
	$getfield[$i]['emp_project']=$rows['emp_project'];
	$getfield[$i]['claim_status_id']=$rows['claim_status_id'];
	$getfield[$i]['claim_status_descp']=$rows['claim_status_descp'];
	$getfield[$i]['claim_status_descp2']=$rows['claim_status_descp2'];
	$getfield[$i]['remark']=$rows['remark'];
	$getfield[$i]['current_change']=$rows['current_change'];
	$getfield[$i]['claim_form_app_date']=$rows['claim_form_app_date'];
	$getfield[$i]['flag']=$rows['flag'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}

function getfilename_ftp(){ //file name depend on date
    	$mon = date("m");
	$year = date("Y");
	$date = new DateTime($year.'-'.$mon.'-12');
	$date2 = new DateTime($year.'-'.$mon.'-12');
 	$dateEnd = $year.'-'.$mon.'-12';
	$date->modify('-1 month');
	$date2->modify('+1 month');
	
	$dateNext = $date2->format('Y-m-d');
	$dateNextM = $date2->format('m');
	$dateNextY = $date2->format('Y');
	
	$dateStart = $date->format('Y-m-d');
	$dateStartM = $date->format('m');
	$dateStartY = $date->format('Y');
	
	$dates = new DateTime($dateStart);
	$datee = new DateTime($dateEnd);
	$dateEndM = $datee->format('m');
	$ddateEndY = $datee->format('Y');
	
 	$datecurrent = date('Y-m-d');
	$datecurrent = new DateTime($datecurrent);
	if ( $datecurrent > $dates && $datecurrent <= $datee){
		$fileRename = $ddateEndY.$dateEndM."13";
	}elseif( $datecurrent <= $dates){
		$fileRename = $dateStartY.$dateStartM."13";
	}elseif( $datecurrent > $datee){
		$fileRename = $dateNextY.$dateNextM."13";
	}
	$fileName = $fileRename.".csv";
	return $fileName ;
}

function get_my_claim_form_search($employee_id,$selectsearch,$searchtext,$claim_status,$date_start,$date_end,$emp_company_code,$applicant_id,$applicant_name,$limit1,$limit2,$claim_status_id_bulk){ // ALL->all status,TO_ACT -> other than 5 n 0 n -1 , number -> by status
	if ($selectsearch== 'claim_form_id'){
		$searchselection ="AND a.claim_form_id LIKE '$searchtext'";	
	}elseif($selectsearch== 'claim_form_date'){
		$date_start = checkDateY($date_start);
		$date_end = checkDateY($date_end);
		$searchselection ="AND (claim_form_date BETWEEN '$date_start' AND '$date_end' )";	
	}elseif($selectsearch== 'claim_status_id'){
		$searchselection ="AND a.claim_status_id ='$claim_status'";	
	}elseif($selectsearch== 'employee_id'){
		$searchselection ="AND a.employee_id LIKE '$searchtext'";	
	}elseif($selectsearch== 'emp_name'){
		$searchselection ="AND a.emp_name LIKE '$searchtext'";	
	}elseif($selectsearch== 'emp_company_code'){
		$searchselection ="AND a.emp_company_code LIKE '$searchtext'";		
	}else{
		$searchselection ='';	
	}
	if ($claim_status_id_bulk =='ALL'){
		$condition = "AND a.employee_id = '$employee_id' AND a.flag ='1'";	
		$condition1 = "";
		$condition2 = "";
	}elseif($claim_status_id_bulk =='TO_ACT'){
		$condition = "AND a.employee_id = '$employee_id' AND a.flag ='1' AND (a.claim_status_id <> '5' AND a.claim_status_id <> '0' AND a.claim_status_id <> '-1')";	
		$condition1 = "";
		$condition2 = "";
	}elseif($claim_status_id_bulk =='MY_CLAIM'){
		$condition = "AND a.employee_id = '$employee_id'";	
		$condition1 = "";
		$condition2 = "";	
	}elseif($claim_status_id_bulk =='ADMIN_SEARCH'){
		$condition = "";
		$condition1 = "";
		$condition2 = "";	
	}elseif($claim_status_id_bulk =='EMP_CLAIM'){
		$condition_emp_code = get_claim_auth_company_code($employee_id);
		$condition_emp_code = str_replace('emp_company_code','a.emp_company_code',$condition_emp_code);
		
		//echo $condition_emp_code;
		$condition = "AND  (".$condition_emp_code.")";	
		$condition1 = "";
		$condition2 = "";
	}elseif($claim_status_id_bulk =='TO_ACT_ONBEHALF'){ 
		$condition = "";
		$condition1 =" , hs_hr_claim_form_resp c ";
		$condition2 =" AND a.claim_form_id = c.claim_form_id AND c.emp_id = '$employee_id' AND c.claim_responsibility_id ='0' ";
	}else{
		$condition = "AND a.employee_id = '$employee_id'";
		$condition1 = "";
		$condition2 = "";		
	}
	$sqlstr = "SELECT 
					a.claim_form_id  as claim_form_id ,	  
					a.employee_id as employee_id ,	  
					a.id_SAP  as id_SAP ,	  
					a.claim_form_date as claim_form_date ,	  
					a.claim_advance  as claim_advance ,	  	
					a.emp_company_code  as emp_company_code ,	  
					a.emp_company  as emp_company ,	  
					a.emp_name 	 as emp_name ,	  
					a.emp_department as emp_department ,	   		
					a.emp_position  as emp_position ,	  
					a.emp_job_grade  as emp_job_grade ,	  
					a.emp_cost_center as emp_cost_center ,	  	 	
					a.claim_descp  as claim_descp ,	  
					a.emp_project as emp_project ,	  	 
					a.claim_status_id as claim_status_id ,	  
					b.descp  as claim_status_descp ,
					b.descp2  as claim_status_descp2 ,  	
					a.remark as remark ,
					a.current_change  as current_change ,	
					a.claim_form_app_date  as claim_form_app_date ,   		
					a.flag as flag
				FROM hs_hr_claim_form a,hs_hr_claim_status b $condition1
				WHERE 
				 a.claim_status_id = b.claim_status_id 
				 $condition
				 $condition2
				 $searchselection
				 ORDER BY a.claim_form_id ASC
				 LIMIT $limit1 , $limit2 ";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	$i=0;
	if ($numrows> 0){
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['claim_form_id']=$rows['claim_form_id'];
	$getfield[$i]['employee_id']=$rows['employee_id'];
	$getfield[$i]['id_SAP']=$rows['id_SAP'];
	$getfield[$i]['claim_form_date']=$rows['claim_form_date'];
	$getfield[$i]['claim_advance']=$rows['claim_advance'];
	$getfield[$i]['emp_company_code']=$rows['emp_company_code'];
	$getfield[$i]['emp_company']=$rows['emp_company'];
	$getfield[$i]['emp_name']=$rows['emp_name'];
	$getfield[$i]['emp_department']=$rows['emp_department'];
	$getfield[$i]['emp_position']=$rows['emp_position'];
	$getfield[$i]['emp_job_grade']=$rows['emp_job_grade'];
	$getfield[$i]['emp_cost_center']=$rows['emp_cost_center'];
	$getfield[$i]['claim_descp']=$rows['claim_descp'];
	$getfield[$i]['emp_project']=$rows['emp_project'];
	$getfield[$i]['claim_status_id']=$rows['claim_status_id'];
	$getfield[$i]['claim_status_descp']=$rows['claim_status_descp'];
	$getfield[$i]['claim_status_descp2']=$rows['claim_status_descp2'];
	$getfield[$i]['remark']=$rows['remark'];
	$getfield[$i]['current_change']=$rows['current_change'];
	$getfield[$i]['claim_form_app_date']=$rows['claim_form_app_date'];
	$getfield[$i]['flag']=$rows['flag'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}

function get_my_claim_form_search_emp($employee_id,$selectsearch,$searchtext,$claim_status,$company_code,$date_start,$date_end,$emp_company_code,$applicant_id,$applicant_name,$limit1,$limit2,$claim_status_id_bulk){ // ALL->all status,TO_ACT -> other than 5 n 0 n -1 , number -> by status
	if ($selectsearch== 'claim_form_id'){
		$searchselection ="AND a.claim_form_id LIKE '$searchtext'";	
	}elseif($selectsearch== 'claim_form_date'){
		$date_start = checkDateY($date_start);
		$date_end = checkDateY($date_end);
		$searchselection ="AND (claim_form_date BETWEEN '$date_start' AND '$date_end' )";	
	}elseif($selectsearch== 'claim_status_id'){
		$searchselection ="AND a.claim_status_id ='$claim_status'";	
	}elseif($selectsearch== 'employee_id'){
		$searchselection ="AND a.employee_id LIKE '$searchtext'";	
	}elseif($selectsearch== 'emp_name'){
		$searchselection ="AND a.emp_name LIKE '$searchtext'";	
	}elseif($selectsearch== 'emp_company_code'){
		$searchselection ="AND a.emp_company_code LIKE '$company_code'";		
	}else{
		$searchselection ='';	
	}
	if ($claim_status_id_bulk =='ALL'){
		$condition = "AND a.employee_id = '$employee_id' AND a.flag ='1'";	
		$condition1 = "";
		$condition2 = "";
	}elseif($claim_status_id_bulk =='TO_ACT'){
		$condition = "AND a.employee_id = '$employee_id' AND a.flag ='1' AND (a.claim_status_id <> '5' AND a.claim_status_id <> '0' AND a.claim_status_id <> '-1')";	
		$condition1 = "";
		$condition2 = "";
	}elseif($claim_status_id_bulk =='MY_CLAIM'){
		$condition = "AND a.employee_id = '$employee_id'";	
		$condition1 = "";
		$condition2 = "";	
	}elseif($claim_status_id_bulk =='ADMIN_SEARCH'){
		$condition = "";
		$condition1 = "";
		$condition2 = "";	
	}elseif($claim_status_id_bulk =='EMP_CLAIM'){
		$condition_emp_code = get_claim_auth_company_code($employee_id);
		$condition_emp_code = str_replace('emp_company_code','a.emp_company_code',$condition_emp_code);
		
		//echo $condition_emp_code;
		$condition = "AND  (".$condition_emp_code.")";	
		$condition1 = "";
		$condition2 = "";
	}elseif($claim_status_id_bulk =='TO_ACT_ONBEHALF'){ 
		$condition = "";
		$condition1 =" , hs_hr_claim_form_resp c ";
		$condition2 =" AND a.claim_form_id = c.claim_form_id AND c.emp_id = '$employee_id' AND c.claim_responsibility_id ='0' ";
	}else{
		$condition = "AND a.employee_id = '$employee_id'";
		$condition1 = "";
		$condition2 = "";		
	}
	$sqlstr = "SELECT 
					a.claim_form_id  as claim_form_id ,	  
					a.employee_id as employee_id ,	  
					a.id_SAP  as id_SAP ,	  
					a.claim_form_date as claim_form_date ,	  
					a.claim_advance  as claim_advance ,	  	
					a.emp_company_code  as emp_company_code ,	  
					a.emp_company  as emp_company ,	  
					a.emp_name 	 as emp_name ,	  
					a.emp_department as emp_department ,	   		
					a.emp_position  as emp_position ,	  
					a.emp_job_grade  as emp_job_grade ,	  
					a.emp_cost_center as emp_cost_center ,	  	 	
					a.claim_descp  as claim_descp ,	  
					a.emp_project as emp_project ,	  	 
					a.claim_status_id as claim_status_id ,	  
					b.descp  as claim_status_descp ,
					b.descp2  as claim_status_descp2 ,  	
					a.remark as remark ,
					a.current_change  as current_change ,	
					a.claim_form_app_date  as claim_form_app_date ,   		
					a.flag as flag
				FROM hs_hr_claim_form a,hs_hr_claim_status b $condition1
				WHERE 
				 a.claim_status_id = b.claim_status_id 
				 $condition
				 $condition2
				 $searchselection
				 ORDER BY a.claim_form_id ASC
				 LIMIT $limit1 , $limit2 ";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	$i=0;
	if ($numrows> 0){
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['claim_form_id']=$rows['claim_form_id'];
	$getfield[$i]['employee_id']=$rows['employee_id'];
	$getfield[$i]['id_SAP']=$rows['id_SAP'];
	$getfield[$i]['claim_form_date']=$rows['claim_form_date'];
	$getfield[$i]['claim_advance']=$rows['claim_advance'];
	$getfield[$i]['emp_company_code']=$rows['emp_company_code'];
	$getfield[$i]['emp_company']=$rows['emp_company'];
	$getfield[$i]['emp_name']=$rows['emp_name'];
	$getfield[$i]['emp_department']=$rows['emp_department'];
	$getfield[$i]['emp_position']=$rows['emp_position'];
	$getfield[$i]['emp_job_grade']=$rows['emp_job_grade'];
	$getfield[$i]['emp_cost_center']=$rows['emp_cost_center'];
	$getfield[$i]['claim_descp']=$rows['claim_descp'];
	$getfield[$i]['emp_project']=$rows['emp_project'];
	$getfield[$i]['claim_status_id']=$rows['claim_status_id'];
	$getfield[$i]['claim_status_descp']=$rows['claim_status_descp'];
	$getfield[$i]['claim_status_descp2']=$rows['claim_status_descp2'];
	$getfield[$i]['remark']=$rows['remark'];
	$getfield[$i]['current_change']=$rows['current_change'];
	$getfield[$i]['claim_form_app_date']=$rows['claim_form_app_date'];
	$getfield[$i]['flag']=$rows['flag'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}


function get_current_change_claim_form($current_change,$claim_status_id_bulk){ // ALL->all status,TO_ACT -> other than 5 n 0 n -1 , number -> by status
	if ($claim_status_id_bulk =='ALL'){
		$condition = "";	
	}elseif($claim_status_id_bulk =='TO_ACT'){
		$condition = "AND (a.claim_status_id = '1' OR a.claim_status_id = '2' OR a.claim_status_id = '3')";	
	}else{
		$condition = "AND a.claim_status_id='$claim_status_id_bulk'";	
	}
	$sqlstr = "SELECT 
					a.claim_form_id  as claim_form_id ,	  
					a.employee_id as employee_id ,	  
					a.id_SAP  as id_SAP ,	  
					a.claim_form_date as claim_form_date ,	  
					a.claim_advance  as claim_advance ,	  	
					a.emp_company_code  as emp_company_code ,	  
					a.emp_company  as emp_company ,	  
					a.emp_name 	 as emp_name ,	  
					a.emp_department as emp_department ,	   		
					a.emp_position  as emp_position ,	  
					a.emp_job_grade  as emp_job_grade ,	  
					a.emp_cost_center as emp_cost_center ,	  	 	
					a.claim_descp  as claim_descp ,	  
					a.emp_project as emp_project ,	  	 
					a.claim_status_id as claim_status_id ,	  
					b.descp  as claim_status_descp ,
					b.descp2  as claim_status_descp2 ,  	
					a.remark as remark ,
					a.current_change  as current_change ,	
					a.claim_form_app_date  as claim_form_app_date ,	   		
					a.flag as flag
				FROM hs_hr_claim_form a,hs_hr_claim_status b
				WHERE 
				 a.claim_status_id = b.claim_status_id AND
				 a.current_change = '$current_change'
				 AND a.flag ='1'
				 $condition
				 ORDER BY a.claim_form_id ASC ";
				
				 
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	$i=0;
	if ($numrows> 0){
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['claim_form_id']=$rows['claim_form_id'];
	$getfield[$i]['employee_id']=$rows['employee_id'];
	$getfield[$i]['id_SAP']=$rows['id_SAP'];
	$getfield[$i]['claim_form_date']=$rows['claim_form_date'];
	$getfield[$i]['claim_advance']=$rows['claim_advance'];
	$getfield[$i]['emp_company_code']=$rows['emp_company_code'];
	$getfield[$i]['emp_company']=$rows['emp_company'];
	$getfield[$i]['emp_name']=$rows['emp_name'];
	$getfield[$i]['emp_department']=$rows['emp_department'];
	$getfield[$i]['emp_position']=$rows['emp_position'];
	$getfield[$i]['emp_job_grade']=$rows['emp_job_grade'];
	$getfield[$i]['emp_cost_center']=$rows['emp_cost_center'];
	$getfield[$i]['claim_descp']=$rows['claim_descp'];
	$getfield[$i]['emp_project']=$rows['emp_project'];
	$getfield[$i]['claim_status_id']=$rows['claim_status_id'];
	$getfield[$i]['claim_status_descp']=$rows['claim_status_descp'];
	$getfield[$i]['claim_status_descp2']=$rows['claim_status_descp2'];
	$getfield[$i]['remark']=$rows['remark'];
	$getfield[$i]['current_change']=$rows['current_change'];
	$getfield[$i]['claim_form_app_date']=$rows['claim_form_app_date'];
	$getfield[$i]['flag']=$rows['flag'];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
	
}
function get_claim_auth_company_code($employee_id){
	$sqlstr = "SELECT * FROM hs_hr_claim_auth WHERE employee_id = '$employee_id'";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	$condition = "";
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]['company_code']=$rows['company_code'];
	$condition = $condition." or emp_company_code = '".$getfield[$i]['company_code']."'" ;
	$i++;
	}
	return substr($condition,3);	
	}
	else{
	return 0 ;	
		
	}
	
	
}
function get_hr_fi_claim_form($employee_id,$slct_period,$slct_year,$limit1,$limit2,$searchtext){

	$condition_company_code  = get_claim_auth_company_code($employee_id);
	$date_start = $slct_year."-".$slct_period."-11";
	$date_start = strtotime($date_start .'-1 months');
	$date_start = date('Y-m-d',$date_start);
	$date_end = $slct_year."-".$slct_period."-11";
	if($condition_company_code != '0'){
	//	echo $condition_company_code;
		$condition = "AND (".$condition_company_code.")" ;
			$sqlstr = "SELECT 
					a.claim_form_id  as claim_form_id ,	  
					a.employee_id as employee_id ,	  
					a.id_SAP  as id_SAP ,	  
					a.claim_form_date as claim_form_date ,	  
					a.claim_advance  as claim_advance ,	  	
					a.emp_company_code  as emp_company_code ,	  
					a.emp_company  as emp_company ,	  
					a.emp_name 	 as emp_name ,	  
					a.emp_department as emp_department ,	   		
					a.emp_position  as emp_position ,	  
					a.emp_job_grade  as emp_job_grade ,	  
					a.emp_cost_center as emp_cost_center ,	  	 	
					a.claim_descp  as claim_descp ,	  
					a.emp_project as emp_project ,	  	 
					a.claim_status_id as claim_status_id ,	  
					b.descp  as claim_status_descp ,
					b.descp2  as claim_status_descp2 ,  	
					a.remark as remark ,
					a.current_change  as current_change ,
					a.claim_form_app_date  as claim_form_app_date ,	   		
					a.flag as flag,
					c.time_stamp as hod_approve_date
				FROM hs_hr_claim_form a,hs_hr_claim_status b ,hs_hr_claim_form_approval c
				WHERE 
				 a.claim_status_id = b.claim_status_id AND
				 a.claim_status_id ='4'  AND
				 a.claim_form_id = 	c.claim_form_id AND
				 c.claim_status_id = '4' AND
				 a.flag ='1' AND
				 a.claim_form_id LIKE '%$searchtext%' AND
				  (c.time_stamp BETWEEN '$date_start' AND '$date_end')
				 $condition
				 ORDER BY a.claim_form_id ASC  LIMIT $limit1 , $limit2 ";
				
				 
	//echo $sqlstr;
			$sqlresult = mysql_query($sqlstr) or die(mysql_error());
			$numrows = mysql_num_rows($sqlresult);
			$i=0;
			if ($numrows> 0){
			while($rows=mysql_fetch_array($sqlresult)){
			$getfield[$i]['claim_form_id']=$rows['claim_form_id'];
			$getfield[$i]['employee_id']=$rows['employee_id'];
			$getfield[$i]['id_SAP']=$rows['id_SAP'];
			$getfield[$i]['claim_form_date']=$rows['claim_form_date'];
			$getfield[$i]['claim_advance']=$rows['claim_advance'];
			$getfield[$i]['emp_company_code']=$rows['emp_company_code'];
			$getfield[$i]['emp_company']=$rows['emp_company'];
			$getfield[$i]['emp_name']=$rows['emp_name'];
			$getfield[$i]['emp_department']=$rows['emp_department'];
			$getfield[$i]['emp_position']=$rows['emp_position'];
			$getfield[$i]['emp_job_grade']=$rows['emp_job_grade'];
			$getfield[$i]['emp_cost_center']=$rows['emp_cost_center'];
			$getfield[$i]['claim_descp']=$rows['claim_descp'];
			$getfield[$i]['emp_project']=$rows['emp_project'];
			$getfield[$i]['claim_status_id']=$rows['claim_status_id'];
			$getfield[$i]['claim_status_descp']=$rows['claim_status_descp'];
			$getfield[$i]['claim_status_descp2']=$rows['claim_status_descp2'];
			$getfield[$i]['remark']=$rows['remark'];
			$getfield[$i]['current_change']=$rows['current_change'];
			$getfield[$i]['claim_form_app_date']=$rows['claim_form_app_date'];
			$getfield[$i]['flag']=$rows['flag'];
			$getfield[$i]['hod_approve_date']=$rows['hod_approve_date'];
			$i++;
			}
			return $getfield;	
			}
			else{
				return 0;
			}
	}else{
		return 0;
	}
	
}
function get_hr_fi_claim_form_v2($employee_id,$slct_period,$slct_year,$limit1,$limit2,$searchtext,$company_code){

	$condition_company_code  = get_claim_auth_company_code($employee_id);
	$date_start = $slct_year."-".$slct_period."-11";
	$date_start = strtotime($date_start .'-1 months');
	$date_start = date('Y-m-d',$date_start);
	$date_end = $slct_year."-".$slct_period."-11";
	if ($company_code <> ""){
		$condition2 = "AND a.emp_company_code='".$company_code."'";
	}else{
		$condition2 = "";
	}
	if($condition_company_code != '0'){
	//	echo $condition_company_code;
		$condition = "AND (".$condition_company_code.")" ;
			$sqlstr = "SELECT 
					a.claim_form_id  as claim_form_id ,	  
					a.employee_id as employee_id ,	  
					a.id_SAP  as id_SAP ,	  
					a.claim_form_date as claim_form_date ,	  
					a.claim_advance  as claim_advance ,	  	
					a.emp_company_code  as emp_company_code ,	  
					a.emp_company  as emp_company ,	  
					a.emp_name 	 as emp_name ,	  
					a.emp_department as emp_department ,	   		
					a.emp_position  as emp_position ,	  
					a.emp_job_grade  as emp_job_grade ,	  
					a.emp_cost_center as emp_cost_center ,	  	 	
					a.claim_descp  as claim_descp ,	  
					a.emp_project as emp_project ,	  	 
					a.claim_status_id as claim_status_id ,	  
					b.descp  as claim_status_descp ,
					b.descp2  as claim_status_descp2 ,  	
					a.remark as remark ,
					a.current_change  as current_change ,
					a.claim_form_app_date  as claim_form_app_date ,	   		
					a.flag as flag,
					c.time_stamp as hod_approve_date
				FROM hs_hr_claim_form a,hs_hr_claim_status b ,hs_hr_claim_form_approval c
				WHERE 
				 a.claim_status_id = b.claim_status_id AND
				 a.claim_status_id ='4'  AND
				 a.claim_form_id = 	c.claim_form_id AND
				 c.claim_status_id = '4' AND
				 a.flag ='1' AND
				 a.claim_form_id LIKE '%$searchtext%' AND
				  (c.time_stamp BETWEEN '$date_start' AND '$date_end')
				 $condition
				 $condition2
				 ORDER BY a.claim_form_id ASC  LIMIT $limit1 , $limit2 ";
				
				 
	//echo $sqlstr;
			$sqlresult = mysql_query($sqlstr) or die(mysql_error());
			$numrows = mysql_num_rows($sqlresult);
			$i=0;
			if ($numrows> 0){
			while($rows=mysql_fetch_array($sqlresult)){
			$getfield[$i]['claim_form_id']=$rows['claim_form_id'];
			$getfield[$i]['employee_id']=$rows['employee_id'];
			$getfield[$i]['id_SAP']=$rows['id_SAP'];
			$getfield[$i]['claim_form_date']=$rows['claim_form_date'];
			$getfield[$i]['claim_advance']=$rows['claim_advance'];
			$getfield[$i]['emp_company_code']=$rows['emp_company_code'];
			$getfield[$i]['emp_company']=$rows['emp_company'];
			$getfield[$i]['emp_name']=$rows['emp_name'];
			$getfield[$i]['emp_department']=$rows['emp_department'];
			$getfield[$i]['emp_position']=$rows['emp_position'];
			$getfield[$i]['emp_job_grade']=$rows['emp_job_grade'];
			$getfield[$i]['emp_cost_center']=$rows['emp_cost_center'];
			$getfield[$i]['claim_descp']=$rows['claim_descp'];
			$getfield[$i]['emp_project']=$rows['emp_project'];
			$getfield[$i]['claim_status_id']=$rows['claim_status_id'];
			$getfield[$i]['claim_status_descp']=$rows['claim_status_descp'];
			$getfield[$i]['claim_status_descp2']=$rows['claim_status_descp2'];
			$getfield[$i]['remark']=$rows['remark'];
			$getfield[$i]['current_change']=$rows['current_change'];
			$getfield[$i]['claim_form_app_date']=$rows['claim_form_app_date'];
			$getfield[$i]['flag']=$rows['flag'];
			$getfield[$i]['hod_approve_date']=$rows['hod_approve_date'];
			$i++;
			}
			return $getfield;	
			}
			else{
				return 0;
			}
	}else{
		return 0;
	}
	
}
function checkitemreject($claim_form_id,$claim_action_status_id){
	
	$sqlstr = "SELECT * FROM hs_hr_claim_form_item WHERE claim_form_id='$claim_form_id' AND claim_action_status_id='$claim_action_status_id'";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	
	if ($numrows> 0){ //true ade data
		return true ;
	}else{
		return false ; //false tak ade data
	}
	
}
//===========================EMAIL PROCESS=======================================================================

function getemailHRFinance($company_code){
	$sqlstr = "SELECT * FROM hs_hr_claim_auth WHERE company_code = '$company_code'";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getemailHRFinance[$i]=getsinglevalue("emp_email","hs_hr_claim_admin","employee_id",$rows['employee_id']);
	
	$i++;
	}
	return $getemailHRFinance;	
	}
	else{
	return 0 ;	
		
	}
	
	
}

function getheader($link_path,$applicant_emp_id,$current_change,$claim_status_id,$claim_form_id){
	$applicant_name = dashreturn1(getsinglevalue2('emp_name','hs_hr_claim_form_resp','claim_form_id',$claim_form_id,'claim_responsibility_id','1')); 	
	$current_change_name = dashreturn1(getsinglevalue2('emp_name','hs_hr_claim_form_resp','claim_form_id',$claim_form_id,'emp_id',$current_change)); 
	
switch ($claim_status_id) {
  			case 1: 
					$header ="Hi ".$current_change_name. ",<br/><br/>".$applicant_name." has applied e-Claim.<br/><br/> Claim ID :".$claim_form_id."<br/><br/>Please login into E-Claim system at ".$link_path." for further actions and details.";
        			break;

    		case 2:
			$header ="Hi ".$current_change_name. ",<br/><br/>".$applicant_name." has applied e-Claim.<br/><br/> Claim ID :".$claim_form_id."<br/><br/>Please login into E-Claim system at ".$link_path." for further actions and details.";
        				
       				break;
			case 3:
					$header = "Hi ".$current_change_name. ",<br/><br/>".$applicant_name." has applied e-Claim.<br/><br/> Claim ID :".$claim_form_id."<br/><br/>Please login into E-Claim system at ".$link_path." for further actions and details.";
        			
       				break;
			case 4:
				$header ="Hi ".$current_change_name." ,<br/><br/>Please be informed that there is a new Claim form.<br/><br/>  Claim ID :".$claim_form_id."<br/><br/>Please login into E-Claim system at ".$link_path." for further actions and details.";
        				
       				break;
			case 5:
				$header ="Hi ".$applicant_name." ,<br/><br/>Your claim has been Process by  HR Department.<br/><br/> Claim ID :".$claim_form_id."<br/><br/>Please login into E-Claim system at ".$link_path." for further actions and details.";
        				
       				break;
			case -2:
					$header ="Hi ".$applicant_name." ,<br/><br/>Your claim has been Rejected by your Admin.<br/><br/> Claim ID :".$claim_form_id."<br/><br/>Please login into E-Claim system at ".$link_path." for further actions and details.";
        			
       				break;
			case -3:
        			$header ="Hi ".$applicant_name." ,<br/><br/>Your claim has been Rejected by your Superior.<br/><br/> Claim ID :".$claim_form_id."<br/><br/>Please login into E-Claim system at ".$link_path." for further actions and details.";
       				break;
			case -4:
        			$header ="Hi ".$applicant_name." ,<br/><br/>Your claim has been Rejected by your HOD.<br/><br/> Claim ID :".$claim_form_id."<br/><br/>Please login into E-Claim system at ".$link_path." for further actions and details.";
       				break;		
			case -5:
        			$header ="Hi ".$applicant_name." ,<br/><br/>Your claim has been Rejected by your HR Department.<br/><br/> Claim ID :".$claim_form_id."<br/><br/>Please login into E-Claim system at ".$link_path." for further actions and details.";
       				break;
	}	
	return $header;		
}
function getsubject($claim_status_id,$claim_form_id){
	switch ($claim_status_id) {
		

    		case 1:
        			$subject = "Verification for Claim Form (Claim ID: ". $claim_form_id .")" ;
       				break;
    		case 2:
        			$subject = "Approval for Claim Form (Claim ID: ". $claim_form_id .")" ;	
       				break;
			case 3:
        			$subject = "Approval for Claim Form (Claim ID: ". $claim_form_id .")" ;
       				break;
			case 4:
        			$subject = "Approval for Claim Form (Claim ID: ". $claim_form_id .")" ;	
       				break;
			case 5:
        			$subject = "Claim Form has been Process by HR(Claim ID: ". $claim_form_id . ")";	
       				break;		
			case -1:
         			$subject = "Claim Form Approval Status (Claim ID: ". $claim_form_id . ")" ;	
       				break;
			case -2:
        			$subject = "Claim Form Approval  Status (Claim ID: ". $claim_form_id . ")" ;	
       				break;
			case -3:
        			$subject = "Claim Form Approval Status (Claim ID: ". $claim_form_id . ")" ;	
       				break;
			case -4:
        			$subject = "Claim Form Approval Status (Claim ID: ". $claim_form_id . ")" ;	
       				break;	
			case -5:
        			$subject = "Claim Form Approval Status (Claim ID: ". $claim_form_id . ")" ;	
       				break;				
			
	}
 return $subject;	
}

function setEmailBody($link_path,$applicant_emp_id,$current_change,$claim_status_id,$claim_form_id){	
$header = getheader($link_path,$applicant_emp_id,$current_change,$claim_status_id,$claim_form_id);
//	(Testing Notification E-Mail Pending Leave to approve/recommend ) <br/><br/>
$body="
$header <br/><br/>
This is automatically generated email notification. Please do not reply to this email. <br/><br/>
Thank You. <br/>
";


return $body;
}

function sentMail($smtp_host,$smtp_port,$smtp_user,$smtp_pass,$mail_address,$smtp_secure,$link_path,$claim_status_id,$current_change,$claim_form_id){
	
$applicant_email = getsinglevalue2('emp_email','hs_hr_claim_form_resp','claim_form_id',$claim_form_id,'claim_responsibility_id','1') ;
$applicant_emp_id = getsinglevalue2('emp_id','hs_hr_claim_form_resp','claim_form_id',$claim_form_id,'claim_responsibility_id','1') ;
$current_change_email = getsinglevalue2('emp_email','hs_hr_claim_form_resp','claim_form_id',$claim_form_id,'emp_id',$current_change) ;
$applicant_company_code = getsinglevalue("emp_company_code","hs_hr_claim_form","claim_form_id",$claim_form_id);
//echo $applicant_email;
//echo "<br/>";
//echo $current_change_email;
//echo "<br/>";

$subject = getsubject($claim_status_id,$claim_form_id);
$mailBody = setEmailBody($link_path,$applicant_emp_id,$current_change,$claim_status_id,$claim_form_id);
//echo $subject;
//echo "<br/>";
$mail = new PHPMailer();
$mail->CharSet="windows-1251";
$mail->CharSet="utf-8";
$mail->IsHTML(true);
$mail->IsSMTP();
$mail->SMTPAuth = true;
//$mail->SMTPSecure = "tls"; 
$mail->SMTPSecure = $smtp_secure; 
$mail->Host = $smtp_host;
$mail->Port = $smtp_port; 
$mail->Username = $smtp_user; 
$mail->Password = $smtp_pass;					
$mail->From = $mail_address;
$mail->FromName ="E-Claim" ;
if ($current_change == "-1"){
	$getemailHRFinance = getemailHRFinance($applicant_company_code);
	
	for ( $i=0;$i < count($getemailHRFinance);$i++){
		
	$mail->AddAddress($getemailHRFinance[$i])	;
	
	}
}else{
$mail->AddAddress($current_change_email);
}
$mail->AddCC($mail_address);
$mail->AddCC($applicant_email);
$mail->Subject = $subject;
$mail->Body = $mailBody;
//echo $mailBody;
//echo "<br/>";
 if(!$mail->Send()) {

//echo("<SCRIPT LANGUAGE='JavaScript'>window.alert('Email was not sent because $mail->ErrorInfo')<SCRIPT>"); 
	
}else{
	if ($claim_status_id =='5' || $claim_status_id == '-5'){
	//	header("Location: claim_dashboard_admin.php");
	}else{
		header("Location: claim_dashboard.php");
	}
	}
}

function get_claim_list_hantar($employee_id,$slct_period,$slct_year,$claim_status_id){
	$full_access = getsinglevalue("full_access","hs_hr_claim_admin","employee_id",$employee_id);
	//echo $full_access."<br/>";
		if ($full_access == '1'){
			$condition_company_code = "1";
		}elseif($full_access == '0'){
			$condition_company_code  = get_claim_auth_company_code($employee_id);
		}
	if($condition_company_code != '0'){
	//	echo $condition_company_code;
	$date_start = $slct_year."-".$slct_period."-11";
	$date_start = strtotime($date_start .'-1 months');
	$date_start = date('Y-m-d',$date_start);
	$date_end = $slct_year."-".$slct_period."-11";
	if ($full_access == '1'){
			$condition = "" ;
	}elseif($full_access == '0'){
			$condition = "AND (".$condition_company_code.")" ;
	};	
		
			$sqlstr = "SELECT 
					a.claim_form_id  as claim_form_id ,	  
					a.employee_id as employee_id ,	  
					a.id_SAP  as id_SAP ,	  
					a.claim_form_date as claim_form_date ,	  
					a.claim_advance  as claim_advance ,	  	
					a.emp_company_code  as emp_company_code ,	  
					a.emp_company  as emp_company ,	  
					a.emp_name 	 as emp_name ,	  
					a.emp_department as emp_department ,	   		
					a.emp_position  as emp_position ,	  
					a.emp_job_grade  as emp_job_grade ,	  
					a.emp_cost_center as emp_cost_center ,	  	 	
					a.claim_descp  as claim_descp ,	  
					a.emp_project as emp_project ,	  	 
					a.claim_status_id as claim_status_id ,	  
					b.descp  as claim_status_descp ,
					b.descp2  as claim_status_descp2 ,  	
					a.remark as remark ,
					a.current_change  as current_change ,
					a.claim_form_app_date  as claim_form_app_date ,	   		
					a.flag as flag,
					d.claim_form_item_id  as claim_form_item_id,
					d.claim_action_status_id  as claim_action_status_id,
					d.claim_item_date  as claim_item_date,
					d.location   as location,
					d.expenses  as expenses,
					d.wage_type  as wage_type,
					d.gl_code as gl_code,  
					d.wbs_project  as wbs_project,
					d.back_charge  as back_charge,
					d.remark  as remark_item,
					d.gst_code  as gst_code,
					d.gst_wage_type  as gst_wage_type,
					d.mileage_km  as mileage_km,
					d.mileage_rate as mileage_rate, 
					d.currency  as currency,
					d.exchange_rate  as exchange_rate,
					d.foreign_amount  as foreign_amount,
					d.local_amount  as local_amount,
					d.local_gst_amount as local_gst_amount,
					d.entitlement_limit as entitlement_limit,
					c.time_stamp as hod_approve_date
				FROM hs_hr_claim_form a,hs_hr_claim_status b, hs_hr_claim_form_approval c, hs_hr_claim_form_item d
				WHERE 
				 a.claim_status_id = b.claim_status_id AND
				 a.claim_status_id ='$claim_status_id' AND
				 a.flag ='1' AND
				 a.claim_form_id = 	c.claim_form_id AND
				 c.claim_status_id = '4' AND
				 a.claim_form_id = 	d.claim_form_id AND
				 (c.time_stamp BETWEEN '$date_start' AND '$date_end')
				 $condition
				 ORDER BY a.claim_form_id ASC ";
				
				 
	//echo $sqlstr;
			$sqlresult = mysql_query($sqlstr) or die(mysql_error());
			$numrows = mysql_num_rows($sqlresult);
			$i=0;
			if ($numrows> 0){
			while($rows=mysql_fetch_array($sqlresult)){
			$getfield[$i]['claim_form_id']=$rows['claim_form_id'];
			$getfield[$i]['employee_id']=$rows['employee_id'];
			$getfield[$i]['id_SAP']=$rows['id_SAP'];
			$getfield[$i]['claim_form_date']=$rows['claim_form_date'];
			$getfield[$i]['claim_advance']=$rows['claim_advance'];
			$getfield[$i]['emp_company_code']=$rows['emp_company_code'];
			$getfield[$i]['emp_company']=$rows['emp_company'];
			$getfield[$i]['emp_name']=$rows['emp_name'];
			$getfield[$i]['emp_department']=$rows['emp_department'];
			$getfield[$i]['emp_position']=$rows['emp_position'];
			$getfield[$i]['emp_job_grade']=$rows['emp_job_grade'];
			$getfield[$i]['emp_cost_center']=$rows['emp_cost_center'];
			$getfield[$i]['claim_descp']=$rows['claim_descp'];
			$getfield[$i]['emp_project']=$rows['emp_project'];
			$getfield[$i]['claim_status_id']=$rows['claim_status_id'];
			$getfield[$i]['claim_status_descp']=$rows['claim_status_descp'];
			$getfield[$i]['claim_status_descp2']=$rows['claim_status_descp2'];
			$getfield[$i]['remark']=$rows['remark'];
			$getfield[$i]['current_change']=$rows['current_change'];
			$getfield[$i]['claim_form_app_date']=$rows['claim_form_app_date'];
			$getfield[$i]['flag']=$rows['flag'];
			$getfield[$i]['claim_form_item_id']=$rows['claim_form_item_id'];
			$getfield[$i]['claim_action_status_id']=$rows['claim_action_status_id'];
			$getfield[$i]['claim_item_date']=$rows['claim_item_date'];
			$getfield[$i]['location']=$rows['location'];
			$getfield[$i]['expenses']=$rows['expenses'];
			$getfield[$i]['wage_type']=$rows['wage_type'];
			$getfield[$i]['gl_code']=$rows['gl_code'];
			$getfield[$i]['wbs_project']=$rows['wbs_project'];
			$getfield[$i]['back_charge']=$rows['back_charge'];
			$getfield[$i]['remark']=$rows['remark'];
			$getfield[$i]['gst_code']=$rows['gst_code'];
			$getfield[$i]['gst_wage_type']=$rows['gst_wage_type'];
			$getfield[$i]['mileage_km']=$rows['mileage_km'];
			$getfield[$i]['mileage_rate']=$rows['mileage_rate'];
			$getfield[$i]['currency']=$rows['currency'];
			$getfield[$i]['exchange_rate']=$rows['exchange_rate'];
			$getfield[$i]['foreign_amount']=$rows['foreign_amount'];
			$getfield[$i]['local_amount']=$rows['local_amount'];
			$getfield[$i]['local_gst_amount']=$rows['local_gst_amount'];
			$getfield[$i]['entitlement_limit']=$rows['entitlement_limit'];
			$getfield[$i]['hod_approve_date']=$rows['hod_approve_date'];
			
			$i++;
			}
			return $getfield;	
			}
			else{
				return 0;
			}
	}else{
		return 0;
	}
}

function get_salary_emp_list($selectsearch,$searchtext,$limit1,$limit2,$employee_id){
$full_access = getsinglevalue("full_access","hs_hr_claim_admin","employee_id",$employee_id);

		if ($full_access == '1'){
			$condition_company_code = "1";
				$condition = "" ;
		}elseif($full_access == '0'){
			$condition_company_code  = get_claim_auth_company_code($employee_id);
			$condition = "AND (".$condition_company_code.")" ;
		}
	if ($selectsearch == "0"){//set default $selectsearch == emp_firstname
		$selectsearch = 'emp_name' ;
	}
	$sqlstr = " SELECT salary_emp_id, employee_id, 	emp_name ,emp_company_code, 
			emp_company,emp_payroll,emp_department,
			emp_job_grade,emp_cost_center,emp_superior, emp_superior as emp_superior_id ,emp_hod, emp_hod as emp_hod_id,
			(SELECT emp_name from hs_hr_salary_emp WHERE employee_id = emp_superior_id ) as emp_superior_name,
			(SELECT emp_name from hs_hr_salary_emp WHERE employee_id = emp_hod_id ) as emp_hod_name
			FROM hs_hr_salary_emp  WHERE $selectsearch LIKE  '%$searchtext%'  
			
			$condition
			ORDER BY  emp_name ASC LIMIT $limit1 , $limit2 ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);	
	if ($numrows> 0){
		$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$company_name = getsinglevalue2("company_name","hs_hr_claim_company","company_code",$rows['emp_company_code'],"flag","1");
	$getfield[$i]["salary_emp_id"]=$rows['salary_emp_id'];
	$getfield[$i]['employee_id']=$rows['employee_id'];
	$getfield[$i]['emp_name']=$rows['emp_name'];
	$getfield[$i]['emp_company_code']=$rows['emp_company_code'];
	$getfield[$i]['emp_company']=$rows['emp_company'];
	$getfield[$i]['company_name']=$company_name;
	$getfield[$i]['emp_payroll']=$rows['emp_payroll'];
	$getfield[$i]['emp_department']=$rows['emp_department'];
	$getfield[$i]['emp_job_grade']=$rows['emp_job_grade'];
	$getfield[$i]['emp_cost_center']=$rows['emp_cost_center'];
	$getfield[$i]['emp_superior']=$rows['emp_superior'];
	$getfield[$i]['emp_hod']=$rows['emp_hod'];
	$getfield[$i]['emp_superior_name']=$rows['emp_superior_name'];
	$getfield[$i]['emp_hod_name']=$rows['emp_hod_name'];
	$i++;
	}
	return $getfield;	
	}
	else{
	return 0 ;	
		
	}
}

function get_claim_company_allowed(){
	$sqlstr = "SELECT a.claim_company_allowed_id, a.company_code , b.company_name FROM  hs_hr_claim_company_allowed a, hs_hr_claim_company b WHERE a.company_code = b.company_code and b.flag = '1' and a.flag = '1' ORDER BY  a.company_code ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]["claim_company_allowed_id"]=$rows["claim_company_allowed_id"];
	$getfield[$i]["company_code"]=$rows["company_code"];
	$getfield[$i]["company_name"]=$rows["company_name"];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
}

function getavailable_balance($employee_id,$wage_type,$year_limit){
	$currentyear = date('Y');
	 $sqlstr = "SELECT sum(local_gst_amount + local_amount) as total
					FROM  `hs_hr_claim_form` a, hs_hr_claim_form_item b
					WHERE a.`claim_form_id` = b.`claim_form_id`
					AND ( a.claim_status_id = '0' OR  a.claim_status_id = '1' OR a.claim_status_id = '2' 
						OR a.claim_status_id = '3'  OR a.claim_status_id = '4' OR claim_status_id = '5' )
					AND a.employee_id ='$employee_id'
					AND YEAR( claim_form_date ) =  '$currentyear' 
					AND b.wage_type ='$wage_type' "
					;
	//echo  $sqlstr ;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield=$rows['total'];
	
	}
	return $getfield;	
	}else{
		return 0;
	}
	 
 }
function get_claim_form_attachment($claim_form_id){
	$sqlstr = "SELECT * FROM hs_hr_claim_form_attachment WHERE claim_form_id='$claim_form_id' AND flag ='1' ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]["claim_form_attachment_id"]=$rows["claim_form_attachment_id"];
	$getfield[$i]["claim_form_id"]=$rows["claim_form_id"];
	$getfield[$i]["file_name"]=$rows["file_name"];
	$getfield[$i]["link"]=$rows["link"];	
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
}
 function get_sum_amount($employee_id,$slct_period,$slct_year,$claim_status_id,$emp_company_code){
	$full_access = getsinglevalue("full_access","hs_hr_claim_admin","employee_id",$employee_id);
	//echo $full_access."<br/>";
		if ($full_access == '1'){
			$condition_company_code = "1";
		}elseif($full_access == '0'){
			$condition_company_code  = get_claim_auth_company_code($employee_id);
		}
	if($condition_company_code != '0'){
	//	echo $condition_company_code;
	$date_start = $slct_year."-".$slct_period."-11";
	$date_start = strtotime($date_start .'-1 months');
	$date_start = date('Y-m-d',$date_start);
	$date_end = $slct_year."-".$slct_period."-11";
	if ($full_access == '1'){
			$condition = "" ;
	}elseif($full_access == '0'){
			$condition = "AND (".$condition_company_code.")" ;
	};	
		
			$sqlstr = "SELECT SUM(d.local_amount) as sum_local_amount, SUM(d.local_gst_amount) as sum_local_gst_amount, SUM(d.local_amount)+SUM(d.local_gst_amount) as sum_total
				FROM hs_hr_claim_form a,hs_hr_claim_status b, hs_hr_claim_form_approval c, hs_hr_claim_form_item d
				WHERE 
				 a.claim_status_id = b.claim_status_id AND
				 a.claim_status_id ='$claim_status_id' AND
				 a.flag ='1' AND
				 a.claim_form_id = 	c.claim_form_id AND
				 c.claim_status_id = '4' AND
				 a.claim_form_id = 	d.claim_form_id AND
				 (c.time_stamp BETWEEN '$date_start' AND '$date_end')
				 $condition
				 AND a.emp_company_code = '$emp_company_code'
				 ORDER BY a.claim_form_id ASC ";
			//echo $sqlstr."<br/>" ;	 
			$sqlresult = mysql_query($sqlstr) or die(mysql_error());
			$numrows = mysql_num_rows($sqlresult);
			$i=0;
			if ($numrows> 0){
			while($rows=mysql_fetch_array($sqlresult)){
			$getfield['sum_local_amount']=$rows['sum_local_amount'];
			$getfield['sum_local_gst_amount']=$rows['sum_local_gst_amount'];
			$getfield['sum_total']=$rows['sum_total'];
			
			
			}
			return $getfield;	
			}
			else{
				return 0;
			}
	}else{
		return 0;
	}
}
function get_sum_claim_advance($employee_id,$slct_period,$slct_year,$claim_status_id,$emp_company_code){
	$full_access = getsinglevalue("full_access","hs_hr_claim_admin","employee_id",$employee_id);
	//echo $full_access."<br/>";
		if ($full_access == '1'){
			$condition_company_code = "1";
		}elseif($full_access == '0'){
			$condition_company_code  = get_claim_auth_company_code($employee_id);
		}
	if($condition_company_code != '0'){
	//	echo $condition_company_code;
	$date_start = $slct_year."-".$slct_period."-11";
	$date_start = strtotime($date_start .'-1 months');
	$date_start = date('Y-m-d',$date_start);
	$date_end = $slct_year."-".$slct_period."-11";
	if ($full_access == '1'){
			$condition = "" ;
	}elseif($full_access == '0'){
			$condition = "AND (".$condition_company_code.")" ;
	};	
		
			$sqlstr = "SELECT SUM(a.claim_advance) as sum_claim_advance
				FROM hs_hr_claim_form a,hs_hr_claim_status b, hs_hr_claim_form_approval c
				WHERE 
				 a.claim_status_id = b.claim_status_id AND
				 a.claim_status_id ='$claim_status_id' AND
				 a.flag ='1' AND
				 a.claim_form_id = 	c.claim_form_id AND
				 c.claim_status_id = '4' AND
				 (c.time_stamp BETWEEN '$date_start' AND '$date_end')
				 $condition
				 AND a.emp_company_code = '$emp_company_code'
				 ORDER BY a.claim_form_id ASC ";
			//echo $sqlstr."<br/>" ;	 
			$sqlresult = mysql_query($sqlstr) or die(mysql_error());
			$numrows = mysql_num_rows($sqlresult);
			$i=0;
			if ($numrows> 0){
			while($rows=mysql_fetch_array($sqlresult)){
			$getfield['sum_claim_advance']=$rows['sum_claim_advance'];
			
			
			
			}
			return $getfield;	
			}
			else{
				return 0;
			}
	}else{
		return 0;
	}
}

function multi_sort($array, $akey)
{  
  function compare($a, $b)
  {
     global $key;
     return strcmp($a[$key], $b[$key]);
  } 
  usort($array, "compare");
  return $array;
}


function get_staffup(){
	$sqlstr = "SELECT a.staffup_id as staffup_id, a.username as username  , a.nama as nama,
	 a.no_kp as no_kp, a.jawatan as jawatan , a.no_tel as no_tel, a.tarikh_daftar as tarikh_daftar, 
	 a.tarikh_password as tarikh_password, b.aras_desc as aras_desc 
	 FROM  staffup a, aras b WHERE a.aras_pengguna = b.aras_pengguna ORDER BY  a.nama ";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]["staffup_id"]=$rows["staffup_id"];
	$getfield[$i]["username"]=$rows["username"];
	$getfield[$i]["nama"]=$rows["nama"];
	$getfield[$i]["no_kp"]=$rows["no_kp"];
	$getfield[$i]["jawatan"]=$rows["jawatan"];
	$getfield[$i]["no_tel"]=$rows["no_tel"];
	$getfield[$i]["tarikh_daftar"]=$rows["tarikh_daftar"];
	$getfield[$i]["tarikh_password"]=$rows["tarikh_password"];
	$getfield[$i]["aras_desc"]=$rows["aras_desc"];
	
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}
}
function get_kertas_siasatan($selectsearch,$searchtext,$date_start,$date_end,$limit1,$limit2){
	
	if ($selectsearch =='0'){
		$conditon = "no_ip like '%%'";
		
	}elseif($selectsearch =='no_ip'){
		$conditon = "no_ip like '%$searchtext%'";
	
	}elseif($selectsearch =='pegawai_penyiasat'){
		$conditon = "pegawai_penyiasat like '%$searchtext%'";	
	}elseif($selectsearch == "tarikh_repot"){
		$conditon = "tarikh_repot BETWEEN '$date_start' AND '$date_end'";
	}
	
	
	$sqlstr = "SELECT *
	 FROM  kertas_siasatan WHERE  $conditon and flag='1' ORDER BY kertas_siasatan_id DESC";
	//echo $sqlstr;
	$sqlresult = mysql_query($sqlstr) or die(mysql_error());
	$numrows = mysql_num_rows($sqlresult);
	if ($numrows> 0){
	$i=0;
	while($rows=mysql_fetch_array($sqlresult)){
	$getfield[$i]["kertas_siasatan_id"]=$rows["kertas_siasatan_id"];
	$getfield[$i]["no_ip"]=$rows["no_ip"];
	$getfield[$i]["kategori_desc"]=$rows["kategori_desc"];
	$getfield[$i]["pengadu"]=$rows["pengadu"];
	$getfield[$i]["tarikh_tangkap"]=$rows["tarikh_tangkap"];
	$getfield[$i]["masa_tangkap"]=$rows["masa_tangkap"];
	$getfield[$i]["repot"]=$rows["repot"];
	$getfield[$i]["tarikh_repot"]=$rows["tarikh_repot"];
	$getfield[$i]["masa_repot"]=$rows["masa_repot"];
	$getfield[$i]["pegawai_penyiasat"]=$rows["pegawai_penyiasat"];
	$getfield[$i]["pen_pegawai_penyiasat"]=$rows["pen_pegawai_penyiasat"];
	$getfield[$i]["tarikh_terima"]=$rows["tarikh_terima"];
	$getfield[$i]["masa_terima"]=$rows["masa_terima"];
	$getfield[$i]["kiv"]=$rows["kiv"];
	$getfield[$i]["tarikh_kiv"]=$rows["tarikh_kiv"];
	$getfield[$i]["catatan_kiv"]=$rows["catatan_kiv"];
	$getfield[$i]["flag"]=$rows["flag"];
	$i++;
	}
	return $getfield;	
	}
	else{
		return 0;
	}	
}
?>