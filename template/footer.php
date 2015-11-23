
<script src="gen_validatorv4.js" type="text/javascript"></script>
<script src="js/jQuery-2.1.4.min.js"></script>
<script src="plugins/jquery-ui.js"></script>
	
<?php 

	if(isset($_GET['folder']))
	{
	
		$folder = $_GET['folder'];
	
	} 
	else
	{
	
		$folder='default';
		
	}
	
	if(isset($_GET['file']))
	{
	
		$file = $_GET['file'];
	
	} 
	else
	{
	
		$file='default';
		
	}
	
	include_once('/'.$folder.'/'.$file.'/script.php');
	
?>