<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema de Gestión V 1.0.0</title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/1.1.12/angular-material.min.css">
        <!-- Admin -->
        <link rel="stylesheet" href="views/assets/css/material-dashboard.css">

        <!-- Estilos personalizados -->
        <link rel="stylesheet" href="views/assets/css/myStyle.css">
    </head>
    <body>
        <div class="wrapper">
            <?php
            $ayuntamientoCMS = new AyuntamientoEnlaces();
            $ayuntamientoCMS -> EnlacesController();
            ?>
        </div>
    </body>
    <!-- Bootstrap 4-->
    
    <!--   Core JS Files   -->
  <script src="views/assets/js/core/jquery.min.js"></script>
  <script src="views/assets/js/core/jquery-ui.js"></script>
  <script src="views/assets/js/core/popper.min.js"></script>
  <script src="views/assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="views/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script> 
  <!-- Plugin for the momentJs  -->
  <script src="views/assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="views/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="views/assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="views/assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="views/assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="views/assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="views/assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="views/assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="views/assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="views/assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="views/assets/js/plugins/arrive.min.js"></script>
  
  <!-- Chartist JS -->
  <script src="views/assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="views/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="views/assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
 

  <!-- Menu selector -->
  <script src="views/assets/js/menuSelector.js"></script>
  <!-- Validar Ingresos -->
  <script src="views/assets/js/validarIngreos.js"></script>
  <!-- JS RegistroUsuarios -->
  <script src="views/assets/js/registroUusarios.js"></script>
</html>