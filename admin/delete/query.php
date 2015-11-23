<?php 

	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$a_id=$_GET['a_id'];
	
	//delete admin
	
	$admin_delete=$db->query("DELETE FROM admin WHERE a_id='$a_id'");
	
	header("Location: ?folder=admin&file=view");
	
?>