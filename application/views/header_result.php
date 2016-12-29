<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <title>Evaluation - Dashboard</title>
	
	<!-- BEGIN CORE CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin1/css/admin1.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/css/elements.css">
	<!-- END CORE CSS -->

	<!-- BEGIN PLUGINS CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/plugins/c3js-chart/c3.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/css/plugins.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/plugins/switchery/dist/switchery.min.css">
	<!-- END PLUGINS CSS -->

	<!-- BEGIN SHORTCUT AND TOUCH ICONS -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/globals/img/icons/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/globals/img/icons/apple-touch-icon.png">
	<!-- END SHORTCUT AND TOUCH ICONS -->
	

</head>
<body>
    <!-- Start your project here-->
	<div class="nav-bar-container">
		<!-- BEGIN ICONS -->
		<div class="nav-menu">
			<div class="hamburger">
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
				<span class="patty"></span>
			</div><!--.hamburger-->
		</div><!--.nav-menu-->
		
		<div class="nav-search">
			<span class="search"></span>
		</div><!--.nav-search-->
	
		
		<div class="nav-bar-border"></div><!--.nav-bar-border-->
		
		<div class="overlay">
			<div class="starting-point">
				<span></span>
			</div><!--.starting-point-->
			<div class="logo">EVALUATION</div><!--.logo-->
		</div><!--.overlay-->
		
		<div class="overlay-secondary"></div><!--.overlay-secondary-->
	</div>
	<div class="content">
		<div class="page-header full-content">
			<div class="row">
				<div class="col-sm-6">
					<h1>Dashboard <small>Activity Summary</small></h1>
				</div><!--.col-->
				<div class="col-sm-6">
					<ol class="breadcrumb">
						<li><a href="#" class="active"><i class="ion-home"></i> Homepage</a></li>
					</ol>
				</div><!--.col-->
			</div><!--.row-->
		</div><!--.page-header-->
		
		<!------->
<div class="row" style="margin-bottom: 35px;">	
	<div class="col-md-12">
		<div class="btn-group btn-group-justified">
			<?php
				$activedp = "btn-flat";
				$aresult = "btn-flat";
				switch($page){
					case 'dp':
						$activedp = "btn-warning";
					break;
					case 'result':
						$aresult = "btn-warning";
					break;
				}
			?>
			<div class="btn-group">
				<?php echo anchor('events/results/event/'.$eid, 'Category Details','class="btn '.$aresult.'"'); ?>
			</div><!--.btn-group-->
			<div class="btn-group">
				<?php echo anchor('events/resultsdp/event/pre/1/'.$eid, 'Department Details','class="btn '.$activedp.'"'); ?>				
			</div><!--.btn-group-->
		</div><!--.btn-group-->
	</div><!--.col-->
</div><!--.row-->