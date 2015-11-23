<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//insert admin_type
	
	if(isset($_POST['add_admin_type']))
	{
		
		$at_type=$_POST['at_type'];
		
		$admin_type_insert=$db->query("INSERT INTO admin_type VALUES('','$at_type')");
		
		header("Location: ?folder=admin_type&file=view");
		
	}
	
?>