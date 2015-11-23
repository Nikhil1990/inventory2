<script  type="text/javascript">
	
		function search_product()
		{
			var p_name=$("#p_name").val();
					
			$.ajax({
			type:'POST',
			url:'/inventory2/purchase_product_ajax.php',
			data:'p_name='+p_name,
			success:function(reply)
			{	
				$("#reply_purchase_product").html(reply);
			}
		})
		}
		 
</script>