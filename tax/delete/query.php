<?php 
	
	$s_id=$_GET['s_id'];
	
	//delete store
	
	$store_delete=$db->query("DELETE FROM store WHERE s_id='$s_id'");
	
	header("Location: ?folder=tax&file=view");
	
?>