<div class="row">
<div class="col-md-12">
<div class="box box-primary">

	<div class="box-header">
		
		<center><h2 class="box-title">Add Product Type</h2></center>
			
	</div>
	
<div class="box-body">
			
		<form method="POST" id="store_form" enctype="multipart/form-data">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Product Type</label>
                      <input name="pt_type" placeholder="Enter Product Type" class="form-control" value="<?php echo $product_type->pt_type; ?>">
                    </div>
				</div>
				
				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="edit_product_type" >Save Changes</button>
                </div>
				
		</form>
					
</div>
</div>
</div>
</div>