<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$pop_id=$_GET['pop_id'];
	
	//delete purchase_order_payment
	
	$purchase_order_payment_delete=$db->query("DELETE FROM purchase_order_payment WHERE pop_id='$pop_id'");
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
?>