<script  type="text/javascript">
					
		function search_customer()
		{
			var cust_name=$("#cust_name").val();
					
			$.ajax({
			type:'POST',
			url:'/inventory2/purchase_order_ajax.php',
			data:'cust_name='+cust_name,
			success:function(reply)
			{	
				$("#reply_purchase_order").html(reply);
			}
		})
		}
		 
	</script>