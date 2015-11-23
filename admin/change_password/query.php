<?php 
	
	$a_id=$_GET['a_id'];
	
	//fetch admin
	
	$admin=$db->get_row("SELECT * FROM admin WHERE a_id=".$a_id);
	
	if(isset($_POST['change_password']))
	{
		
		$a_old_password=MD5($_POST['a_old_password']);
		$a_new_password=MD5($_POST['a_new_password']);
		$a_retype_password=MD5($_POST['a_retype_password']);
		
		
		if(($a_old_password == $admin->a_password) && $a_new_password == $a_retype_password)
		{
				
				//update admin password
				
				$admin_edit=$db->query("UPDATE admin SET a_password='$a_new_password' WHERE a_id='$a_id'");
?>

			<div class="alert alert-success">
			
				<strong>Success!</strong> Update Password successful
				
			</div>
			
<?php 
		}
		else
		{
			echo"Password does not change";
		}
		
	}
	
?>