<!--Customer Details-->

<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Customer Details</h2></center>
			
</div>
	
<div class="box-body">
		
		<table class="table table-striped">

            <tr>
				  
				<td>Customer Name</td>
				<td><?php echo $customer->cust_name; ?></td>

            </tr>
			
			 <tr>
				  
				<td>Address</td>
				<td><?php echo $customer->cust_address; ?></td>

            </tr>
			
			<tr>
				  
				<td>Phone Number</td>
				<td><?php echo $customer->cust_phoneno; ?></td>

            </tr>
			
			<tr>
				  
				<td>Email ID</td>
				<td><?php echo $customer->cust_email; ?></td>

            </tr>

        </table>
		
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Search Product</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST">
				
                <div class="row">
                    <div class="form-group col-md-12">
                      <label>Search Product</label>
                      <input name="p_name" id="p_name" placeholder="Search Producy By Name, Code" class="form-control" onkeyup="search_product()">
                    </div>
				</div>
		</form>
			
</div>
</div>
</div>
</div>

<!--ajax reply -->

<div id="reply_quotation_items"></div>

<!--Selected Product -->

<?php 
	
	if($quotation_items_details)
	{
	
?>

<!--invoice-->
<div class="row">
<div class="col-md-12">
<div class="box box-primary">
<div class="box-body">

<form method="POST">

<section class="invoice">
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
				
					//fetch customer
						
					$customer=$db->get_row("SELECT * FROM customer WHERE cust_id='$cust_id'");
					
					//fetch store
					
					$store=$db->get_row("SELECT * FROM store WHERE s_id='$a_s_id'");
					
				?>
				
                <strong> <?php echo $store->s_name; ?></strong><br>
               <?php echo $store->s_address; ?><br>
                Name: <?php echo $store->s_cp_name; ?><br>
                Phone: <?php echo $store->s_phoneno; ?><br>
                Email: <?php echo $store->s_email; ?>
              </address>
			  
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              To
              <address>
                <strong><?php echo $customer->cust_name; ?></strong><br>
                <?php echo $customer->cust_address; ?><br>
                Phone: <?php echo $customer->cust_phoneno; ?><br>
                Email: <?php echo $customer->cust_email; ?>
              </address>
            </div><!-- /.col -->
			
            <div class="col-sm-4 invoice-col">
              
              <b>Purchase ID:</b> <?php echo $q_id; ?><br>
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
					
					//display quotation_items_details
					
					foreach($quotation_items_details as $quotation_items)
					{

						//fetch product
						
						$product=$db->get_row("SELECT * FROM product WHERE p_id=".$quotation_items->qi_p_id);
						
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
							<td><?php echo $quotation_items->qi_price; ?></td>
							<td><input type="text" class="form-conrtol col-md-6" name="qi_qty" value="<?php echo $quotation_items->qi_qty; ?>"/></td>
							<td><?php echo $quotation_items->qi_amount; ?></td>
					
							<td>

								<input type="hidden" name="qi_id" value="<?php echo $quotation_items->qi_id; ?>">
									
								<button type="submit" name="edit_quantity" class="btn btn-primary">Save Changes</button>

							</td>
							
							<td><abbr title="Delete Quotation"><a href="?folder=quotation_items&file=delete&qi_id=<?php echo $quotation_items->qi_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></td>
							
						</tr>
						
				<?php 
				
						$i++;
						
					}

						//calculate sub-Total
						
						$sub_total=$db->get_var("SELECT SUM(qi_amount) FROM quotation_items WHERE qi_q_id='$q_id'");

				?>
				
					<tr>
							
						<td colspan="7"><b>Sub-Total</b></td>
						<td><?php  echo"<b>".$sub_total."</b>"; ?></td>
						<td></td>
							
					</tr>
				
                </tbody>
              </table>
					
					<div class="box-footer">
					
						<a href="./pdf_files/quotation.php?q_id=<?php echo $q_id; ?>&cust_id=<?php echo $cust_id; ?>&a_s_id=<?php echo $a_s_id; ?>" class="btn btn-success fa fa-download" target="_blank">Download PDF</a>
						
					</div>
					
            </div><!-- /.col -->
          </div><!-- /.row -->

</section>
</form>
</div>
</div>
</div>
</div>

<?php 
	
	}
	
	include("./template/footer.php");
	
?>