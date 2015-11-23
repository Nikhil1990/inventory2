<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
	
		<div class="box-header">
		
			<center><h2 class="box-title">View Purchase Order</h2></center>
			
		</div>

<form method="POST">

<div class="box-body">

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Serial Number</th>
				<th>Purchase Order ID</th>
				<th>Amount</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
			
				$i=1;
				
				//display purchase_order_details
				
				foreach($purchase_order_details as $purchase_order)
				{
			?>
					<tr>
					
						<td><?php echo $i; ?></td>
						
						<td><a href="?folder=purchase_order_items&file=add&po_id=<?php echo $purchase_order->po_id; ?>&cust_id=<?php echo $purchase_order->po_cust_id; ?>">Purchase Order <?php echo $purchase_order->po_id; ?></a></td>
						
						<td><?php echo $purchase_order->po_amount; ?></td>

						<td><center><abbr title="Cancel Purchase Order"><a href="?folder=purchase_order&file=delete&po_id=<?php echo $purchase_order->po_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>

					</tr>
			<?php 
					
				$i++;
					
				}
				
			?>

		</tbody>

	</table>
	
</div>
</form>
</div>	
</div>
</div>