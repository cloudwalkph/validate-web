<?php $this->load->view('header'); ?>
<div class="container">
    <form id="questionForm" method="post">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="offset-sm-4 col-sm-4 text-center">
                <select class="btn-warning fullwidth" name="eventType" id="eventType">
                    <option value="" disabled selected>Choose Event</option>
                    <option value="pre">Pre-Event</option>
                    <option value="eprop">Event Proper</option>
                    <option value="post">Post-Event</option>
                </select>
            </div>
        </div>
        <div class="row mgt">
            <div class="col-sm-2">
                Project Name:
            </div>
            <div class="col-sm-4">
                <input type="text" class="fullwidth" name="inp_ProjectName" id="inp_ProjectName">
            </div>
            <div class="col-sm-2">
                Activation Date/s:
            </div>
            <div class="col-sm-4">
                <input type="date" class="fullwidth dateSelector" name="inp_ActivationsDate" id="inp_ActivationsDate">

<!--                <div id="inp_ActivationsDate"></div>--><!--Calendar picker with date highlight-->
            </div>
        </div>
        <div class="row mgt">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-2">
                End Date:
            </div>
            <div class="col-sm-4">
                <input type="date" class="fullwidth dateSelector" name="InpEndDate" id="InpEndDate">
            </div>
        </div>
        <div class="row mgt">
            <div class="col-sm-2">
                Job Order No:
            </div>
            <div class="col-sm-4">
                <input type="text" class="fullwidth" name="inp_JobOrder" id="inp_JobOrder">
            </div>
            <div class="col-sm-2">
                Input Date:
            </div>
            <div class="col-sm-4">
                <input type="date" class="fullwidth dateSelector" name="inp_InputDate" id="inp_InputDate">
            </div>
        </div>
        <div class="row mgt">
            <div class="col-sm-6">
                <div class="row mgt">
                    <div class="col-sm-2">
                        Rater :
                    </div>
                    <div class="col-sm-4">
                        <select class="fullwidth" name="selRater" id="selRater">
                            <option value="" disabled selected>Department</option>
                            <option value="Account Executive">Account Executive</option>
                            <option value="Activations">Activations</option>
                            <option value="Accounting">Accounting</option>
                            <option value="CMTUVA">CMTUVA</option>
                            <option value="HR">HR</option>
                            <option value="Inventory">Inventory</option>
                            <option value="Production">Production</option>
                            <option value="Setup">Setup</option>
                            <option value="Setup Leader">Setup Leader</option>
                            <option value="Negotiator">Negotiator</option>
                            <option value="Team Leader">Team Leader</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        Ratee :
                    </div>
                    <div class="col-sm-4">
                        <select class="fullwidth" name="selRatee" id="selRatee">
                            <option value="" disabled selected>Department</option>
                            <option value="Account Executive">Accounts Executive</option>
                            <option value="Activations">Activations</option>
                            <option value="Accounting">Accounting</option>
                            <option value="CMTUVA">CMTUVA</option>
                            <option value="HR">HR</option>
                            <option value="Inventory">Inventory</option>
                            <option value="Production">Production</option>
                            <option value="Setup">Setup</option>
                            <option value="Setup Leader">Setup Leader</option>
                            <option value="Negotiator">Negotiator</option>
                            <option value="Team Leader">Team Leader</option>
                        </select>
                    </div>
                </div>
                <div class="row mgt">
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-4">
                        <select class="fullwidth" name="selRaterEmp" id="selRaterEmp">
                            <option value="" disabled selected>Select</option>
                        </select>
                    </div>
                    <div class="col-sm-2">

                    </div>
                    <div class="col-sm-4">
                        <select class="fullwidth" name="selRateeEmp" id="selRateeEmp">
                            <option value="" disabled selected>Select</option>
                        </select>
                    </div>
                </div>
                <div class="row mgt">
                    <div class="col-sm-3">
                        Questions :
                    </div>
                    <div class="col-sm-9">
                        <input type="hidden" name="QuestionTypes" id="QuestionTypes" value="<?=$this->input->get('e')?>">
                        <select class="fullwidth" name="selQuestions" id="selQuestions">
                            <option value="" disabled selected>Select Questions</option>
                            <?php
//                            print_r($results);
                            foreach ($results as $rowQuestions){
                                echo '<option value="'.$rowQuestions->qname.','.$rowQuestions->_id.'" alt="'.$rowQuestions->_id.'">'.$rowQuestions->qname.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mgt">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">
                        <a href="#" id="saveProject" style="width: 100%;" type="button" class="btn btn-success">SAVE QUESTION</a>
                    </div>
                </div>
                <div class="row mgt">
                    <div class="col-md-6">
                        <a href="#" id="continueEvent" style="width:100%;" type="button" class="btn btn-info">CONTINUE</a>
                    </div>
                    <div class="col-md-6">
                        <a id="btnSummary" href="#" style="width:100%;" class="btn btn-pink">SUMMARY</a>
                    </div>
                    <!--                <div class="col-md-4"></div>-->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="row">
                    <select size="10" id="QuestionViewer" class="fullwidth">
                    </select>
                </div>
                <div class="row text-center">
                    <a href="#" id="removeQuestionViewerOption" style="width: 30%;" type="button" class="btn btn-danger">Remove</a>
                </div>
            </div>
        </div>

    </form>
</div>
<?php $this->load->view('footer'); ?>
<script>
    if( localStorage.getItem('etype') ){
        $('select#eventType').val( localStorage.getItem('etype') );
        $('input#inp_ProjectName').val( localStorage.getItem('pname') );
        $('input#inp_ActivationsDate').val( localStorage.getItem('actidate') );
        $('input#InpEndDate').val( localStorage.getItem('edate') );
        $('input#inp_JobOrder').val( localStorage.getItem('joname') );
        $('input#inp_InputDate').val( localStorage.getItem('idate') );
        $('select#eventType').prop('disabled',true);
        $('input#inp_ProjectName').prop('disabled',true);
        $('input#inp_ActivationsDate').prop('disabled',true);
        $('input#InpEndDate').prop('disabled',true);
        $('input#inp_JobOrder').prop('disabled',true);
        $('input#inp_InputDate').prop('disabled',true);
    }
</script>
