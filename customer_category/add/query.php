<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//insert customer_category
	
	if(isset($_POST['add_customer_category']))
	{
	
		$c_cat_type=$_POST['c_cat_type'];
		$c_cat_discount=$_POST['c_cat_discount'];
		$c_cat_credit=$_POST['c_cat_credit'];
		
		$customer_category_insert=$db->query("INSERT INTO customer_category VALUES('','$c_cat_type','$c_cat_discount','$c_cat_credit','1')");
		
		header("Location: ?folder=customer_category&file=view");
		
	}
	
?>