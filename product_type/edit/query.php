<?php 
	
	$pt_id=$_GET['pt_id'];
	
	//display product_type
	
	$product_type=$db->get_row("SELECT * FROM product_type WHERE pt_id='$pt_id'");
	
	//update product_type
	
	if(isset($_POST['edit_product_type']))
	{
		
		$pt_type=$_POST['pt_type'];

		$product_type_edit=$db->query("UPDATE product_type SET pt_type='$pt_type' WHERE pt_id='$pt_id'");
		
		header("Location:?folder=product_type&file=view");
		
	}
	
?>