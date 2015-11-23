<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$po_id=$_GET['po_id'];
	$cust_id=$_GET['cust_id'];
	
	//fetch customer
	
	$customer=$db->get_row("SELECT * FROM customer WHERE cust_id='$cust_id'");
	
	$purchase_order_items_details=$db->get_results("SELECT * FROM purchase_order_items WHERE poi_po_id='$po_id'");
	
	//insert purchase_order_items
	
	if(isset($_POST['add_product']))
	{
	
		$p_id=$_POST['p_id'];
		$poi_qty=$_POST['poi_qty'];
		$psl_id=$_POST['psl_id'];
		
		//update purchase_order
		
		$purchase_order_edit=$db->query("UPDATE purchase_order SET po_cust_id='$cust_id'");
		
		//fetch product
		
		$product=$db->get_row("SELECT * FROM product WHERE p_id='$p_id'");
		
		$p_price=$product->p_price;
		$p_qty=$product->p_stock;
		
		//calculate amount
		
		$poi_amount = $poi_qty * $p_price;
	
		$purchase_order_items_insert=$db->query("INSERT INTO purchase_order_items VALUES('','$po_id','$p_id','$poi_qty','$p_price','$poi_amount','1')");
		
		 //insert product_stock
		
		$product_stock_insert=$db->query("INSERT INTO product_stock VALUES('','$p_id','$a_s_id','$p_price','-$poi_qty',CURDATE(),'$a_id','1')");
		
		//update product
		
		$p_stock=$db->get_var("SELECT SUM(ps_qty) FROM product_stock WHERE ps_p_id='$p_id'");
		
		$product_edit=$db->query("UPDATE product SET p_stock='$p_stock' WHERE p_id='$p_id'");

		//update product_stock_location
		
		$product_stock_location_edit=$db->query("UPDATE product_stock_location SET psl_p_stock=psl_p_stock-'$poi_qty' WHERE psl_id='$psl_id'");
		
		header("location:".$_SERVER['HTTP_REFERER']);
		
	}
	
	//fetch payment_method_details
	
	$payment_method_details=$db->get_results("SELECT * FROM payment_method ORDER BY pm_type");
	
	//fetch purchase_order_payment_details
	
	$purchase_order_payment_details=$db->get_results("SELECT * FROM purchase_order_payment WHERE pop_po_id='$po_id'");
	
	//update purchase_order
	
	if(isset($_POST['send_invoice']))
	{
		
		$po_discount=$_POST['discount'];
		$po_tax=$_POST['tax'];
		$po_transport=$_POST['trans_charges'];
		$amount=$_POST['amount'];
		
		$pop_pm_id=$_POST['pop_pm_id'];
		$pop_note=$_POST['pop_note'];
		$pop_amount=$_POST['pop_amount'];
		
	
		//calculate final amount
		
		if($po_transport!=0)
		{
			$po_amount=$po_transport + $amount;
		}
		else
		{
			$po_amount=$amount;
		}
		
		$purchase_order_edit=$db->query("UPDATE purchase_order SET po_discount='$po_discount',po_tax='$po_tax',po_transport='$po_transport',po_amount='$po_amount' WHERE po_id='$po_id'");
		
		//insert purchase_order_payment
		
		$purchase_order_payment=$db->query("INSERT INTO purchase_order_payment VALUES('','$po_id','$pop_pm_id','$pop_note','$pop_amount','1')");
		
		//update purchase_order_status
		
		if($amount == $pop_amount)
		{
			
			//update purchase_order
			
			$purchase_order=$db->query("UPDATE purchase_order SET po_status='2' WHERE po_id='$po_id'");
			
		}
		
		header("Location:".$_SERVER['HTTP_REFERER']);
		
	}
	
	//edit purchase_order_items_qty
	
	if(isset($_POST['edit_quantity']))
	{
		
		$poi_qty=$_POST['poi_qty'];
		$poi_id=$_POST['poi_id'];
		
		//update purchase_order_items
		
		$purchase_order_items_qty=$db->query("UPDATE purchase_order_items SET poi_qty='$poi_qty',poi_amount=poi_price * '$poi_qty' WHERE poi_id='$poi_id'");

		header("location:".$_SERVER['HTTP_REFERER']);
			
	}
	
	//download pdf
	
	if(isset($_POST['download_pdf']))
	{
		header("Location: pdf_files/bill.php?po_id=".$po_id);
	}
	
?>