<div class="row">
<div class="col-md-12">
<div class="box box-primary">

	<div class="box-header">
		
		<center><h2 class="box-title">Pending Invoices</h2></center>
			
	</div>
	
<div class="box-body">

	<form method="POST">
		
		<div class="form-group pull-right col-md-4">
            <label>Date range:</label>
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
            <input type="text" class="form-control pull-right" id="reservation"/>
         </div>
        </div>
		
	</form>
		
	<table class="table table-bordered">
	
		<thead>
		
			<tr>
				
				<th>Purchase Order ID</th>
				<th>Amount</th>
				<th>Pending Amount</th>

			</tr>
		
		</thead>
		
		<tbody>
			
			<?php 
				
				foreach($purchase_order_details as $purchase_order)
				{
				
					//fetch purchase_order_payment
					
					$purchase_order_payment=$db->get_row("SELECT * FROM purchase_order_payment WHERE pop_po_id=".$purchase_order->po_id);
					
					$pending_amount=$purchase_order->po_amount - $purchase_order_payment->pop_amount;
					
			?>
					
					<tr>
						
						<td><?php echo "<a href=''>Purchase ID ".$purchase_order->po_id."</a>"; ?></td>
						<td><?php echo $purchase_order->po_amount; ?></td>
						<td><?php echo $pending_amount; ?></td>
						
					</tr>
					
			<?php 
					
				}
				
			?>

		</tbody>

	</table>
	
</div>
</div>
</div>
</div>

<script src="../../plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

 <script type="text/javascript">
 
      $(function () 
	  {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) 
		{
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
