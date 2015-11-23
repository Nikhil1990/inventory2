<?php
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch purchase_order_payment
	
	$purchase_order_payment_details=$db->get_results("SELECT * FROM purchase_order_payment WHERE po_status!='1'");
	
?>