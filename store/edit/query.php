<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	include_once('./plugins/class.upload.php');
	
	$s_id=$_GET['s_id'];
	
	//fetch store
	
	$store=$db->get_row("SELECT * FROM store WHERE s_id='$s_id'");
	
	//edit store
	
	if(isset($_POST['edit_store']))
	{
		
		$s_name=$_POST['s_name'];
		$s_address=$_POST['s_address'];
		$s_cp_name=$_POST['s_cp_name'];
		$s_phoneno=$_POST['s_phoneno'];
		$s_email=$_POST['s_email'];
		
		$store_edit=$db->query("UPDATE store SET s_name='$s_name',s_address='$s_address',s_cp_name='$s_cp_name',s_phoneno='$s_phoneno',s_email='$s_email' WHERE s_id='$s_id'");
		
	
		$foo = new Upload($_FILES['s_logo']); 
	
		if ($foo->uploaded) 
		{
      
			$foo->file_new_name_body = 'foo';
		
			$foo->Process($_SERVER['DOCUMENT_ROOT'].'/inventory2/logo/');
   
			if ($foo->processed) 
			{
       
			}
			else
			{
				//echo 'error : ' . $foo->error;
			}  
  
			$foo->file_new_name_body =$s_id;
			$foo->image_resize = true;
			$foo->image_convert = 'jpg';
			$foo->image_x = 100; 
			$foo->image_ratio_y = true;
			$foo->Process($_SERVER['DOCUMENT_ROOT'].'/inventory2/logo/');
   
			if ($foo->processed) 
			{
     
				$foo->Clean();
			
			}
			else 
			{
				//echo 'error : ' . $foo->error;
			} 
   
		}
		
		header("Location: ?folder=store&file=view");
		
	}
	
	if(isset($_POST['delete_logo']))
	{
	
       $file=$_SERVER['DOCUMENT_ROOT'].'/inventory2/logo/'.$s_id.'.jpg';
	   
	   if (!unlink($file))
	   {
?>

			<div class="alert alert-danger alert-dismissible">
	
				<h4><i class="icon fa fa-check"></i>Error in deleteing logo</h4>
								
			</div>		
			
<?php 
	   }
	    else
		{
?>
			<div class="alert alert-success alert-dismissible">
	
				<h4><i class="icon fa fa-check"></i>Delete Logo Successfully</h4>
								
			</div>		
<?php 
		}
    }
	
?>