<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Evaluation</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/MDB-Free/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/MDB-Free/css/latest/mdb.min.css" rel="stylesheet">

    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
	

</head>
<body class="login">
    <!-- Start your project here-->
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="padding-top: 40px;">
				<img src="<?php echo base_url(); ?>assets/img/logo.png" class="center-block" style="max-width: 132px;margin-bottom: 15px;" />
				<h3 class="heading h3-responsive center-block">Activations Project Evaluation</h3>
				<p class="slogan"><small class="text-muted">Let’s help keep the quality of our service to its peak and make</small></p>
				<p class="slogan" style="margin-top: -6px;"><small class="text-muted">every client satisfied. Please log in to participate.</small></p>
			</div>		
		</div>
		<div class="row" style="padding-top: 20px;">
			<div class="col-md-4 col-md-offset-4">
				
				<?php echo form_open('login'); ?>
					<div class="md-form">
						<input type="text" id="form123" name="username" class="form-control">
						<label for="form123" class="">Username</label>
					</div>
					<div class="md-form">
						<input type="password" id="form123" name="pword" class="form-control">
						<label for="form123" class="">Password</label>
					</div>
					<div class="md-form">
						<button type="submit" class="btn btn-lg btn-warning btn-block waves-effect" style="margin-left: 0px;">Login</button>	
					</div>
				</form>
			</div>	
		</div>		
	</div>
    <!-- /Start your project here-->
    

    <!-- SCRIPTS -->
    
	<!-- JQuery -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/MDB-Free/js/jquery-2.2.3.min.js"></script>
	   <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/MDB-Free/js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/MDB-Free/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->    
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/MDB-Free/js/latest/mdb.min.js"></script>
<?php echo validation_errors(); ?>

</body>

</html>