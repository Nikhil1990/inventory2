<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Add Product Stock</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST">
				
                <div class="row">
                    <div class="form-group col-md-12">
                      <label>Search Product</label>
                      <input name="p_name" id="p_name" placeholder="Search Product By Name, Code" class="form-control" onkeyup="search_product()">
                    </div>
				</div>
				
				<div id="reply_product_location"></div>
				

				 <div class="row">
                    <div class="form-group col-md-12">
                      <label>Product Stock</label>
                      <input name="psl_p_stock" placeholder="Enter Product Stock" class="form-control">
                    </div>
				</div>
				
				<div class="box-footer">
                    <button class="btn btn-primary" type="submit" name="add_stock" >Add Stock</button>
                 </div>
				
		</form>
					
</div>
</div>
</div>
</div>

<?php 
	
	include("./template/footer.php");
	
?>