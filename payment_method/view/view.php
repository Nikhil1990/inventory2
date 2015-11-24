<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">View Payment Method</h2></center>
			
		</div>

<form method="POST">

<div class="box-body">

<a href="?folder=payment_method&file=add" class="btn btn-success">Add New Payment Method</a><br><br>

<?php 
	
	if($payment_method_details)
	{
?>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Payment Type</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display payment_method_details
				
				foreach($payment_method_details as $payment_method)
				{
				
			?>
			
					<tr>
					
						<td><?php echo $payment_method->pm_type; ?></td>
						
						<td><center><abbr title="Edit Payment Method"><a href="?folder=payment_method&file=edit&pm_id=<?php echo $payment_method->pm_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
						
						<td><center><abbr title="Delete Payment Method"><a href="?folder=payment_method&file=delete&pm_id=<?php echo $payment_method->pm_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>
						
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