<?php 
	
	if(!isset($system) ||  $system != 'yes')
	{
		die("<H2>You are not allowed to view this resource</H2>");
	}
	
	//insert store
	
	if(isset($_POST['add_store']))
	{
		
		$s_name=$_POST['s_name'];
		$s_address=$_POST['s_address'];
		$s_cp_name=$_POST['s_cp_name'];
		$s_phoneno=$_POST['s_phoneno'];
		$s_email=$_POST['s_email'];
		
		$store_insert=$db->query("INSERT INTO store VALUES('','$s_name','$s_address','$s_cp_name','$s_phoneno','$s_email','')");
		
		//get current id
		
		$s_id=$db->insert_id;
		
		
		/*$my_file = './logo/'.$s_id.'.png';
		
		echo $my_file;
		
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); */
		
		//fwrite($handle, $data);
		
		include_once('./plugins/class.upload.php');
		
		$foo = new Upload($_FILES['s_logo']); 
		
		//print_r($_FILES);
	
		if ($foo->uploaded) 
		{
			// save uploaded image with no changes
  
			// save uploaded image with a new name
      
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

	$file=$_SERVER['DOCUMENT_ROOT'].'/inventory2/logo/'.$s_id.'.jpg';
	
	//echo $file;

    if(is_file($file))
    {
		
	}
	else
	{
		$file=$_SERVER['DOCUMENT_ROOT'].'/inventory2/logo/'.$s_id.'.png';
                    	
		if(is_file($file))
		{
		    
		}
	} 
   
		header("Location: ?folder=store&file=view");
		
	}
	
?>