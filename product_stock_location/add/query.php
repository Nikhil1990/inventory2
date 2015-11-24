<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}

	//fetch store_details
	
	//$store_details=$db->get_results("SELECT * FROM store ORDER BY s_name");
	
	//insert product_stock_location
	
	if(isset($_POST['add_stock']))
	{
		
		$psl_p_id=$_POST['p_id'];
		//$psl_s_id=$admin->a_s_id;
		$psl_p_stock=$_POST['psl_p_stock'];
		
		$product_stock_location_insert=$db->query("INSERT INTO product_stock_location VALUES('','$psl_p_id','$a_s_id','$psl_p_stock','1')");
		
		header("Location: ?folder=product_stock_location&file=view");
		
	}
	
?>