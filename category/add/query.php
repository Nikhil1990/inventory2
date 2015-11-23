<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//fetch brand_details
	
	$brand_details=$db->get_results("SELECT * FROM brand ORDER BY b_name");
	
	//insert category
	
	if(isset($_POST['add_category']))
	{
	
		$c_name=$_POST['c_name'];
		
		$category_insert=$db->query("INSERT INTO category VALUES('','$c_name','1')");
		
		header("Location: ?folder=category&file=view");
		
	}
	
?>