<?php $this->load->view('header'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Add Team Leader</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    <h3>Add Employee Data</h3>
                    <?php echo form_open('leader/addleader'); ?>
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
                        <div class="col-md-3">Event Type:</div>
                        <div class="col-md-9">
                            <select class="selecter" name="emp_event_type">
                                <option value="Small">Small</option>
                                <option value="Big">Big</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-6">
                            <button type="submit" class="btn center-block btn-warning" style="width: 100%;">Submit</button>
                        </div>
                        <div class="col-md-3">
                            <?php echo anchor('leader', 'Cancel','class="btn center-block btn-danger" style="width: 100%;"'); ?>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('footer'); ?>