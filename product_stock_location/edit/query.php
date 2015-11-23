<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$psl_id=$_GET['psl_id'];
	
	//fetch product_stock_location
	
	$product_stock_location=$db->get_row("SELECT * FROM product_stock_location WHERE psl_id='$psl_id'");
	
	//update product_stock_location
	
	if(isset($_POST['edit_stock']))
	{
		
		$psl_p_stock=$_POST['psl_p_stock'];
		
		$product_stock_location_edit=$db->query("UPDATE product_stock_location SET psl_p_stock='$psl_p_stock' WHERE psl_id='$psl_id'");
		
		header("Location: ?folder=product_stock_location&file=view");
	}
	
?>