<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$at_id=$_GET['at_id'];
	
	//delete admin_type
	
	$admin_type_delete=$db->query("DELETE FROM admin_type WHERE at_id='$at_id'");
	
	header("Location: ?folder=admin_type&file=view");
	
?>