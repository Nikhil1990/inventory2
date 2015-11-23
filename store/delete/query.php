<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$s_id=$_GET['s_id'];
	
	//delete store
	
	$store_delete=$db->query("DELETE FROM store WHERE s_id='$s_id'");
	
	header("Location: ?folder=store&file=view");
	
?>