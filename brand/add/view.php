<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add New Brand</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST" id="brand_form">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Brand Name</label>
                      <input name="b_name" placeholder="Enter Brand Name" class="form-control">
					  <div id='brand_form_b_name_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="add_brand" >Add Brand</button>
                 </div>
				
		</form>
					
</div>
</div>
</div>
</div>

<script src="<?php echo jspath; ?>/gen_validatorv4.js" type="text/javascript"></script>
<script  type="text/javascript">
			
		var frmvalidator = new Validator("brand_form");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("b_name","req","Enter Brand Name");
			
</script>