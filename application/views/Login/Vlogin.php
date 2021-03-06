<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets\img\favicon.png">    
    <title>Sabores Sorpresa</title>
    
    <!-- Vendor CSS -->
    <link href="<?php echo base_url(); ?>assets/vendors/bower_components/animate.css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/bower_components/google-material-color/dist/palette.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css" rel="stylesheet">
        
    <!-- CSS -->
    <link href="<?php echo base_url(); ?>assets/css/app.min.1.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/app.min.2.css" rel="stylesheet">
    
    <style>
        body {
            background-image: url("<?php echo base_url(); ?>assets/img/Login2.png");
            background-repeat: no-repeat;
            background-size: 100% 100%;

        }
    </style>
</head>
    
<body>
    <div class="login" >
        <!-- Login -->
        <div class="l-block toggled" id="l-login">
            <div class="lb-header palette-Pink-600 bg">
                <i class="zmdi zmdi-account-circle"></i>
                Hola! Inicia Sesion
            </div>

            <div class="lb-body">
                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="text" class="input-sm form-control fg-input" id="txtUsuario" name="txtUsuario">
                        <label class="fg-label">Usuario</label>
                    </div>
                </div>

                <div class="form-group fg-float">
                    <div class="fg-line">
                        <input type="password" class="input-sm form-control fg-input" id="txtPassword" onkeyup="if(event.keyCode == 13) Ingresar()" name="txtPassword">
                        <label class="fg-label">Contraseña</label>
                    </div>
                </div>

                <button class="btn palette-Pink-600 bg" onclick="Ingresar()">Ingresar</button>

                <!-- <div class="m-t-20">
                    <a data-block="#l-register" data-bg="blue" class="palette-Teal text d-block m-b-5" href="#">Creat an account</a>
                    <a data-block="#l-forget-password" data-bg="purple" href="#" class="palette-Teal text">Forgot password?</a>
                </div> -->
            </div>
        </div>
    <!-- Se Quita este cierre del div para que no se vea el footer en el login -->
    <!-- </div> --> 

    <!-- Javascript Libraries -->
    <!-- <script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>assets/vendors/bower_components/Waves/dist/waves.min.js"></script> -->
    <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script> -->

    <script> 
        var baseurl = "<?php echo base_url(); ?>"

    </script>

    <script src="<?php echo base_url(); ?>assets/js/Datos/Login/Login.js"></script>

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

<!-- </body>
</html> Se quitan estas etiquetas para traer los scripts que estan en el archivo footer-->