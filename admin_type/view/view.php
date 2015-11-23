<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
		<center><h2 class="box-title">View Admin Type</h2></center>
			
</div>

<form method="POST">

<div class="box-body">

<a href="?folder=admin_type&file=add" class="btn btn-success">Add New Admin Type</a><br><br>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Admin Type</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display admin_type_details
				
				foreach($admin_type_details as $admin_type)
				{

			?>
					<tr>
					
						<td><?php echo $admin_type->at_type; ?></td>

						<td><center><abbr title="Edit Admin Type"><a href="?folder=admin_type&file=edit&at_id=<?php echo $admin_type->at_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
						
						<td><center><abbr title="Delete Admin Type"><a href="?folder=admin_type&file=delete&at_id=<?php echo $admin_type->at_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>
						
					</tr>
			<?php 
			
				}
				
			?>
			
			
		</tbody>

	</table>
	
</div>
</form>
</div>	
</div>
</div>