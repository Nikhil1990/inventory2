<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch brand_details
	
	$brand_details=$db->get_results("SELECT * FROM brand ORDER BY b_name");
	
	//fetch category_details
	
	$category_details=$db->get_results("SELECT * FROM category ORDER BY c_name");

	require_once('./classes/class.product.php');
	
	if(isset($_POST['search_product']))
	{
		
		$p_b_id=$_POST['p_b_id'];
		$p_c_id=$_POST['p_c_id'];
		
		$product = new Product();
		$product->setBrandId($p_b_id);
		$product->setCategoryId($p_c_id);
		$product_details = $product->productinfo();
		
	}

	//fetch product_details
	
	/* $product_details=$db->get_results("SELECT * FROM product ORDER BY p_name");
	
	//fetch product_details_qty */
	
	$product_details_qty=$db->get_results("SELECT * FROM product ORDER BY p_name"); 
	
	if(isset($_POST['search_product']))
	{
		
		$all_product_details=$db->get_results("SELECT * FROM product_stock_location WHERE psl_s_id='$a_s_id'");
	
		
	}
	
?>