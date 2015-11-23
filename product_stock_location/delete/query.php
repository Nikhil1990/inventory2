<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$psl_id=$_GET['psl_id'];
	
	//delete product_stock_location
	
	$product_stock_location_delete=$db->query("DELETE FROM product_stock_location WHERE psl_id='$psl_id'");
	
	header("Location: ?folder=product_stock_location&file=view");
	
?>