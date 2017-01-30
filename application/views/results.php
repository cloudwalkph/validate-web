<?php $this->load->view('header'); ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/globals/plugins/c3js-chart/c3.min.css">

<div class="container-fluid">
    <div class="row text-center">
        <ul class="nav nav-pills text-center">
            <li class="active col-md-5 col-md-offset-1">
                <a href="#1a" data-toggle="tab">Overview</a>
            </li>
            <li class="col-md-5">
                <a href="#2a" data-toggle="tab">Ratee's result</a>
            </li>
        </ul>
    </div>

    <div class="tab-content clearfix col-md-12">
        <div class="tab-pane active" id="1a">
            <div class="row cpreevent" alt="x">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title"><h4>Summary for <?php echo 'JO101'; ?></h4></div>
                        </div><!--.panel-heading-->
                        <div class="panel-body">
                            <div class="c3-pie c3-charts"></div>
                        </div><!--.panel-body-->
                    </div><!--.panel-->
                </div><!--.col-md-12-->
            </div>
        </div>
        <div class="tab-pane" id="2a">
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
        </div>
    </div>
</div>
</div>

<?php $this->load->view('footer'); ?>
<script src="<?php echo base_url(); ?>assets/globals/plugins/c3js-chart/c3.min.js"></script>
<script>
    var chartPie = c3.generate({
        bindto: '.c3-pie',
        data: {
            // iris data from R
            columns: [
                ['Pre Event', 100],
                ['Event Proper', 60],
                ['Post Event', 50]
            ],
            type : 'bar',
            labels: true
        },
        bar: {
            width: 150
        },
        grid: {
            y: {
                show: true
            }
        },
        axis: {
            y: {
                max: 100,
                min: 0,
                padding: {top:0, bottom:0}
            }
        }
    });

    var chartPreEvent = c3.generate({
        bindto: '.c3-area-chart-pre-event',
        data: {
            json: [
                {name: 'www.site1.com', upload: 2, download: 2, total: 4},
                {name: 'www.site2.com', upload: 1, download: 3, total: 4},
                {name: 'www.site3.com', upload: 3, download: 2, total: 5},
                {name: 'www.site4.com', upload: 4, download: 1, total: 5},
            ],
            keys:{
                value: ['accounts', 'accounting'],
            },
            type: 'bar',
            labels: true
        },
        bar: {
            width: 100
        },
        axis: {
            x:{
                label:{
                    text:"Department",
                    position: 'outer-center'
                }
            },
            y:{
                label:{
                    text:"Percentage Value",
                    position: 'outer-middle'
                }
            }
        },
        grid: {
            y: {
                show: true
            }
        },
        axis: {
            y: {
                max: 100,
                min: 0,
                padding: {top:0, bottom:0}
            }
        }
    });
    var chartEProper = c3.generate({
        bindto: '.c3-area-chart-event-proper',
        data: {
            json: [
                {name: 'www.site1.com', upload: 20, download: 20, total: 40},
                {name: 'www.site2.com', upload: 10, download: 30, total: 40},
                {name: 'www.site3.com', upload: 30, download: 20, total: 50},
                {name: 'www.site4.com', upload: 40, download: 10, total: 50},
            ],
            keys:{
                value: ['accounts', 'accounting'],
            },
            type: 'bar',
            onclick: function(e) {
                alert("aws");
            },
            labels: true
        },
        bar: {
            width: 100
        },
        axis: {
            x:{
                label:{
                    text:"Department",
                    position: 'outer-center'
                }
            },
            y:{
                label:{
                    text:"Percentage Value",
                    position: 'outer-middle'
                }
            }
        },
        grid: {
            y: {
                show: true
            }
        },
        axis: {
            y: {
                max: 100,
                min: 0,
                padding: {top:0, bottom:0}
            }
        }
    });
    var chartPEvent = c3.generate({
        bindto: '.c3-area-chart-post-event',
        data: {
            json: [
                {name: 'www.site1.com', upload: 20, download: 20, total: 40},
                {name: 'www.site2.com', upload: 10, download: 30, total: 40},
                {name: 'www.site3.com', upload: 30, download: 20, total: 50},
                {name: 'www.site4.com', upload: 40, download: 10, total: 50},
            ],
            keys:{
                value: ['upload', 'download'],
            },
            type: 'bar',
            onclick: function(e) {
                alert("aws");
            },
            labels: true
        },
        bar: {
            width: 100
        },
        axis: {
            x:{
                label:{
                    text:"Department",
                    position: 'outer-center'
                }
            },
            y:{
                label:{
                    text:"Percentage Value",
                    position: 'outer-middle'
                }
            }
        },
        grid: {
            y: {
                show: true
            }
        },
        axis: {
            y: {
                max: 100,
                min: 0,
                padding: {top:0, bottom:0}
            }
        }
    });
</script>
