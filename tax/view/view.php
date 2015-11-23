<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
		<center><h2 class="box-title">View Tax</h2></center>
			
</div>

<form method="POST">

<div class="box-body">

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Tax Amount</th>
				<th>Store</th>
				<th><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display customer_details
				
				foreach($tax_details as $tax)
				{
				
					//fetch store
					
					$store=$db->get_row("SELECT * FROM store WHERE s_id=".$tax->tax_s_id);
				
			?>
					<tr>
					
						<td><?php echo $tax->tax_amount; ?></td>
						<td><?php echo $store->s_name; ?></td>
						
						<td><center><abbr title="Edit Tax"><a href="?folder=tax&file=edit&tax_id=<?php echo $tax->tax_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>

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