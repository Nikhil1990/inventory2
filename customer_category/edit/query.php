<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$c_cat_id=$_GET['c_cat_id'];
	
	//fetch customer_category
	
	$customer_category=$db->get_row("SELECT * FROM customer_category WHERE c_cat_id='$c_cat_id'");
	
	//update customer_category
	
	if(isset($_POST['edit_customer_category']))
	{
		
		$c_cat_type=$_POST['c_cat_type'];
		$c_cat_discount=$_POST['c_cat_discount'];
		$c_cat_credit=$_POST['c_cat_credit'];
		
		$customer_category_edit=$db->query("UPDATE customer_category SET c_cat_type='$c_cat_type',c_cat_discount='$c_cat_discount',c_cat_credit='$c_cat_credit' WHERE c_cat_id='$c_cat_id'");
		
		header("Location: ?folder=customer_category&file=view");
		
	}
	
?>