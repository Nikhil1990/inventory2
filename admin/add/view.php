<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add New Admin</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST" id="admin_form">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Admin Name</label>
                      <input name="a_name" placeholder="Enter Admin Name" class="form-control">
					   <div id='admin_form_a_name_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Address</label>
                      <textarea name="a_address" placeholder="Enter Admin Name" class="form-control"></textarea>
					  <div id='admin_form_a_address_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>User Name</label>
                      <input name="a_username" placeholder="Enter Admin User Name" class="form-control">
					  <div id='admin_form_a_username_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Password</label>
                      <input type="password" name="a_password" placeholder="Enter Admin Password" class="form-control">
					  <div id='admin_form_a_password_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Email ID</label>
                      <input name="a_email" placeholder="Enter Email ID" class="form-control">
					  <div id='admin_form_a_email_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Phone Number</label>
                      <input name="a_phoneno" placeholder="Enter Admin Phone Number" class="form-control">
					  <div id='admin_form_a_phoneno_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Admin Type</label>
                      <select name="a_at_id" class="form-control">
							
							<option value="000">Select Admin Type</option>
							
							<?php 
								
								//display admin_type_details
								
								foreach($admin_type_details as $admin_type)
								{
									
							?>
									<option value="<?php echo $admin_type->at_id; ?>"><?php echo $admin_type->at_type; ?></option>
							<?php 
								}
								
							?>
							
					  </select>
					  
					  <div id='admin_form_a_at_id_errorloc' style="color:red;"></div>
					  
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Store</label>
                      <select name="a_s_id" class="form-control">
							
							<option value="000">Select Store</option>
							
							<?php 
								
								//display store_details
								
								foreach($store_details as $store)
								{
							?>
									<option value="<?php echo $store->s_id; ?>"><?php echo $store->s_name; ?></option>
							<?php 
								}
								
							?>
							
					  </select>
					  
					  <div id='admin_form_a_s_id_errorloc' style="color:red;"></div>
					  
                    </div>
				</div>

				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="add_admin" >Add Admin</button>
                 </div>
				
		</form>
					
</div>
	
	
</div>
	
</div>
</div>

<script src="<?php echo jspath; ?>/gen_validatorv4.js" type="text/javascript"></script>
<script  type="text/javascript">
			
		var frmvalidator = new Validator("admin_form");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("a_name","req","Enter Admin Name");
		frmvalidator.addValidation("a_address","req","Enter Admin Address");
		frmvalidator.addValidation("a_username","req","Enter Admin Username");
		frmvalidator.addValidation("a_password","req","Enter Admin Password");
		frmvalidator.addValidation("a_email","req","Enter Admin Email ID");
		frmvalidator.addValidation("a_phoneno","req","Enter Admin Phone Number");
		frmvalidator.addValidation("a_at_id","dontselect=000","Select Admin Type");
		frmvalidator.addValidation("a_s_id","dontselect=000","Select Store");
			
</script>