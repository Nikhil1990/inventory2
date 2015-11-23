<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch customer_category_details
	
	$customer_category_details=$db->get_results("SELECT * FROM customer_category ORDER BY c_cat_type");
	
	//customer_category insert
	
	if(isset($_POST['add_customer']))
	{
		
		$cust_name=$_POST['cust_name'];
		$cust_address=$_POST['cust_address'];
		$cust_email=$_POST['cust_email'];
		$cust_phoneno=$_POST['cust_phoneno'];
		$cust_email=$_POST['cust_email'];
		$cust_cat_id=$_POST['cust_cat_id'];
		
		$customer_category_insert=$db->query("INSERT INTO customer VALUES('','$cust_name','$cust_address','$cust_email','$cust_phoneno','$cust_cat_id',CURDATE(),'1')");
		
		header("Location: ?folder=customer&file=view");
		
	}
	
?>