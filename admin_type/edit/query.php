<?php 

	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$at_id=$_GET['at_id'];
	
	//fetch admin_type
	
	$admin_type=$db->get_row("SELECT * FROM admin_type WHERE at_id='$at_id'");
	
	//edit admin_type
	
	if(isset($_POST['edit_admin_type']))
	{
		
		$at_type=$_POST['at_type'];
		
		$admin_type_edit=$db->query("UPDATE admin_type SET at_type='$at_type' WHERE at_id='$at_id'");
		
		header("Location: ?folder=admin_type&file=view");
		
	}
	
?>