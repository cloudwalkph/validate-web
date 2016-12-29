<?php $this->load->view('header'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title"><h4>Add Employee</h4></div>
			</div><!--.panel-heading-->
			<div class="panel-body">
				<h3>Add Employee Data</h3>
				<?php echo form_open('employee/editemployee/'.$eid); ?>
				<div class="row">
					<div class="col-md-3">Department:</div>
					<div class="col-md-9">
						<select class="selecter" name="emp_dept">
							<option value="<?php echo $results->emp_dept; ?>"><?php echo $results->emp_dept; ?></option>
							<option value="Account Executive">Accounts</option>
							<option value="Accounting">Accounting</option>
							<option value="Activations Head">Activations</option>
							<option value="CMTUVA">CMTUVA</option>
							<option value="CEO">CEO</option>
							<option value="Human Resources Head">Human Resources</option>
							<option value="Inventory Head">Inventory</option>
							<option value="Production Representative">Production</option>
							<option value="Setup Head">Setup</option>
<!--							<option value="Team Leader">Operations Director</option>-->
						</select>

					</div>
				</div>
				<div class="row">
					<div class="col-md-3">Full Name:</div>
					<div class="col-md-9">
						<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="text" class="form-control" id="exampleInput1" name="emp_lname" value="<?php echo $results->emp_lname; ?>">
								<label for="exampleInput1">Last Name</label>
							</div>
						</div>
						<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="text" class="form-control" id="exampleInput1" name="emp_fname" value="<?php echo $results->emp_fname; ?>">
								<label for="exampleInput1">First Name</label>
							</div>
						</div>
						<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="text" class="form-control" id="exampleInput1" name="emp_mname" value="<?php echo $results->emp_mname; ?>">
								<label for="exampleInput1">Middle Name</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">Email:</div>
					<div class="col-md-9">
						<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="email" class="form-control" id="exampleInput1" name="emp_email" value="<?php echo $results->emp_email; ?>">
								<label for="exampleInput1">Email</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">Password:</div>
					<div class="col-md-9">
						<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="password" class="form-control" id="exampleInput1" name="emp_pass" value="<?php echo $results->emp_pass; ?>">
								<label for="exampleInput1">Password</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">Position:</div>
					<div class="col-md-9">
						<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="text" class="form-control" id="exampleInput1" name="emp_pos" value="<?php echo $results->emp_position; ?>">
								<label for="exampleInput1">Position</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-md-offset-6">
						<button type="submit" class="btn center-block btn-warning" style="width: 100%;">Update</button>
					</div>
					<div class="col-md-3">
						<?php echo anchor('employee', 'Cancel','class="btn center-block btn-danger" style="width: 100%;"'); ?>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('footer'); ?>