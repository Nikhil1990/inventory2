<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch supplier_details
	
	$supplier_details=$db->get_results("SELECT * FROM supplier ORDER BY sup_name");
	
?>