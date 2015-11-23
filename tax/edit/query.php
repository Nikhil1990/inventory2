<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$tax_id=$_GET['tax_id'];
	
	//fetch store_details
	
	$store_details=$db->get_results("SELECT * FROM store ORDER BY s_name");
	
	//fetch tax
	
	$tax=$db->get_row("SELECT * FROM tax WHERE tax_id='$tax_id'");
	
	//edit tax
	
	if(isset($_POST['edit_tax']))
	{
		
		$tax_amount=$_POST['tax_amount'];
		$tax_s_id=$_POST['tax_s_id'];
		
		$tax_edit=$db->query("UPDATE tax SET tax_amount='$tax_amount',tax_s_id='$tax_s_id' WHERE tax_id='$tax_id'");
		
		header("Location: ?folder=tax&file=view");
		
	}
	
	
?>