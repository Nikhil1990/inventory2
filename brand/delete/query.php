<?php 

	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$b_id=$_GET['b_id'];
	
	//fetch brand
	
	$brand_delete=$db->query("DELETE FROM brand WHERE b_id='$b_id'");
	
	header("Location: ?folder=brand&file=view");
	
?>