<?php 
	
	include('private/conn.php');
	
	if(isset($_POST['p_name']))
	{
		$p_name=$_POST['p_name'];

		//fetch product
		
		$product_details=$db->get_results("SELECT * FROM product WHERE p_name LIKE '%$p_name' OR p_code LIKE '%$p_name' ORDER BY p_name");
		
		if($product_details)
		{
		
?>

		<div class="row">
		<div class="col-md-12">
		<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Product Details</h2></center>
			
		</div>
	
		<div class="box-body">
		
		<form method="POST">
			
			<table class="table table-bordered">
			
			<thead>
		
			<tr>
				
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quattity</th>
				<th>Option</th>
				
				
			</tr>
			
			</thead>
			
			<tbody>
				
				<?php 
					
					//display product_details
					
					foreach($product_details as $product)
					{
						
				?>
						
						<tr>
						
							<td><?php echo $product->p_code; ?></td>
							<td><?php echo $product->p_name; ?></td>
							<td><?php echo $product->p_price; ?></td>
							<td><input class="form-control" name="poi_qty"></td>
							<td><button class="btn btn-primary" type="submit" name="add_product">Add Product</button></td>
						
							<input type="hidden" name="p_id" value="<?php echo $product->p_id; ?>">
							
						</tr>
						
				<?php 
				
					}
					
				?>
				
			</tbody>

			</table>
			
		</form>
			
		</div>
		</div>
		</div>
		</div>
		
<?php 	
		
		}

	}
	
?>