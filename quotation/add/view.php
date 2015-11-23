<div class="row">
<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header">
		
			<center><h2 class="box-title">Search Customer</h2></center>
			
</div>
	
<div class="box-body">
			
		<form method="POST">
				
                <div class="row">
                    <div class="form-group col-md-12">
                      <label>Customer Name</label>
                      <input name="cust_name" id="cust_name" placeholder="Search Customer By Name, Email, Phone Number" class="form-control" onkeyup="search_customer()">
                    </div>
				</div>
			</form>
			
</div>
</div>
</div>
</div>

<div id="reply_quotation"></div>

<?php 
	
	include("./template/footer.php");
	
?>