<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch purchase_order_details
	
	require_once("./classes/class.purchaseorder.php");

	$purchaseorder = new PurchaseOrder();
	$purchaseorder->setPurchaseOrderID($a_s_id);
	$purchase_order_details = $purchaseorder->purchase_order_details();
	
	//$purchase_order_details=$db->get_results("SELECT * FROM purchase_order WHERE po_s_id='$a_s_id' AND po_status='1'");
	
?>