<?php $this->load->view('header'); ?>
<div class="container">
    <table style="width: 100%;" class="display datatables-basic">
        <thead>
        <tr>
            <th>Job Order Number</th>
            <th>Project Name</th>
            <th>Project Type</th>
            <th>Client Name</th>
            <th>Brand</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody id="tbodyEvents">
        <?php
        foreach ( json_decode($results) as $row ){
            echo '
                <tr id="eventRow'.$row->jobID.'">
                    <td><a href="'.base_url('projects?jo='.$row->jobID).'">'.$row->jobNumber.'</a></td>
                    <td>'.$row->projectName.'</td>
                    <td>'.$row->projectTypes.'</td>
                    <td>'.$row->clientsName.'</td>
                    <td>'.$row->brands.'</td>
                    <td></td>
                    <td>
                        <a href="'.base_url('events/results/'.$row->jobID).'" class="btn btn-success btn-rounded btn-ripple"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-warning btn-rounded btn-ripple editButtonEvent" alt="'.$row->jobID.'" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-danger btn-rounded btn-ripple deleteButtonEvent" alt="'.$row->jobID.'"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
                    </td>
                </tr>
            ';
        }
        ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('footer'); ?>

