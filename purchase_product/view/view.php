<?php 
	
	if($purchase_product_details)
	{
	
?>

<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
	
		<div class="box-header">
		
			<center><h2 class="box-title">View Purchase Product</h2></center>
			
		</div>

<form method="POST">

<div class="box-body">

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Purchase Product ID</th>
				<th>Amount</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display purchase_product_details
				
				foreach($purchase_product_details as $purchase_product)
				{
				
			?>
					<tr>
					
						<td><a href="?folder=purchase_product_items&file=view&ppi_pp_id=<?php echo $purchase_product->pp_id; ?>"><?php echo"Purchase Product ID ".$purchase_product->pp_id; ?></a></td>
						<td><?php echo $purchase_product->pp_amount; ?></td>

						<td><center><abbr title="Cancel Purchase Product"><a href="?folder=purchase_product&file=delete&pp_id=<?php echo $purchase_product->pp_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>

					</tr>
			<?php 
					
				}
				
			?>

		</tbody>

	</table>
	
</div>
</div>	
</div>
</div>

<?php 
	
	}
?>