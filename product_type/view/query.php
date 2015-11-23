<?php 
	
	//display product_type_details
	
	$product_type_details=$db->get_results("SELECT * FROM product_type ORDER BY pt_type");

	
?>