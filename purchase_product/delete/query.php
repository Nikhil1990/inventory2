<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$pp_id=$_GET['pp_id'];
	
	//delete purchase_product
	
	$purchase_product_delete=$db->query("DELETE FROM purchase_product WHERE pp_id='$pp_id'");
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
?>