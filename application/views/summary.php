<?php $this->load->view('header'); ?>
<?php
$arrQuestionsInfo = array();
//$arrQuestionAssigned = array();
$arrQuestionsInfo = json_decode($getQuestionInfo);
//$arrQuestionAssigned = json_decode($getQuestionAssigned);
$event_type = '';
if( $this->input->get('etype') == 'pre' ){
    $event_type = 'Pre-Event';
}else if( $this->input->get('etype') == 'eprop' ){
    $event_type = 'Event Proper';
}else if( $this->input->get('etype') == 'post' ){
    $event_type = 'Post-Event';
}
?>
<div class="container">
        <div class="row">
            <div class="col-sm-4 text-center">
                <label id="lblJOID" class="btn btn-primary" style="width: 100%"><?=$this->input->get('joname')?></label>
            </div>
            <div class="col-sm-4 text-center">
                <label id="projectName" class="btn btn-primary" style="width: 100%"><?=$this->input->get('pname')?></label>
            </div>
            <div class="col-sm-4 text-center">
                <div class="col-sm-6"><a id="previousLocation" href="#" class="btn btn-success btn-info" style="width: 100%;">BACK</a></div>
                <div class="col-sm-6"><button type="button" id="submitSummaryForm" class="btn btn-success btn-ripple" style="width: 100%;">SAVE</button></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div  class="col-sm-3 text-center">
                <div class="row" id="AccountsList">
                    <label class="btn btn-warning mgt" style="width: 100%">Accounts</label> <br>
                </div>
                <div class="row" id="AccountingList">
                    <label class="btn btn-warning mgt" style="width: 100%">Accounting</label> <br>
                </div>
                <div class="row" id="ActivationsList">
                    <label class="btn btn-warning mgt" style="width: 100%">Activations</label><br>
                </div>
                <div class="row" id="cmtuvaList">
                    <label class="btn btn-warning mgt" style="width: 100%">CMTUVA</label><br>
                </div>
                <div class="row" id="ProductionList">
                    <label class="btn btn-warning mgt" style="width: 100%">Productions</label><br>
                </div>
                <div class="row" id="InventoryList">
                    <label class="btn btn-warning mgt" style="width: 100%">Inventory</label><br>
                </div>
                <div class="row" id="HrList">
                    <label class="btn btn-warning mgt" style="width: 100%">Hr</label><br>
                </div>
                <div class="row" id="SetupList">
                    <label class="btn btn-warning mgt" style="width: 100%">Setup</label><br>
                </div>
                <div class="row" id="SetupLeaderList">
                    <label class="btn btn-warning mgt" style="width: 100%">Setup Leader</label><br>
                </div>
                <div class="row" id="NegotiatorList">
                    <label class="btn btn-warning mgt" style="width: 100%">Negotiator</label><br>
                </div>
                <div class="row" id="TeamLeaderList">
                    <label class="btn btn-warning mgt" style="width: 100%">Team Leaders</label><br>
                </div>
            </div>
            <div id="preEventContainer" class="col-sm-3 text-center">
                <h5 class="btn btn-warning mgt">PRE-EVENT</h5>
                <div class="row">
                    <div class="col-sm-6 btn btn-warning mgt">Rater</div>
                    <div class="col-sm-6 btn btn-warning mgt">Ratee</div>
                </div>
            </div>
            <div id="epropEventContainer" class="col-sm-3 text-center">
                <h5 class="btn btn-warning mgt">Event Proper</h5>
                <div class="row">
                    <div class="col-sm-6 btn btn-warning mgt">Rater</div>
                    <div class="col-sm-6 btn btn-warning mgt">Ratee</div>
                </div>
            </div>
            <div id="postEventContainer" class="col-sm-3 text-center">
                <h5 class="btn btn-warning mgt">POST-EVENT</h5>
                <div class="row">
                    <div class="col-sm-6 btn btn-warning mgt">Rater</div>
                    <div class="col-sm-6 btn btn-warning mgt">Ratee</div>
                </div>
            </div>
        </div>
</div>

<form id="summaryForm">

<div class="row text-center">
    <div class="col-sm-3">

    </div>
    <div class="col-sm-3">
        <h5 class="btn btn-warning mgt">Deadline</h5>
        <input type="text" class="dateSelector" name="preEventDeadline" id="preEventDeadline">
    </div>
    <div class="col-sm-3">
        <h5 class="btn btn-warning mgt">Deadline</h5>
        <input type="text" class="dateSelector" name="epropEventDeadline" id="epropEventDeadline">
    </div>
    <div class="col-sm-3">
        <h5 class="btn btn-warning mgt">Deadline</h5>
        <input type="text" class="dateSelector" name="postEventDeadline" id="postEventDeadline">
    </div>
</div>

</form>

<?php $this->load->view('footer'); ?>

<script>
    $('label#projectName').text( localStorage.getItem('pname') );
    $('label#lblJOID').text( localStorage.getItem('joname') );
    $('a#previousLocation').attr("href", localStorage.getItem('previousUrl'));
//    $('div#AccountsList').append( localStorage.getItem('joname') );

    var tmpAccounting = JSON.parse(localStorage.getItem('accounting'));
    if( tmpAccounting != null ) {
        var tAccounting = tmpAccounting.split(',');
        $.each(tAccounting, function (index, value) {
            loadEmp(value, 'accounting');
        });
    }

    var tmpAccounts = JSON.parse(localStorage.getItem('accounts'));
    if( tmpAccounts != null ) {
        var tAccounts = tmpAccounts.split(',');
        $.each(tAccounts, function (index, value) {
            loadEmp(value, 'accounts');
        });
    }

    var tmpActivations = JSON.parse(localStorage.getItem('activations'));
    if( tmpActivations != null ){
        var tActivations = tmpActivations.split(',');

        $.each(tActivations, function (index, value) {
            loadEmp(value, 'activations');
        });
    }

    var tmpCmtuva = JSON.parse(localStorage.getItem('cmtuva'));

    if( tmpCmtuva != null ) {
        var tCmtuva = tmpCmtuva.split(',');

        $.each(tCmtuva, function (index, value) {
            loadEmp(value, 'cmtuva');
        });
    }

    var tmpInventory = JSON.parse(localStorage.getItem('inventory'));
    if( tmpInventory != null ) {
        var tInventory = tmpInventory.split(',');

        $.each(tInventory, function (index, value) {
            loadEmp(value, 'inventory');
        });
    }

    var tmpProduction = JSON.parse(localStorage.getItem('production'));
    if( tmpProduction != null ) {
        var tProduction = tmpProduction.split(',');

        $.each(tProduction, function (index, value) {
            loadEmp(value, 'production');
        });
    }

    var tmpSetup = JSON.parse(localStorage.getItem('setup'));
    if( tmpSetup != null ) {
        var tSetup = tmpSetup.split(',');

        $.each(tSetup, function (index, value) {
            loadEmp(value, 'setup');
        });
    }

    var tmpHR = JSON.parse(localStorage.getItem('hr'));
    if( tmpHR != null ) {
        var tHR = tmpHR.split(',');

        $.each(tHR, function (index, value) {
            loadEmp(value, 'hr');
        });
    }

    var tmpSetupLeader = JSON.parse(localStorage.getItem('setupleader'));
    if( tmpSetupLeader != null ) {
        var tSetupLeader = tmpSetupLeader.split(',');

        $.each(tSetupLeader, function (index, value) {
            loadEmp(value, 'setupleader');
        });
    }

    var tmpNegotiator = JSON.parse(localStorage.getItem('negotiator'));
    if( tmpNegotiator != null ) {
        var tNegotiator = tmpNegotiator.split(',');

        $.each(tNegotiator, function (index, value) {
            loadEmp(value, 'negotiator');
        });
    }

    var tmpTeamLeader = JSON.parse(localStorage.getItem('tl'));
    if( tmpTeamLeader != null ) {
        var tTeamLeader = tmpTeamLeader.split(',');

        $.each(tTeamLeader, function (index, value) {
            loadEmp(value, 'TeamLeader');
        });
    }

    function loadEmp( tmpo, dept ){
        var retVal = '';
        $.ajax({
            url: '../employee/getEmployee',
            type:'post',
            data: {
                'tmpo' : tmpo
            },
            success: function(data) {
                retVal = data.toString();
                if( dept == 'accounting' ){
                    $('#AccountingList').append(data);
                }else if( dept == 'accounts' ){
                    $('#AccountsList').append(data);
                }else if( dept == 'activations' ){
                    $('#ActivationsList').append(data);
                }else if( dept == 'cmtuva' ){
                    $('#cmtuvaList').append(data);
                }else if( dept == 'inventory' ){
                    $('#InventoryList').append(data);
                }else if( dept == 'production' ){
                    $('#ProductionList').append(data);
                }else if( dept == 'setup' ){
                    $('#SetupList').append(data);
                }else if( dept == 'setupleader' ){
                    $('#SetupLeaderList').append(data);
                }else if( dept == 'negotiator' ){
                    $('#NegotiatorList').append(data);
                }else if( dept == 'TeamLeader' ){
                    $('#TeamLeaderList').append(data);
                }else if( dept == 'hr' ){
                    $('#HrList').append(data);
                }
            }
        });
        return retVal;
    }

    var FilterQuestions = JSON.parse(sessionStorage.getItem('QuestionsIDs'));
    var evetype = '';
    if( FilterQuestions != null ) {
//        var arrQuestions = JSON.parse(FilterQuestions);

        $.each(FilterQuestions, function (index, value) {

            var arrQuestionsVariables = value.split('*');
//            console.log(arrQuestionsVariables);

            loadRaterRatee(arrQuestionsVariables[0],arrQuestionsVariables[1],arrQuestionsVariables[2]);

        });
    }

    function loadRaterRatee( typeOfEvent, rater, ratee){
        $.ajax({
            url: '../employee/getRaterAndRatee',
            type:'post',
            data: {
                'typeOfEvent' : typeOfEvent,
                'rater' : rater,
                'ratee' : ratee
            },
            success: function(data) {
                var obj = JSON.parse(data);
                console.log(obj);
                if(obj.typeOfEvent == 'pre'){
                    $('div#preEventContainer').append(obj.valStr);
                }
                if(obj.typeOfEvent == 'eprop'){
                    $('div#epropEventContainer').append(obj.valStr);
                }
                if(obj.typeOfEvent == 'post'){
                    $('div#postEventContainer').append(obj.valStr);
                }
            }
        });
    }

    function allStorage() {

        var archive = {}, // Notice change here
            keys = Object.keys(localStorage),
            i = keys.length;

        while ( i-- ) {
            archive[ keys[i] ] = localStorage.getItem( keys[i] );
        }

        return archive;
    }

    $('button#submitSummaryForm').on('click',function(e){
        $('form#summaryForm').ajaxForm({
                 type: 'POST',
                 url: '../questions/saveProject',
                 data: {
                     localFormData: JSON.stringify(allStorage()),
                     QuestionsIDs: sessionStorage.getItem('QuestionsIDs')
                 },
                 success:  function(response){
                     localStorage.clear();
                     sessionStorage.clear();
//                     console.log(response);
//                     document.getElementById("questionForm").reset();
//                     sessionStorage.setItem("QuestionsIDs", JSON.stringify(applyQuestions));
//                     $('#QuestionViewer').empty();
//                     $('#btnSummary').removeAttr('disabled');
//                     // document.getElementById("btnSummary").href='../projects/summary?a='+response;
//                     $('#continueEvent').prop('disabled', false);
                 }
             }).submit();
    });
</script>
