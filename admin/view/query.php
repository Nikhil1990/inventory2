<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch admin_details
	
	$admin_details=$db->get_results("SELECT * FROM admin ORDER BY a_name");
	
?>