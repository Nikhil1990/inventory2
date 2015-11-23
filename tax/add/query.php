<?php 
	
	//fetch store_details
	
	$store_details=$db->get_results("SELECT * FROM store ORDER BY s_name");
	
	if(isset($_POST['add_store']))
	{
		
		$tax_amount=$_POST['tax_amount'];
		$tax_s_id=$_POST['tax_s_id'];
		
		//insert tax
		
		$tax_insert=$db->query("INSERT INTO tax VALUES('','$tax_amount','$tax_s_id','1')");
		
		header("Location: ?folder=tax&file=view");
		
	}
	
?>