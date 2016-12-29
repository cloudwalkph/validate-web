<?php $this->load->view('header'); ?>
<div class="container">
    <form  action="summaryForm" method="post">
        <div class="row" style="margin-top: 100px; text-align: center; " >
            <div class="row" style="margin-top: 30px;">
                    <a href="<?=base_url('projects/inputprojects?e=S')?>" id="smallevents" style="width: 30%;" type="button" class="btn btn-default">Small Events</a>
                </div>
                <div class="row" style="margin-top: 30px;">
                    <a href="<?=base_url('projects/inputprojects?e=M')?>" id="mediumevents" style="width: 30%;" type="button" class="btn btn-default">Medium Events</a>
                </div>
                <div class="row" style="margin-top: 30px;">
                    <a href="<?=base_url('projects/inputprojects?e=B')?>" id="bigevents" style="width: 30%;" type="button" class="btn btn-default">Big Events</a>
                </div>
            </div>

        </div>
    </form>
</div>
<?php $this->load->view('footer'); ?>