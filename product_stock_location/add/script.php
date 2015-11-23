	<script  type="text/javascript">
					
		function search_product()
		{
			var p_name=$("#p_name").val();
					
			$.ajax({
			type:'POST',
			url:'/inventory2/product_stock_location_ajax.php',
			data:'p_name='+p_name,
			success:function(reply)
			{
				$("#reply_product_location").html(reply);
			}
		})
		}
		 
	</script>