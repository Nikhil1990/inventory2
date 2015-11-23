<div class="row">
<div class="col-md-12">
<div class="box box-primary">

	<div class="box-header">
		
		<center><h2 class="box-title">Add New Store</h2></center>
			
	</div>
	
<div class="box-body">
			
		<form method="POST" id="store_form" enctype="multipart/form-data">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Store Name</label>
                      <input name="s_name" placeholder="Enter Store Name" class="form-control">
					  <div id='store_form_s_name_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Store Address</label>
                      <textarea name="s_address" placeholder="Enter Store Address" class="form-control"></textarea>
					  <div id='store_form_s_address_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Care Person Name</label>
                      <input name="s_cp_name" placeholder="Enter Care Person Name" class="form-control">
					  <div id='store_form_s_cp_name_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Phone Number</label>
                      <input name="s_phoneno" placeholder="Enter Phone Number" class="form-control">
					  <div id='store_form_s_phoneno_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Email ID</label>
                      <input name="s_email" placeholder="Enter Email ID" class="form-control">
					  <div id='store_form_s_email_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Upload Logo</label>
                      <input type="file" name="s_logo" class="form-control" />
                    </div>
				</div>

				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="add_store" >Add Store</button>
                </div>
				
		</form>
					
</div>
</div>
</div>
</div>

	<script src="<?php echo jspath; ?>/gen_validatorv4.js" type="text/javascript"></script>
	<script  type="text/javascript">

		var frmvalidator = new Validator("store_form");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("s_name","req","Enter Store Name");
		frmvalidator.addValidation("s_address","req","Enter Store Address");
		frmvalidator.addValidation("s_cp_name","req","Enter Care Person Name");
		frmvalidator.addValidation("s_phoneno","req","Enter Store Phone Number");
		frmvalidator.addValidation("s_email","req","Enter Store Phone Email ID");

	</script>