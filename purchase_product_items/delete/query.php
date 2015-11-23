<?php
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$ppi_id=$_GET['ppi_id'];
	
	//delete purchase_product_items
	
	$purchase_product_items_delete=$db->query("DELETE FROM purchase_product_items WHERE ppi_id='$ppi_id'");
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
?>