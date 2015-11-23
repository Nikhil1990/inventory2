<?php 
	
	include("./private/conn.php");
	
	if(isset($_POST['p_name']))
	{
		
		$p_name=$_POST['p_name'];
		
		$product_details=$db->get_results("SELECT * FROM product WHERE p_name LIKE '%$p_name' OR p_code LIKE '%$p_name' ORDER BY p_name");
		
?>

<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
	
		<div class="box-header">
		
			<center><h2 class="box-title">View Product</h2></center>
			
		</div>

<form method="POST">

<div class="box-body">

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
			
				<th>Select</th>
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Brand</th>
				<th>Category</th>
				<th>Minimum Stock Level</th>
				<th>Available Stock</th>
				<th>Enter Quantity</th>
				<th>Option</th>
			
			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				//display product_details
				
				foreach($product_details as $product)
				{
					
					//fetch brand
					
					$brand=$db->get_row("SELECT * FROM brand WHERE b_id=".$product->p_b_id);
					
					//fetch category
					
					$category=$db->get_row("SELECT * FROM category WHERE c_id=".$product->p_c_id);
					
			?>
					
					<tr>
						
						<td><input type="radio" name="p_id" value="<?php echo $product->p_id; ?>"></td>
						<td><?php echo $product->p_code; ?></td>
						<td><?php echo $product->p_name; ?></td>
						<td><?php echo $product->p_price; ?></td>
						<td><?php echo $brand->b_name; ?></td>
						<td><?php echo $category->c_name; ?></td>
						<td><?php echo $product->p_min_stock_level; ?></td>
						<td><?php echo $product->p_stock; ?></td>
						
						<td><input name="ppi_qty" placeholder="Enter Quantity" class="form-control"/></td>

						<td><button class="btn btn-primary" type="submit" name="add_product" >Add Product</button></td>
						
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
	
<?php 

	}
	
?>