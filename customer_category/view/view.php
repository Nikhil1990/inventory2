<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
		<center><h2 class="box-title">View Customer Category</h2></center>
			
</div>

<form method="POST">

<div class="box-body">

<a href="?folder=customer_category&file=add" class="btn btn-success">Add New Customer Category</a><br><br>

<?php 
	
	if($customer_category_details)
	{
		
?>

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Category Type</th>
				<th>Category Discount(%)</th>
				<th>Allow Credit</th>
				<th colspan="2"><center>Option</center></th>
			
			</tr>
		
		</thead>
		
		<tbody>

			<?php 
				
				//display customer_category_details
				
				foreach($customer_category_details as $customer_category)
				{
				
			?>
					<tr>
					
						<td><?php echo $customer_category->c_cat_type; ?></td>
						<td><?php echo $customer_category->c_cat_discount; ?></td>
						<td><?php echo $customer_category->c_cat_credit; ?></td>
						
					
						<td><center><abbr title="Edit Customer Category"><a href="?folder=customer_category&file=edit&c_cat_id=<?php echo $customer_category->c_cat_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
						
						<td><center><abbr title="Delete Customer Category"><a href="?folder=customer_category&file=delete&c_cat_id=<?php echo $customer_category->c_cat_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>
						
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

