<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$q_id=$_GET['q_id'];
	
	//update quotation
	
	if(isset($_POST['add_to_quotation']))
	{
		
		$cust_id=$_POST['cust_id'];
		
		header("Location:?folder=quotation_items&file=add&q_id=".$q_id."&cust_id=".$cust_id);
		
	}
	
	if(isset($_POST['add_to_quotation']) && isset($_POST['new_cust_id']))
	{
		
		header("Location: ?folder=customer&file=add");
		
	}
	
?>