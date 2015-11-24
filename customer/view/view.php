<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
		<center><h2 class="box-title">View Customer</h2></center>
			
</div>

<form method="POST">

<div class="box-body">

<a href="?folder=customer&file=add" class="btn btn-success">Add New Customer</a><br><br>

<?php 

	if($customer_details)
	{

?>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Customer Name</th>
				<th>Address</th>
				<th>Email ID</th>
				<th>Phone Number</th>
				<th>Customer Type</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display customer_details
				
				foreach($customer_details as $customer)
				{
				
					//fetch customer_category
					
					$customer_category=$db->get_row("SELECT * FROM customer_category WHERE c_cat_id=".$customer->cust_cat_id);
				
			?>
					<tr>
					
						<td><?php echo $customer->cust_name; ?></td>
						<td><?php echo $customer->cust_address; ?></td>
						<td><?php echo $customer->cust_email; ?></td>
						<td><?php echo $customer->cust_phoneno; ?></td>
						<td><?php echo $customer_category->c_cat_type; ?></td>
						
						<td><center><abbr title="Edit Customer"><a href="?folder=customer&file=edit&cust_id=<?php echo $customer->cust_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
						
						<td><center><abbr title="Delete Customer"><a href="?folder=customer&file=delete&cust_id=<?php echo $customer->cust_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>
						
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