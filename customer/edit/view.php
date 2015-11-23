<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add New Customer</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST" id="customer_form">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Customer Name</label>
                      <input name="cust_name" placeholder="Enter Customer Name" class="form-control" value="<?php echo $customer->cust_name; ?>">
					  <div id='customer_form_cust_name_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Customer Address</label>
                      <textarea name="cust_address" placeholder="Enter Customer Address" class="form-control"><?php echo $customer->cust_address; ?></textarea>
					  <div id='customer_form_cust_address_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Email ID</label>
                      <input name="cust_email" placeholder="Enter Customer Email ID" class="form-control" value="<?php echo $customer->cust_email; ?>">
					  <div id='customer_form_cust_email_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Phone Number</label>
                      <input name="cust_phoneno" placeholder="Enter Customer Phone Number" class="form-control" value="<?php echo $customer->cust_phoneno; ?>">
					  <div id='customer_form_cust_phoneno_errorloc' style="color:red;"></div>
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
									
									if($customer_category->c_cat_id == $customer->cust_cat_id)
									{
									
							?>
									
										<option value="<?php echo $customer_category->c_cat_id; ?>" selected><?php echo $customer_category->c_cat_type; ?></option>
									
							<?php 
									}
									else
									{
							?>
										<option value="<?php echo $customer_category->c_cat_id; ?>"><?php echo $customer_category->c_cat_type; ?></option>
							<?php 
									}
							
								}
								
							?>
							
					  </select>
					  
					  <div id='customer_form_cust_cat_id_errorloc' style="color:red;"></div>
					  
                    </div>
				</div>
		
				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="edit_customer">Save Changes</button>
                 </div>
				
		</form>
					
</div>
</div>
</div>
</div>

<script src="<?php echo jspath; ?>/gen_validatorv4.js" type="text/javascript"></script>
<script  type="text/javascript">
			
		var frmvalidator = new Validator("customer_form");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("cust_name","req","Enter Customer Name");
		frmvalidator.addValidation("cust_address","req","Enter Customer Address");
		frmvalidator.addValidation("cust_email","req","Enter Customer Email ID");
		frmvalidator.addValidation("cust_phoneno","req","Enter Customer Phone Number");
		frmvalidator.addValidation("cust_cat_id","dontselect=000","Select Customer Category");
		
</script>