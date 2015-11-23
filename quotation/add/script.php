<script  type="text/javascript">
					
		function search_customer()
		{
			var cust_name=$("#cust_name").val();
					
			$.ajax({
			type:'POST',
			url:'/inventory2/quotation_ajax.php',
			data:'cust_name='+cust_name,
			success:function(reply)
			{
				$("#reply_quotation").html(reply);
			}
		})
		}
		 
</script>