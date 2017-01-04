/**
 * Created by ROEL on 8/26/2016.
 */

function reload_functions() {
    $('.btn_EditQuestion').on('click',function () {
        $.ajax({
            url: 'questions/get_question',
            type:'post',
            data: {
                'quest_id' : $(this).attr('alt')
            },
            success: function(data) {
                var obj = JSON.parse(data);

                $('#questNum').text( obj.rqid );
                $('.q_id').val( obj.rqid );
                $('#a_id').val( obj.rqid );
                $('#btn-assign-event').val( obj.rqid );
                $('#e_question').val( obj.question );
                $('#tbl_assigned').empty();
                $('#tbl_assigned').append( obj.depts );

                reload_functions();

                $('#editQuestionModal').modal('show');

            }
        });
    });

    $('#event_type_selector').on('change',function () {
        $.ajax({
            url: 'questions/EventsByType',
            type:'post',
            data: {
                'event_type' : $(this).val()
            },
            success: function(data) {
                $('#event_assignment').empty();
                $('#event_assignment').append(data);
                $('.selc_event').removeClass('hide');
            }
        });
    });

    $('#btn-update-question').on('click',function () {
        $('#form_question').ajaxForm({
            type: 'POST',
            url: 'questions/update_question',
            beforeSubmit: function(arr, jform, option){
                $('#btn-update-question').prop('disabled', true);
            },
            success:  function(response){
                var json = JSON.parse(response);


                if( json['content'] != null ){
                    toastr.info('Successfully saved!');
                    $( 'tr#mtable' + json['content_id'] ).replaceWith( json['content'] );
                    $('#btn-update-question').prop('disabled', false);
                    $('#editQuestionModal').modal('hide');
                }

                reload_functions();
            }
        }).submit();
    });

    $('#removeQuestionViewerOption').on('click',function (e) {
        var cid = sessionStorage.getItem('QuestionsIDs');
        var json = JSON.parse(cid);

        var x = document.getElementById("QuestionViewer");
        // var strQuestion = x.options[x.selectedIndex].value;

        var index = json.indexOf(x.options[x.selectedIndex].value);

        if (index > -1) {
            json.splice(index, 1);
        }

        x.remove(x.selectedIndex);

        sessionStorage.setItem("QuestionsIDs", JSON.stringify(json));
    });


    var checkRater = new Array();
    var checkRatee = new Array();
    // var AssignedDept = new Array();
    var AssignedAccounts = '';
    var AssignedActivations = '';
    var AssignedAccounting = '';
    var AssignedCMTUVA = '';
    var AssignedHR = '';
    var AssignedInventory = '';
    var AssignedProduction = '';
    var AssignedSetup = '';
    var AssignedSetupLeader = '';
    var AssignedNegotiator = '';
    var AssignedTeamLeader = '';
    var arrQuestions = new Array();
    var previousURL = window.location.href;

    cEvent();
    function cEvent() {
        $('#continueEvent').on('click',function (e) {
            e.preventDefault();
            var etype = $('#eventType').val();
            var pname = $('#inp_ProjectName').val();
            var actidate = $('#inp_ActivationsDate').val();
            var edate = $('#InpEndDate').val();
            var idate = $('#inp_InputDate').val();
            var joname = $('#inp_JobOrder').val();
            var rater_dept = $('#selRater').val();
            var rater = $('#selRaterEmp').val();

            if (rater_dept == 'Account Executive') {
                if (AssignedAccounts === undefined || AssignedAccounts === null || AssignedAccounts === '') {
                    AssignedAccounts = rater;
                } else {
                    var res = AssignedAccounts.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedAccounts = rater + ',' + AssignedAccounts;
                    }
                }
                localStorage.setItem("accounts", JSON.stringify(AssignedAccounts));
            } else if (rater_dept == 'Activations') {
                if (AssignedActivations === undefined || AssignedActivations === null || AssignedActivations === '') {
                    AssignedActivations = rater;
                } else {
                    var res = AssignedActivations.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedActivations += ',' + rater;
                    }
                }
                localStorage.setItem("activations", JSON.stringify(AssignedActivations));
            } else if (rater_dept == 'Accounting') {
                // console.log(Accounting);
                if (AssignedAccounting === undefined || AssignedAccounting === null || AssignedAccounting === '') {
                    AssignedAccounting = rater;
                } else {
                    var res = AssignedAccounting.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedAccounting += ',' + rater;
                    }
                }
                localStorage.setItem("accounting", JSON.stringify(AssignedAccounting));
            } else if (rater_dept == 'CMTUVA') {
                if (AssignedCMTUVA === undefined || AssignedCMTUVA === null || AssignedCMTUVA === '') {
                    AssignedCMTUVA = rater;
                } else {
                    var res = AssignedCMTUVA.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedCMTUVA += ',' + rater;
                    }
                }
                localStorage.setItem("cmtuva", JSON.stringify(AssignedCMTUVA));
            } else if (rater_dept == 'HR') {
                if (AssignedHR === undefined || AssignedHR === null || AssignedHR === '') {
                    AssignedHR = rater;
                } else {
                    var res = AssignedHR.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedHR += ',' + rater;
                    }
                }
                localStorage.setItem("hr", JSON.stringify(AssignedHR));
            } else if (rater_dept == 'Inventory') {
                if (AssignedInventory === undefined || AssignedInventory === null || AssignedInventory === '') {
                    AssignedInventory = rater;
                } else {
                    var res = AssignedInventory.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedInventory += ',' + rater;
                    }
                }
                localStorage.setItem("inventory", JSON.stringify(AssignedInventory));
            } else if (rater_dept == 'Production') {
                if (AssignedProduction === undefined || AssignedProduction === null || AssignedProduction === '') {
                    AssignedProduction = rater;
                } else {
                    var res = AssignedProduction.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedProduction += ',' + rater;
                    }
                }
                localStorage.setItem("production", JSON.stringify(AssignedProduction));
            } else if (rater_dept == 'Setup') {
                if (AssignedSetup === undefined || AssignedSetup === null || AssignedSetup === '') {
                    AssignedSetup = rater;
                } else {
                    var res = AssignedSetup.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedSetup += ',' + rater;
                    }
                }
                localStorage.setItem("setup", JSON.stringify(AssignedSetup));
            } else if (rater_dept == 'Setup Leader') {
                if (AssignedSetupLeader === undefined || AssignedSetupLeader === null || AssignedSetupLeader === '') {
                    AssignedSetupLeader = rater;
                } else {
                    var res = AssignedSetupLeader.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedSetupLeader += ',' + rater;
                    }
                }
                localStorage.setItem("setupleader", JSON.stringify(AssignedSetupLeader));
            } else if (rater_dept == 'Negotiator') {
                if (AssignedNegotiator === undefined || AssignedNegotiator === null || AssignedNegotiator === '') {
                    AssignedNegotiator = rater;
                } else {
                    var res = AssignedNegotiator.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedNegotiator += ',' + rater;
                    }
                }
                localStorage.setItem("negotiator", JSON.stringify(AssignedNegotiator));
            } else if (rater_dept == 'Team Leader') {
                if (AssignedTeamLeader === undefined || AssignedTeamLeader === null || AssignedTeamLeader === '') {
                    AssignedTeamLeader = rater;
                } else {
                    var res = AssignedTeamLeader.split(",");
                    if (res.indexOf(rater) >= 0) {
                        return false;
                    } else {
                        AssignedTeamLeader += ',' + rater;
                    }
                }
                localStorage.setItem("tl", JSON.stringify(AssignedTeamLeader));
            }

            var ratee_dept = $('#selRatee').val();
            var ratee = $('#selRateeEmp').val();

            if (ratee_dept == 'Account Executive') {
                if (AssignedAccounts === undefined || AssignedAccounts === null || AssignedAccounts === '') {
                    AssignedAccounts = ratee;
                } else {
                    var res = AssignedAccounts.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedAccounts = ratee + ',' + AssignedAccounts;
                    }
                }
                localStorage.setItem("accounts", JSON.stringify(AssignedAccounts));
            } else if (ratee_dept == 'Activations') {
                if (AssignedActivations === undefined || AssignedActivations === null || AssignedActivations === '') {
                    AssignedActivations = ratee;
                } else {
                    var res = AssignedActivations.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedActivations += ',' + ratee;
                    }
                }
                localStorage.setItem("activations", JSON.stringify(AssignedActivations));
            } else if (ratee_dept == 'Accounting') {
                // console.log(Accounting);
                if (AssignedAccounting === undefined || AssignedAccounting === null || AssignedAccounting === '') {
                    AssignedAccounting = ratee;
                } else {
                    var res = AssignedAccounting.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedAccounting += ',' + ratee;
                    }
                }
                localStorage.setItem("accounting", JSON.stringify(AssignedAccounting));
            } else if (ratee_dept == 'CMTUVA') {
                if (AssignedCMTUVA === undefined || AssignedCMTUVA === null || AssignedCMTUVA === '') {
                    AssignedCMTUVA = ratee;
                } else {
                    var res = AssignedCMTUVA.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedCMTUVA += ',' + ratee;
                    }
                }
                localStorage.setItem("cmtuva", JSON.stringify(AssignedCMTUVA));
            } else if (ratee_dept == 'HR') {
                if (AssignedHR === undefined || AssignedHR === null || AssignedHR === '') {
                    AssignedHR = ratee;
                } else {
                    var res = AssignedHR.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedHR += ',' + ratee;
                    }
                }
                localStorage.setItem("hr", JSON.stringify(AssignedHR));
            } else if (ratee_dept == 'Inventory') {
                if (AssignedInventory === undefined || AssignedInventory === null || AssignedInventory === '') {
                    AssignedInventory = ratee;
                } else {
                    var res = AssignedInventory.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedInventory += ',' + ratee;
                    }
                }
                localStorage.setItem("inventory", JSON.stringify(AssignedInventory));
            } else if (ratee_dept == 'Production') {
                if (AssignedProduction === undefined || AssignedProduction === null || AssignedProduction === '') {
                    AssignedProduction = ratee;
                } else {
                    var res = AssignedProduction.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedProduction += ',' + ratee;
                    }
                }
                localStorage.setItem("production", JSON.stringify(AssignedProduction));
            } else if (ratee_dept == 'Setup') {
                if (AssignedSetup === undefined || AssignedSetup === null || AssignedSetup === '') {
                    AssignedSetup = ratee;
                } else {
                    var res = AssignedSetup.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedSetup += ',' + ratee;
                    }
                }
                localStorage.setItem("setup", JSON.stringify(AssignedSetup));
            } else if (ratee_dept == 'Setup Leader') {
                if (AssignedSetupLeader === undefined || AssignedSetupLeader === null || AssignedSetupLeader === '') {
                    AssignedSetupLeader = ratee;
                } else {
                    var res = AssignedSetupLeader.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedSetupLeader += ',' + ratee;
                    }
                }
                localStorage.setItem("setupleader", JSON.stringify(AssignedSetupLeader));
            } else if (ratee_dept == 'Negotiator') {
                if (AssignedNegotiator === undefined || AssignedNegotiator === null || AssignedNegotiator === '') {
                    AssignedNegotiator = ratee;
                } else {
                    var res = AssignedNegotiator.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedNegotiator += ',' + ratee;
                    }
                }
                localStorage.setItem("negotiator", JSON.stringify(AssignedNegotiator));
            } else if (ratee_dept == 'Team Leader') {
                if (AssignedTeamLeader === undefined || AssignedTeamLeader === null || AssignedTeamLeader === '') {
                    AssignedTeamLeader = ratee;
                } else {
                    var res = AssignedTeamLeader.split(",");
                    if (res.indexOf(ratee) >= 0) {
                        return false;
                    } else {
                        AssignedTeamLeader += ',' + ratee;
                    }
                }
                localStorage.setItem("tl", JSON.stringify(AssignedTeamLeader));
            }

            // return false;

            if( rater != '' ){
                if(checkRater.indexOf(rater) >= 0){
                    return false;
                }else{
                    checkRater.push(rater);
                }
                localStorage.setItem("rater", JSON.stringify(checkRater));
            }
            if( ratee != '' ){
                if(checkRatee.indexOf(ratee) >= 0){
                    return false;
                }else{
                    checkRatee.push(ratee);
                }
                localStorage.setItem("ratee", JSON.stringify(checkRatee));
            }
            if (typeof(Storage) !== "undefined") {
                // Code for localStorage/sessionStorage.
                localStorage.setItem("etype", etype);
                localStorage.setItem("pname", pname);
                localStorage.setItem("actidate", actidate);
                localStorage.setItem("edate", edate);
                localStorage.setItem("idate", idate);
                localStorage.setItem("joname", joname);
                localStorage.setItem("previousUrl", previousURL);
            } else {
                // Sorry! No Web Storage support..
            }


            // $('select#eventType').prop('disabled',true);
            $('input#inp_ProjectName').prop('disabled',true);
            $('input#inp_ActivationsDate').prop('disabled',true);
            $('input#InpEndDate').prop('disabled',true);
            $('input#inp_JobOrder').prop('disabled',true);
            $('input#inp_InputDate').prop('disabled',true);
            $('select#selRater').val('');
            $('select#selRaterEmp').val('');
            $('select#selRatee').val('');
            $('select#selRateeEmp').val('');
            $('select#selQuestions').val('');
            $('select#QuestionViewer').empty();
        });

    }

    $('#btnSummary').on('click',function () {
        if (typeof(Storage) !== "undefined") {
            location.href = '../projects/summary';
        }
    });

    $('#selRater').on('change',function () {
        $.ajax({
            url: '../index.php/employee/getEmployees',
            type:'post',
            data: {
                'departmentValue' : $(this).val()
            },
            success: function(data) {
                $('#selRaterEmp').empty();
                $('#selRaterEmp').append( '<option value="" disabled selected>Select</option>' + data );
            }
        });
    });

    $('#selRatee').on('change',function () {
        $.ajax({
            url: '../employee/getEmployees',
            type:'post',
            data: {
                'departmentValue' : $(this).val()
            },
            success: function(data) {
                $('#selRateeEmp').empty();
                $('#selRateeEmp').append( '<option value="" disabled selected>Select</option>' + data );
            }
        });
    });

    $('#btn_assign_dept').on('click',function () {
        $('#form_dept_assign').ajaxForm({
            type: 'POST',
            url: 'questions/assign_dept',
            beforeSubmit: function(arr, jform, option){
                $('#btn_assign_dept').prop('disabled', true);
            },
            success:  function(response){
                var json = JSON.parse(response);
                if(json['depts']){
                    toastr.info('Successfully saved!');
                    $('table#tbl_assigned').prepend( json['depts'] );
                }else{
                    toastr["info"]( json['emsg'] );
                    reload_functions();
                    return false;
                }
                // $( 'tr#assignrow' + json['content_id'] ).replaceWith( json['content'] );
                // $('#btn_assign_dept').prop('disabled', false);

            }
        }).submit();
    });

    $('.btn_del_dept').on('click', function () {
        $.ajax({
            url: 'questions/del_question',
            type:'post',
            data: {
                'quest_id' : $(this).attr('alt')
            },
            success: function(data) {
                $('#'+data).remove();
                toastr["info"]( 'Deleted!' );
                // var obj = JSON.parse(data);
                //
                // $('#questNum').text( obj.rqid );
                // $('#q_id').val( obj.rqid );
                // $('#a_id').val( obj.rqid );
                // $('#e_question').val( obj.question );
                // $('#tbl_assigned').empty();
                // $('#tbl_assigned').append( obj.depts );
                //
                // $('#editQuestionModal').modal('show');

            }
        });
    })
}
reload_functions();

$('#btn-assign-event').on('click', function () {
    $('#form_assign_event').ajaxForm({
        type: 'POST',
        url: 'questions/AssignToEvent',
        beforeSubmit: function(arr, jform, option){
            $('#btn-assign-event').prop('disabled', true);
        },
        success:  function(response){
            // console.log(response);
            document.getElementById("form_assign_event").reset();
            var json = JSON.parse(response);
            if(json['depts']){
                toastr.info('Successfully saved!');
                $('table#tbl_assigned').prepend( json['depts'] );
            }else{
                toastr["info"]( json['emsg'] );
                return false;
            }

            $('#btn-assign-event').prop('disabled', false);
            reload_functions();
        }
    }).submit();
});

// var applyQuestions = new Array();

// $('#selQuestions').on('change', function() {
    // alert( this.value ); // or $(this).val()
    // var str = this.value;
    // var res = str.split(",");
    // $('#QuestionViewer').prepend(res[0]);
// });

var questionParse = JSON.parse(sessionStorage.getItem("QuestionsIDs"));
var checkQuestions = new Array();

if( questionParse != null || questionParse != undefined){
    checkQuestions = questionParse;
}

$('#saveProject').on('click', function(e) {
    e.preventDefault();
    // alert( $('select#selQuestions').val() ); // or $(this).val()
    var eventType = $('select#eventType').val();
    var str = $('select#selQuestions').val();
    var sRater = $('select#selRaterEmp').val();
    var sRatee = $('select#selRateeEmp').val();
    var res = str.split("***");
    // var cval = $('select#selQuestions').val();
    var cval = eventType+"*"+sRater+"*"+sRatee+"*"+res[1];

    if( cval != '' ){
        if(checkQuestions.indexOf(cval) >= 0){
            return false;
        }else{
            checkQuestions.push(cval);
            $('#QuestionViewer').prepend( '<option value="'+res[1]+'">'+res[0]+'</option>' );
            sessionStorage.setItem("QuestionsIDs", JSON.stringify(checkQuestions));
        }
    }
});

$('#eventType').on('change', function() {
    var event_type = $(this).val();
    var question_type = $('#QuestionTypes').val();
    $.ajax({
        url: '../questions/getQuestionByEvent',
        type:'post',
        data: {
            'qtype' : question_type,
            'etype' : event_type
        },
        success: function(data) {
            $('#selQuestions').empty();
            $('#selQuestions').append(data);
        }
    });
});