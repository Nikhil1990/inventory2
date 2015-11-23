<?php 
	
		require_once($_SERVER['DOCUMENT_ROOT'].'/inventory2/dompdf/dompdf_config.inc.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/inventory2/private/conn.php');

		$q_id=$_GET['q_id'];
		$cust_id=$_GET['cust_id'];
		$s_id=$_GET['a_s_id'];
		
		//fetch quotation_items_details
		
		$quotation_items_details=$db->get_results("SELECT * FROM quotation_items WHERE qi_q_id='$q_id'");
		
		//fetch customer
		
		$customer=$db->get_row("SELECT * FROM customer WHERE cust_id='$cust_id'");
		
		//fetch store
		
		$store=$db->get_row("SELECT * FROM store WHERE s_id='$s_id'");
	
		$html='<table border="1" cellpadding="10" style="border-collapse: collapse;width:100%;">
		
						<tr>
						
							<td colspan="2">
								
								<img src="'.$_SERVER['DOCUMENT_ROOT'].'/inventory2/logo/'.$store->s_id.'.jpg"></img>
							
							</td>
							
							<td colspan="2">
								
								<address>
									
									From<br>
									'.$store->s_name.'<br>
									<b>Caontact Person: </b> '.$store->s_cp_name.'<br>
									<b>Address: </b> '.$store->s_address.'<br>
									<b>Phone Number: </b> '.$store->s_phoneno.'<br>
									<b>Email ID: </b> '.$store->s_email.'<br>
									
								</address>
								
							</td>
							
							<td colspan=2">
								
								<address>
									
									To<br>
									'.$customer->cust_name.'<br>
									<b>Address: </b>'.$customer->cust_address.'<br>
									<b>Phone Number: </b>'.$customer->cust_phoneno.'<br>
									<b>Email ID: </b>'.$customer->cust_email.'<br>
									
								</address>
								
							</td>
							
							<td colspan="2">
								
								<address>
									
									<b>Quotation ID: </b>'.$q_id.'
									<b>Payment Due: </b>'.date('d-m-Y').'
									
								</address>
								
							</td>
							
						</tr>

						<!--<tr>
							
							<td colspan="8"><center><h3>Customer Details</h3></center></td>
							
			 			</tr>

						<tr>
							
							<td colspan="4">Customer Name</td>
							<td colspan="4">'.$customer->cust_name.'</td>
							
						</tr>

						<tr>
							
							<td colspan="4">Address</td>
							<td colspan="4">'.$customer->cust_address.'</td>
							
						</tr>
						
						<tr>
							
							<td colspan="4">Email ID</td>
							<td colspan="4">'.$customer->cust_email.'</td>
							
						</tr>
						
						<tr>
							
							<td colspan="4">Phone Number</td>
							<td colspan="4">'.$customer->cust_phoneno.'</td>
							
						</tr>-->
						
						<tr>
							
							<td colspan="8"><center><h3>Product Details</h3></center></td>
							
						</tr>
						
						<tr>
							
							<th>Serial Number</th>
							<th>Product Code</th>
							<th>Product Name</th>
							<th>Brand</th>
							<th>Category</th>  
							<th>Price</th>
							<th>Quantity</th>
							<th>Amount</th>

						</tr>';
						
						$i=1;
						
						foreach($quotation_items_details as $quotation_items)
						{
							
							//fetch product
							
							$product=$db->get_row("SELECT * FROM product WHERE p_id=".$quotation_items->qi_p_id);
							
							//fetch brand
							
							$brand=$db->get_row("SELECT * FROM brand WHERE b_id=".$product->p_b_id);
							
							//fetch category
							
							$category=$db->get_row("SELECT * FROM category WHERE c_id=".$product->p_c_id);
							
							//quotation_items sum
							
							$quotation_items_sum=$db->get_var("SELECT SUM(qi_amount) FROM quotation_items WHERE qi_q_id='$q_id'");

						$html.='
							
							<tr>
								
								<td>'.$i.'</td>
								<td>'.$product->p_code.'</td>
								<td>'.$product->p_name.'</td>
								<td>'.$brand->b_name.'</td>
								<td>'.$category->c_name.'</td>
								<td>'.$quotation_items->qi_price.'</td>
								<td>'.$quotation_items->qi_qty.'</td>
								<td>'.$quotation_items->qi_amount.'</td>
								
							</tr>';
							
							$i++;
						}

					$html.='
							<tr>
								
								<td colspan="7">Sub-Total</td>
								<td>'.$quotation_items_sum.'</td>
								
							</tr>
							
				</table>
				
				<table>
					
							<tr>
						
								<td colspan="7">
							
									<b>Amount Chargeable (in words)</b><br>
								
								</td>
						
							</tr>
							
							<tr>
								
								<td colspan="2">Company VAT TIN</td>
								<td colspan="5"></td>
									
							</tr>
							
							<tr>
								
								<td colspan="2">Company CST No.</td>
								<td colspan="5"></td>
									
							</tr>
							
							<tr>
								
								<td colspan="2">Company PAN</td>
								<td colspan="5"></td>
									
							</tr>
							
							<tr>
								
								<td colspan="5">
									
									Declaration,<br>
									<p style="text-align: justify">
										
									
										
									</p>
								</td>
								
								<td colspan="2"></td>
								
							</tr>
					
				</table>';
				
		$old_limit = ini_set("memory_limit", "-1");
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->set_paper("letter", "portrait");
		$dompdf->render();
				 
		//The next call will store the entire PDF as a string in $pdf 
	
		 if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/inventory2/pdf_files/quotation'))
  		 {
		
	  		mkdir($_SERVER['DOCUMENT_ROOT'].'/inventory2/pdf_files/quotation', 0777, true);
			
		 }
		 
		$pdf = $dompdf->output();

		file_put_contents($_SERVER['DOCUMENT_ROOT'].'/inventory2/pdf_files/quotation/'.$q_id.'.pdf', $pdf);
	
		$jsFile ='http://localhost/inventory2/pdf_files/quotation/'.$q_id.'.pdf';
	
?>

<script type="text/javascript">

<?php

	echo('window.open("'.$jsFile.'", "_blank","",true);');

?>

</script>