<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
	
		<div class="box-header">
		
			<center><h2 class="box-title">View Purchase Product Items</h2></center>
			
		</div>

<form method="POST">

<div class="box-body">

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Actual Quantity</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display purchase_product_items_details
				
				foreach($purchase_product_items_details as $purchase_product_items)
				{
					
					//fetch product
					
					$product=$db->get_row("SELECT * FROM product WHERE p_id=".$purchase_product_items->ppi_p_id);
					
			?>
			
					<tr>
					
						<td><?php echo $product->p_name; ?></td>
						<td><?php echo $purchase_product_items->ppi_price; ?></td>
						<td><?php echo $purchase_product_items->ppi_qty; ?></td>
						
						<td><input type="text" name="ppi_actual_qty[<?php echo $purchase_product_items->ppi_id; ?>]" class="form-control" value="<?php //echo $purchase_product_items->ppi_actual_qty; ?>"></td>

						<td><center><abbr title="Cancel Purchase Product Items"><a href="?folder=purchase_product_items&file=delete&ppi_id=<?php echo $purchase_product_items->ppi_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>

					</tr>

			<?php 
						
				}
				
			?>

		</tbody>

	</table>
	
	<div class="box-footer">
	
		<button type="submit" name="edit_purchase_product_items" class="btn btn-primary">Submit</button>
		
	</div>
	
	
</div>
</form>
</div>	
</div>
</div>