<?php $this->load->view('header'); ?>
<?php
$jo_number='';
$project_name='';


$summary=json_decode($Josummary);
//print_r($details);
foreach ($summary as $row){
    $project_name=$row->project_name;
    $jo_number=$row->jo_number;

}
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <label id="projectName" style="width: 100% text-align: left;">Project Name:<?=$project_name?></label>
            </div>
            <div class="col-sm-4">
                <label id="lblJOID" style="width: 100% text-align: left;" >JO Numbers:<?=$jo_number?></label>
            </div>
            <div class="col-sm-4">
                <a class="btn btn-primary" style="margin-left: 300px;" href="<?=base_url('projects?jo')?>">Back</a>
<!--                <Button id="backbtn" type="button" class="btn btn-info" style="margin-left: 300px;">Back</Button>-->
            </div>
        </div>

<!--        //start form //-->
        <form id="test" method="post" class="text-center">
            <div class="row" style="margin-top: 15px;">
                <div class="col-sm-4">
                <label id="lblJOID" style="width: 100%">Pre-Event</label>
                </div>
                <div class="col-sm-4">
                    <label id="lblJOID" style="width: 100%">Event Proper</label>
                </div>
                <div class="col-sm-4">
                    <label id="lblJOID" style="width: 100%">Post Event</label>
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">
                <div class="col-sm-2">
                    <label id="lblJOID" style="width: 100%">Deadline:</label>
                </div>
                <div class="col-sm-2">
                    <input type="date" class="fullwidth dateSelector" name="inp_ActivationsDate" id="inp_ActivationsDate">
                </div>
                <div class="col-sm-2">
                    <label id="lblJOID" style="width: 100%">Deadline:</label>
                </div>
                <div class="col-sm-2">
                    <input type="date" class="fullwidth dateSelector" name="inp_ActivationsDate" id="inp_ActivationsDate">
                </div>
                <div class="col-sm-2">
                    <label id="lblJOID" style="width: 100%">Deadline:</label>
                </div>
                <div class="col-sm-2">
                    <input type="date" class="fullwidth dateSelector" name="inp_ActivationsDate" id="inp_ActivationsDate">
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">
                <div class="col-sm-4">
                    <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Rater</th>
                                <th>Ratee</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                            </tr>
                            </tbody>
                        </table>
                </div>

                <div class="col-sm-4">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Rater</th>
                            <th>Ratee</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-4">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Rater</th>
                            <th>Ratee</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
<!--        //end form//-->
    </div>
<?php $this->load->view('footer'); ?>