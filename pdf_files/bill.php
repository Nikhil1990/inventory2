<?php 
	
		require_once($_SERVER['DOCUMENT_ROOT'].'/inventory2/dompdf/dompdf_config.inc.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/inventory2/private/conn.php');
		
		$po_id=$_GET['po_id'];
		$cust_id=$_GET['cust_id'];
		$s_id=$_GET['s_id'];
		
		//fetch customer
		
		$customer=$db->get_row("SELECT * FROM customer WHERE cust_id='$cust_id'");
		
		//fetch store
		
		$store=$db->get_row("SELECT * FROM store WHERE s_id='$s_id'");

		$html='<table">
		
						<tr>
							
							<td colspan="5"><center><h2>INVOICE</h2></center></td>
							
						</tr>

						
						<tr>
							
							<td colspan="1">
								
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
							
							<td colspan="1">
								
								<address>
									
									To<br>
									'.$customer->cust_name.'<br>
									<b>Address: </b>'.$customer->cust_address.'<br>
									<b>Phone Number: </b>'.$customer->cust_phoneno.'<br>
									<b>Email ID: </b>'.$customer->cust_email.'<br>
									
								</address>
								
							</td>
							
							<td colspan="1">
								
								<address>
									
									<b>Purchase ID: </b>'.$po_id.'
									<b>Payment Due: </b>'.date('d-m-Y').'
									
								</address>
								
							</td>
							   
						</tr>
						
					</table><br>
					
					<table border="1" cellpadding="5" style="border-collapse: collapse;width:100%">
						
						
						<tr>
							
							<th>Serial No.</th>
							<th>Product Name</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>Amount</th>
							
						</tr>';

						//fetch purchase_order_items_details
						
						$purchase_order_items_details=$db->get_results("SELECT * FROM purchase_order_items WHERE poi_po_id='$po_id'");
						
						$i=1;
						
						//display purchase_order_items_details

						foreach($purchase_order_items_details as $purchase_order_items)
						{
							
							//fetch product
							
							$product=$db->get_row("SELECT * FROM product WHERE p_id=".$purchase_order_items->poi_p_id);
							
							//fetch brand
							
							$brand=$db->get_row("SELECT * FROM brand WHERE b_id=".$product->p_b_id);
							
							//fetch category
							
							$category=$db->get_row("SELECT * FROM category WHERE c_id=".$product->p_c_id);

						$html.='<tr>
									
									<td style="width:8%;">'.$i.'</td>
									
									<td>
									
										'.$product->p_name.'<br><br>
										'.$brand->b_name.'<br>
										'.$category->c_name.'<br>
										
									</td>
									
									<td style="width:3%;">'.$purchase_order_items->poi_qty.'</td>
									<td style="width:8%;">'.$purchase_order_items->poi_price.'</td>
									<td style="width:8%;">'.$purchase_order_items->poi_amount.'</td>
									
								</tr>';
							
							$i++;
						}
						
							$sub_total=$db->get_var("SELECT SUM(poi_amount) FROM purchase_order_items WHERE poi_po_id='$po_id'");
						
					$html.='
					
							<tr>
							
								<td colspan="4"><b>Sub-Total</b></td>
								<td><b>'.$sub_total.'</b></td>
							
							</tr>
						
				</table><br>
				
				<table>
					
							<tr>
						
								<td colspan="4">
							
									<b>Amount Chargeable (in words)</b><br> 
								
								</td>
						
							</tr>
							
							<tr>
								
								<td colspan="2">Company VAT TIN</td>
								<td colspan="3"></td>
									
							</tr>
							
							<tr>
								
								<td colspan="2">Company CST No.</td>
								<td colspan="3"></td>
									
							</tr>
							
							<tr>
								
								<td colspan="2">Company PAN</td>
								<td colspan="3"></td>
									
							</tr>
							
							<tr>
								
								<td colspan="3">
									
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
		
		 if (!file_exists($_SERVER['DOCUMENT_ROOT'].'/inventory2/pdf_files/pdf'))
  		 {
		 
	  		mkdir($_SERVER['DOCUMENT_ROOT'].'/inventory2/pdf_files/pdf', 0777, true);
			
		 }
		 
		$pdf = $dompdf->output();

		file_put_contents($_SERVER['DOCUMENT_ROOT'].'/inventory2/pdf_files/bill/'.$po_id.'.pdf', $pdf);
	
		$jsFile ='http://localhost/inventory2/pdf_files/bill/'.$po_id.'.pdf';
	
?> 

<script type="text/javascript"> 

<?php

	echo('window.open("'.$jsFile.'", "_blank","",true);');

?>

</script>