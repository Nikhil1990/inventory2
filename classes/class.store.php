<?php 
	
	class Store
	{
		
		private $s_id = 1;
		
		//set store id
	
		public function setstoreid($storeid)
		{
		
			$this->s_id = $storeid;

			return $this->s_id;
		
		}
	
		public function storeinfo()
		{
		
			global $db;

			$storeinfo = $db->get_results("SELECT * FROM store WHERE s_id='$this->s_id'");
	
			return $storeinfo;
		}
		
		/*  public function getallPurchaseOrder()
		{
		
			global $db;

			$purchase_order_details = $db->get_results("SELECT * FROM purchase_order WHERE s_id='$this->s_id'");
	
			return $purchase_order_details;
		}  */
		 
	}

?>