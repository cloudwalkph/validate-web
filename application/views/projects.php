<?php $this->load->view('header'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <label id="lblJOID" style="width: 100% text-align: left;" >JO Numbers:</label>
        </div>
        <div class="col-sm-4">
            <label id="projectName" style="width: 100% text-align: left;">Project Name:</label>
        </div>
        <div class="col-sm-4">
            <label id="projectName" style="width: 100% text-align: left;">Date Created:</label>
        </div>
    </div>
    <form id="test" method="post">
        <div class="row" style="margin-top: 15px;">
            <div class="col-sm-3">
                <label id="lblJOID" style="width: 100%">Acivation Date:</label>
            </div>
            <div class="col-sm-3">
                <label id="projectName" style="width: 100%">End Date:</label>
            </div>
            <div class="col-sm-3">
                <select class="btn-warning fullwidth" name="eventType" id="eventType">
                    <option value="" disabled selected>Select Event Type</option>
                    <option value="pre">Small Event</option>
                    <option value="eprop">Medium Proper</option>
                    <option value="post">Big Event</option>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="btn-warning fullwidth" name="eventType" id="eventType">
                    <option value="" disabled selected>Select Event</option>
                    <option value="pre">Pre-Event</option>
                    <option value="eprop">Event Proper</option>
                    <option value="post">Post-Event</option>
                </select>
            </div>
        </div>
    </form>
    <div class="row" style="margin-top: 82px;">
            <div class="col-sm-offset-2 col-sm-1">
                <label>Rater:</label>
            </div>
            <div class="col-sm-3">
                <select class="fullwidth" name="selRater" id="selRater">
                    <option value="" disabled selected>Department</option>
                    <option value="Accounts">Accounts</option>
                    <option value="Activations">Activations</option>
                    <option value="Accounting">Accounting</option>
                    <option value="CMTUVA">CMTUVA</option>
                    <option value="Human Resources">HR</option>
                    <option value="Inventory">Inventory</option>
                    <option value="Production">Production</option>
                    <option value="Setup">Setup</option>
                    <option value="Setup">Setup Leader</option>
                    <option value="Negotiator">Negotiator</option>
                    <option value="Team Leader">Team Leader</option>
                </select>
            </div>
            <div class="col-sm-3">
                <select class="fullwidth" name="selRaterEmp" id="selRaterEmp">
                    <option value="" disabled selected>Select</option>
                </select>
            </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-sm-offset-2 col-sm-1">
            <label>Ratee:</label>
        </div>
        <div class="col-sm-3">
            <select class="fullwidth" name="selRater" id="selRater">
                <option value="" disabled selected>Department</option>
                <option value="Accounts">Accounts</option>
                <option value="Activations">Activations</option>
                <option value="Accounting">Accounting</option>
                <option value="CMTUVA">CMTUVA</option>
                <option value="Human Resources">HR</option>
                <option value="Inventory">Inventory</option>
                <option value="Production">Production</option>
                <option value="Setup">Setup</option>
                <option value="Setup">Setup Leader</option>
                <option value="Negotiator">Negotiator</option>
                <option value="Team Leader">Team Leader</option>
            </select>
        </div>
        <div class="col-sm-3">
            <select class="fullwidth" name="selRaterEmp" id="selRaterEmp">
                <option value="" disabled selected>Select</option>
            </select>
        </div>
    </div>

        <div class="row">
            <table class="table table-striped" role="grid">
                <thead>
                <tr>
                    <th width="850">Question List</th>
                    <th>Add Question
                        <select>
                            <option value="" disabled selected>Select Question</option>
                        </select></th>
                </tr>
                </thead>
                <tbody>
                <tr id="eventRow'.$row->question_id.'">
                    <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-rounded btn-ripple deleteButtonEvent" alt="'.$row->question_id.'"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
                    </td>
                </tr>
                <tr id="eventRow'.$row->question_id.'">
                    <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-rounded btn-ripple deleteButtonEvent" alt="'.$row->question_id.'"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
                    </td>
                </tr>
                <tr id="eventRow'.$row->question_id.'">
                    <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                    <td>
                        <a href="#" class="btn btn-danger btn-rounded btn-ripple deleteButtonEvent" alt="'.$row->question_id.'"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="button-group">
                <a class="btn btn-primary" href="<?=base_url('summary')?>">View Summary</a>
                <a class="btn btn-success" style="margin-left: 825px;">Save</a>
                <a class="btn btn-info">Done</a>
            </div>
        </div>
</div>
<?php $this->load->view('footer'); ?>