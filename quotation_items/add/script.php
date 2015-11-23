<script  type="text/javascript">

	function search_product()
		{
			var p_name=$("#p_name").val();
					
			$.ajax({
			type:'POST',
			url:'/inventory2/quotation_items_ajax.php',
			data:'p_name='+p_name,
			success:function(reply)
			{
				$("#reply_quotation_items").html(reply);
			}
		})
		}
		
</script>