<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Edit Admin Type</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST" id="admin_type_form">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Admin Type</label>
                      <input name="at_type" placeholder="Enter Admin Type" class="form-control" value="<?php echo $admin_type->at_type; ?>">
					  <div id='admin_type_form_at_type_errorloc' style="color:red;"></div>
                    </div>
				</div>
		
				<div class="box-footer">
				
                    <button class="btn btn-primary" type="submit" name="edit_admin_type" >Save Changes</button>
					
                </div>
				
		</form>
					
</div>
	
	
</div>
	
</div>
</div>

<script src="<?php echo jspath; ?>/gen_validatorv4.js" type="text/javascript"></script>
<script  type="text/javascript">
			
		var frmvalidator = new Validator("admin_type_form");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("at_type","req","Enter Admin Type");
			
</script>