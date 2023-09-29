<!DOCTYPE html>
<?php  if ($session_rol != "invitado" and $session_rol != "cliente" and $session_rol != "proveedor" ) {?>
<html lang="es">
<?php include_once '../assets/controlador/sesion.php'?>
<?php include_once '../assets/vista/contratos/head-reportes.php'?>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
    <?php include_once '../assets/vista/contratos/body-reportes.php'?>
    <script>
    var hostUrl = "assets/";
    </script>
    <?php
    include('../config.php');
    $sqlchart = ("SELECT DATE_FORMAT(c.fechaFin, '%Y-%m') AS mes, COUNT(*) AS total_registros, 
    CASE
        WHEN MONTH(c.fechaFin) = 1 THEN 'Enero'
        WHEN MONTH(c.fechaFin) = 2 THEN 'Febrero'
        WHEN MONTH(c.fechaFin) = 3 THEN 'Marzo'
        WHEN MONTH(c.fechaFin) = 4 THEN 'Abril'
        WHEN MONTH(c.fechaFin) = 5 THEN 'Mayo'
        WHEN MONTH(c.fechaFin) = 6 THEN 'Junio'
        WHEN MONTH(c.fechaFin) = 7 THEN 'Julio'
        WHEN MONTH(c.fechaFin) = 8 THEN 'Agosto'
        WHEN MONTH(c.fechaFin) = 9 THEN 'Septiembre'
        WHEN MONTH(c.fechaFin) = 10 THEN 'Octubre'
        WHEN MONTH(c.fechaFin) = 11 THEN 'Noviembre'
        WHEN MONTH(c.fechaFin) = 12 THEN 'Diciembre' 
    END AS nombre_mes, u.rol FROM contratos c INNER JOIN usuarios u ON c.idUsuario = u.id WHERE c.fechaFin >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH) GROUP BY DATE_FORMAT(c.fechaFin, '%Y-%m'), u.rol ORDER BY mes;");
    $querychart = mysqli_query($con, $sqlchart);
    ?>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Rol', 'Cantidad'],
          <?php  while ($dataChart = mysqli_fetch_array($querychart)) { ?>
          ['<?php echo $dataChart['nombre_mes']; ?>',1,1],
          <?php } ?>
        ]);

        var options = {
          
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dinosaur', 'Length'],
          ['Acrocanthosaurus (top-spined lizard)', 12.2],
          ['Albertosaurus (Alberta lizard)', 9.1],
          ['Allosaurus (other lizard)', 12.2],
          ['Apatosaurus (deceptive lizard)', 22.9],
          ['Archaeopteryx (ancient wing)', 0.9],
          ['Argentinosaurus (Argentina lizard)', 36.6],
          ['Baryonyx (heavy claws)', 9.1],
          ['Brachiosaurus (arm lizard)', 30.5],
          ['Ceratosaurus (horned lizard)', 6.1],
          ['Coelophysis (hollow form)', 2.7],
          ['Compsognathus (elegant jaw)', 0.9],
          ['Deinonychus (terrible claw)', 2.7],
          ['Diplodocus (double beam)', 27.1],
          ['Dromicelomimus (emu mimic)', 3.4],
          ['Gallimimus (fowl mimic)', 5.5],
          ['Mamenchisaurus (Mamenchi lizard)', 21.0],
          ['Megalosaurus (big lizard)', 7.9],
          ['Microvenator (small hunter)', 1.2],
          ['Ornithomimus (bird mimic)', 4.6],
          ['Oviraptor (egg robber)', 1.5],
          ['Plateosaurus (flat lizard)', 7.9],
          ['Sauronithoides (narrow-clawed lizard)', 2.0],
          ['Seismosaurus (tremor lizard)', 45.7],
          ['Spinosaurus (spiny lizard)', 12.2],
          ['Supersaurus (super lizard)', 30.5],
          ['Tyrannosaurus (tyrant lizard)', 15.2],
          ['Ultrasaurus (ultra lizard)', 30.5],
          ['Velociraptor (swift robber)', 1.8]]);

        var options = {
          title: 'Lengths of dinosaurs, in meters',
          legend: { position: 'none' },
        };

        var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</body>
</html>
<?php } else{
header("location: ../panel/index.php");
} ?>