<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$c_cat_id=$_GET['c_cat_id'];
	
	//delete customer_category
	
	$customer_category_delete=$db->query("DELETE FROM customer_category WHERE c_cat_id='$c_cat_id'");
	
	header("Location: ?folder=customer_category&file=view");
	
?>