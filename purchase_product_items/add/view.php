<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
	
		<div class="box-header">
		
			<center><h2 class="box-title">Purchase Product</h2></center>
			
		</div>

		<div class="box-body">
			
			<form method="POST">
				 <div class="row">
                    <div class="form-group col-md-12">
                      <label>Search Product</label>
                      <input name="p_name" id="p_name" placeholder="Search Product By Name, Code" class="form-control" onkeyup="search_product()" />
                    </div>
				</div>
			</form>
		</div>
</div>	
</div>
</div>

<div id="reply_purchase_product"></div>

<?php 
	
	if($purchase_product_items_details)
	{
	
?>

<div class="row">
<div class="col-md-12">
<div class="box box-primary">	
<div class="box-body">

	<section class="invoice">
	
		<form method="POST">
		
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
              <h2 class="page-header">
                <i class="fa fa-globe"></i> AdminLTE, Inc.
                <small class="pull-right">Date: <?php echo date('d/m/Y'); ?></small>
              </h2>
            </div><!-- /.col -->
          </div>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              From
              <address>
				
				<?php 
				
					//fetch store
					
					$store=$db->get_row("SELECT * FROM store WHERE s_id='$a_s_id'"); 
					
				?>
				
                <strong><?php echo $store->s_name; ?></strong><br>
                Address: <?php echo $store->s_address; ?><br>
                Name: <?php echo $store->s_cp_name; ?><br>
                Phone: <?php echo $store->s_phoneno; ?><br>
                Email: <?php echo $store->s_email; ?>
				
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?php echo $admin->a_name; ?></strong><br>
                Address: <?php echo $admin->a_address; ?><br>
                Phone: <?php echo $admin->a_phoneno; ?><br>
                Email: <?php echo $admin->a_email; ?>
              </address>
            </div><!-- /.col -->
			
            <div class="col-sm-4 invoice-col">
              
              <b>Purchase Product ID:</b> <?php echo $ppi_pp_id; ?><br>
              <b>Payment Due:</b> <?php echo date('d/m/Y'); ?><br>
              
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
			  
                <thead>
				
                  <tr>
				  
					<th>Serial No.</th>
                    <th>Product Code</th>
					<th>Product Name</th>
					<th>Brand</th>
					<th>Category</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Amount</th>
					<th colspan="2"><center>Option</center></th>
					
                  </tr>
				  
                </thead>
				
                <tbody>
                  
					<?php 
						
						$i=1;
						
						//display purchase_product_items_details
						
						foreach($purchase_product_items_details as $purchase_product_items)
						{
						
							//fetch product
							
							$product=$db->get_row("SELECT * FROM product WHERE p_id=".$purchase_product_items->ppi_p_id);
							
							//fetch brand
							
							$brand=$db->get_row("SELECT * FROM brand WHERE b_id=".$product->p_b_id);
							
							//fetch category
							
							$category=$db->get_row("SELECT * FROM category WHERE c_id=".$product->p_c_id);
							
					?>
							
							<tr>
								
								<td><?php echo $i; ?></td>
								<td><?php echo $product->p_code; ?></td>
								<td><?php echo $product->p_name; ?></td>
								<td><?php echo $brand->b_name; ?></td>
								<td><?php echo $category->c_name; ?></td>
								<td><?php echo $purchase_product_items->ppi_price; ?></td>
								<td><?php echo $purchase_product_items->ppi_qty; ?></td>
								<td><?php echo $purchase_product_items->ppi_amount; ?></td>
								
								<td><center><abbr title="Cancel Purchase Product"><a href="?folder=purchase_product_items&file=delete&ppi_id=<?php echo $purchase_product_items->ppi_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></center></td>

							</tr>
							
					<?php 
					
							$i++;
					
						}
						
						//calculate sub_total
						
						$sub_total=$db->get_var("SELECT SUM(ppi_amount) FROM purchase_product_items WHERE ppi_pp_id= '$ppi_pp_id'");
						
					?>
				
						<tr>
							
							<th colspan="7">Sub-Total</th>
							<td><?php  echo"<b>".$sub_total."</b>"; ?></td>
							<td></td>
							
						</tr>
                </tbody>
				
              </table>

				<!--hidden fields-->
				
				<input type="hidden" name="pp_amount" value="<?php echo $sub_total; ?>">
				
				<button type="submit" class="btn btn-primary" name="edit_purchase_product">Submit</button>

            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>
		
</div>
</form>
</div>
</div>
</div>

<?php 
	
	}
	
	include("./template/footer.php");
?>