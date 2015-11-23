
<?php 
	
	if($purchase_order_payment_details)
	{
	
?>

<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
	
		<div class="box-header">
		
			<center><h2 class="box-title">View Pending Payments</h2></center>
			
		</div>

<form method="POST">

<div class="box-body">

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Purchase Order ID</th>
				<th>Amount</th>
				<th>Pending Amount</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display purchase_order_payment_details
				
				foreach($purchase_order_payment_details as $purchase_order_payment)
				{
				
					//fetch purchase_order
					
					$purchase_order=$db->get_row("SELECT * FROM purchase_order WHERE po_id=".$purchase_order_payment->pop_id);
				
			?>
					<tr>
					
						<td><?php echo"Purchase Order ".$purchase_order_payment->pop_po_id; ?></td>
						<td><?php echo $purchase_order_payment->pop_amount; ?></td>
						<td><?php echo $purchase_order->po_amount; ?></td>

						<td><center><abbr title="Cancel Purchase Order"><a href="?folder=purchase_order&file=delete&po_id=<?php echo $purchase_order->po_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>

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