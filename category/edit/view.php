
<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add New Category</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST" id="category_form">
				
                <div class="row" >
                    <div class="form-group col-md-4">
                      <label>Category Name</label>
                      <input name="c_name" placeholder="Enter Category Name" class="form-control" value=<?php echo $category->c_name;  ?>>
					  <div id='category_form_c_name_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="edit_category" >Save Changes</button>
                 </div>
				
		</form>
					
</div>
</div>
</div>
</div>

<script src="<?php echo jspath; ?>/gen_validatorv4.js" type="text/javascript"></script>
<script  type="text/javascript">
			
		var frmvalidator = new Validator("category_form");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("c_name","req","Enter Category Name");
			
</script>