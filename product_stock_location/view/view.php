<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">View Store</h2></center>
			
		</div>

<form method="POST">

<div class="box-body">

<a href="?folder=product_stock_location&file=add" class="btn btn-success">Add Product Stock</a><br><br>

<?php 
	
	if($product_stock_location_details)
	{
?>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Product Name</th>
				<th>Product Stock</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display product_stock_location_details
				
				foreach($product_stock_location_details as $product_stock_location)
				{
				
					//fetch product
					
					$product=$db->get_row("SELECT * FROM product WHERE p_id=".$product_stock_location->psl_p_id);
					
					//fetch store
					
					$store=$db->get_row("SELECT * FROM store WHERE s_id=".$product_stock_location->psl_s_id);

			?>
			
					<tr>
					
						<td><?php echo $product->p_name; ?></td>
						<td><?php echo $product_stock_location->psl_p_stock; ?></td>
						
						<td><abbr title="Edit Stock"><center><a href="?folder=product_stock_location&file=edit&psl_id=<?php echo $product_stock_location->psl_id; ?>" class="btn btn-primary fa fa-edit"></a></center></abbr></td>
						
						<td><abbr title="Delete Stock"><center><a href="?folder=product_stock_location&file=delete&psl_id=<?php echo $product_stock_location->psl_id; ?>" class="btn btn-primary fa fa-trash"></a></center></abbr></td>

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