<?php 
	$data['eid'] = $eid;
	$data['page'] = 'dp';
	$this->load->view("header_result",$data); 
?>
<div class="row no-gutters tab-content" style="background: white;">
	<ul class="nav nav-tabs nav-justified" role="tablist">
		<li class="active"><a href="#preevent" data-toggle="tab">Pre Event</a></li>
		<li><a href="#eventproper" data-toggle="tab">Event Proper</a></li>
		<li><a href="#postevent" data-toggle="tab">Post Event</a></li>
	</ul>
	<div class="tab-pane fade in active" id="preevent">		
		<div class="row cpreevent" alt="x">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>Pre Event</h4></div>
					</div><!--.panel-heading-->
					<div class="panel-body">				
						<div class="c3-area-chart-pre-event c3-charts"></div>				
					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div>		
		<div class="row">
			<div class="col-md-3">
				<div class="message-list-overlay"></div>
				<ul class="list-material message-list2">
					<?php
						$data['qtype'] = "pre";
						$data['lmenu'] = array(
							'1' => 'Accounts',
							'2' => 'Operations',
							'3' => 'Negotiators Assesment',
							'4' => 'Project Managers',
							'5' => 'Team Leaders',
							'6' => 'Setup',
							'7' => 'Setup Leaders Assesment',
							'8' => 'Production',
							'9' => 'Inventory',
							'10' => 'Human Resources'
						);
						$this->load->view('dmenu',$data);
					?>					
				</ul>
			</div>
			<div class="col-md-9">
				<div class="message-send-container-1 row container-all" style="background: #fff;">
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="eventproper">
		<div class="row cpreevent" alt="x">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>Event Proper</h4></div>
					</div><!--.panel-heading-->
					<div class="panel-body">				
						<div class="c3-area-chart-event-proper c3-charts"></div>				
					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="message-list-overlay"></div>
				<ul class="list-material message-list2">
					<?php
						$data['qtype'] = "eprop";
						$data['lmenu'] = array(
							'1' => 'Accounts',
							'2' => 'Operations',
							'6' => 'Setup',
							'8' => 'Production',
							'9' => 'Inventory',
							'10' => 'Human Resources'
						);
						$this->load->view('dmenu',$data);
					?>
				</ul>
			</div>
			<div class="col-md-9">
				<div class="message-send-container-2 row container-all" style="background: #fff;">
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="postevent">
		<div class="row cpreevent" alt="x">
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<div class="panel-title"><h4>Post Event</h4></div>
					</div><!--.panel-heading-->
					<div class="panel-body">				
						<div class="c3-area-chart-post-event c3-charts"></div>
					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="message-list-overlay"></div>
				<ul class="list-material message-list2">
					<?php
						$data['qtype'] = "post";
						$data['lmenu'] = array(
							'1' => 'Accounts',
							'2' => 'Operations',
							'6' => 'Setup',
							'8' => 'Production',
							'9' => 'Inventory',
							'10' => 'Human Resources'
						);
						$this->load->view('dmenu',$data);
					?>
				</ul>
			</div>
			<div class="col-md-9">
				<div class="message-send-container-3 row container-all" style="background: #fff;">
				</div>
			</div>
		</div>
	</div>
</div>
		
		<!------->
	
	</div>
    <!-- /Start your project here-->
<?php
	$this->load->view("search_layer"); 
?>
<?php
	$this->load->view("script"); 
?>
    <!-- SCRIPTS -->
	<script>
	$(document).ready(function () {		
		var chartPreEvent = c3.generate({
			bindto: '.c3-area-chart-pre-event',
			data: {
				json: [<?php print_r(json_encode($chartPreEvent)); ?>],
				keys:{
					value: [<?php echo $chartPreKeys; ?>]
				},
				type: 'bar',
				onclick: function(e) {
					alert("aws");
				},
				labels: true					
			},
			bar: {
				width: 100
			},
			axis: {
				x:{
					label:{
						text:"Department",
						position: 'outer-center'
					}
				},
				y:{
					label:{
						text:"Percentage Value",
						position: 'outer-middle'
					}
				}
			},
			  grid: {
				  y: {
					  show: true
				  }
			},
			axis: {
				y: {
					max: 100,
					min: 0,
					padding: {top:0, bottom:0}
				}
			}
		});
		var chartEProper = c3.generate({
			bindto: '.c3-area-chart-event-proper',
			data: {
				json: [<?php print_r(json_encode($chartEProp)); ?>],
				keys:{
					value: [<?php echo $chartEPropKeys; ?>]
				},
				type: 'bar',
				onclick: function(e) {
					alert("aws");
				},
				labels: true					
			},
			bar: {
				width: 100
			},
			axis: {
				x:{
					label:{
						text:"Department",
						position: 'outer-center'
					}
				},
				y:{
					label:{
						text:"Percentage Value",
						position: 'outer-middle'
					}
				}
			},
			  grid: {
				  y: {
					  show: true
				  }
			},
			axis: {
				y: {
					max: 100,
					min: 0,
					padding: {top:0, bottom:0}
				}
			}
		});
		var chartPEvent = c3.generate({
			bindto: '.c3-area-chart-post-event',
			data: {
				json: [<?php print_r(json_encode($chartPEvent)); ?>],
				keys:{
					value: [<?php echo $chartPEventKeys; ?>]
				},
				type: 'bar',
				onclick: function(e) {
					alert("aws");
				},
				labels: true					
			},
			bar: {
				width: 100
			},
			axis: {
				x:{
					label:{
						text:"Department",
						position: 'outer-center'
					}
				},
				y:{
					label:{
						text:"Percentage Value",
						position: 'outer-middle'
					}
				}
			},
			  grid: {
				  y: {
					  show: true
				  }
			},
			axis: {
				y: {
					max: 100,
					min: 0,
					padding: {top:0, bottom:0}
				}
			}
		});
		$('.message-list2').on('click', 'li', function (){
			var deptid = $(this).find('a').data('dept-id');
			var deptcat = $(this).find('a').data('dept-cat');
			$(this).parents('.message-list2').find('li').removeClass("list-group-item-warning");
			$(this).addClass("list-group-item-warning");
			var cid = 1;
			switch(deptcat){
				case 'pre':
					cid = 1;
				break;
				case 'eprop':
					cid = 2;
				break;
				case 'post':
					cid = 3;
				break;
			}
			$('.container-all').empty();
			$('.message-send-container-'+cid).addClass('loading').prepend('<div class="loading-bar indeterminate"></div>');			
			
			$.ajax({
				url: '<?php echo base_url(); ?>events/getquestion/',
				type: 'POST',
				data: 'deptid='+deptid+'&deptcat='+deptcat+'&eid=<?php echo $eid; ?>',
				success:function(result){
					$('.message-send-container-'+cid).removeClass('loading').find('.loading-bar').remove();
					$('.message-send-container-'+cid).html(result);
					FormsSwitch.init();
					FormsSwitchery.init();
				}
			});	
		});

	});
	function addquestion(x){
		var dept = $(x).parents('.col-md-12').find('.selecter').val();
		var qid = $(x).attr('alt');
		$.ajax({
			url: '<?php echo base_url(); ?>events/addquestion/',
			type: 'POST',
			data: 'dept='+dept+'&qid='+qid,
			success:function(result){
				
			}
		});
	}
		
		function loadrec(x,depid,eid){
			var value = $(x).val();
			$('#negocontent').empty();
			$('#negocontent').addClass('loading').prepend('<div class="loading-bar indeterminate"></div>');
			$.ajax({
				url: '<?php echo base_url(); ?>events/getnegotls/',
				type: 'POST',
				data: 'deptid='+depid+'&deptcat=pre&eid='+eid+'&value='+value,
				success:function(result){
					$('#negocontent').removeClass('loading').find('.loading-bar').remove();
					$('#negocontent').html(result);
					FormsSwitch.init();
					FormsSwitchery.init();
				}
			});
		}

	function loadrec2(x,depid,eid){
		var value = $(x).val();
		$('#tlscontent').empty();
		$('#tlscontent').addClass('loading').prepend('<div class="loading-bar indeterminate"></div>');
		$.ajax({
			url: '<?php echo base_url(); ?>events/getnegotls/',
			type: 'POST',
			data: 'deptid='+depid+'&deptcat=pre&eid='+eid+'&value='+value,
			success:function(result){
				$('#tlscontent').removeClass('loading').find('.loading-bar').remove();
				$('#tlscontent').html(result);
				FormsSwitch.init();
				FormsSwitchery.init();
			}
		});
	}
	</script>
</body>
</html>