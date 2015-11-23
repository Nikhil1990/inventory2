<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	$sup_id=$_GET['sup_id'];
	
	//fetch brand_details
	
	$brand_details=$db->get_results("SELECT * FROM brand ORDER BY b_name");
	
	//fetch supplier
	
	$supplier=$db->get_row("SELECT * FROM supplier WHERE sup_id='$sup_id'");
	
	//edit supplier
	
	if(isset($_POST['edit_supplier']))
	{
		
		$sup_name=$_POST['sup_name'];
		$sup_address=$_POST['sup_address'];
		$sup_email=$_POST['sup_email'];
		$sup_phoneno=$_POST['sup_phoneno'];
		$sup_c_person=$_POST['sup_c_person'];
		$sup_b_id=$_POST['sup_b_id'];
		
		$supplier_edit=$db->query("UPDATE supplier SET sup_name='$sup_name',sup_address='$sup_address',sup_email='$sup_email',sup_phoneno='$sup_phoneno',sup_c_person='$sup_c_person',sup_b_id='$sup_b_id' WHERE sup_id='$sup_id'");
		
		header("Location: ?folder=supplier&file=view");
		
	}
	
?>