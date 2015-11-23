<?php 
	
	$pt_id=$_GET['pt_id'];
	
	$product_type_delete=$db->query("DELETE FROM product_type WHERE pt_id='$pt_id'");
	
	header("Location:?folder=product_type&file=view");
	
?>