<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$q_id=$_GET['q_id'];
	$cust_id=$_GET['cust_id'];
	
	//fetch customer
	
	$customer=$db->get_row("SELECT * FROM customer WHERE cust_id='$cust_id'");
	
	//insert quotation_items
	
	if(isset($_POST['add_product']))
	{
		
		$p_id=$_POST['p_id'];
		$poi_qty=$_POST['poi_qty'];
		
		//fetch product
		
		$product=$db->get_row("SELECT * FROM product WHERE p_id='$p_id'");
		
		$qi_price=$product->p_price;
		
		$qi_amount=$qi_price * $poi_qty;
		
		$quotation_items_insert=$db->query("INSERT INTO quotation_items VALUES('','$q_id','$p_id','$poi_qty','$qi_price','$qi_amount','1')");
		
	}
	
	//fetch quotation_items_details
	
	$quotation_items_details=$db->get_results("SELECT * FROM quotation_items WHERE qi_q_id='$q_id'");
	
	//edit quotation_items
	
	if(isset($_POST['edit_quantity']))
	{
		
		$qi_id=$_POST['qi_id'];
		$qi_qty=$_POST['qi_qty'];
		
		$quotation_items_edit=$db->query("UPDATE quotation_items SET qi_qty='$qi_qty',qi_amount=qi_price*'$qi_qty' WHERE qi_id='$qi_id'");
		
		$db->debug();
		
		//header("location:".$_SERVER['HTTP_REFERER']);
		
	}
	
?>