<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$poi_id=$_GET['poi_id'];
	
	//fetch purchase_product_items
	
	$purchase_order_items=$db->get_row("SELECT * FROM purchase_order_items WHERE poi_id=".$poi_id);
	
	$poi_p_id=$purchase_order_items->poi_p_id;
	$poi_qty=$purchase_order_items->poi_qty;
	
	//update product_stock_location
	
	$product_stock_location_edit=$db->query("UPDATE product_stock_location SET psl_p_stock='$poi_qty' + psl_p_stock WHERE psl_p_id='$poi_p_id' AND psl_s_id=".$a_s_id);
	
	//delete purchase_order_items
	
	$purchase_order_items_delete=$db->query("DELETE FROM purchase_order_items WHERE poi_id='$poi_id'");
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
?>