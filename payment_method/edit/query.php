<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$pm_id=$_GET['pm_id'];
	
	//fetch payment_method
	
	$payment_method=$db->get_row("SELECT * FROM payment_method WHERE pm_id='$pm_id'");
	
	//edit payment_method
	
	if(isset($_POST['edit_payment']))
	{
		
		$pm_type=$_POST['pm_type'];
		
		$payment_method_edit=$db->query("UPDATE payment_method SET pm_type='$pm_type' WHERE pm_id='$pm_id'");
		
		header("Location: ?folder=payment_method&file=view");
		
	}
	
?>