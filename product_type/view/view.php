<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">View Product Type</h2></center>
			
		</div>

<form method="POST">

<div class="box-body">

<a href="?folder=product_type&file=add" class="btn btn-success">Add Product Type</a><br><br>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Product Type</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display product_type_details
				
				foreach($product_type_details as $product_type)
				{

			?>
					<tr>
					
						<td><?php echo $product_type->pt_type; ?></td>

						<td><center><abbr title="Edit Product Type"><a href="?folder=product_type&file=edit&pt_id=<?php echo $product_type->pt_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
						
						<td><center><abbr title="Delete Product Type"><a href="?folder=product_type&file=delete&pt_id=<?php echo $product_type->pt_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>

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