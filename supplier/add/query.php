<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch brand_details
	
	$brand_details=$db->get_results("SELECT * FROM brand ORDER BY b_name");
	
	//insert supplier
	
	if(isset($_POST['add_supplier']))
	{
		
		$sup_name=$_POST['sup_name'];
		$sup_address=$_POST['sup_address'];
		$sup_username=$_POST['sup_username'];
		$sup_password=md5($_POST['sup_password']);
		$sup_email=$_POST['sup_email'];
		$sup_phoneno=$_POST['sup_phoneno'];
		$sup_c_person=$_POST['sup_c_person'];
		$sup_b_id=$_POST['sup_b_id'];
		
		$supplier_insert=$db->query("INSERT INTO supplier VALUES('','$sup_name','$sup_address','$sup_username','$sup_password','$sup_email','$sup_phoneno','$sup_c_person','$sup_b_id','1')");
		
		header("Location: ?folder=supplier&file=view");
		
	}
	
?>