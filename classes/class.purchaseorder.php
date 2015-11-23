<?php 
	
	class PurchaseOrder
	{
		
		private $po_s_id = 1;
		
		//set store id
	
		public function setPurchaseOrderID($purchaseorderid)
		{
		
			$this->po_s_id = $purchaseorderid;
			
			return $this->po_s_id;
		
		}
		
		public function purchase_order_details()
		{
		
			global $db;

			$purchase_order_details = $db->get_results("SELECT * FROM purchase_order WHERE po_s_id='$this->po_s_id' AND po_status='2'");
	
			return $purchase_order_details;
			
		}
	
	}

?>