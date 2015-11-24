<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
		<center><h2 class="box-title">View Admin</h2></center>
			
</div>

<form method="POST">

<div class="box-body">

<a href="?folder=brand&file=add" class="btn btn-success">Add New Brand</a><br><br>

<?php 
	
	if($brand_details)
	{
?>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Brand Name</th>
				<th colspan="2"><center>Option</center></th>
				
				
			</tr>
		
		</thead>
		
		<tbody>
		
			
			
			<?php 
				
				//display brand_details
				
				foreach($brand_details as $brand)
				{
					
			?>
					<tr>
					
						<td><?php echo $brand->b_name; ?></td>
					
						<td><center><abbr title="Edit Brand"><a href="?folder=brand&file=edit&b_id=<?php echo $brand->b_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
					
						<td><center><abbr title="Delete Brand"><a href="?folder=brand&file=delete&b_id=<?php echo $brand->b_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>
						
					</tr>
			<?php 
				}
				
			?>
			
			
		</tbody>

	</table>
	
</div>
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

