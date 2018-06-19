<?php 
include 'include/config.php';
include("include/include.php");

$id_item_hidden = array();
		$id_item_hidden = $_POST['id_item_hidden'];
	for($i=0;$i< count ($id_item_hidden);$i++){
				$id_item = $id_item_hidden[$i]; 
				$slct_status = $_POST['slct_status'][$id_item];
				update($id_item,$slct_status,"status","id","daftarsaman");
	}
	header("Location: tindakan_saman.php");
		
		
		
?>
		