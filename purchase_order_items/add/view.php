<!--Customer Details -->

<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Customer Details</h2></center>
			
</div>
	
<div class="box-body">
		
	<table class="table table-bordered">
		
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

<!--Serch Product -->

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
                    <input name="p_name" id="p_name" placeholder="Search Product By Name, Code" class="form-control" onkeyup="search_product()">
                </div>
			</div>

</div>
</div>
</div>
</div>

<!--reply ajax -->

<div id="reply_product_search"></div>

<?php 
	
	if($purchase_order_items_details)
	{
	
?>

<!--invoice-->

<div class="row">
<div class="col-md-12">
<div class="box box-primary">	
<div class="box-body">

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
				
                <strong><?php echo $store->s_name; ?></strong><br>
                <?php echo $store->s_address; ?><br>
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
              
              <b>Purchase ID:</b> <?php echo $po_id; ?><br>
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
					<!--<th>Brand</th>-->
					<th>Price</th>
					<th>Quantity</th>
					<th>Amount</th>
					<th colspan="2"><center>Option</center></th>
					
                  </tr>
                </thead>
				
                <tbody>
                  
					<?php 
					
					 //display purchase_order_items_details
					
					$i=1;
					
					foreach($purchase_order_items_details as $purchase_order_items)
					{
					
						//fetch product
						
						$product=$db->get_row("SELECT * FROM product WHERE p_id=".$purchase_order_items->poi_p_id);
						
						//fetch brand
						
						$brand=$db->get_row("SELECT * FROM brand WHERE b_id=".$product->p_b_id);
						
				?>
					<!--<form method="POST">-->
					
						<tr>
							
						
							<td><?php echo $i; ?></td>
							<td><?php echo $product->p_code; ?></td>
							<td><?php echo $product->p_name; ?></td>
							<!--<td><?php //echo $brand->b_name; ?></td>-->
							<td><?php echo $product->p_price; ?></td>
							<td><input type="text" class="form-conrtol col-md-6" name="poi_qty" value="<?php echo $purchase_order_items->poi_qty; ?>"/></td>
							<td><?php echo $purchase_order_items->poi_amount; ?></td>
							
							<td>

								<input type="hidden" name="poi_id" value="<?php echo $purchase_order_items->	poi_id; ?>">
									
								<button type="submit" name="edit_quantity" class="btn btn-primary">Save Changes</button>

							</td>
							
							<td><abbr title="Delete Product"><a href="?folder=purchase_order_items&file=delete&poi_id=<?php echo $purchase_order_items->poi_id; ?>" class="btn btn-primary fa fa-trash"></a></abbr></td>
							
						</tr>
						
					<!--</form>-->
						
				<?php 
						$i++;
				
					}
					
						//calculate sub-Total
						
						$sub_total=$db->get_var("SELECT SUM(poi_amount) FROM purchase_order_items WHERE poi_po_id='$po_id'");
						
						//fetch customer
						
						$customer=$db->get_row("SELECT * FROM customer WHERE cust_id='$cust_id'");
						
						//fetch customer_category
						
						$customer_category=$db->get_row("SELECT * FROM customer_category WHERE c_cat_id=".$customer->cust_cat_id);
			
						//calculate Discount
						
						$discount=$sub_total-($sub_total * $customer_category->c_cat_discount/100);
						
						//fetch tax_details
						
						$tax_details=$db->get_row("SELECT * FROM tax");
						
						$tax_per=$tax_details->tax_amount;
						
						//calculate tax
						
						$tax = $discount * $tax_details->tax_amount/100;
					
						//calculate final amount
						
						$trans_charges=0;
						
						$amount=$discount + $tax + $trans_charges;
						
				?>
				
					<tr>
							
							<th colspan="6">Sub-Total</th>
							<td><input type="text" onkeyup="updateprice()" id="sub_total" name="sub_total"  class="form-control" value="<?php  echo $sub_total; ?>"></td>
							<td></td>
							
						</tr>
						
						<tr>
							
							<th colspan="6">Discount(<?php echo $customer_category->c_cat_discount; ?>%)</th>
							<td><input type="text" onkeyup="updateprice()" id="discount" name="discount" class="form-control" value="<?php  echo round($discount); ?>"></td>
							<td></td>
							
						</tr>
						
						<tr>
							
							<th colspan="6">Tax(<?php echo $tax_per; ?>%)</th>
							<td><input type="text" onkeyup="updateprice()" id="taxamount" name="tax" class="form-control" value="<?php  echo round($tax); ?>"></td>
							<td></td>
							
						</tr>
						
						<tr>
							
							<th colspan="6">Transport Charges</th>
							<td><input type="text"  id="trans_charges" name="trans_charges" class="form-control" value="<?php echo $trans_charges; ?>"></td>
							<td></td>
							
						</tr>
						
						<tr>
							
							<th colspan="6">Amount</th>
							<th><input  type="text" id="amount" name="amount"  class="form-control" value="<?php  echo round($amount); ?>"></th>
							<td></td>
							
						</tr> 

                </tbody>
              </table>
			  
			  <!--hidden fields-->
					
					<input type="hidden" id="po_discount" value=<?php echo $customer_category->c_cat_discount/100; ?>>
					<input type="hidden" id="po_tax" value="<?php echo $tax_details->tax_amount/100;  ?>">

            </div><!-- /.col -->
          </div><!-- /.row -->

        </section>
		
</div>
</div>
</div>
</div>

<!--Payment-->

<div class="row">
<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header">
		
		<center><h2 class="box-title">Payment</h2></center>
			
</div>

<div class="box-body">

			<div class="row">
                <div class="form-group col-md-12">
                    <label>Select Payment Type</label>
                    <select name="pop_pm_id" class="form-control" >
						
						<option value="000">Select Payment</option>
						
						<?php 
							
							foreach($payment_method_details as $payment_method)
							{
								
						?>
								<option value="<?php echo $payment_method->pm_id; ?>"><?php echo $payment_method->pm_type; ?></option>
						<?php 
								
							}
							
						?>
						
					</select>
                </div>
			</div>
			
			<div class="row">
                <div class="form-group col-md-12">
                    <label>Note</label>
                    <textarea name="pop_note" placeholder="Enter Note" class="form-control"></textarea>
                </div>
			</div>
			
			<div class="row">
                <div class="form-group col-md-12">
                    <label>Amount</label>
                    <input name="pop_amount" placeholder="Enter Amount" class="form-control"/>
                </div>
			</div>

		<div class="box-footer">
					
			<button class="btn btn-primary" type="submit" name="send_invoice">Submit</button>
			
			<button class="btn btn-primary" type="submit" name="send_email">Send Email</button>
			
			<a href="./pdf_files/bill.php?po_id=<?php echo $po_id; ?>&cust_id=<?php echo $cust_id; ?>&s_id=<?php echo $a_s_id; ?>" target="_blank" class="btn btn-success fa fa-download">Download PDF</a>
						
		</div>
		
</div>
</div>	
</div>

<?php 
	
	if($purchase_order_payment_details)
	{
	
?>

<div class="col-md-6">
	<div class="box box-primary">
		<div class="box-header">
		
		<center><h2 class="box-title">View Payment</h2></center>
			
</div>

<div class="box-body">

	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Customer Name</th>
				<th>Payment Type</th>
				<th>Payment Amount</th>
				<!--<th colspan="2"><center>Option</center></th>-->
			
			</tr>
		
		</thead>
			
		<tbody>
			
			<?php 
				
				//display purchase_order_payment_details
				
				foreach($purchase_order_payment_details as $purchase_order_payment)
				{
				
					//fetch purchase_order
					
					$purchase_order=$db->get_row("SELECT * FROM purchase_order WHERE po_id=".$purchase_order_payment->pop_po_id);
					
					//fetch customer
					
					$customer=$db->get_row("SELECT * FROM customer WHERE cust_id=".$purchase_order->po_cust_id);
					
					//fetch payment_method
					
					$payment_method=$db->get_row("SELECT * FROM payment_method WHERE pm_id=".$purchase_order_payment->pop_pm_id);
			?>
					
					<tr>
						
						<td><?php echo $customer->cust_name; ?></td>
						<td><?php echo $payment_method->pm_type; ?></td>
						<td><?php echo $purchase_order_payment->pop_amount; ?></td>
						
						<!--<td><abbr title="Delete Payment"><a href="?folder=purchase_order_payment&file=delete&pop_id=<?php //echo $purchase_order_payment->pop_id; ?>" class="fa fa-trash"></a></abbr></td>-->
						
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
	
	}
	
?>

	<script src="gen_validatorv4.js" type="text/javascript"></script>
	<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
	<script src="plugins/jquery.min.js" type="text/javascript"></script>
	<script src="js/jQuery-2.1.4.min.js"></script>
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		
	<script  type="text/javascript">
					
		function search_product()
		{
			var p_name=$("#p_name").val();
					
			$.ajax({
			type:'POST',
			url:'/inventory2/product_search_ajax.php',
			data:'p_name='+p_name,
			success:function(reply)
			{	
				$("#reply_product_search").html(reply);
			}
		})
		}
		 
		 function updateprice()
		 {
		
		 var subtotal = $("#sub_total").val();
		 
		 var po_discount=$("#po_discount").val();
		 
		 var po_tax=$("#po_tax").val();
		 
		 var discount = Math.round(subtotal * po_discount);
		 
		 $("#discount").val(discount);
		 var discountedprice = subtotal - discount;
		 var taxamount = Math.round(discountedprice * po_tax);
		 $("#taxamount").val(taxamount);
		 var transport = $("#trans_charges").val();
		 var sum1 = Math.round(discountedprice + taxamount);
		 $("#amount").val(sum1);
		 
		 }
		  
	</script>