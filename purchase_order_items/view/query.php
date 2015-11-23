<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$po_id=$_GET['po_id'];
	$cust_id=$_GET['cust_id'];
	
	//fetch customer
	
	$customer=$db->get_row("SELECT * FROM customer WHERE cust_id='$cust_id'");
	
?>