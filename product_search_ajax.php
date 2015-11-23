<?php 
	
	session_start();
	
	$a_s_id=$_SESSION['a_s_id'];
	
	include('private/conn.php');
	
	if(isset($_POST['p_name']))
	{
	
		$p_name=$_POST['p_name'];
		
		//fetch product
		
		$product_details=$db->get_results("SELECT * FROM product JOIN product_stock_location ON product.p_id=product_stock_location.psl_p_id WHERE (p_name LIKE '%$p_name' OR p_code LIKE '%$p_name') AND psl_s_id='$a_s_id' ORDER BY p_name");

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
					<th>Total Stock</th>
					<th>Quantity</th>
					<th>Option</th>
				
				</tr>
			
			</thead>
			
			<tbody>
				
				<?php 
					
					//display product_details

					foreach($product_details as $product)
					{
					
						//print_r($product);
						
						//fetch product_stock
		
						$product_stock_sum=$db->get_var("SELECT SUM(ps_qty) FROM product_stock WHERE ps_p_id=".$product->p_id." AND ps_s_id=".$a_s_id);
						
						//fetch product_stock_location
						
						$product_stock_location=$db->get_row("SELECT * FROM product_stock_location");
						
						if($product->psl_p_stock==0)
						{
						
				?>
							<tr>
						
								<td><?php echo $product->p_code; ?></td>
								<td><?php echo $product->p_name; ?></td>
								<td><?php echo $product->p_price; ?></td>
								<td><?php echo $product->psl_p_stock; ?></td>
								
								<td><input class="form-control" name="poi_qty" disabled></td>
								<td><button class="btn btn-primary" type="submit" name="add_product" disabled>Add Product</button></td>
						
								<input type="hidden" name="p_id" value="<?php echo $product->p_id; ?>">
								<input type="hidden" name="psl_id" value="<?php echo $product->psl_id; ?>">

							</tr>
				<?php 
							
						}
						else
						{ 
						
				?>

							<tr>
						
								<td><?php echo $product->p_code; ?></td>
								<td><?php echo $product->p_name; ?></td>
								<td><?php echo $product->p_price; ?></td>
								<td><?php echo $product->psl_p_stock; ?></td>
								
								<td><input class="form-control" name="poi_qty"></td>
								<td><button class="btn btn-primary" type="submit" name="add_product">Add Product</button></td>
						
								<input type="hidden" name="p_id" value="<?php echo $product->p_id; ?>">
								<input type="hidden" name="psl_id" value="<?php echo $product->psl_id; ?>">

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
		else
		{
			echo"<b style='color:red;'>This Product Does Not Exist</b>";
		}

	}
	
?>