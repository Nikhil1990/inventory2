<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add Product Stock</h2></center>
			
</div>
	
<div class="box-body">

		<form method="POST">
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Product Stock</label>
                      <input name="psl_p_stock" placeholder="Enter Product Stock" class="form-control" value="<?php echo $product_stock_location->psl_p_stock; ?>">
                    </div>
				</div>
				
				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="edit_stock" >Save Changes</button>
                 </div>
				
		</form>
					
</div>
</div>
</div>
</div>