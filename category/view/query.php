<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch category_details
	
	$category_details=$db->get_results("SELECT * FROM category ORDER BY c_name");
	
?>