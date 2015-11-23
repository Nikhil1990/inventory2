<?php 
	
	//insert product type
	
	if(isset($_POST['add_product_type']))
	{
		
		$pt_type=$_POST['pt_type'];

		$product_type_insert=$db->query("INSERT INTO product_type VALUES('','$pt_type')");
		
		header("Location:?folder=product_type&file=view");
		
	}
	
?>