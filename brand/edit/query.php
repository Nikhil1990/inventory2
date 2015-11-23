<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$b_id=$_GET['b_id'];
	
	//fetch brand
	
	$brand=$db->get_row("SELECT * FROM brand WHERE b_id='$b_id'");
	
	//edit brand
	
	if(isset($_POST['edit_brand']))
	{
		
		$b_name=$_POST['b_name'];
		
		$brand_edit=$db->query("UPDATE brand SET b_name='$b_name' WHERE b_id='$b_id'");
		
		header("Location: ?folder=brand&file=view");
		
	}
	
?>