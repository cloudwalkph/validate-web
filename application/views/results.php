<?php 
	$data['eid'] = $eid;
	$data['page'] = 'result';
	$this->load->view("header_result",$data); 
?>
		
<div class="row cpreevent" alt="x">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title"><h4>Summary for <?php echo $result_event->e_name ?></h4></div>
			</div><!--.panel-heading-->
			<div class="panel-body">				
				<div class="c3-pie c3-charts"></div>
			</div><!--.panel-body-->
		</div><!--.panel-->
	</div><!--.col-md-12-->
</div>

	</div>
    <!-- /Start your project here-->
    
<?php
	$this->load->view("search_layer"); 
?>
<?php
	$this->load->view("script"); 
?>
<script>
	var chartPie = c3.generate({
		bindto: '.c3-pie',
		data: {
			// iris data from R
			columns: [
				['Pre Event', <?php echo $this->rating->category($eid,'pre'); ?>],
				['Event Proper', <?php echo $this->rating->category($eid,'eprop'); ?>],
				['Post Event', <?php echo $this->rating->category($eid,'post'); ?>]
			],
			type : 'bar',
			labels: true
		},
		bar: {
			width: 150
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
</script>
</body>
</html>