<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add New Customer Category</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST" id="customer_category_form">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Category Type</label>
                      <input name="c_cat_type" placeholder="Enter Category Type" class="form-control">
					  <div id='customer_category_form_c_cat_type_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				  <div class="row">
                    <div class="form-group col-md-4">
                      <label>Category Discount</label>
                      <input name="c_cat_discount" placeholder="Enter Category Discount" class="form-control">
					  <div id='customer_category_form_c_cat_discount_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				  <div class="row">
                    <div class="form-group col-md-4">
                      <label>Allow Credit</label><br>
                      <input type="radio" name="c_cat_credit" value="Yes"> Yes
                      <input type="radio" name="c_cat_credit" value="No"> No
                    </div>
				</div>

				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="add_customer_category" >Add Category</button>
                 </div>
				
		</form>
					
</div>
</div>
</div>
</div>

<script src="<?php echo jspath; ?>/gen_validatorv4.js" type="text/javascript"></script>
<script  type="text/javascript">
			
		var frmvalidator = new Validator("customer_category_form");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("c_cat_type","req","Enter Category Type");
		frmvalidator.addValidation("c_cat_discount","req","Enter Category Discount");
		
</script>