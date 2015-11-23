<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$ppi_pp_id=$_GET['ppi_pp_id'];
	
	//fetch purchase_product_items_details
	
	$purchase_product_items_details=$db->get_results("SELECT * FROM purchase_product_items WHERE ppi_pp_id='$ppi_pp_id'");
	
	//update purchase_product_items
	
	if(isset($_POST['edit_purchase_product_items']))
	{
	
		foreach($_POST['ppi_actual_qty'] as $key=>$value)
		{
			
			$purchase_product_items_edit=$db->query("UPDATE purchase_product_items SET ppi_actual_qty='$value' WHERE ppi_id='$key'");
			
		}
		
		foreach($purchase_product_items_details as $purchase_items_product)
		{
		
			$ppi_p_id=$purchase_items_product->ppi_p_id;
			$ppi_actual_qty=$purchase_items_product->ppi_actual_qty;
			$ppi_price=$purchase_items_product->ppi_price;
			
			//update product
			
			 $product_edit=$db->query("UPDATE product SET p_stock='$ppi_actual_qty' + p_stock WHERE p_id='$ppi_p_id'");
			 
			//insert product_stock
			
			$product_stock_insert=$db->query("INSERT INTO product_stock VALUES('','$ppi_p_id','$ppi_price','+$ppi_actual_qty',CURDATE(),'$a_id','1')");

		}
		
		header("Location: ?folder=purchase_product&file=view");
	}
	
?>