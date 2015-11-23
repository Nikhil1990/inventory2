<?php 
	
	include("private/conn.php");
	
	if(isset($_POST['p_name']))
	{
	
		$p_name=$_POST['p_name'];
		
		//fetch product_details
		
		$product_details=$db->get_results("SELECT * FROM product WHERE p_name REGEXP '^$p_name$' OR p_code REGEXP '^$p_name$'");
	
?>

<!--<div class="row">

    <div class="col-xs-12">
	
        <div class="box box-primary">
		
		<div class="box-header">
		
			<center><h2 class="box-title">Product Details</h2></center>
			
		</div>
		
			<div class="box-body">-->
			
			<table class="table table-bordered">
	
			<thead>
		
			<tr>
				
				<th>Select</th>
				<th>Product Code</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Minimum Stock Level</th>
			
			</tr>
		
			</thead>
		
			<tbody>
				
				<?php 
					
					//display product_details
					
					foreach($product_details as $product)
					{
						
						//fetch brand
						
				?>
						
						<tr>
							
							<td><input type="radio" name="p_id" value="<?php echo $product->p_id; ?>" /></td>
							<td><?php echo $product->p_code; ?></td>
							<td><?php echo $product->p_name; ?></td>
							<td><?php echo $product->p_price; ?></td>
							<td><?php echo $product->p_min_stock_level; ?></td>
							
						</tr>
						
				<?php 
				
					}
					
				?>
				
			</tbody>
			
			</table>
                  
            <!--</div>
			
        </div>

    </div>
	
</div>-->

<?php 
	
	}
	
?>