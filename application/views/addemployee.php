<?php $this->load->view('header'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="panel">
			<div class="panel-heading">
				<div class="panel-title"><h4>Add Employee</h4></div>
			</div><!--.panel-heading-->
			<div class="panel-body">
				<h3>Add Employee Data</h3>
				<?php echo form_open('employee/addemployee'); ?>
				<div class="row">
					<div class="col-md-3">Department:</div>
					<div class="col-md-9">
<!--						<select class="selecter" name="emp_dept">-->
<!--							<option value="Account Executive">Account Executive</option>-->
<!--							<option value="Accounting">Accounting</option>-->
<!--							<option value="Activations Head">Activations Head</option>-->
<!--							<option value="CMTUVA">CMTUVA</option>-->
<!--							<option value="CEO">CEO</option>-->
<!--							<option value="Human Resources Head">Human Resources Head</option>							-->
<!--							<option value="Inventory Head">Inventory Head</option>-->
<!--							<option value="Production Representative">Production Representative</option>-->
<!--							<option value="Project Manager">Project Manager</option>														-->
<!--							<option value="Setup Head">Setup Head</option>-->
<!--							<option value="Team Leader">Team Leader</option>-->
<!--						</select>-->

						<select name="emp_dept">
							<option value="Account Executive">Accounts</option>
							<option value="Accounting">Accounting</option>
							<option value="Activations Head">Activations</option>
							<option value="CMTUVA">CMTUVA</option>
							<option value="CEO">CEO</option>
							<option value="Human Resources Head">Human Resources</option>
							<option value="Inventory Head">Inventory</option>
							<option value="Production Representative">Production</option>
							<option value="Setup Head">Setup</option>
							<option value="Team Leader">Team Leader</option>
						</select>

					</div>
				</div>
				<div class="row">
					<div class="col-md-3">Full Name:</div>
					<div class="col-md-9">
						<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="text" class="form-control" id="exampleInput1" name="emp_lname">
								<label for="exampleInput1">Last Name</label>
							</div>
						</div>
						<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="text" class="form-control" id="exampleInput1" name="emp_fname">
								<label for="exampleInput1">First Name</label>
							</div>
						</div>
						<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="text" class="form-control" id="exampleInput1" name="emp_mname">
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
								<input type="email" class="form-control" id="exampleInput1" name="emp_email">
								<label for="exampleInput1">Email</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">Position:</div>
					<div class="col-md-9">
						<!--<div class="inputer floating-label">
							<div class="input-wrapper">
								<input type="text" class="form-control" id="exampleInput1" name="emp_pos">
								<label for="exampleInput1">Position</label>
							</div>-->
							<select name="emp_pos">
							<option value="CEO & President">CEO & President</option>
							<option value="Sr. Officer">Sr. Officer</option>
							<option value="Sr. Business Unit Manager">Sr. Business Unit Manager</option>
							<option value="Asst. Manager">Asst. Manager</option>
							<option value="Business Unit Manager">Business Unit Manager</option>
							<option value="Officer">Officer</option>
							<option value="Supervisor">Supervisor</option>
							<option value="Coordinator">Coordinator</option>
							<option value="Sr. Account Executive">Sr. Account Executive</option>
							<option value="Manager">Manager</option>
							<option value="Director">Director</option>
							<option value="Manager/Head">Manager/Head</option>
							<option value="Asst. Manager">Asst. Manager</option>
							<option value="Group Manager/Sr. Manager">Group Manager/Sr. Manager</option>
							<option value="Staff/Assistant">Staff/Assistant</option>
							<option value="Sr. Graphic Artist">Sr. Graphic Artist</option>
							<option value="Management Trainee">Management Trainee</option>
							<option value="Graphic Artist">Graphic Artist</option>
							<option value="Accounts Manager">Accounts Manager</option>
							<option value="Account Executive">Account Executive</option>
							<option value="Specialist">Specialist</option>
							<option value="Admin Assistant">Admin Assistant</option>
							<option value="Sr. Copywriter">Sr. Copywriter</option>
							<option value="Retainer/Consultant">Retainer/Consultant</option>
							<option value="Organic - Project Based">Organic - Project Based</option>
						</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 col-md-offset-6">
						<button type="submit" class="btn center-block btn-warning" style="width: 100%;">Submit</button>
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