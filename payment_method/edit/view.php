<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add Payment Method</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST">
				
                <div class="row">
                    <div class="form-group col-md-4">
                      <label>Payment Type</label>
                      <input name="pm_type" placeholder="Enter Payment Type" class="form-control" value="<?php echo $payment_method->pm_type; ?>">
                    </div>
				</div>
				
				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="edit_payment">Save Changes</button>
                 </div>
				
		</form>
					
</div>
	
	
</div>
	
</div>
</div>