<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch payment_method_details
	
	$payment_method_details=$db->get_results("SELECT * FROM payment_method ORDER BY pm_type");
	
?>