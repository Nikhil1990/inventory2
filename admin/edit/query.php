<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$a_id=$_GET['a_id'];
	
	//fetch admin_type_details
	
	$admin_type_details=$db->get_results("SELECT * FROM admin_type ORDER BY at_type");
	
	//fetch store_details
	
	$store_details=$db->get_results("SELECT * FROM store ORDER BY s_name");
	
	//fetch admin
	
	$admin=$db->get_row("SELECT * FROM admin WHERE a_id='$a_id'");
	
	if(isset($_POST['edit_admin']))
	{
		
		$a_name=$_POST['a_name'];
		$a_address=$_POST['a_address'];
		$a_email=$_POST['a_email'];
		$a_phoneno=$_POST['a_phoneno'];
		$a_at_id=$_POST['a_at_id'];
		$a_s_id=$_POST['a_s_id'];
		
		//update admin
		
		$admin_edit=$db->query("UPDATE admin SET a_name='$a_name',a_address='$a_address',a_email='$a_email',a_phoneno='$a_phoneno','$a_at_id','$a_s_id' WHERE a_id='$a_id'");
		
		header("Location: index.php");
		
	}
	
?>