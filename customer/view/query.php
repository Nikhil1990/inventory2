<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch customer_details
	
	$customer_details=$db->get_results("SELECT * FROM customer ORDER BY cust_name");
	
?>