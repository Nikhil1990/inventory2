<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$pm_id=$_GET['pm_id'];
	
	//delete payment_method
	
	$payment_method_delete=$db->query("DELETE FROM payment_method WHERE pm_id='$pm_id'");
	
	header("Location: ?folder=payment_method&file=view");
	
?>