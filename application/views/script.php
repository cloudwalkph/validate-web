<!-- BEGIN GLOBAL AND THEME VENDORS -->
<script src="<?php echo base_url(); ?>assets/globals/js/global-vendors.js"></script>
<!-- END GLOBAL AND THEME VENDORS -->

<!-- BEGIN PLUGINS AREA -->	
<script src="<?php echo base_url(); ?>assets/globals/plugins/d3/d3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/plugins/c3js-chart/c3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/plugins/switchery/dist/switchery.min.js"></script>
<!-- END PLUGINS AREA -->

<!-- PLUGINS INITIALIZATION AND SETTINGS -->
<script src="<?php echo base_url(); ?>assets/globals/scripts/charts-c3.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/scripts/forms-switch.js"></script>
<script src="<?php echo base_url(); ?>assets/globals/scripts/forms-switchery.js"></script>
<!-- END PLUGINS AREA -->
<!-- PLEASURE -->
<script src="<?php echo base_url(); ?>assets/globals/js/pleasure.js"></script>
<!-- ADMIN 1 -->
<script src="<?php echo base_url(); ?>assets/admin1/js/layout.js"></script>
<?php echo validation_errors(); ?>

<script>

$(document).ready(function () {
	Pleasure.init();
	Layout.init();
});
</script>