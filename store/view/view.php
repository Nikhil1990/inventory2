<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">View Store</h2></center>
			
		</div>

<form method="POST">

<div class="box-body">

<a href="?folder=store&file=add" class="btn btn-success">Add New Store</a><br><br>

<?php 
	
	if($store_details)
	{
	
?>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Store Name</th>
				<th>Store Address</th>
				<th>Care Person Name</th>
				<th>Phone Number</th>
				<th>Email ID</th>
				<th>Logo</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display store_details
				
				foreach($store_details as $store)
				{
					$s_id=$store->s_id;
			?>
					<tr>
					
						<td><?php echo $store->s_name; ?></td>
						<td><?php echo $store->s_address; ?></td>
						<td><?php echo $store->s_cp_name; ?></td>
						<td><?php echo $store->s_phoneno; ?></td>
						<td><?php echo $store->s_email; ?></td>
						<td><img src="<?php echo "./logo/".$s_id.".jpg"; ?>?time=123456789" class="user-image" alt="User Image"/></td>
	

						<td><center><abbr title="Edit Store"><a href="?folder=store&file=edit&s_id=<?php echo $s_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
						
						<td><center><abbr title="Delete Store"><a href="?folder=store&file=delete&s_id=<?php echo $s_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>

					</tr>
			<?php 
			
				}
				
			?>

		</tbody>

	</table>
	
</div>
</form>
<?php 
	
	}
	else
	{
		die("No records are present");
	}
	
?>
</div>	
</div>
</div>