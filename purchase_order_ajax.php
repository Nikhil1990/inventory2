<?php 

    include('private/conn.php');

	if(isset($_POST['cust_name']))
	{
		$cust_name=$_POST['cust_name'];
		
		//fetch customer_details
		
		$customer_details=$db->get_results("SELECT * FROM customer WHERE cust_name LIKE '%$cust_name%' OR cust_email LIKE '%$cust_name%' OR cust_phoneno LIKE '%$cust_name%' ORDER BY cust_name");
		
		if($customer_details)
		{
		
?>
		
		<div class="row">
		<div class="col-md-12">
		<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Customer Details</h2></center>
			
		</div>
	
		<div class="box-body">
		
		<form method="POST">
			
			<table class="table table-bordered">
		
				<thead>

					<tr>
						
						<th>Check</th>
						<th>Customer Name</th>
						<th>Address</th>
						<th>Phone Number</th>
						<th>Email ID</th>
						
					</tr>
					
				</thead>
			
				<tbody>
				
					<?php 
						
						//display customer_details
						
						foreach($customer_details as $customer)
						{
											
					?>
					
						<tr>
						
							<td><input type="radio" name="cust_id" value="<?php echo $customer->cust_id; ?>" class="form_control"/></td>
							<td><?php echo $customer->cust_name; ?></td>
							<td><?php echo $customer->cust_address; ?></td>
							<td><?php echo $customer->cust_phoneno; ?></td>
							<td><?php echo $customer->cust_email; ?></td>
						
						</tr>
					
					<?php 
						
						}
						
					?>
					
						<tr>
							
							<td><input type="radio" name="new_cust_id" class="form_control"/></td>
							<td colspan="4">Add New Customer</td>
							
						</tr>
					
				
				</tbody>

			</table>
			
			<!--hidden element-->
			
			<!--<input type="hidden" name="cust_id" value="<?php //echo $customer->cust_id; ?>">-->
			
			<div class="box-footer">
			
                <button class="btn btn-primary" type="submit" name="purchase_item">Purchase Item</button>
					
            </div>
			
		</div>
		</form>
		</div>
		</div>
		</div>
		
<?php 	

		}
		else
		{
			
			//fetch customer_category_details
			
			$customer_category_details=$db->get_results("SELECT * FROM customer_category ORDER BY c_cat_type");
		
?>

<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add New Customer</h2></center>
			
		</div>
	
		<div class="box-body">
			
			<form method="POST">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Customer Name</label>
                      <input name="cust_name" placeholder="Enter Customer Name" class="form-control">
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Customer Address</label>
                      <textarea name="cust_address" placeholder="Enter Customer Address" class="form-control"></textarea>
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Email ID</label>
                      <input name="cust_email" placeholder="Enter Customer Email ID" class="form-control">
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Phone Number</label>
                      <input name="cust_phoneno" placeholder="Enter Customer Phone Number" class="form-control">
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Select Category</label>
                      <select name="cust_cat_id" class="form-control">
							
							<option value="000">Select Category</option>
							
							<?php 
								
								//display customer_category_details
								
								foreach($customer_category_details as $customer_category)
								{
								
							?>
									
									<option value="<?php echo $customer_category->c_cat_id; ?>"><?php echo $customer_category->c_cat_type; ?></option>
									
							<?php 
							
								}
								
							?>
							
					  </select>
                    </div>
				</div>
		
				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="add_customer">Add Customer</button>
                </div>
				
			</form>
					
		</div>
</div>
</div>
</div>
		
<?php 

		}

	}
	
?>