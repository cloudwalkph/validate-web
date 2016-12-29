<?php $this->load->view('header'); ?>
<div class="container">
        <div class="row" style="text-align: center">
                <label style="width: 15%;" id="smallevents" type="button" class="text">Project Name</label>
                <label style="width: 15%;" id="mediumevents" type="button" class="text">JO No.</label>
                <label style="width: 15%;" id="bigevents" type="button" class="text">Pre-Event</label>
                <label style="width: 15%;" id="smallevents" type="button" class="text">Event-Proper</label>
                <label style="width: 15%;" id="mediumevents" type="button" class="text">Post-Event</label>
                <label style="width: 15%;" id="mediumevents" type="button" class="text">Summary</label>
<!--                <a href="--><?//=base_url('results/resultsnew?e=B')?><!--" style="width: 15%;" id="bigevents" type="button" class="btn btn-default">Results</a>-->
            </div>
    <?php foreach ( $results as $row ){
//        echo $row->_id; // column name sa table
        echo '
        <div class="row" style="text-align: center">
                <label style="width: 15%;">'.$row->e_name.'</label>
                <label style="width: 15%;">'.$row->e_jo.'</label>
                <label style="width: 15%;">'.$row->p_date.'</label>
                <label style="width: 15%;">'.$row->e_date.'</label>
                <label style="width: 15%;">'.$row->pe_date.'</label>
               <a href="http://evaluation.activationsadvertising.com/events/results/event/'.$row->_id.'" class="btn btn-success btn-rounded btn-ripple">Result</a>
            </div>
                ';
    }
    ?>
        </div>
</div>
<?php $this->load->view('footer'); ?>
