<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch admin_type_details
	
	$admin_type_details=$db->get_results("SELECT * FROM admin_type ORDER BY at_type");
	
?>