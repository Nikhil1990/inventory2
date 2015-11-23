<?php 
	
	include('private/conn.php');
	
	if(isset($_POST['cust_name']))
	{
		
		$cust_name=$_POST['cust_name'];
		
		//fetch customer_details
		
		$customer_details=$db->get_results("SELECT * FROM customer WHERE cust_name LIKE '%$cust_name%' OR cust_email LIKE '%$cust_name%' OR cust_phoneno LIKE '%$cust_name%' ORDER BY cust_name");
		
?>
			<div class="row">
			<div class="col-md-12">
			<div class="box box-primary">
			
			<div class="box-header">
		
				<center><h2 class="box-title">Customer Details</h2></center>
			
			</div>
	
			<div class="box-body">
			
			<form method="POST">
			
			<table class="table table-bordered">
			
			<thead>
				
				<tr>
					
					<th>Select</th>
					<th>Customer Name</th>
					<th>Address</th>
					<th>Phone Number</th>
					<th>Email ID</th>
					
				</tr>
				
			</thead>
			
			<tbody>
<?php 
			
			//display customer_details
			
			foreach($customer_details as $customer)
			{
?>
				<tr>
				
					<td><input type="radio" name="cust_id" value="<?php echo $customer->cust_id; ?>"><?php echo $customer->cust_name; ?></td>
					<td><?php echo $customer->cust_name; ?></td>
					<td><?php echo $customer->cust_address; ?></td>
					<td><?php echo $customer->cust_phoneno; ?></td>
					<td><?php echo $customer->cust_email; ?></td>
					
				</tr>
<?php 
			}
			
?>				
				<tr>
					
					<td><input type="radio" name="new_cust_id"></td>
					<td colspan="4">Add New Customer</td>
					
				</tr>
		
			</tbody>
			
			</table>
			
				<div class="box-footer">
			
					<button class="btn btn-primary" type="submit" name="add_to_quotation">Add To Quotation</button>
					
				</div>
			
			</div>
			</form>
			</div>
			</div>
			</div>
<?php 
		
	}
	
?>