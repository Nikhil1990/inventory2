<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
		<center><h2 class="box-title">View Category</h2></center>
			
</div>

<form method="POST">

<div class="box-body">

<a href="?folder=category&file=add" class="btn btn-success">Add New Category</a><br><br>

<?php 
	
	if($category_details)
	{
	
?>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Category Name</th>
				<th colspan="2"><center>Option</center></th>
				
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display category_details
				
				foreach($category_details as $category)
				{
					
			?>
			
					<tr>
					
						<td><?php echo $category->c_name; ?></td>
					
						<td><center><abbr title="Edit Category"><a href="?folder=category&file=edit&c_id=<?php echo $category->c_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
						
						<td><center><abbr title="Delete Category"><a href="?folder=category&file=delete&c_id=<?php echo $category->c_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>
					
						
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