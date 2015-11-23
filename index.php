<?php
	
	include('private/conn.php');
	
	session_start();
	
	define("jspath","plugins");
	$system = 'yes';
	
	$a_id=$_SESSION['a_id'];
	$a_at_id=$_SESSION['a_at_id'];
	$a_s_id=$_SESSION['a_s_id'];
	
	//print_r($_SESSION);
	
	if(!isset($_SESSION['a_id']))
	{
	
		header("location:login.php");
		
	}
	
	require_once("./classes/class.store.php");
	
	if(isset($_POST['store_switcher']))
	{
	
		$_SESSION['a_s_id']=$_POST['s_id'];
		$a_s_id=$_SESSION['a_s_id'];
		
	}
	
	$store = new Store();
	$store->setstoreid($a_s_id);
	$storeinfo = $store->storeinfo();
	
	//fetch admin
	
	$admin=$db->get_row("SELECT * FROM admin WHERE a_id='$a_id'");
	
	//fetch admin_type
	
	$admin_type=$db->get_row("SELECT * FROM admin_type WHERE at_id=".$admin->a_at_id);

	if(!$_GET)
	{
	
		include_once('index/querycontroller.php');
		
	} 
	else
	{
		
		if(isset($_GET['folder']))
		{
	
			$folder = $_GET['folder'];
		
		}
		else 
		{
	
			$folder = 'default';
		
		}

		if(isset($_GET['file']))
		{
			$file = $_GET['file'];
	
		} 
		else 
		{
			$file = 'view';
		}
	
		include_once($folder.'/'.$file.'/query.php');
		
	}
	
?>

<!--Insert Purchase Order-->

<?php 

	//insert purchase_order
	
	if(isset($_POST['add_purchase_order']))
	{

		$purchase_order_insert=$db->query("INSERT INTO purchase_order VALUES('',CURDATE(),'$a_id','','$a_s_id','','','','','1')");

		//get current id
		
		$po_id=$db->insert_id;
		
		header("Location:?folder=purchase_order&file=add&po_id=".$po_id);
		
	}
	
	//insert quotation
	
	if(isset($_POST['add_quotation']))
	{
		
		$quotation_insert=$db->query("INSERT INTO quotation VALUES('',CURDATE(),'$a_id','$a_s_id','','','1')");
		
		//get current id
		
		$q_id=$db->insert_id;
		
		header("Location: ?folder=quotation&file=add&q_id=".$q_id);
		
	}
	
	//insert puchase_product
	
	if(isset($_POST['add_purchase_product']))
	{
		
		$purchase_product_insert=$db->query("INSERT INTO purchase_product VALUES('',CURDATE(),'$a_id','$a_s_id','','1')");
		
		//get current_id
		
		$pp_id=$db->insert_id;

		header("Location: ?folder=purchase_product_items&file=add&pp_id=".$pp_id);
		
	}
	
?>

<html>

  <head>
  
    <meta charset="UTF-8">

    <title><?php include("title.php"); ?></title>
	
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
 
	<link href="plugins/font-awesome.min.css" rel="stylesheet" type="text/css" />
   
	<link href="plugins/ionicons.min.css" rel="stylesheet" type="text/css" />
	
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
	
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<link rel="stylesheet" href="/resources/demos/style.css">
	
	<link rel="stylesheet" href="plugins/jquery-ui.css">

  </head>
  
  <body class="skin-blue sidebar-mini">
  
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
		
        <a href="index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>ERP</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>ERP</b></span>
        </a>
		
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
		
          <!-- Sidebar toggle button-->
          <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
		  
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->

              <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<!--upload logo -->
				
                  <img src="<?php echo "./logo/".$a_s_id.".jpg"; ?>?time=123456789" class="user-image" alt="User Image"/>
				  
                  <span class="hidden-xs"><?php echo $admin->a_name; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
				  
                    <img src="<?php echo "./logo/".$a_s_id.".jpg"; ?>?time=123456789" class="user-image" alt="User Image"/>
					
                    <p><small>Member since <?php echo $admin->a_add_on; ?></small></p>
					
                  </li>
				  
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <!--<a href="?folder=user&file=edit&u_id=<?php //echo $user_name->u_id; ?>">Profile</a>-->
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="?folder=admin&file=change_password&a_id=<?php echo $a_id; ?>">Change Password</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <!--<a href="logout.php">Sign out</a>-->
                    </div>
                  </li>
				  
                  <!-- Menu Footer-->
                  <li class="user-footer">
				  
                    <div class="pull-left">
                      <a href="?folder=admin&file=edit&a_id=<?php echo $admin->a_id; ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
					
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
				  
                </ul>
            </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $admin->a_name; ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
		  
          <!-- search form -->
		  
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
		  
        <ul class="sidebar-menu">
		  
            <li class="header">MAIN NAVIGATION</li>
			
            <li class="treeview">
			
              <a href="index.php">
			  
                <i class="fa fa-dashboard"></i><span>Dashboard</span>
				
              </a>
			    
            </li>
			
			<!--Admin Type-->

			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Admin Type</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=admin_type&file=view"><i class="fa fa-circle-o"></i>View</a></li>

				</ul>
			 
            </li>

			<!--Brand-->

			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Brand</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=brand&file=view"><i class="fa fa-circle-o"></i>View</a></li>

				</ul>
			 
            </li>

			<!-- Category -->
		
			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Category</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=category&file=view"><i class="fa fa-circle-o"></i>View</a></li>

				</ul>
			 
            </li>
			
			<!--Product Type-->
			
			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Product Type</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=product_type&file=view"><i class="fa fa-circle-o"></i>View Product Type</a></li>
				
				</ul>
			 
            </li>
			
			<!--Product-->.
			
			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Product</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=product&file=view"><i class="fa fa-circle-o"></i>View</a></li>
					
				</ul>
			 
            </li>
			
			<!--Product Stock Location-->
			
			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Product Stock Location</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=product_stock_location&file=view"><i class="fa fa-circle-o"></i>View</a></li>
					
				</ul>
			 
            </li>
		
			<!-- Store -->
			
			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Store</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=store&file=view"><i class="fa fa-circle-o"></i>View</a></li>
					
				</ul>
			 
            </li>
			
			<!-- Supplier -->
			
			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Supplier</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=supplier&file=view"><i class="fa fa-circle-o"></i>View</a></li>
					
				</ul>
			 
            </li>
		
			<!-- Customer Category -->
			
			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Customer Category</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=customer_category&file=view"><i class="fa fa-circle-o"></i>View</a></li>
					
				</ul>
			 
            </li>
			
			<!-- Customer -->
			
			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Customer</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=customer&file=view"><i class="fa fa-circle-o"></i>View</a></li>
					
				</ul>
			 
            </li>
			
			<!-- Tax-->
		
			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Tax</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=tax&file=view"><i class="fa fa-circle-o"></i>View</a></li>
				
				</ul>
			 
            </li>
			
			<!--Purchase Product-->
			
			<li class="treeview">
			
				<a href="">
			  
					<i class="fa fa-user"></i> <span>Purchase Product</span> <i class="fa fa-angle-left pull-right"></i>
				
				</a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=purchase_product&file=view"><i class="fa fa-circle-o"></i>View</a></li>
				
				</ul>
			 
            </li>
			
			<!--Purchase Order Payments-->
			
			<li class="treeview">
			
              <a href="">
			  
                <i class="fa fa-user"></i> <span>Purchase Order Payments</span> <i class="fa fa-angle-left pull-right"></i>
				
              </a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=purchase_order_payment&file=view"><i class="fa fa-circle-o"></i>View Pending Payments</a></li>
				
				</ul>
			 
            </li>
			
			<!--Ststictics-->
			
			<li class="treeview">
			
				<a href="">
			  
					<i class="fa fa-user"></i> <span>Statistics</span> <i class="fa fa-angle-left pull-right"></i>
				
				</a>
			  
				<ul class="treeview-menu">
				
					<li class="active"><a href="?folder=statistics&file=view"><i class="fa fa-circle-o"></i>View Statistics</a></li>
				
				</ul>
			 
            </li>
			
        </ul>

        </section>
		
        <!-- /.sidebar -->
		
      </aside>

      <!-- Content Wrapper. Contains page content -->
	  
    <div class="content-wrapper">
	  
		<section class="content-header">
		
          <h1><?php echo $admin_type->at_type; ?> Dashboard</h1><br>
		  
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
		
       <!-- </section>-->
	   
	<section class="content">
	
<?php 
	
	if(!isset($_GET['folder']) && !isset($_GET['file']))
	{

?>

		<form method="POST">
	
			<input  class="btn btn-primary" type="submit" value="Create Bill" name="add_purchase_order" />
			<input  class="btn btn-primary" type="submit" value="Create Quotation" name="add_quotation" />
			<input  class="btn btn-primary" type="submit" value="Add Purchase Order" name="add_purchase_product" />
			
		</form>

<?php 
	
	}
	
		//fetch store_details
		
		$store_details=$db->get_results("SELECT * FROM store ORDER BY s_name");
	
?>

		<form method="POST">
	
		<select name="s_id" id="s_id" class="pull-right">
			
			<option value="000">Select Store</option>
			
			<?php 
				
				//display store_details
				
				foreach($store_details as $store)
				{
					if($store->s_id == $a_s_id)
					{ 
					
			?>
						<option value="<?php echo $store->s_id; ?>" selected><?php echo $store->s_name; ?></option>
				
			<?php 
					}
					else
					{
			?>
						<option value="<?php echo $store->s_id; ?>"><?php echo $store->s_name; ?></option>
			<?php 
					} 
				 
				}
			
			?>
			
			
		</select><br><br>
		
		<input type="hidden" name="store_switcher" value="1" />

		</form>

<?php 
	
	//display pending invoices
	
	$purchase_order_details=$db->get_results("SELECT * FROM purchase_order WHERE po_status='1' AND po_s_id='$a_s_id'");
	
	
/* 	if($purchase_order_details && !isset($_GET['folder']) && !isset($_GET['file']))
	{
?>



<div class="row">
<div class="col-md-12">
<div class="box box-primary">

	<div class="box-header">
		
		<center><h2 class="box-title">Pending Invoices</h2></center>
			
	</div>
	
	<div class="box-body">
	
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
						
						<td><?php echo $purchase_order->po_id; ?></td>
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

<?php 
	
	}
	 */
?>
		<!--Charts-->
		
<?php

	if(!$_GET)
	{
	
		//include_once('library/index/query.php');
		
		include_once('index/querycontroller.php');
	
	} 
	else
	{
		if(isset($_GET['folder']))
		{
				
			$folder = $_GET['folder'];
					
		}
		else 
		{
				
			$folder = 'default';
					
		}
	
		if(isset($_GET['file']))
		{
	
			$file = $_GET['file'];
		
		}
		else 
		{
				
			$file = 'view';
					
		}
	
		include_once($folder.'/'.$file.'/view.php');
	
	}
	
?>
	
	</section>		
	
    </div><!-- /.content-wrapper -->
	  
    <footer class="main-footer">
	  
        <div class="pull-right hidden-xs">
         <!-- <b>Version</b> 2.0-->
        </div>
		
        <strong>Copyright &copy; <a href="http://www.thoughtfulviewfinder.in" target="_blank">ThoughtFulViewFinder Services</a>.</strong> All rights reserved.
		
    </footer>
	  
    <div class='control-sidebar-bg'></div>
	  
    </div><!-- ./wrapper -->
	
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="plugins/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
	<script src="plugins/raphael-min.js"></script>
	<script src="plugins/moment.min.js"></script>
	
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>    
    
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>    
    
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
	
	<script src="plugins/amcharts.js"></script>
	<script src="plugins/serial.js"></script>
	<script src="plugins/light.js"></script>
	
<?php 

	$months = array("01","02","03","04","05","06","07","08","09","10","11","12");
	$string = '';
	
	foreach($months as $key=>$value)
	{
	
		$purchase_order=$db->get_var("SELECT SUM(po_amount) FROM purchase_order WHERE MONTH(po_date)='$value'");

		$string.= '{"month":"'.$value.'",';
		$string.= '"visits":"'.$purchase_order.'",';
		$string.= '"color":"#FF0F'.$value.'"},';
		
	}
		
?>

<script type="text/javascript">	

	$(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate ) 
	  {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
	
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 3,
      onClose: function( selectedDate )
	  {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  
	<!--Date Renge Picker-->
  
	$('#daterange').daterangepicker();
	$('.applyBtn').attr("type","submit"); 	
	$('.applyBtn').attr("name","date_range"); 	
	$('.applyBtn').attr("onclick","return btntest_onclick()"); 	

  var chart = AmCharts.makeChart("chart", {
  "type": "serial",
  "theme": "dark",
  "marginRight": 70,
  "dataProvider": [<?php echo $string; ?>],
  "startDuration": 1,
  "graphs": [{
    "balloonText": "<b>[[category]]: [[value]]</b>",
    "fillColorsField": "color",
    "fillAlphas": 0.9,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  }],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "month",
  "categoryAxis": {
    "gridPosition": "start",
    "labelRotation": 45
  },
  "export": {
    "enabled": true
  }

});

</script>
	
	<!--For Store ID -->

	<script type="text/javascript">
	
		$("#s_id").change(function() {
		$(this).closest('form').submit();
		});
	
	</script>
	
<?php 
	
	$months = array("01","02","03","04","05","06","07","08","09","10","11","12");
	$string = '';
	
	foreach($months as $key=>$value)
	{
	
		$purchase_product=$db->get_var("SELECT SUM(pp_amount) FROM purchase_product WHERE MONTH(pp_date)='$value'");

		$string.= '{"month":"'.$value.'",';
		$string.= '"visits":"'.$purchase_product.'"},';

	}

?>

<script type="text/JavaScript">

//product chart

var chart = AmCharts.makeChart( "chartdiv", {
  "type": "serial",
  "theme": "light",
  "dataProvider": [<?php echo $string; ?>],
  "gridAboveGraphs": true,
  "startDuration": 1,
  "graphs": [ {
    "balloonText": "[[category]]: <b>[[value]]</b>",
    "fillAlphas": 0.8,
    "lineAlpha": 0.2,
    "type": "column",
    "valueField": "visits"
  } ],
  "chartCursor": {
    "categoryBalloonEnabled": false,
    "cursorAlpha": 0,
    "zoomable": false
  },
  "categoryField": "month",
  "categoryAxis": {
    "gridPosition": "start",
    "gridAlpha": 0,
    "tickPosition": "start",
    "tickLength": 20
  },
  "export": {
    "enabled": true
  }

} );

	</script>
	
  </body>
  
</html>