<?php 
	
	//fetch product
	
	$product_details=$db->get_results("SELECT * FROM product");
	
	foreach($product_details as $product)
	{
		$ps_p_id=$product->p_id;
		$ps_price=$product->p_price;
		$ps_qty=$product->p_stock;
		
		//insert into product_stock
		
		$product_stock_insert=$db->query("INSERT INTO product_stock VALUES('','$ps_p_id','$a_s_id','$ps_price','$ps_qty',CURDATE(),'$a_id','1')");
		
		
	}
	
?>