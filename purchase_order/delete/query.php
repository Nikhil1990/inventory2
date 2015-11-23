<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$po_id=$_GET['po_id'];
	
	//delete purchase_order
	
	$purchase_order_delete=$db->query("UPDATE purchase_order SET po_status='0' WHERE po_id='$po_id'");
	
	header("Location: ?folder=purchase_order&file=view");
	
?>