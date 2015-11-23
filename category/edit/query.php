<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$c_id=$_GET['c_id'];
	
	//fetch category
	
	$category=$db->get_row("SELECT * FROM category WHERE c_id='$c_id'");
	
	//update brand
	
	if(isset($_POST['edit_category']))
	{
		
		$c_name=$_POST['c_name'];
		
		$category_edit=$db->query("UPDATE category SET c_name='$c_name' WHERE c_id='$c_id'");
		
		header("Location: ?folder=category&file=view");
		
	}
	
?>