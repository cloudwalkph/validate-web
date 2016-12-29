<?php $this->load->view('header'); ?>

    <!------->

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Negotiator's Record</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    <?php echo anchor('negotiator/addnegotiator', 'Add Negotiator','class="btn btn-flat btn-warning"'); ?>
                    <div class="overflow-table">
                        <table class="display datatables-basic">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Added</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Added</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php
                            foreach ($results as $user){
                                ?>
                                <tr>
                                    <td><?php echo $user->nfname.' '.$user->nlname; ?></td>
                                    <td><?php echo $user->nemail; ?></td>
                                    <td><?php echo date('d-m-Y', $user->dateadded) ?></td>
                                    <td><?php echo anchor('negotiator/editnegotiator/'.$user->_id, 'Edit','class="btn btn-info btn-rounded"'); ?></td>
                                    <td><a class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#defaultModal" onclick="$('#delid').val('<?php echo $user->_id; ?>');">Delete</a></td>
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
    <div class="modal scale fade" id="defaultModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Delete</h4>
                </div>
                <?php echo form_open('negotiator/delnegotiator'); ?>
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

<?php $this->load->view('footer'); ?>