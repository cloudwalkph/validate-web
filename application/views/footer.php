

</div>
<!-- /Start your project here-->
<div class="layer-container">
    <div class="menu-layer">
        <?php $this->load->view('menu'); ?>
    </div>

    <div class="search-layer">
        <div class="search">
            <form action="pages-search-results.html">
                <div class="form-group">
                    <input type="text" id="input-search" class="form-control" placeholder="type something">
                    <button type="submit" class="btn btn-default disabled"><i class="ion-search"></i></button>
                </div>
            </form>
        </div><!--.search-->

        <div class="results">
            <div class="row">
                <div class="col-md-4">
                    <div class="result result-users">
                        <h4>USERS <small>(0)</small></h4>

                        <p>No results were found</p>

                    </div><!--.results-user-->
                </div><!--.col-->
                <div class="col-md-4">
                    <div class="result result-posts">
                        <h4>POSTS <small>(0)</small></h4>

                        <p>No results were found</p>

                    </div><!--.results-posts-->
                </div><!--.col-->
                <div class="col-md-4">
                    <div class="result result-files">
                        <h4>FILES <small>(0)</small></h4>
                        <p>No results were found</p>
                    </div><!--.results-files-->
                </div><!--.col-->

            </div><!--.row-->
        </div><!--.results-->
    </div><!--.search-layer-->
</div>

<!-- SCRIPTS -->

<!-- BEGIN GLOBAL AND THEME VENDORS -->
<script src="<?php echo base_url(); ?>assets/globals/js/global-vendors.js"></script>
<!-- END GLOBAL AND THEME VENDORS -->

<!-- BEGIN PLUGINS AREA -->
<script src="<?php echo base_url(); ?>assets/globals/plugins/bxslider/jquery.bxslider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/plugins/d3/d3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/plugins/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/plugins/jquery-knob/excanvas.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/plugins/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/plugins/gauge/gauge.min.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/plugins/datatables/themes/bootstrap/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/scripts/tables-datatables-editor.js"></script>
<!-- END PLUGINS AREA -->

<!-- PLEASURE -->
<script src="<?php echo base_url(); ?>assets/globals/js/pleasure.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/scripts/tables-datatables.js"></script>
<!-- ADMIN 1 -->
<script src="<?php echo base_url(); ?>assets/admin1/js/layout.js"></script>

<script src="<?php echo base_url(); ?>assets/globals/scripts/sliders.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/scripts/maps-google.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/scripts/widget-audio.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/scripts/charts-knob.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/scripts/index.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app_load.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>

<!--Bootstrap-Material DateTimePicker-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-material-datetimepicker.js"></script>
<script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<!--Bootstrap-Material DateTimePicker-->
<?php echo validation_errors(); ?>
<script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
        TablesDataTables.init();
        TablesDataTablesEditor.init();
        Index.init();
        WidgetAudio.single();
        ChartsKnob.init();
        $.material.init();
    });
    var disabledDays = ["2016-12-21","2016-12-24","2016-12-27","2016-12-28"];
    var date = new Date();

    /* Calendar picker with date highlight*/
    //    $('#inp_ActivationsDate').datepicker({
    //        dateFormat: 'yy-mm-dd',
    //        beforeShowDay: function(date) {
    //            var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
    //            for (i = 0; i < disabledDays.length; i++) {
    //                if($.inArray(y + '-' + (m+1) + '-' + d,disabledDays) != -1) {
    //                    //return [false];
    //                    return [true, 'ui-state-active', ''];
    //                }
    //            }
    //            return [true];
    //
    //        }
    //    });
    /* Calendar picker with date highlight*/

    $('.dateSelector').bootstrapMaterialDatePicker
    ({
        time: false,
        clearButton: true
    });
//    $(document).ready(function(){
        $('.dtable').DataTable();
//    });
</script>
</body>

</html>