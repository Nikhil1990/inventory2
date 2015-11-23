<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//insert brand
	
	if(isset($_POST['add_brand']))
	{
		
		$b_name=$_POST['b_name'];
		
		$brand_insert=$db->query("INSERT INTO brand VALUES('','$b_name','1')");
		
		header("Location: ?folder=brand&file=view");
		
	}
	
?>