<?php 
	
	//display pending invoices
	
	$purchase_order_details=$db->get_results("SELECT * FROM purchase_order WHERE po_status='1' AND po_s_id='$a_s_id'");
	
?>