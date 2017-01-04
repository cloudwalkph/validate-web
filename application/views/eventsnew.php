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
        <tbody>

        <?php
        foreach ( $results as $row ){
//        echo $row->_id; // column name sa table
            echo '
                <tr>
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
                        <input type="text" name="newPreEvent" id="newPreEvent" class="form-control" placeholder="Pre-Event">
                    </div>
                    <div class="md-form">
                        <input type="text" name="newPreEvent" id="newEventProper" class="form-control" placeholder="Event Proper">
                    </div>
                    <div class="md-form">
                        <input type="text" name="newPreEvent" id="newPostEvent" class="form-control" placeholder="Post Event">
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
                $("input#newProjectName").val(obj[0].e_name);
                $("input#newPreEvent").val(obj[0].p_date);
                $("input#newEventProper").val(obj[0].e_date);
                $("input#newPostEvent").val(obj[0].pe_date);
            }
        });
    });
</script>