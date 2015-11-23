<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$p_id=$_GET['p_id'];
	
	//delete product
	
	$product_delete=$db->query("DELETE FROM product WHERE p_id='$p_id'");
	
	header("Location: ?folder=product&file=view");
	
?>