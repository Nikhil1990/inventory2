<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch store_details
	
	$store_details=$db->get_results("SELECT * FROM store ORDER BY s_name");
	
?>