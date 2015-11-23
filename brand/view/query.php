<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch brand_details
	
	$brand_details=$db->get_results("SELECT * FROM brand ORDER BY b_name");
	
?>