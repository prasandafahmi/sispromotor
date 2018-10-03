<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/admin/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/assets/css/basic.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/lipi/lipi.png">
  </head>

  <title>SISPROMOTOR ADMIN | LIPI</title>

  <body class="hlogin">
	  <div id="login-page" >
	  	<div class="container">
		      <form class="form-login" action="<?php echo site_url();?>/admin/Login/validasi" method="post">
		        <h2 class="form-login-heading">SISPROMOTOR</h2>
		        <div class="login-wrap">
		            <input type="text" name="f1" class="form-control" placeholder="username" autofocus>
		            <br>
		            <input type="password" name="f2" class="form-control" placeholder="Password">
                    <br>
				        Status : <select name="f3" > 
							<option> Super admin</option>
							<option> Administrasi jasa</option>
							<option> Bendahara</option>
							<option> Pelaksana</option>
						</select>
                    <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		        </div>
		      </form>	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/admin/assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/admin/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url();?>assets/admin/assets/img/bb.jpg", {speed: 500});
    </script>
  </body>
</html>
