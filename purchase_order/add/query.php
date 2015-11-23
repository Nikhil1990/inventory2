<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$po_id=$_GET['po_id'];
	
	//insert purchase_items
	
	if(isset($_POST['purchase_item']))
	{
		$cust_id=$_POST['cust_id'];
		header("Location:?folder=purchase_order_items&file=add&po_id=".$po_id."&cust_id=".$cust_id);
		
	}
	
	if(isset($_POST['purchase_item']) && isset($_POST['new_cust_id']))
	{
		header("Location: ?folder=customer&file=add");
	}
	
	//insert new customer
	
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