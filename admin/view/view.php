<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
		<center><h2 class="box-title">View Admin</h2></center>
			
</div>

<form method="POST">

<div class="box-body">

<a href="?folder=admin&file=add" class="btn btn-success">Add New Admin</a><br><br>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Admin Name</th>
				<th>Address</th>
				<th>Email ID</th>
				<th>Phone Number</th>
				<th colspan="2"><center>Option</center></th>
				
				
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php
				
				//display admin_details
				
				foreach($admin_details as $admin)
				{
					
			?>
					<tr>
						
						<td><?php echo $admin->a_name; ?></td>
						<td><?php echo $admin->a_address; ?></td>
						<td><?php echo $admin->a_email; ?></td>
						<td><?php echo $admin->a_phoneno; ?></td>
						
						<td><center><abbr title="Edit Admin"><a href="?folder=admin&file=edit&a_id=<?php echo $admin->a_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
						
						<td><center><abbr title="Delete Admin"><a href="?folder=admin&file=delete&a_id=<?php echo $admin->a_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>
						
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

