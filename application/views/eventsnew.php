<?php $this->load->view('header'); ?>
<div class="container">
    <table style="width: 100%;" class="table">
        <thead>
        <tr>
            <th>Project Name</th>
            <th>JO No.</th>
            <th>Pre-Event</th>
            <th>Event-Proper</th>
            <th>Post-Event</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody id="tbodyEvents">

        <?php
        foreach ( $results as $row ){
            echo '
                <tr id="eventRow'.$row->_id.'">
                    <td>'.$row->e_name.'</td>
                    <td>'.$row->e_jo.'</td>
                    <td>'.$row->p_date.'</td>
                    <td>'.$row->e_date.'</td>
                    <td>'.$row->pe_date.'</td>
                    <td>
                        <a href="'.base_url('events/results/event/'.$row->_id).'" class="btn btn-success btn-rounded btn-ripple"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-warning btn-rounded btn-ripple editButtonEvent" alt="'.$row->_id.'" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>
                </tr>
            ';
        }
        ?>

        </tbody>
    </table>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Edit Project</h4>
                </div>
                <form id="editProject">
                <!--Body-->
                <div class="modal-body">
                    <div class="md-form">
                        <input type="text" name="projectName" id="newProjectName" class="form-control" placeholder="Project Name">
                    </div>
                    <div class="md-form">
                        <input type="text" name="newPreEvent" id="newPreEvent" class="form-control dateSelector" placeholder="Pre-Event">
                    </div>
                    <div class="md-form">
                        <input type="text" name="newEventProper" id="newEventProper" class="form-control dateSelector" placeholder="Event Proper">
                    </div>
                    <div class="md-form">
                        <input type="text" name="newPostEvent" id="newPostEvent" class="form-control dateSelector" placeholder="Post Event">
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button id="updateProject" type="button" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
            <!--/.Content-->
        </div>
    </div>

</div>

<?php $this->load->view('footer'); ?>


<script>
    $('.editButtonEvent').on('click',function (e) {
        e.preventDefault();
        var eventId = $(this).attr('alt');
        $.ajax({
            url: "../eventsnew/eventDetails",
            type: 'post',
            data: { 'eventId' : eventId },
            success: function(result){
                var obj = JSON.parse(result);
                sessionStorage.clear();
                sessionStorage.setItem('projectId', obj[0]._id );
                sessionStorage.setItem('jobId', obj[0].e_jo );
                $("input#newProjectName").val(obj[0].e_name);
                $("input#newPreEvent").val(obj[0].p_date);
                $("input#newEventProper").val(obj[0].e_date);
                $("input#newPostEvent").val(obj[0].pe_date);
            }
        });
    });

    $('#updateProject').on('click', function () {
        $('#editProject').ajaxForm({
            type: 'POST',
            url: 'projects/updateProject',
            data: {
                projectId : sessionStorage.getItem('projectId'),
                jobId : sessionStorage.getItem('jobId')
            },
            beforeSubmit: function(arr, jform, option){
                $('#updateProject').prop('disabled', true);
            },
            success:  function(response){
                if( response == null ){ return false; }
                var obj = JSON.parse(response);
                if( obj.affected_rows > 0 ){
                    toastr.info('Successfully saved!');
                    $( 'tr#eventRow' + sessionStorage.getItem('projectId') ).replaceWith( obj.content );
                    $('#myModal').modal('hide');
                }else{
                    toastr.info('Fail to save!');
                }
                $('#updateProject').prop('disabled', false);
            }
        }).submit();
    });
</script>