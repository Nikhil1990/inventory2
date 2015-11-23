<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$sup_id=$_GET['sup_id'];
	
	//delete supplier
	
	$supplier_delete=$db->query("DELETE FROM supplier WHERE sup_id='$sup_id'");
	
	header("Location: ?folder=supplier&file=view");
	
?>