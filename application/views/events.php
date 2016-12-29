<?php $this->load->view('header'); ?>
		
		
		<!------->
<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title"><h4>Events Record</h4></div>
			</div><!--.panel-heading-->
			<div class="panel-body">
				<?php echo anchor('events/addevents', 'Add Event','class="btn btn-flat btn-warning"'); ?>
				<div class="overflow-table">
					<table class="display datatables-basic">
						<thead>
							<tr>								
								<th>Name</th>
								<th>JO Number</th>
								<th>Area</th>
								<th>Ex: Pre Event</th>
								<th>Ex: Event Proper</th>
								<th>Ex: Post Event</th>
								<th>Evaluator</th>
								<th>Team Leader's</th>
								<th>Negotiator's</th>
								<th>Result</th>
								<th>Date Created</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tfoot>
							<tr>								
								<th>Name</th>
								<th>JO Number</th>
								<th>Area</th>
								<th>Expiration</th>
								<th>Evaluator</th>
								<th>Team Leader's</th>
								<th>Negotiator's</th>
								<th>Result</th>
								<th>Date Created</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</tfoot>
						<tbody>
						<?php
							foreach ($results as $event){
						?>
								<tr>									
									<td><?php echo $event->e_name; ?></td>
									<td><?php echo $event->e_jo; ?></td>
									<td><?php echo $event->e_area; ?></td>
									<td>
										<?php
										if(isset($event->p_date)){
//											$dbtime = $event->p_date;
//											$datetime = DateTime::createFromFormat('m/d/Y', $dbtime);
//											if ($datetime) {
												if ( strtotime($event->p_date) < strtotime(date('m/d/Y'))){
													echo 'Date is Expired.';
												}else{
													echo $event->p_date;
												}
//											} else {
//												echo 'Not Set.';
//											}
										} else {
											echo 'Not Set.';
										}
										?>
									</td>
									<td>
										<?php
										if(isset($event->e_date)){
//											$dbtime = $event->e_date;
//											$datetime = DateTime::createFromFormat('m/d/Y', $dbtime);
//											if ($datetime) {
												if ( strtotime($event->e_date) < strtotime(date('m/d/Y'))){
													echo 'Date is Expired.';
												}else{
													echo $event->e_date;
												}
//											}
										} else {
											echo 'Not Set.';
										}
										?>
									</td>
									<td>
										<?php
										if(isset($event->pe_date)){
//											$dbtime = $event->pe_date;
//											$datetime = DateTime::createFromFormat('m/d/Y', $dbtime);
//											if ($datetime) {
												if ( strtotime($event->pe_date) < strtotime(date('m/d/Y'))){
													echo 'Date is Expired.';
												}else{
													echo $event->pe_date;
												}
//											}
										} else {
											echo 'Not Set.';
										}
										?>
									</td>
									<td>
										<select>
										<?php
											$data = json_decode($event->evaluator);
											$count = count($data);
											if($count > 0){
												foreach($data as $row) {
													$this->db->where('_id', $row);
													$query = $this->db->get('tblemployee');
													$resultemp = $query->row();
													if ($query->num_rows() > 0) {
														?>
														<option><?php echo $resultemp->emp_fname . ' ' . $resultemp->emp_lname; ?></option>
														<?php
													}
												}
											}											
										?>
										</select>
									</td>
									<td>
											<?php
											$data = json_decode($event->tls);
											$count = count($data);
											if($count > 0){
												foreach($data as $row){
													$this->db->where('_id',$row);
													$query = $this->db->get('tblteamleader');
													$resultemp = $query->row();
													if($query->num_rows() > 0) {
														?>
														<option><?php echo $resultemp->tfname . ' ' . $resultemp->tlname; ?></option>
														<?php
													}
												}
											}
											?>
										</select>
									</td>
									<td>
										<select>
											<?php
											$data = json_decode($event->nego);
											$count = count($data);
											if($count > 0){
												foreach($data as $row){
													$this->db->where('_id',$row);
													$query = $this->db->get('tblnegotiator');
													$resultemp = $query->row();
													if($query->num_rows() > 0) {
														?>
														<option><?php echo $resultemp->nfname . ' ' . $resultemp->nlname; ?></option>
														<?php
													}
												}
											}
											?>
										</select>
									</td>
									<td><?php echo anchor('events/results/event/'.$event->_id, 'Result','class="btn btn-success btn-rounded"'); ?></td>									
									<td><?php echo date('d-m-Y', $event->datecreated) ?></td>									
									<td><?php echo anchor('events/editevents/'.$event->_id, 'Edit','class="btn btn-info btn-rounded"'); ?></td>
									<td><a class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#defaultModal" onclick="$('#delid').val('<?php echo $event->_id; ?>');">Delete</a></td>
								</tr>
						<?php
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal scale fade" id="defaultModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Confirm Delete</h4>
			</div>
			<?php echo form_open('events/delevents'); ?>
			<div class="modal-body">
				<input type="hidden" name="delid" id="delid" />
				Do you want to delete the record?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-flat btn-primary">Delete</button>				
			</div>
			</form>
		</div><!--.modal-content-->
	</div><!--.modal-dialog-->
</div><!--.modal-->
		<!------->
<?php $this->load->view('footer'); ?>