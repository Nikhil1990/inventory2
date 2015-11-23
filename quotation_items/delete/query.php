<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$qi_id=$_GET['qi_id'];
	
	//delete quotation_items
	
	$quotation_items_delete=$db->query("DELETE FROM quotation_items WHERE qi_id='$qi_id'");
	
	header("location:".$_SERVER['HTTP_REFERER']);
	
?>