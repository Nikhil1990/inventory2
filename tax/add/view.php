<div class="row">
<div class="col-md-12">
<div class="box box-primary">

	<div class="box-header">
		
		<center><h2 class="box-title">Add Store</h2></center>
			
	</div>
	
	<div class="box-body">
			
			<form method="POST" id="store_form" enctype="multipart/form-data">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Tax Amount</label>
                      <input name="tax_amount" placeholder="Enter Tax Amount" class="form-control">
                    </div>
				</div>
				
				 <div class="row">
                    <div class="form-group col-md-4">
                      <label>Select Store</label>
                      <select name="tax_s_id" class="form-control">
							
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