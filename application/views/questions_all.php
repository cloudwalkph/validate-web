<?php $this->load->view('header'); ?>
    <div class="container">
<div class="row">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Question Lists</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    <div class="overflow-table">
                        <table class="display datatables-basic">
                            <thead>
                            <tr>
                                <th>Question ID.</th>
                                <th>Questions</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Question ID.</th>
                                <th>Questions</th>
                                <th>Edit</th>
                                <th>Delete</th>
								
                            </tr>
                            </tfoot>
                            <tbody id="qlist">
							
                            <?php
                            foreach ($results as $quest){
                                $str_quest = "";
                                $str_quest = strtolower($quest->qname);
                                ?>
                                <tr id="mtable<?php echo $quest->_id; ?>">
                                    <td><?php echo $quest->_id; ?></td>
                                    <td>
                                        <?php echo ucfirst($str_quest); ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn_EditQuestion btn btn-info btn-rounded" data-toggle="modal" alt="<?=$quest->_id?>">
                                            Edit
                                        </button>
                                    </td>
<!--                                    <td>--><?php //echo anchor('leader/editleader/'.$user->_id, 'Edit','class="btn btn-info btn-rounded"'); ?><!--</td>-->
                                    <td><a class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#defaultModal" onclick="$('#delid').val('<?php echo $quest->_id; ?>');">Delete</a></td>
									
								</tr>
								
                                <?php
                            }
                            ?>
								
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal -->
    <div class="modal fade" id="editQuestionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title text-center" id="myModalLabel">Edit Question</h3>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <h3 class="modal-title text-center">Question #<span id="questNum"></span></h3>
                    <form id="form_question" method="post">
                        <input type="hidden" class="q_id" name="e_id">
                        <div class="row">
                            <div class="col-sm-12 col-md-9">
                                <input type="text" name="e_question" id="e_question" class="form-control fullwidth">
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <button id="btn-update-question" class="btn btn-info btn-rounded fullwidth">Save</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <h3 class="modal-title text-center">Assign Event</h3>
                    <form id="form_assign_event" method="post">
                        <input type="hidden" class="q_id" name="e_id">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <select class="selecter fullwidth" name="e_dept" class="form-control" style="width: 100%;">Department
                                    <option value="Account Executive">Accounts</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Activations Head">Activations</option>
                                    <option value="CMTUVA">CMTUVA</option>
                                    <option value="CEO">CEO</option>
                                    <option value="Human Resources Head">Human Resources</option>
                                    <option value="Inventory Head">Inventory</option>
                                    <option value="Production Representative">Production</option>
                                    <option value="Setup Head">Setup</option>
<!--                                    <option value="Operations Director">Operations Director</option>-->
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <select class="selecter fullwidth" class="form-control" name="event_type_selector" id="event_type_selector">
                                    <option value="0">Select Event Type</option>
                                    <option value="pre_event">Pre Event</option>
                                    <option value="event_proper">Event Proper</option>
                                    <option value="post_event">Post Event</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12 selc_event hide">
                                <select class="fullwidth" class="form-control" name="event_assignment" id="event_assignment">
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <button id="btn-assign-event" class="btn btn-info btn-rounded fullwidth" value="">Assign</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form id="form_dept_assign" class="hide" method="post">
                        <input type="hidden" id="a_id" name="e_id">
                        <div class="row">
                            <h3 class="text-center">Assign Departments</h3>
                            <div class="col-sm-12 col-md-9">
                                <select class="selecter fullwidth" name="e_dept" class="form-control" style="width: 100%;">Department
                                    <option value="Account Executive">Accounts</option>
                                    <option value="Accounting">Accounting</option>
                                    <option value="Activations Head">Activations</option>
                                    <option value="CMTUVA">CMTUVA</option>
                                    <option value="CEO">CEO</option>
                                    <option value="Human Resources Head">Human Resources</option>
                                    <option value="Inventory Head">Inventory</option>
                                    <option value="Production Representative">Production</option>
                                    <option value="Setup Head">Setup</option>
<!--                                    <option value="Team Leader">Operations Director</option>-->
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <a id="btn_assign_dept" href="#" class="btn btn-info btn-rounded fullwidth">Add</a>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="row">
                        <h3 class="text-center">Assigned Departments</h3>
                        <div class="col-sm-12 col-md-12">
                            <table id="tbl_assigned" style="width: 100%;">

                            </table>
                        </div>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer">
<!--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                    <button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- /.Live preview-->

    <div class="modal scale fade" id="defaultModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Delete</h4>
                </div>
                <?php echo form_open('questions/del_quest'); ?>
                <div class="modal-body">
                    <input type="hidden" name="delid" id="delid" />
                    Do you want to delete the record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-flat btn-primary">Delete</button>
                </div>
                </form>
            </div><!--.modal-content-->
        </div><!--.modal-dialog-->
    </div><!--.modal-->
    </div>
<?php $this->load->view('footer'); ?>