<?php $this->load->view('header'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <label id="projectName" style="width: 100% text-align: left;">Project Name:</label>
            </div>
            <div class="col-sm-4">
                <label id="lblJOID" style="width: 100% text-align: left;" >JO Numbers:</label>
            </div>
            <div class="col-sm-4">
                <Button id="backbtn" type="button" class="btn btn-info" style="margin-left: 300px;">Back</Button>
            </div>
        </div>
        <form id="test" method="post" class="text-center">
            <div class="row " style="margin-top: 15px;">
                <div class="col-sm-4">
                    <label id="lblJOID" style="width: 100%">Pre-Event</label>
                    <div class="col-sm-offset-2 col-sm-1">
                        <label>Deadline</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label id="projectName" style="width: 100%">Event Proper</label>
                </div>
                <div class="col-sm-4">
                    <label id="projectName" style="width: 100%">Post Event</label>
                </div>
                </div>
            </div>
        </form>
    </div>
<?php $this->load->view('footer'); ?>