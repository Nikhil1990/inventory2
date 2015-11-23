<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add New Supplier</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST" id="supplier_form">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Supplier Name</label>
                      <input name="sup_name" placeholder="Enter Supplier Name" class="form-control">
					  <div id='supplier_form_sup_name_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Address</label>
                      <textarea name="sup_address" placeholder="Enter Supplier Name" class="form-control"></textarea>
					  <div id='supplier_form_sup_address_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Supplier Username</label>
                      <input name="sup_username" placeholder="Enter Supplier User Name" class="form-control">
					  <div id='supplier_form_sup_username_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Password</label>
                      <input type="password" name="sup_password" placeholder="Enter Supplier Password" class="form-control">
					  <div id='supplier_form_sup_password_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Email ID</label>
                      <input name="sup_email" placeholder="Enter Supplier Email" class="form-control">
					  <div id='supplier_form_sup_email_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Supplier Phone Number</label>
                      <input name="sup_phoneno" placeholder="Enter Supplier Phone Number" class="form-control">
					  <div id='supplier_form_sup_phoneno_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Contact Person Name</label>
                      <input name="sup_c_person" placeholder="Enter Contact Person Name" class="form-control">
					  <div id='supplier_form_sup_c_person_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Select Brand</label>
                      <select name="sup_b_id" class="form-control">
							
							<option value="000">Select Brand</option>
							
							<?php 
								
								//display brand_details
								
								foreach($brand_details as $brand)
								{
							?>
									<option value="<?php echo $brand->b_id; ?>"><?php echo $brand->b_name; ?></option>
							<?php 
								}
								
							?>
							
					  </select>
					  
					  <div id='supplier_form_sup_b_id_errorloc' style="color:red;"></div>
					  
                    </div>
				</div>

				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="add_supplier" >Add Supplier</button>
                 </div>
				
		</form>
					
</div>
</div>
</div>
</div>

<script src="<?php echo jspath; ?>/gen_validatorv4.js" type="text/javascript"></script>
<script  type="text/javascript">
			
		var frmvalidator = new Validator("supplier_form");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("sup_name","req","Enter Supplier Name");
		frmvalidator.addValidation("sup_address","req","Enter Supplier Address");
		frmvalidator.addValidation("sup_username","req","Enter Supplier Username");
		frmvalidator.addValidation("sup_password","req","Enter Supplier Password");
		frmvalidator.addValidation("sup_email","req","Enter Supplier Email ID");
		frmvalidator.addValidation("sup_phoneno","req","Enter Supplier Phone Number");
		frmvalidator.addValidation("sup_c_person","req","Enter Contact Person Name");
		frmvalidator.addValidation("sup_b_id","dontselect=000","Select Brand");
		
</script>