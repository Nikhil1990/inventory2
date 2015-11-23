<html>
<body>
<?php
if(isset($_GET['filename']))
{
$filename= $_GET['filename'];
unlink($filename);
header("location:".$_SERVER['HTTP_REFERER']);
}
include($_SERVER['DOCUMENT_ROOT']."/Travel/connection.php");

if(isset($_GET['id']))
{
$tablename=$_GET['tablename'];

$colname=$_GET['colname'];
$id=$_GET['id'];
if($tablename=='batch_campers_allocation')
{
$db->query("DELETE FROM  $tablename  WHERE $colname=$id");
}
else
{
		$db->query("UPDATE $tablename set rowstatus ='0' WHERE $colname=$id");
		
		}
/* 		$qry=$db->query("DELETE FROM $tablename WHERE $colname='$id'"); */
		if($qry)
		{
				//echo "Record deleted successfully";
		}
	}
header("location:".$_SERVER['HTTP_REFERER']);
?>
</body>