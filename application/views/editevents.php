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
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/css/plugins.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/plugins/pnikolov-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/plugins/minicolors/jquery.minicolors.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/plugins/clockface/css/clockface.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
	<!-- END PLUGINS CSS -->

	<!-- BEGIN SHORTCUT AND TOUCH ICONS -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/globals/img/icons/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/globals/img/icons/apple-touch-icon.png">
	<!-- END SHORTCUT AND TOUCH ICONS -->
	<script src="<?php echo base_url(); ?>assets/globals/plugins/modernizr/modernizr.min.js"></script>

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

<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title"><h4>Edit Event</h4></div>
			</div><!--.panel-heading-->
			<div class="panel-body">
				<h3>Add Event Data</h3>
				<?php echo form_open('events/editevents/'.$eid); ?>
					<div class="row">
						<div class="col-md-3">Event Name:</div>
						<div class="col-md-9">
							<div class="inputer floating-label">
								<div class="input-wrapper">
									<input type="text" class="form-control" id="exampleInput1" name="e_name" value="<?php echo $result_event->e_name; ?>">
									<label for="exampleInput1">Event Name</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">JO Number:</div>
						<div class="col-md-9">
							<div class="inputer floating-label">
								<div class="input-wrapper">
									<input type="text" class="form-control" id="exampleInput1" name="e_jo" value="<?php echo $result_event->e_jo; ?>">
									<label for="exampleInput1">JO Number</label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
					<div class="col-md-3">Area</div>
					<div class="col-md-9">
						<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="text" class="form-control" id="exampleInput1" name="e_area" value="<?php echo $result_event->e_area; ?>">
								<label for="exampleInput1">Area</label>
							</div>
						</div>
					</div>
				</div>
					<div class="row">						<h3>Expiration:</h3>					</div>					<div class="row">						<div class="col-md-3">Pre Event:</div>						<div class="col-md-9">							<div class="row">								<div class="col-md-1">									Date:								</div>								<div class="col-md-11">									<div class="control-group">										<div class="controls">											<div class="input-group">												<span class="input-group-addon"><i class="ion-android-calendar"></i></span>												<div class="inputer">													<div class="input-wrapper">														<input type="text" style="width: 200px" name="p_date" class="form-control bootstrap-daterangepicker-basic" value="<?php echo $result_event->p_date; ?>" />													</div>												</div>											</div>										</div>									</div>								</div>							</div>							<div class="row">							</div>						</div>					</div>					<div class="row">						<div class="col-md-3">Event Proper:</div>						<div class="col-md-9">							<div class="row">								<div class="col-md-1">									Date:								</div>								<div class="col-md-11">									<div class="control-group">										<div class="controls">											<div class="input-group">												<span class="input-group-addon"><i class="ion-android-calendar"></i></span>												<div class="inputer">													<div class="input-wrapper">														<input type="text" style="width: 200px" name="e_date" class="form-control bootstrap-daterangepicker-basic" value="<?php echo $result_event->e_date; ?>" />													</div>												</div>											</div>										</div>									</div>								</div>							</div>							<div class="row">							</div>						</div>					</div>					<div class="row">						<div class="col-md-3">Post Event:</div>						<div class="col-md-9">							<div class="row">								<div class="col-md-1">									Date:								</div>								<div class="col-md-11">									<div class="control-group">										<div class="controls">											<div class="input-group">												<span class="input-group-addon"><i class="ion-android-calendar"></i></span>												<div class="inputer">													<div class="input-wrapper">														<input type="text" style="width: 200px" name="pe_date" class="form-control bootstrap-daterangepicker-basic" value="<?php echo $result_event->pe_date; ?>" />													</div>												</div>											</div>										</div>									</div>								</div>							</div>							<div class="row">							</div>						</div>					</div>
					<div class="row" style="margin-bottom: 50px;">
						<div class="col-md-3">Evaluator:</div>
						<div class="col-md-9">
							<div class="row">
								<ul class="list-material has-hidden" id="evaluators">
									<?php
										$empids = array();
										foreach ($results as $user){
											$evaluator = json_decode($result_event->evaluator);											
											if(in_array($user->_id,$evaluator)){
												array_push($empids,$user->_id);
												$this->session->unset_userdata("empids");
												$this->session->set_userdata("empids",$empids);
									?>
											<li class="has-action-left" alt="<?php echo $user->_id; ?>" id="emplist">
												<a style="cursor:pointer;" class="hidden" id="btnclose" ><i class="ion-close"></i></a>												
												<input type="hidden" name="evaluator[]" value="<?php echo $user->_id; ?>" />
												<a class="visible" id="vitems">
													<div class="list-action-left">
														<i class="ion-happy icon-circle"></i>
													</div>
													<div class="list-content">
														<span class="title"><?php echo $user->emp_fname.' '.$user->emp_lname; ?></span>
														<span class="caption"><?php echo $user->emp_position.' - '.$user->emp_dept; ?></span>
													</div>
												</a>
											</li>
									<?php
											}
										}
									?>
								</ul>
							</div>
							<div class="row">
								<div class="inputer floating-label">
									<div class="input-wrapper">
										<input type="text" class="form-control" id="emplistinput" name="emplist">
										<label for="emplistinput">Evaluator</label>
									</div>
								</div>
							</div>
							<div class="row">
								<ul class="list-material has-hidden" id="suggestedemployee">
									
								</ul>
							</div>							
						</div>
						<div class="row" style="margin-bottom: 50px;">
							<div class="col-md-3">Team Leader's:</div>
							<div class="col-md-9">
								<div class="row">
									<ul class="list-material has-hidden" id="teamleaders">
										<?php
										$tlids = array();
										foreach ($results_tls as $user) {
											$tls = json_decode($result_event->tls);
											if (!empty($tls)) {
												if (in_array($user->_id, $tls)) {
													array_push($tlids, $user->_id);
													$this->session->unset_userdata("tlsids");
													$this->session->set_userdata("tlsids", $tlids);
													?>
													<li class="has-action-left" alt="<?php echo $user->_id; ?>" id="emplist">
														<a style="cursor:pointer;" class="hidden" id="btnclose"><i
																class="ion-close"></i></a>
														<input type="hidden" name="tls[]" value="<?php echo $user->_id; ?>"/>
														<a class="visible" id="vitems">
															<div class="list-action-left">
																<i class="ion-happy icon-circle"></i>
															</div>
															<div class="list-content">
																<span
																	class="title"><?php echo $user->tfname . ' ' . $user->tlname; ?></span>
																<span class="caption"><?php echo $user->temail; ?></span>
															</div>
														</a>
													</li>
													<?php
												}
											}
										}
										?>
									</ul>
								</div>
								<div class="row">
									<div class="inputer floating-label">
										<div class="input-wrapper">
											<input type="text" class="form-control" id="tllistinput" name="tllist">
											<label for="tllistinput">Team Leaders</label>
										</div>
									</div>
								</div>
								<div class="row">
									<ul class="list-material has-hidden" id="suggestedtls">

									</ul>
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom: 50px;">
							<div class="col-md-3">Negotiator's:</div>
							<div class="col-md-9">
								<div class="row">
									<ul class="list-material has-hidden" id="negotiators">
										<?php
										$negoids = array();
										foreach ($results_nego as $user) {
											$nego = json_decode($result_event->nego);
											if (!empty($nego)) {
												if (in_array($user->_id, $nego)) {
													array_push($negoids, $user->_id);
													$this->session->unset_userdata("nego");
													$this->session->set_userdata("nego", $negoids);
													?>
													<li class="has-action-left" alt="<?php echo $user->_id; ?>" id="emplist">
														<a style="cursor:pointer;" class="hidden" id="btnclose"><i
																class="ion-close"></i></a>
														<input type="hidden" name="nego[]"
															   value="<?php echo $user->_id; ?>"/>
														<a class="visible" id="vitems">
															<div class="list-action-left">
																<i class="ion-happy icon-circle"></i>
															</div>
															<div class="list-content">
																<span
																	class="title"><?php echo $user->nfname . ' ' . $user->nlname; ?></span>
																<span class="caption"><?php echo $user->nemail; ?></span>
															</div>
														</a>
													</li>
													<?php
												}
											}
										}
										?>
									</ul>
								</div>
								<div class="row">
									<div class="inputer floating-label">
										<div class="input-wrapper">
											<input type="text" class="form-control" id="negolistinput" name="negolist">
											<label for="negolistinput">Negotiators</label>
										</div>
									</div>
								</div>
								<div class="row">
									<ul class="list-material has-hidden" id="suggestednego">

									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 col-md-offset-6">
							<button type="submit" class="btn center-block btn-warning" style="width: 100%;">Update</button>
						</div>
						<div class="col-md-3">
							<?php echo anchor('events', 'Cancel','class="btn center-block btn-danger" style="width: 100%;"'); ?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>				
	</div>
    <!-- /Start your project here-->
    <div class="layer-container">
		<div class="menu-layer">
			<?php $this->load->view('menu'); ?>
		</div>
		
		<div class="search-layer">
			<div class="search">
				<form action="pages-search-results.html">
					<div class="form-group">
						<input type="text" id="input-search" class="form-control" placeholder="type something">
						<button type="submit" class="btn btn-default disabled"><i class="ion-search"></i></button>
					</div>
				</form>
			</div><!--.search-->

			<div class="results">
				<div class="row">
					<div class="col-md-4">
						<div class="result result-users">
							<h4>USERS <small>(0)</small></h4>

							<p>No results were found</p>

						</div><!--.results-user-->
					</div><!--.col-->
					<div class="col-md-4">
						<div class="result result-posts">
							<h4>POSTS <small>(0)</small></h4>

							<p>No results were found</p>

						</div><!--.results-posts-->
					</div><!--.col-->
					<div class="col-md-4">
						<div class="result result-files">
							<h4>FILES <small>(0)</small></h4>
							<p>No results were found</p>
						</div><!--.results-files-->
					</div><!--.col-->

				</div><!--.row-->
			</div><!--.results-->
		</div><!--.search-layer-->
	</div>

    <!-- SCRIPTS -->
    
	<!-- BEGIN GLOBAL AND THEME VENDORS -->
	<script src="<?php echo base_url(); ?>assets/globals/js/global-vendors.js"></script>
	<!-- END GLOBAL AND THEME VENDORS -->

	<!-- BEGIN PLUGINS AREA -->
	<script src="http://maps.google.com/maps/api/js?sensor=true&amp;libraries=places"></script>
	<script src="<?php echo base_url(); ?>assets/globals/plugins/pnikolov-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/globals/plugins/minicolors/jquery.minicolors.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/globals/plugins/clockface/js/clockface.js"></script>
	<script src="<?php echo base_url(); ?>assets/globals/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/globals/scripts/forms-pickers.js"></script>
	<!-- END PLUGINS AREA -->

	<!-- PLEASURE -->
	<script src="<?php echo base_url(); ?>assets/globals/js/pleasure.js"></script>

	<!-- ADMIN 1 -->
	<script src="<?php echo base_url(); ?>assets/admin1/js/layout.js"></script>
	<?php echo validation_errors(); ?>
	<script>
	$(document).ready(function () {
		Pleasure.init();
		Layout.init();
		FormsPickers.init();		
	});
	function changestate(x){
		if($(x).find("#chkbox").prop( "checked" )){
			$(x).find("#chkbox").removeAttr("checked");
			$(x).removeClass("btn-primary");
		}else{
			$(x).find("#chkbox").attr('checked', 'checked');
			$(x).addClass("btn-primary");
		}		
	}
	window.onbeforeunload = function() {
		$.ajax({
			url: '<?php echo base_url(); ?>events/removelist/',
			type: 'POST',
			data: 'emp=',
			success:function(result){
				
			}
		});
	}
	$('#emplistinput').keyup(function(e){
		if($(this).val() != ""){
			$.ajax({
				url: '<?php echo base_url(); ?>events/getemployee/',
				type: 'POST',
				data: 'emp='+$(this).val(),
				success:function(result){
					$('#suggestedemployee').html(result);
				}
			});
		}	
	});
	function changestate(x){
		if($(x).find("#chkbox").prop( "checked" )){
			$(x).find("#chkbox").removeAttr("checked");
			$(x).removeClass("btn-primary");
		}else{
			$(x).find("#chkbox").attr('checked', 'checked');
			$(x).addClass("btn-primary");
		}		
	}
	
	$('#suggestedemployee').on('click', '#btncheck', function (){
		var parent = $(this).parents("#emplist");
		var pid = parent.attr('alt');
		var title = parent.find(".title").html();
		var content = '<a style="cursor:pointer;" class="hidden hide" id="btnclose" ><i class="ion-close"></i></a>';
		$.ajax({
			url: '<?php echo base_url(); ?>events/addevalquery/',
			type: 'POST',
			data: 'empid='+pid,
			success:function(result){
				content = content+'<input type="hidden" name="evaluator[]" value="'+pid+'" />';
				parent.find("#btnclose").show();
				content = content + '<a class="visible" id="vitems">' + parent.find('#vitems').html() + '</a>';
				$(this).hide();
				parent.hide();
				$('#emplistinput').val('');
				$('#evaluators').append('<li class="has-action-left" id="emplist" alt="'+pid+'">'+content+'</li>');	
				$('#suggestedemployee').empty();
			}
		});
	});
	$('#evaluators').on('click', '#btnclose', function () {
		var parent = $(this).parents("#emplist");
		var pid = parent.attr('alt');		
		$.ajax({
			url: '<?php echo base_url(); ?>events/removelistitem/',
			type: 'POST',
			data: 'empid='+pid,
			success:function(result){				
				parent.remove();
			}
		});		
	});
	//		get team leader start
	$('#tllistinput').keyup(function(e){
		if($(this).val() != ""){
			$.ajax({
				url: '<?php echo base_url(); ?>events/getteamleaders/',
				type: 'POST',
				data: 'emp='+$(this).val(),
				success:function(result){
					$('#suggestedtls').html(result);
				}
			});
		}
	});

	$('#suggestedtls').on('click', '#btncheck', function (){
		var parent = $(this).parents("#emplist");
		var pid = parent.attr('alt');
		var title = parent.find(".title").html();
		var content = '<a style="cursor:pointer;" class="hidden hide" id="btnclose" ><i class="ion-close"></i></a>';
		$.ajax({
			url: '<?php echo base_url(); ?>events/addtlsquery/',
			type: 'POST',
			data: 'empid='+pid,
			success:function(result){
				content = content+'<input type="hidden" name="tls[]" value="'+pid+'" />';
				parent.find("#btnclose").show();
				content = content + '<a class="visible" id="vitems">' + parent.find('#vitems').html() + '</a>';
				$(this).hide();
				parent.hide();
				$('#tllistinput').val('');
				$('#teamleaders').append('<li class="has-action-left" id="emplist" alt="'+pid+'">'+content+'</li>');
				$('#suggestedtls').empty();
			}
		});
	});
	$('#teamleaders').on('click', '#btnclose', function () {
		var parent = $(this).parents("#emplist");
		var pid = parent.attr('alt');
		$.ajax({
			url: '<?php echo base_url(); ?>events/removelistitemtls/',
			type: 'POST',
			data: 'empid='+pid,
			success:function(result){
				parent.remove();
			}
		});
	});
	//		get team leader ends
	//		get negotiators start
	$('#negolistinput').keyup(function(e){
		if($(this).val() != ""){
			$.ajax({
				url: '<?php echo base_url(); ?>events/getnegotiators/',
				type: 'POST',
				data: 'emp='+$(this).val(),
				success:function(result){
					$('#suggestednego').html(result);
				}
			});
		}
	});

	$('#suggestednego').on('click', '#btncheck', function (){
		var parent = $(this).parents("#emplist");
		var pid = parent.attr('alt');
		var title = parent.find(".title").html();
		var content = '<a style="cursor:pointer;" class="hidden hide" id="btnclose" ><i class="ion-close"></i></a>';
		$.ajax({
			url: '<?php echo base_url(); ?>events/addnegoquery/',
			type: 'POST',
			data: 'empid='+pid,
			success:function(result){
				content = content+'<input type="hidden" name="nego[]" value="'+pid+'" />';
				parent.find("#btnclose").show();
				content = content + '<a class="visible" id="vitems">' + parent.find('#vitems').html() + '</a>';
				$(this).hide();
				parent.hide();
				$('#negolistinput').val('');
				$('#negotiators').append('<li class="has-action-left" id="emplist" alt="'+pid+'">'+content+'</li>');
				$('#suggestednego').empty();
			}
		});
	});
	$('#negotiators').on('click', '#btnclose', function () {
		var parent = $(this).parents("#emplist");
		var pid = parent.attr('alt');
		$.ajax({
			url: '<?php echo base_url(); ?>events/removelistitemnego/',
			type: 'POST',
			data: 'empid='+pid,
			success:function(result){
				parent.remove();
			}
		});
	});
	//		get negotiators ends	
	</script>
</body>

</html>