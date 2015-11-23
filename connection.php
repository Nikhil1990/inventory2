<?php
	global $db;
	include_once('core.php'); 
	
	include_once('mysql.php'); 
	
	$db = new ezSQL_mysql('root','','Travel','localhost');
	
?>