<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch product_stock_location_details
	
	$product_stock_location_details=$db->get_results("SELECT * FROM product_stock_location WHERE psl_s_id='$a_s_id'");
	
?>