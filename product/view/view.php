	<div class="row">

				<div class="col-md-12">
					<div class="box">
						<div class="box box-primary">
						
						<div class="box-body">
						
						<form method="POST" action="">
						
						<a href="?folder=product&file=add" class="btn btn-success">Add New Product</a><br><br>
						
						<div class="form-group col-md-2">
							
							<label>Select Brand</label>
							<select name="p_b_id" class="form-control">
							
								<option value="000">All</option>
								
								<?php 
									
									foreach($brand_details as $brand)
									{
									
								?>
								
										<option value="<?php echo $brand->b_id; ?>"><?php echo $brand->b_name; ?></option>
										
								<?php 
								
									}
									
								?>
														
							</select>
							
						</div>
							
						<div class="form-group col-md-2">
						
							<label>Select Category</label>
							<select name="p_c_id" class="form-control">
							
								<option value="000">All</option>
							
								<?php 
									
									foreach($category_details as $category)
									{
									
								?>
										
										<option value="<?php echo $category->c_id; ?>"><?php echo $category->c_name; ?></option>
										
								<?php 
								
									}
									
								?>
														
							</select>
							
						</div>
							
					<?php 
							
							if($a_at_id!=1)
							{
	  						
					?>
							
							<div class="form-group col-md-2">
							<label>Select Store</label>
							<select name="psl_p_id" class="form-control">
							<option value="000">All</option>
														
							</select>
							</div>
							
					<?php 
							
							}
							
					?>

							<div class="form-group col-md-2">
								<label></label>
								<button type="submit" class="btn btn-primary form-control" name="search_product">Search Product</button>
							</div>
							
						</form>
						</div>
						</div>
					</div>
				</div>
				
	</div>
			
<?php 
	
	if(isset($_POST['search_product']))
	{
	
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
				
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Brand</th>
				<th>Category</th>
				<th>Product Type</th>
				<th>Minimum Stock Level</th>
				<th>Available Stock</th>
				<th colspan="2"><center>Option</center></th>

			</tr>
		
		</thead>
		
		<tbody>

			<?php 
				
				 //display category_details
				
				foreach($product_details as $product)
				{
				
					//fetch product_stock
					
					$product_stock_sum=$db->get_var("SELECT SUM(ps_qty) FROM product_stock WHERE ps_p_id=".$product->p_id);
					
					//fetch brand
						
					$brand=$db->get_row("SELECT * FROM brand WHERE b_id=".$product->p_b_id);
					
					//fetch category
						
					$category=$db->get_row("SELECT * FROM category WHERE c_id=".$product->p_c_id);
					
					//fetch product_type
					
					$product_type=$db->get_row("SELECT * FROM product_type WHERE pt_id=".$product->p_pt_id);
					
			?>
					<tr>
					
						<td><?php echo $product->p_code; ?></td>
						<td><?php echo $product->p_name; ?></td>
						<td><?php echo $product->p_price; ?></td>
						<td><?php echo $brand->b_name; ?></td>
						<td><?php echo $category->c_name; ?></td>
						<td><?php echo $product_type->pt_type; ?></td>
						<td><?php echo $product_stock_sum; ?></td>
					
						<td><center><abbr title="Edit Product"><a href="?folder=product&file=edit&p_id=<?php echo $product->p_id; ?>" class="btn btn-primary fa fa-edit"></a></abbr></center></td>
						
						<td><center><abbr title="Delete Product"><a href="?folder=product&file=delete&p_id=<?php echo $product->p_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>

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


<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">All Products</h2></center>
			
		</div>

<div class="box-body">

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Brand</th>
				<th>Category</th>
				<th>Minimum Stock Level</th>
				<th>Available Stock</th>

			</tr>
		
		</thead>
		
		<tbody>

			<?php 

				//display product_details_qty
				
				foreach($all_product_details as $all_product)
				{
					
					//fetch product
					
					$product=$db->get_row("SELECT * FROM product WHERE p_id=".$all_product->psl_p_id);

					//fetch brand
					
					$brand=$db->get_row("SELECT * FROM brand WHERE b_id=".$product->p_b_id);

					//fetch category
					
					$category=$db->get_row("SELECT * FROM category WHERE c_id=".$product->p_c_id);
				
			?>
				
					<tr>
					
						<td><?php echo $product->p_code; ?></td>
						<td><?php echo $product->p_name; ?></td>
						<td><?php echo $product->p_price; ?></td>
						<td><?php echo $brand->b_name; ?></td>
						<td><?php echo $category->c_name; ?></td>
						<td><?php echo $product->p_min_stock_level; ?></td>
						<td><?php echo $all_product->psl_p_stock; ?></td>
					
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

<!--Low Level quantity-->

<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Low Level Stock Product</h2></center>
			
		</div>

<form method="POST">

<div class="box-body">

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Brand</th>
				<th>Category</th>
				<th>Minimum Stock Level</th>
				<th>Available Stock</th>

			</tr>
		
		</thead>
		
		<tbody>

			<?php 

				//display product_details_qty
				
				foreach($product_details_qty as $product_details)
				{
				
					//fetch product_stock
					
					$product_stock_sum=$db->get_var("SELECT SUM(ps_qty) FROM product_stock WHERE ps_p_id=".$product_details->p_id);
					
					//fetch brand
						
					$brand=$db->get_row("SELECT * FROM brand WHERE b_id=".$product_details->p_b_id);
					
					//fetch category
						
					$category=$db->get_row("SELECT * FROM category WHERE c_id=".$product_details->p_c_id);
					
					if($product_stock_sum < $product_details->p_min_stock_level)
					{

			?>
			
						<tr>
						
							<td><?php echo $product_details->p_code; ?></td>
							<td><?php echo $product_details->p_name; ?></td>
							<td><?php echo $product_details->p_price; ?></td>
							<td><?php echo $brand->b_name; ?></td>
							<td><?php echo $category->c_name; ?></td>
							<td><?php echo $product_details->p_min_stock_level; ?></td>
							<td><?php echo $product_stock_sum; ?></td>
							
						</tr>
						
			<?php 
					
					}
			
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