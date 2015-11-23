<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch tax_details
	
	$tax_details=$db->get_results("SELECT * FROM tax");
	
?>