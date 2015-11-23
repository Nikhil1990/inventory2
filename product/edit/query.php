<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$p_id=$_GET['p_id'];
	
	//fetch brand_details
	
	$brand_details=$db->get_results("SELECT * FROM brand ORDER BY b_name");
	
	//fetch category_details
	
	$category_details=$db->get_results("SELECT * FROM category ORDER BY c_name");
	
	//fetch product
	
	$product=$db->get_row("SELECT * FROM product WHERE p_id='$p_id'");
	
	//fetch product_type_details
	
	$product_type_details=$db->get_results("SELECT * FROM product_type ORDER BY pt_type");
	
	//edit product
	
	if(isset($_POST['edit_product']))
	{
		
		$p_name=$_POST['p_name'];
		$p_code=$_POST['p_code'];
		$p_price=$_POST['p_price'];
		$p_price=$_POST['p_price'];
		$p_b_id=$_POST['p_b_id'];
		$p_c_id=$_POST['p_c_id'];
		$p_pt_id=$_POST['p_pt_id'];
		$p_min_stock_level=$_POST['p_min_stock_level'];
		
		$product_edit=$db->query("UPDATE product SET p_name='$p_name',p_code='$p_code',p_price='$p_price',p_b_id='$p_b_id',p_c_id='$p_c_id',p_pt_id='$p_pt_id',p_min_stock_level='$p_min_stock_level' WHERE p_id='$p_id'");
		
		header("Location: ?folder=product&file=view");
		
	}
	
?>