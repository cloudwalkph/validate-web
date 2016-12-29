<div class="row" style="margin-bottom: 35px;">	
	<div class="col-md-12">
		<div class="btn-group btn-group-justified">
			<div class="btn-group">				
				<?php $active = ($cat == 'pre') ? 'btn-warning':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/pre/1/'.$eid, 'Pre Event','class="btn '.$active.'"'); ?>
			</div><!--.btn-group-->
			<div class="btn-group">
				<?php $active = ($cat == 'proper') ? 'btn-warning':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/proper/1/'.$eid, 'Event Proper','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
			<div class="btn-group">				
				<?php $active = ($cat == 'post') ? 'btn-warning':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/post/1/'.$eid, 'Post Event','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
		</div><!--.btn-group-->
	</div><!--.col-->
</div><!--.row-->
<div class="row">	
	<div class="col-md-12">
		<div class="btn-group btn-group-justified">
			<div class="btn-group">
				<?php $active = ($dept == '1') ? 'btn-success':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/'.$cat.'/1/'.$eid, 'Accounts','class="btn '.$active.'"'); ?>
			</div><!--.btn-group-->
			<div class="btn-group">
				<?php $active = ($dept == '2') ? 'btn-success':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/'.$cat.'/2/'.$eid, 'Operations','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
			<div class="btn-group">				
				<?php $active = ($dept == '3') ? 'btn-success':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/'.$cat.'/3/'.$eid, 'Negotiators Assesment','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
			<div class="btn-group">				
				<?php $active = ($dept == '4') ? 'btn-success':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/'.$cat.'/4/'.$eid, 'Project Manager','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
			<div class="btn-group">				
				<?php $active = ($dept == '5') ? 'btn-success':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/'.$cat.'/5/'.$eid, 'Team Leaders Rating','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
		</div><!--.btn-group-->
	</div><!--.col-->
</div><!--.row-->
<div class="row" style="margin-bottom: 35px;">	
	<div class="col-md-12">
		<div class="btn-group btn-group-justified">
			<div class="btn-group">				
				<?php $active = ($dept == '6') ? 'btn-success':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/'.$cat.'/6/'.$eid, 'Setup','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
			<div class="btn-group">				
				<?php $active = ($dept == '7') ? 'btn-success':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/'.$cat.'/7/'.$eid, 'Setup Leaders Assesment','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
			<div class="btn-group">				
				<?php $active = ($dept == '8') ? 'btn-success':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/'.$cat.'/8/'.$eid, 'Production','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
			<div class="btn-group">				
				<?php $active = ($dept == '9') ? 'btn-success':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/'.$cat.'/9/'.$eid, 'Inventory','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
			<div class="btn-group">				
				<?php $active = ($dept == '10') ? 'btn-success':'btn-flat'; ?>
				<?php echo anchor('events/resultsdp/event/'.$cat.'/10/'.$eid, 'Human Resource','class="btn '.$active.'"'); ?>				
			</div><!--.btn-group-->
		</div><!--.btn-group-->
	</div><!--.col-->
</div><!--.row-->