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
        foreach ( $results as $row ){
            $stringClient='';
            $this->db->where('client_id',$row->client_company_name);
            $clientQuery = $this->db->get('clients');
            $rowClient=$clientQuery->result_array();
//            print_r($rowClient);
            if(isset($rowClient)){
                $stringClient=$rowClient[0]['contact_person'];
            }
            echo '
                <tr id="eventRow'.$row->jo_id.'">
                    <td><a href="'.base_url('projects?jo='.$row->jo_id).'">'.$row->jo_number.'</a></td>
                    <td>'.$row->project_name.'</td>
                    <td>'.$row->project_type.'</td>
                    <td>'.$stringClient.'</td>
                    <td>'.$row->brand.'</td>
                    <td></td>
                    <td>
                        <a href="'.base_url('events/results/event/'.$row->jo_id).'" class="btn btn-success btn-rounded btn-ripple"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-warning btn-rounded btn-ripple editButtonEvent" alt="'.$row->jo_id.'" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-danger btn-rounded btn-ripple deleteButtonEvent" alt="'.$row->jo_id.'"><i class="fa fa-trash" aria-hidden="true"></i></i></a>
                    </td>
                </tr>
            ';
        }
        ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('footer'); ?>

