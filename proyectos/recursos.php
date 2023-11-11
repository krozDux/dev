<!DOCTYPE html>
<?php include_once '../assets/controlador/sesion.php'?>
<?php
// Comprueba si se ha proporcionado idProyecto a través de GET y si la sesión está iniciada con un rol válido
if (isset($_GET['idProyecto']) && $session_rol != "invitado" &&  $session_rol != "cliente" && $session_rol != "proveedor") {
    include('../config.php'); // Asegúrate de que esta ruta sea correcta para incluir tu archivo de configuración de la base de datos

    // Asigna el idProyecto a una variable y asegúrate de limpiarla para evitar inyecciones SQL
    $idProyecto = $_GET['idProyecto'];
     // o cualquier variable que contenga el ID de la sesión del usuario

    // Prepara la consulta SQL
    $sql = "SELECT * FROM proyectos 
            JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto 
            LEFT JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id 
            WHERE proyectosInfo.idProyecto = ? AND proyectosInfo.estado='1' 
            AND proyectosInfo.idUsuario = ?";
    
    // Prepara el statement para la consulta
    if ($stmt = $con->prepare($sql)) {
        // Vincula los parámetros y ejecuta
        $stmt->bind_param("ii", $idProyecto, $session_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            // Si no hay registros, muestra una alerta y redirige
            echo "$idProyecto, $session_id";
            exit; // Asegúrate de no ejecutar el resto del código si no hay registros
        }
?>
<html lang="es">
<head>
    <?php include_once '../assets/vista/proyectos/head-recursos.php'; ?>
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
    <?php include_once '../assets/vista/proyectos/body-recursos.php'?>
    <script>
    var hostUrl = "assets/";
    </script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <?php
    include('../config.php');
    $sqlproy1 = ("SELECT * FROM usuarios INNER JOIN contratos ON usuarios.id = contratos.idUsuario WHERE contratos.fechaFin > CURDATE() and usuarios.rol='proveedor';");
    $queryproy1 = mysqli_query($con, $sqlproy1);
    ?>
    <script>
        var dataTable;
    $(document).ready(function() {
        var input = document.querySelector('input[name="tags1"]'),
        tagify = new Tagify(input, {
        whitelist: [ <?php while ($dataproy1 = mysqli_fetch_array($queryproy1)) { ?>"<?php echo $dataproy1['nombres']; ?> <?php echo $dataproy1['apellidos']; ?> [<?php echo $dataproy1['id']; ?>]",<?php } ?>],
        maxTags: 10,
        dropdown: {
            maxItems: 20,           // <- mixumum allowed rendered suggestions
            classname: "tags-look", // <- custom classname for this dropdown, so it could be targeted
            enabled: 0,             // <- show suggestions on focus
            closeOnSelect: true    // <- do not hide the suggestions dropdown once an item has been selected
        }
        });
        var dataTable = $('#kt_table_users').DataTable({
            dom: 'fBrtip',
            "sScrollX": "100%",
            "sScrollXInner": "110%",
            "bScrollCollapse": true,
            searching: false,
            paging: false, // Desactiva la paginación
            info: false,  // Desactiva la información de entradas
            buttons: [{
                    text: '<span class="bi bi-eye-fill fs-6 opacity-50 svg-icon svg-icon-2"></span>' +
                        'Vistas',
                    className: 'btn btn-primary mt-2',
                    action: function(e, dt, node, config) {
                        var div1 = document.getElementById('card_proyectos');
                        var div2 = document.getElementById('kt_table_users');
                        var div3 = document.getElementById('kt_table_header');
                        if (div1.hasAttribute('hidden')) {
                            div1.removeAttribute('hidden');
                            div2.setAttribute('hidden', 'true');
                            div3.setAttribute('hidden', 'true');
                        } else {
                            div1.setAttribute('hidden', 'true');
                            div2.removeAttribute('hidden');
                            div3.removeAttribute('hidden');
                        }
                    }
                },
            ],
            language: {
                search: 'Buscar: ',
                emptyTable: "No hay datos disponibles en la tabla",
                paginate: {
                    next: "Siguiente",
                    previous: "Anterior",
                },
                info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                infoEmpty: "Mostrando 0 a 0 de 0 entradas",
                infoFiltered: '(filtrado de _MAX_ registros en total)',
                zeroRecords: 'No se encontraron registros coincidentes',
            },
            order: [
                [4, 'desc'] // Ordenar la cuarta columna de manera ascendente
            ]
            
        });
    });
    </script>

    <script>
    $('.modal-close').on('click', function() {
        $('kt_modal_new_target').modal('hide');
    });
    </script>

    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <!-- <script src="assets/js/custom/utilities/modals/new-target.js"></script> -->
    <script src="assets/js/custom/utilities/modals/create-project/type.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/budget.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/settings.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/team.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/targets.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/files.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/complete.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/main.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/new-address.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    
</body>
</html>
<?php 
        // No olvides cerrar el statement y la conexión
        $stmt->close();
        $con->close();
    } else {
        // Manejo de errores de preparación
        echo "<script>alert('Error al preparar la consulta de la base de datos.'); window.location.href = '../panel/index.php';</script>";
        exit;
    }
} else {?>
    <html lang="es">
<head>
    <?php include_once '../assets/vista/proyectos/head-recursos.php'; ?>
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
    <?php include_once '../assets/vista/proyectos/body-recursos-ind.php'?>
    <script>
    var hostUrl = "assets/";
    </script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <?php
    include('../config.php');
    $sqlproy1 = ("SELECT * FROM usuarios INNER JOIN contratos ON usuarios.id = contratos.idUsuario WHERE contratos.fechaFin > CURDATE() and usuarios.rol='proveedor';");
    $queryproy1 = mysqli_query($con, $sqlproy1);
    ?>

    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <!-- <script src="assets/js/custom/utilities/modals/new-target.js"></script> -->
    <script src="assets/js/custom/utilities/modals/create-project/type.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/budget.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/settings.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/team.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/targets.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/files.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/complete.js"></script>
    <script src="assets/js/custom/utilities/modals/create-project/main.js"></script>
    <script src="assets/js/custom/utilities/modals/create-app.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/new-address.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    
</body>
</html>
<?php }?>