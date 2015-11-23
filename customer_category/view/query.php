<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch customer_category_details
	
	$customer_category_details=$db->get_results("SELECT * FROM customer_category ORDER BY c_cat_type");
	
?>