<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch brand_details
	
	$brand_details=$db->get_results("SELECT * FROM brand ORDER BY b_name");
	
	//fetch category_details
	
	$category_details=$db->get_results("SELECT * FROM category ORDER BY c_name");
	
	//fetch product_type_details
	
	$product_type_details=$db->get_results("SELECT * FROM product_type ORDER BY pt_type");
	
	//insert product
	
	if(isset($_POST['add_product']))
	{
		
		$p_name=$_POST['p_name'];
		$p_code=$_POST['p_code'];
		$p_price=$_POST['p_price'];
		$p_b_id=$_POST['p_b_id'];
		$p_c_id=$_POST['p_c_id'];
		$p_pt_id=$_POST['p_pt_id'];
		$p_min_stock_level=$_POST['p_min_stock_level'];
		$p_stock=$_POST['p_stock'];
		
		
		$product_insert=$db->query("INSERT INTO product VALUES('','$p_code','$p_name','$p_price','$p_b_id','$p_c_id','$p_pt_id','$p_min_stock_level','$p_stock','1')");
		
		//get current_id
		
		$ps_p_id=$db->insert_id;
		
		//insert product_stock
		
		
		header("Location: ?folder=product&file=view");
		
	}
	
?>