<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	if(isset($_POST['add_payment']))
	{
		
		$pm_type=$_POST['pm_type'];
		
		//insert payment_method
		
		$payment_method_insert=$db->query("INSERT INTO payment_method VALUES('','$pm_type','1')");
		
		header("Location: ?folder=payment_method&file=view");
		
	}
	
?>