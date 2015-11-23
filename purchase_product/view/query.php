<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	require_once("./classes/class.purchaseproduct.php");
	
	//fetch purchase_product_details
	
	$purchaseproduct = new PurchaseProduct();
	$purchaseproduct->setPurchaseProductID($a_s_id);
	$purchase_product_details = $purchaseproduct->purchase_product_details();
	
	//$purchase_product_details=$db->get_results("SELECT * FROM purchase_product WHERE pp_s_id='$a_s_id' AND pp_status='2'");
	
?>