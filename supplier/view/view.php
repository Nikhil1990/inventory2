<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
		<center><h2 class="box-title">View Supplier</h2></center>
			
</div>

<form method="POST">

<div class="box-body">

<a href="?folder=supplier&file=add" class="btn btn-success">Add New Supplier</a><br><br>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Supplier Name</th>
				<th>Address</th>
				<th>Email ID</th>
				<th>Phone Number</th>
				<th>Contact Person</th>
				<th>Brand</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>

			<?php 
				
				//display category_details
				
				foreach($supplier_details as $supplier)
				{
				
					//fetch brand
					
					$brand=$db->get_row("SELECT * FROM brand WHERE b_id=".$supplier->sup_b_id);
			?>
					<tr>
					
						<td><?php echo $supplier->sup_name; ?></td>
						<td><?php echo $supplier->sup_address; ?></td>
						<td><?php echo $supplier->sup_email; ?></td>
						<td><?php echo $supplier->sup_phoneno; ?></td>
						<td><?php echo $supplier->sup_c_person; ?></td>
						<td><?php echo $brand->b_name; ?></td>
					
						<td><center><abbr title="Edit Supplier"><a href="?folder=supplier&file=edit&sup_id=<?php echo $supplier->sup_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
						
						<td><center><abbr title="Delete Supplier"><a href="?folder=supplier&file=delete&sup_id=<?php echo $supplier->sup_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>
						
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