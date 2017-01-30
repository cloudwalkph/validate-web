<?php
	foreach($lmenu as $key=>$value){
?>
		<li class="has-action-left has-action-right" style="cursor:pointer;">
			<a class="visible" data-dept-id="<?php echo $key ?>" data-dept-cat="<?php echo $qtype ?>">
				<div class="list-action-left">

				</div>
				<div class="list-content" style="padding-right: 0px;">
					<span class="title"><?php echo $value ?></span>
				</div>
				<div class="list-action-right">
					<!--<i class="ion-android-done bottom"></i>-->
				</div>
			</a>
		</li>
<?php
	}
?>