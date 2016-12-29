<?php

$qcount = 1;
foreach($resqs as $row){
    $qans = 1;
    $script = array();
    ?>
    <div class="question" style="padding: 11px;">
        <div class="col-md-12">
            <h4><?php echo $qcount.'.) '.$row->qname; ?></h4>
            <p><?php echo $row->qsub; ?></p>
            <div class="col-md-6">
                <input type="checkbox" name="my-checkbox" class="bs-switch chkstat" data-on-color="warning" data-off-color="danger" data-on-text="&nbsp;&nbsp;Multiple&nbsp;&nbsp;" data-off-text="&nbsp;Single&nbsp;" <?php echo $row->qtype == 'M' ? 'checked':''; ?> value="<?php echo $row->_id; ?>"  />
            </div>
            <div class="col-md-6">
<!--                <select class="selecter" name="emp_dept">-->
<!--                    <option value="Account Executive">Accounts</option>-->
<!--							<option value="Accounting">Accounting</option>-->
<!--							<option value="Activations Head">Activations</option>-->
<!--							<option value="CMTUVA">CMTUVA</option>-->
<!--							<option value="CEO">CEO</option>-->
<!--							<option value="Human Resources Head">Human Resources</option>-->
<!--							<option value="Inventory Head">Inventory</option>-->
<!--							<option value="Production Representative">Production</option>-->
<!--							<option value="Setup Head">Setup</option>-->
<!--							<option value="Team Leader">Team Leader</option>-->
<!--                </select>-->
                    <select class="selecter" name="emp_dept">
                        <option value="<?php echo $results->emp_dept; ?>"><?php echo $results->emp_dept; ?></option>
                        <option value="Account Executive">Accounts</option>
                        <option value="Accounting">Accounting</option>
                        <option value="Activations Head">Activations</option>
                        <option value="CMTUVA">CMTUVA</option>
                        <option value="CEO">CEO</option>
                        <option value="Human Resources Head">Human Resources</option>
                        <option value="Inventory Head">Inventory</option>
                        <option value="Production Representative">Production</option>
                        <option value="Setup Head">Setup</option>
                        <!--							<option value="Team Leader">Operations Director</option>-->
                    </select>
            </div>
            <button onclick="addquestion(this)" class="btn right" alt="<?php echo $row->_id; ?>">Add</button>
            <ul>
                <?php
                $this->db->where('qnum',$row->_id);
                $getans = $this->db->get("tblanswer");
                foreach($getans->result() as $rowans){
                    $key = $qcount.'.'.$qans;
                    $script[$key] = 30;

                    ?>
                    <li>
                        <div class="col-md-10 col-md-offset-1">
                            <table class="table table-striped small">
                                <thead>
                                <tr>
                                    <td style="width: 70%;"><b><?php echo $qcount.'.'.$qans.'.) '.$rowans->aneme; ?></b></td>
                                    <td>Yes</td>
                                    <td>No</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                               // $this->db->where("emp_dept","Account Executive");
                                $this->db->where("emp_dept","Accounts");
                                $getemp = $this->db->get("tblemployee");
                                $emp_array = array();
                                $new_rec = array();
                                if($getemp->num_rows() > 0){
                                    $ares = $getemp->result();
                                    foreach($ares as $row){
                                        array_push($emp_array,$row->_id);
                                    }
                                    foreach($evaluators as $row){
                                        if(in_array($row, $emp_array)){
                                            array_push($new_rec,$row);
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td>Accounts</td>
                                    <td><?php echo $this->rating->answer($rowans->_id,$eid,$new_rec)."%"; ?></td>
                                    <td><?php echo (100 - $this->rating->answer($rowans->_id,$eid,$new_rec))."%"; ?></td>
                                </tr>
                                <?php
                                $this->db->where("emp_dept","Accounting");
                                $getemp = $this->db->get("tblemployee");
                                $emp_array = array();
                                $new_rec = array();
                                if($getemp->num_rows() > 0){
                                    $ares = $getemp->result();
                                    foreach($ares as $row){
                                        array_push($emp_array,$row->_id);
                                    }
                                    foreach($evaluators as $row){
                                        if(in_array($row, $emp_array)){
                                            array_push($new_rec,$row);
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td>Accounting</td>
                                    <td><?php echo $this->rating->answer($rowans->_id,$eid,$new_rec)."%"; ?></td>
                                    <td><?php echo (100 - $this->rating->answer($rowans->_id,$eid,$new_rec))."%"; ?></td>
                                </tr>
                                <?php
                                $this->db->where("emp_dept","Activations");
                                $getemp = $this->db->get("tblemployee");
                                $emp_array = array();
                                $new_rec = array();
                                if($getemp->num_rows() > 0){
                                    $ares = $getemp->result();
                                    foreach($ares as $row){
                                        array_push($emp_array,$row->_id);
                                    }
                                    foreach($evaluators as $row){
                                        if(in_array($row, $emp_array)){
                                            array_push($new_rec,$row);
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td>Activations</td>
                                    <td><?php echo $this->rating->answer($rowans->_id,$eid,$new_rec)."%"; ?></td>
                                    <td><?php echo (100 - $this->rating->answer($rowans->_id,$eid,$new_rec))."%"; ?></td>
                                </tr>
                                <?php
                                $this->db->where("emp_dept","CEO");
                                $getemp = $this->db->get("tblemployee");
                                $emp_array = array();
                                $new_rec = array();
                                if($getemp->num_rows() > 0){
                                    $ares = $getemp->result();
                                    foreach($ares as $row){
                                        array_push($emp_array,$row->_id);
                                    }
                                    foreach($evaluators as $row){
                                        if(in_array($row, $emp_array)){
                                            array_push($new_rec,$row);
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td>CEO</td>
                                    <td><?php echo $this->rating->answer($rowans->_id,$eid,$new_rec)."%"; ?></td>
                                    <td><?php echo (100 - $this->rating->answer($rowans->_id,$eid,$new_rec))."%"; ?></td>
                                </tr>
                                <?php
                                $this->db->where("emp_dept","Human Resources");
                                $getemp = $this->db->get("tblemployee");
                                $emp_array = array();
                                $new_rec = array();
                                if($getemp->num_rows() > 0){
                                    $ares = $getemp->result();
                                    foreach($ares as $row){
                                        array_push($emp_array,$row->_id);
                                    }
                                    foreach($evaluators as $row){
                                        if(in_array($row, $emp_array)){
                                            array_push($new_rec,$row);
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td>Human Resources</td>
                                    <td><?php echo $this->rating->answer($rowans->_id,$eid,$new_rec)."%"; ?></td>
                                    <td><?php echo (100 - $this->rating->answer($rowans->_id,$eid,$new_rec))."%"; ?></td>
                                </tr>
                                <?php
                                $this->db->where("emp_dept","Inventory");
                                $getemp = $this->db->get("tblemployee");
                                $emp_array = array();
                                $new_rec = array();
                                if($getemp->num_rows() > 0){
                                    $ares = $getemp->result();
                                    foreach($ares as $row){
                                        array_push($emp_array,$row->_id);
                                    }
                                    foreach($evaluators as $row){
                                        if(in_array($row, $emp_array)){
                                            array_push($new_rec,$row);
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td>Inventory</td>
                                    <td><?php echo $this->rating->answer($rowans->_id,$eid,$new_rec)."%"; ?></td>
                                    <td><?php echo (100 - $this->rating->answer($rowans->_id,$eid,$new_rec))."%"; ?></td>
                                </tr>
                                <?php
                                $this->db->where("emp_dept","Production");
                                $getemp = $this->db->get("tblemployee");
                                $emp_array = array();
                                $new_rec = array();
                                if($getemp->num_rows() > 0){
                                    $ares = $getemp->result();
                                    foreach($ares as $row){
                                        array_push($emp_array,$row->_id);
                                    }
                                    foreach($evaluators as $row){
                                        if(in_array($row, $emp_array)){
                                            array_push($new_rec,$row);
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td>Production</td>
                                    <td><?php echo $this->rating->answer($rowans->_id,$eid,$new_rec)."%"; ?></td>
                                    <td><?php echo (100 - $this->rating->answer($rowans->_id,$eid,$new_rec))."%"; ?></td>
                                </tr>
                                <?php
                                $this->db->where("emp_dept","Setup");
                                $getemp = $this->db->get("tblemployee");
                                $emp_array = array();
                                $new_rec = array();
                                if($getemp->num_rows() > 0){
                                    $ares = $getemp->result();
                                    foreach($ares as $row){
                                        array_push($emp_array,$row->_id);
                                    }
                                    foreach($evaluators as $row){
                                        if(in_array($row, $emp_array)){
                                            array_push($new_rec,$row);
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td>Setup</td>
                                    <td><?php echo $this->rating->answer($rowans->_id,$eid,$new_rec)."%"; ?></td>
                                    <td><?php echo (100 - $this->rating->answer($rowans->_id,$eid,$new_rec))."%"; ?></td>
                                </tr>
                                <?php
                                $this->db->where("emp_dept","Operations Director");
                                $getemp = $this->db->get("tblemployee");
                                $emp_array = array();
                                $new_rec = array();
                                if($getemp->num_rows() > 0){
                                    $ares = $getemp->result();
                                    foreach($ares as $row){
                                        array_push($emp_array,$row->_id);
                                    }
                                    foreach($evaluators as $row){
                                        if(in_array($row, $emp_array)){
                                            array_push($new_rec,$row);
                                        }
                                    }
                                }
                                ?>
                                <tr>
                                    <td>Operations Director</td>
                                    <td><?php echo $this->rating->answer($rowans->_id,$eid,$new_rec)."%"; ?></td>
                                    <td><?php echo (100 - $this->rating->answer($rowans->_id,$eid,$new_rec))."%"; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <?php
                    $qans++;
                }

                ?>
            </ul>
        </div>
    </div>
    <?php
    $qcount++;
}

?>