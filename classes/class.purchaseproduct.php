<?php 
	
	class PurchaseProduct
	{
		
		private $pp_s_id = 1;
		
		//set store id
	
		public function setPurchaseProductID($purchaseproductid)
		{
		
			$this->pp_s_id = $purchaseproductid;

			return $this->pp_s_id;
		
		}
	
		public function purchase_product_details()
		{
		
			global $db;

			$purchase_product_details = $db->get_results("SELECT * FROM purchase_product WHERE pp_s_id='$this->pp_s_id' AND pp_status='2'");
	
			return $purchase_product_details;
		}
	
	}

?>