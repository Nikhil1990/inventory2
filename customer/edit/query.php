<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$cust_id=$_GET['cust_id'];
	
	//fetch customer_category_details
	
	$customer_category_details=$db->get_results("SELECT * FROM customer_category ORDER BY c_cat_type");
	
	//fetch customer
	
	$customer=$db->get_row("SELECT * FROM customer WHERE cust_id='$cust_id'");
	
	//edit customer
	
	if(isset($_POST['edit_customer']))
	{
		
		$cust_name=$_POST['cust_name'];
		$cust_address=$_POST['cust_address'];
		$cust_email=$_POST['cust_email'];
		$cust_phoneno=$_POST['cust_phoneno'];
		$cust_cat_id=$_POST['cust_cat_id'];
		
		$customer_edit=$db->query("UPDATE customer SET cust_name='$cust_name',cust_address='$cust_address',cust_email='$cust_email',cust_phoneno='$cust_phoneno',cust_cat_id='$cust_cat_id' WHERE cust_id='$cust_id'");
		
		header("Location: ?folder=customer&file=view");
		
	}
	
?>