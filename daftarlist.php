<?php 
include 'include/config.php';
include 'include/include.php';



$action= (isset($_GET['action'])) ? $_GET['action'] : "";

$showdata = 20;//
$searchtext = (isset($_POST['searchtext'])) ? $_POST['searchtext'] : "";
$selectsearch = (isset($_POST['selectsearch'])) ? $_POST['selectsearch'] : "0";
$limit1 = (isset($_POST['limit1'])) ? $_POST['limit1'] : "0";
$limit2 = (isset($_POST['limit2'])) ? $_POST['limit2'] : $showdata;

//echo get_auth($employee_id);
//$get_daftar_senarai = get_daftar_senarai();
$get_daftar_senarai = get_daftar_senarai_carian($selectsearch,$searchtext,$limit1,$limit2);



?>
<?php include 'header.php'; ?>


<script type="text/javascript" language="JavaScript">
function staffview(element){
	
	var employee_id = element;
	document.form_daftar_view.employee_id_hidden.value = employee_id ;
	document.form_daftar_view.submit();
	
}
function searchdaftar(){
if (document.form_daftar_search.selectsearch.value =="0")
	{
		alert("Select field to search");
		document.form_daftar_search.selectsearch.focus();
		return false;
	}	
		document.form_daftar_search.submit();
}

function next_page(element){
	showdata = element;
	limit1 = document.form_daftar_next.limit1.value ;
	limit2 = document.form_daftar_next.limit2.value
	document.form_daftar_next.limit1.value = parseInt(limit1) + parseInt(showdata) ;
	document.form_daftar_next.limit2.value = parseInt(showdata) ;
	
	document.form_daftar_next.submit();
}
function previous_page(element){
	showdata = element;
	limit1 = document.form_daftar_next.limit1.value ;
	limit2 = document.form_daftar_next.limit2.value
	document.form_daftar_next.limit1.value = parseInt(limit1) - parseInt(showdata) ;
	document.form_daftar_next.limit2.value = parseInt(showdata) ;
	
	document.form_daftar_next.submit();
}
function sendemp(cntrl,element){
	if(element == 2){
window.opener.document.frmSaman.txt_id_daftar.value = cntrl.id;
window.opener.document.frmSaman.txt_nama.value = cntrl.name;
window.opener.document.frmSaman.txt_nokenderaan.value = cntrl.title;

	}
	if(element == 3){
window.opener.document.authadmin.txt_emp_id.value = cntrl.id;
window.opener.document.authadmin.txt_emp_name.value = cntrl.name;
window.opener.document.authadmin.txt_emp_email.value = cntrl.title;


	}
	if(element == 4){ // eclaim admin
window.opener.document.form_claim.txt_admin_id.value = cntrl.id;
window.opener.document.form_claim.txt_admin_name.value = cntrl.name;
window.opener.document.form_claim.txt_admin_email.value = cntrl.title;
	}
	if(element == 5){ // eclaim IM
window.opener.document.form_claim.txt_superior_id.value = cntrl.id;
window.opener.document.form_claim.txt_superior_name.value = cntrl.name;
window.opener.document.form_claim.txt_superior_email.value = cntrl.title;
	}
	if(element == 6){ // eclaim HOD
window.opener.document.form_claim.txt_hod_id.value = cntrl.id;
window.opener.document.form_claim.txt_hod_name.value = cntrl.name;
window.opener.document.form_claim.txt_hod_email.value = cntrl.title;
	}
	
	
window.close ();		
}
</script>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td width="700">
	
	</td>
  </tr>
  <tr>
    <td><table width="700" border="0" cellpadding="0" cellspacing="0">
      <form action="daftarlist.php?action=<?php echo $action ?>" id="form_daftar_search" name="form_daftar_search" method="post">
      <tr>
        <td class="kotak_head"  align="left">Search by  : 
          <select class="textfield" name="selectsearch" id="selectsearch">
         <?php  if ($selectsearch =="0"){ ?>
          <option value="0" selected="selected">-- Please Select--</option>
         <?php  } ?>
            <option value="a.nokenderaan"  <?php  if ($selectsearch =="nokenderaan"){ ?> selected="selected"  <?php  } ?>>No Kenderaan</option>
            <option value="a.qr_code"  <?php  if ($selectsearch =="qr_code"){ ?> selected="selected"  <?php  } ?>>QR-Code</option>
           
          </select> Search For: 
          <input name="searchtext" type="text" class="textfield_word" id="searchtext" value="<?php echo $searchtext  ?>" />
          <input type="button" name="search_button" id="search_button" value="search"  onclick="return searchdaftar()"/></td>
        </tr></form>
        <tr><td >&nbsp;</td></tr>
      <tr>
        <td class="title_all">Senarai Pemilik Pelekat Kenderaan</td>
      </tr>
      <tr>
        <td>
          <?php if($get_daftar_senarai !=0){ ?>
          <table width="96%" border="0" cellpadding="0" cellspacing="1" class="kotak">
          <tr>
            <td width="15%" class="kotak_head">Daftar ID</td>
            <td align="left"  class="kotak_head">Nama</td>
            <td align="left"  class="kotak_head">No. Kenderaan</td>
            </tr>
        <form action="daftar_view.php" method="post" name="form_daftar_view"  id="form_daftar_view">
          <input type="hidden" name="employee_id_hidden" id="employee_id_hidden" > 
          <?php  for ( $i=0;$i < count($get_daftar_senarai);$i++){
		   
		  
		  ?>
          
          <tr>
            <td >&nbsp;<a style="cursor:pointer;" id="<?php echo $get_daftar_senarai[$i]['id'] ?>"  name="<?php echo $get_daftar_senarai[$i]['nama']?>" title="<?php echo $get_daftar_senarai[$i]['nokenderaan'] ?>" onclick="sendemp(this,<?php echo $action ?>)">
		<?php echo $get_daftar_senarai[$i]['id']?></a> </td>
            <td align="left">&nbsp;<a style="cursor:pointer;" id="<?php echo $get_daftar_senarai[$i]['id'] ?>"  name="<?php echo $get_daftar_senarai[$i]['nama']?>" title="<?php echo $get_daftar_senarai[$i]['nokenderaan'] ?>" onclick="sendemp(this,<?php echo $action ?>)">
              <?php echo $get_daftar_senarai[$i]['nama']?></a></td>
            <td align="left">&nbsp;<a style="cursor:pointer;" id="<?php echo $get_daftar_senarai[$i]['id'] ?>"  name="<?php echo $get_daftar_senarai[$i]['nama']?>" title="<?php echo $get_daftar_senarai[$i]['nokenderaan'] ?>" onclick="sendemp(this,<?php echo $action ?>)">
               <?php echo $get_daftar_senarai[$i]['nokenderaan']?> </a></td>
          
            </tr>
          
          
          <?php } ?>
        </form>
             <form action="daftarlist.php?action=<?php echo $action ?>" method="post" name="form_daftar_next"  id="form_daftar_next">
            
			 <tr >
            <td > <input type="hidden" name="limit1" id="limit1" value="<?php echo $limit1 ?>" > 
             <input type="hidden" name="limit2" id="limit2" value="<?php echo $limit2 ?>" > 
             <input type="hidden" name="searchtext" id="searchtext" value="<?php echo $searchtext ?>" > 
             <input type="hidden" name="selectsearch" id="selectsearch" value="<?php echo $selectsearch ?>"> </td>
            <td width="55%" align="left">&nbsp;</td>
            <td width="30%" align="right"> <strong>&nbsp;<?php if ($limit1 >0){ ?><a style="cursor:pointer;" onclick="previous_page(<?php echo $showdata ?>);"><< Previous </a>||<?php } ?> <?php if (count($get_daftar_senarai) >= $showdata){ ?> <a style="cursor:pointer;" onclick="next_page(<?php echo $showdata ?>);">Next >> </a> 
            </strong><?php } ?></td>
            </tr></form>
		<?php	}else{ ?>
				
				 No Record Found
			<?php }?>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td></td>
        </tr>
    </table></td>
  </tr>
</table>