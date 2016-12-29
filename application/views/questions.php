<?php
	switch($deptid){
		case 3:
			$count = count($tls);
			if($count > 0){
				echo '<h4>Select Negotiators</h4>';
?>
				<select onchange="loadrec(this,3,<?php echo $eid; ?>)">
<?php
				echo '<option value=""></option>';
				foreach($nego as $row){
					$this->db->where('_id',$row);
					$query = $this->db->get('tblnegotiator');
					$resultemp = $query->row();
					if($query->num_rows() > 0){
						?>
						<option value="<?php echo $row; ?>"><?php echo $resultemp->nfname.' '.$resultemp->nlname; ?></option>
						<?php
					}
				}
				echo '</select>';
				echo '<div id="negocontent"></div>';
			}
			break;
		case 5:
			$count = count($tls);
			if($count > 0){
				echo '<h4>Select Team Leaders</h4>';
?>
				<select onchange="loadrec2(this,5,<?php echo $eid; ?>)">
<?php
				echo '<option value=""></option>';
				foreach($tls as $row){
					$this->db->where('_id',$row);
					$query = $this->db->get('tblteamleader');
					$resultemp = $query->row();
					?>
					<option value="<?php echo $row; ?>"><?php echo $resultemp->tfname.' '.$resultemp->tlname; ?></option>
					<?php
				}
				echo '</select>';
				echo '<div id="tlscontent"></div>';
			}
			break;
		default:
			$data['eid'] = $eid;
			$data['resqs'] = $resqs;
			$this->load->view('qrecord', $data);

}
?>

<script type="text/javascript">
	$('.chkstat').on('switchChange.bootstrapSwitch', function(event, state) {
//		console.log(this); // DOM element
//		console.log(event); // jQuery event
//		console.log(state); // true | false
		var qid = $(this).val();
		var setting = '';
		if(state){
			setting = 'M';
		}else{
			setting = 'S';
		}
		$.ajax({
			url: '<?php echo base_url(); ?>events/setquestiontype/',
			type: 'POST',
			data: 'qid='+qid+'&setting='+setting,
			success:function(result){
				//do nothing
			}
		});
	});
</script>
