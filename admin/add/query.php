<?php 

	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch admin_type_details
	
	$admin_type_details=$db->get_results("SELECT * FROM admin_type ORDER BY at_type");
	
	//fetch store_details
	
	$store_details=$db->get_results("SELECT * FROM store ORDER BY s_name");
	
	//insert into admin
	
	if(isset($_POST['add_admin']))
	{
		$a_name=$_POST['a_name'];
		$a_address=$_POST['a_address'];
		$a_username=$_POST['a_username'];
		$a_password=MD5($_POST['a_password']);
		$a_email=$_POST['a_email'];
		$a_phoneno=$_POST['a_phoneno'];
		$a_at_id=$_POST['a_at_id'];
		$a_s_id=$_POST['a_s_id'];
		
		if($a_at_id==1)
		{
			$a_s_id=1;
		}
		else
		{
			$a_s_id=$_POST['a_s_id'];
		}
		
		$admin_insert=$db->query("INSERT INTO admin VALUES('','$a_name','$a_address','$a_username','$a_password','$a_email','$a_phoneno','$a_at_id','$a_s_id',CURDATE(),'1')");
		
		$db->debug();
		
		//header("Location: ?folder=admin&file=view");
		
	}
	
?>