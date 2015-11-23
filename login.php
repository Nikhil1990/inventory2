<?php 
	
	session_start();
	
	include('private/conn.php');
	
	//Fetch user name and password
	
	if(isset($_POST['login_btn']))
	{
	
		$a_username=$_POST['a_username'];
		$a_password=MD5($_POST['a_password']);
		
		$admin=$db->get_row("SELECT * FROM admin WHERE a_username='$a_username' AND a_password='$a_password'");
		
		if(($admin->a_username==$a_username) && ($admin->a_password==$a_password))
		{
			
			session_start();
				
			$_SESSION['a_id']=$admin->a_id;
			$_SESSION['a_at_id']=$admin->a_at_id;
			$_SESSION['a_s_id']=$admin->a_s_id;
			$_SESSION['a_name']=$user->a_name;
				
			header("Location: index.php");
				
		}
		else
		{
				
			die("Invalid User Or Password");
				
		}
		
	}
	
?>
	
<!DOCTYPE html>

<html>

  <head>
  
    <meta charset="UTF-8">
	
    <title>ERP Login</title>
	
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
	
  </head>
  
  <body class="login-page">
  
    <div class="login-box">
	
      <div class="login-logo">
	  
		<b>ERP</b>
		
      </div>
	  
		<div class="login-box-body">
		
        <p class="login-box-msg">Sign in to start your session</p>
        
        <form  method="post">
        	
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name='a_username' placeholder="Username"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
		  
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name='a_password' placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
		  
          <div class="row">
            <div class="col-xs-8">    
                                  	
            </div>
            <div class="col-xs-4">
          
              <input  type="submit" name='login_btn' value='Sign In' class="btn btn-primary btn-block btn-flat">
			  
            </div>
			
          </div>
		  
        </form>

         <a href="forgot.php">I forgot my password</a><br>

		</div>
	  
    </div>

    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
	
    <script>
	
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
	  
    </script>
	
  </body>
</html>