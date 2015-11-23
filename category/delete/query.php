<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$c_id=$_GET['c_id'];
	
	//delete category
	
	$category_delete=$db->query("DELETE FROM category WHERE c_id='$c_id'");
	
	header("Location: ?folder=category&file=view");
	
?>