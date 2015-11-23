<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Edit Tax</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST" id="tax_form">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Tax Amount</label>
                      <input name="tax_amount" id="tax_amount" placeholder="Enter Tax Amount" class="form-control" value="<?php echo $tax->tax_amount; ?>">
					  <div id='tax_form_tax_amount_errorloc' style="color:red;"></div>
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
									if($store->s_id == $tax->tax_s_id)
									{
							?>
										<option value="<?php echo $store->s_id; ?>" selected><?php echo $store->s_name; ?></option>
							<?php
									}
									else
									{
							?>
										<option value="<?php echo $store->s_id; ?>"><?php echo $store->s_name; ?></option>
							<?php 
									}
									
								}
								
							?>
							
					  </select>
					  
                    </div>
				</div>
		
				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="edit_tax">Save Changes</button>
                 </div>
				
		</form>
					
</div>
</div>
</div>
</div>

<script src="<?php echo jspath; ?>/gen_validatorv4.js" type="text/javascript"></script>
<script  type="text/javascript">
			
		var frmvalidator = new Validator("tax_form");
		frmvalidator.EnableOnPageErrorDisplay();
		frmvalidator.EnableMsgsTogether();
		
		frmvalidator.addValidation("tax_amount","req","Enter Tax Amount");
		
</script>