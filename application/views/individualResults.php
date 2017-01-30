<ul class="nav nav-tabs nav-justified" role="tablist">
    <li class="active"><a href="#preevent" data-toggle="tab">Pre Event</a></li>
    <li><a href="#eventproper" data-toggle="tab">Event Proper</a></li>
    <li><a href="#postevent" data-toggle="tab">Post Event</a></li>
</ul>
<div class="tab-pane fade in active" id="preevent">
    <div class="row cpreevent" alt="x">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Pre Event</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    <div class="c3-area-chart-pre-event c3-charts"></div>
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="message-list-overlay"></div>
            <ul class="list-material message-list2">
                <?php
                $data['qtype'] = "pre";
                $data['lmenu'] = array(
                    '1' => 'Accounts',
                    '2' => 'Operations',
                    '3' => 'Negotiators',
                    '4' => 'Project Managers',
                    '5' => 'Team Leaders',
                    '6' => 'Setup',
                    '7' => 'Setup Leaders',
                    '8' => 'Production',
                    '9' => 'Inventory',
                    '10' => 'Human Resources'
                );
                $this->load->view('dmenu',$data);
                ?>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="message-send-container-1 row container-all" style="background: #fff;">
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="eventproper">
    <div class="row cpreevent" alt="x">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Event Proper</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    <div class="c3-area-chart-event-proper c3-charts"></div>
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="message-list-overlay"></div>
            <ul class="list-material message-list2">
                <?php
                $data['qtype'] = "eprop";
                $data['lmenu'] = array(
                    '1' => 'Accounts',
                    '2' => 'Operations',
                    '6' => 'Setup',
                    '8' => 'Production',
                    '9' => 'Inventory',
                    '10' => 'Human Resources'
                );
                $this->load->view('dmenu',$data);
                ?>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="message-send-container-2 row container-all" style="background: #fff;">
            </div>
        </div>
    </div>
</div>
<div class="tab-pane fade" id="postevent">
    <div class="row cpreevent" alt="x">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title"><h4>Post Event</h4></div>
                </div><!--.panel-heading-->
                <div class="panel-body">
                    <div class="c3-area-chart-post-event c3-charts"></div>
                </div><!--.panel-body-->
            </div><!--.panel-->
        </div><!--.col-md-12-->
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="message-list-overlay"></div>
            <ul class="list-material message-list2">
                <?php
                $data['qtype'] = "post";
                $data['lmenu'] = array(
                    '1' => 'Accounts',
                    '2' => 'Operations',
                    '6' => 'Setup',
                    '8' => 'Production',
                    '9' => 'Inventory',
                    '10' => 'Human Resources'
                );
                $this->load->view('dmenu',$data);
                ?>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="message-send-container-3 row container-all" style="background: #fff;">
            </div>
        </div>
    </div>
</div>