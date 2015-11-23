<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add New Product</h2></center>
			
		</div>
	
<div class="box-body">
			
		<form method="POST" id="product_form">
		
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Product Code</label>
                      <input name="p_code" placeholder="Enter Product Code" class="form-control">
					  <div id='product_form_p_code_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Product Name</label>
                      <input name="p_name" placeholder="Enter Product Name" class="form-control">
					  <div id='product_form_p_name_errorloc' style="color:red;"></div>
                    </div>
				</div>

				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Product Price</label>
                      <input name="p_price" placeholder="Enter Product Price" class="form-control">
					  <div id='product_form_p_price_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Select Brand</label>
                      <select name="p_b_id" class="form-control">
							
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
					  
					  <div id='product_form_p_b_id_errorloc' style="color:red;"></div>
					  
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Select Category</label>
                      <select name="p_c_id" class="form-control">
							
							<option value="000">Select Category</option>
							
							<?php 
								
								//display category_details
								
								foreach($category_details as $category)
								{
								
							?>
									
									<option value="<?php echo $category->c_id; ?>"><?php echo $category->c_name; ?></option>
									
							<?php 
								}
								
							?>
							
					  </select>
					  
					  <div id='product_form_p_c_id_errorloc' style="color:red;"></div>
					  
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Select Product Type</label>
                      <select name="p_pt_id" class="form-control">
							
							<option value="000">Select Product Type</option>
							
							<?php 
								
								//display product_type_details
								
								foreach($product_type_details as $product_type)
								{
								
							?>
									
									<option value="<?php echo $product_type->pt_id; ?>"><?php echo $product_type->pt_type; ?></option>
									
							<?php 
								}
								
							?>
							
					  </select>

					  
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Minimum Stock Level</label>
                      <input name="p_min_stock_level" placeholder="Enter Minimum Stock Level" class="form-control">
					  <div id='product_form_p_min_stock_level_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="row">
                    <div class="form-group col-md-4">
                      <label>Stock Level</label>
                      <input name="p_stock" placeholder="Enter Stock" class="form-control">
					  <div id='product_form_p_stock_errorloc' style="color:red;"></div>
                    </div>
				</div>
				
				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="add_product" >Add Product</button>
                </div>
				
		</form>
					
</div>
</div>
</div>
</div>

<script src="<?php echo jspath; ?>/gen_validatorv4.js" type="text/javascript"></script>
<script  type="text/javascript">
			
		var frmvalidator = new Validator("product_form");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("p_code","req","Enter Product Code");
		frmvalidator.addValidation("p_name","req","Enter Product Name");
		frmvalidator.addValidation("p_price","req","Enter Product Price");
		frmvalidator.addValidation("p_b_id","dontselect=000","Select Product Brand");
		frmvalidator.addValidation("p_c_id","dontselect=000","Select Product Category");
		frmvalidator.addValidation("p_min_stock_level","req","Enter Minimum Stock Level");
		frmvalidator.addValidation("p_stock","req","Enter Product Stock");

</script>