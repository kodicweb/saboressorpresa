</div>
</section>
    <footer id="footer">
        Copyright &copy; 2019 Edgar Hdez

        <ul class="f-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </footer>

<!-- Page Loader -->
<div class="page-loader palette-Pink-600 bg">
    <div class="preloader pl-xl pls-white">
        <svg class="pl-circular" viewBox="25 25 50 50">
            <circle class="plc-path" cx="50" cy="50" r="20" />
        </svg>
    </div>
</div>

<!-- <script type="text/javascript">
    $(document).ajaxStart(function () {
      $.blockUI({
        message: '<img src="<?php echo base_url(); ?>assets/img/loading.gif" style="width:150px; height:150px;">'
      })
    });

    $(document).ajaxStop(function () {
      $.unblockUI();
		});
  </script> -->
  

    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/Waves/dist/waves.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/salvattore/dist/salvattore.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/vendors/bootgrid/jquery.bootgrid.updated.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/sparklines/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/flot-charts/curved-line-chart.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/flot-charts/line-chart.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/charts.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/functions.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/actions.js"></script>

	<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-growl/bootstrap-growl2.min.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/js/demo.js"></script> -->

    <?php if ($this->uri->segment(1) === 'principal') { ?>
        <script src="<?php echo base_url(); ?>assets/js/Datos/Menu/Menu.js"></script>
    <?php
    } 
    ?>
    
</body>

</html>
