<?php
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$ppi_pp_id=$_GET['pp_id'];
	
	//fetch purchase_product_items_details
	
	$purchase_product_items_details=$db->get_results("SELECT * FROM purchase_product_items WHERE ppi_pp_id='$ppi_pp_id'");
	
	//insert purchase_product_items
	
	if(isset($_POST['add_product']))
	{
		
		$ppi_p_id=$_POST['p_id'];
		$ppi_qty=$_POST['ppi_qty'];
		
		//fetch product
		
		$product=$db->get_row("SELECT * FROM product WHERE p_id='$ppi_p_id'");
		
		$ppi_price=$product->p_price;
		
		//calculate amount
		
		$ppi_amount=$ppi_price * $ppi_qty;
		
		$purchase_product_items_insert=$db->query("INSERT INTO purchase_product_items VALUES('','$ppi_pp_id','$ppi_p_id','$ppi_qty','','$ppi_price','$ppi_amount','1')");

		header("location:".$_SERVER['HTTP_REFERER']);
		
	}
	
	//update purchase_product
	
	if(isset($_POST['edit_purchase_product']))
	{
		
		$pp_amount=$_POST['pp_amount'];
		
		$purchase_product_edit=$db->query("UPDATE purchase_product SET pp_amount='$pp_amount',pp_status='2' WHERE pp_id='$ppi_pp_id'");
		
		header("Location:index.php?folder=purchase_product&file=view");
		
	}
	
?>