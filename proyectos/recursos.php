<!DOCTYPE html>
<?php include_once '../assets/controlador/sesion.php'?>
<?php
// Comprueba si se ha proporcionado idProyecto a través de GET
if (isset($_GET['idProyecto'])) {
    include('../config.php'); // Asegúrate de que esta ruta sea correcta para incluir tu archivo de configuración de la base de datos

    $idProyecto = $_GET['idProyecto'];

    // Verifica si el rol es admin para cambiar la consulta
    if ($session_rol == "admin") {
        // Consulta para admin sin verificar el idUsuario
        $sql = "SELECT * FROM proyectos 
                JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto 
                LEFT JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id 
                WHERE proyectosInfo.idProyecto = ? AND proyectosInfo.estado='1'";
    } else if ($session_rol == "invitado" or  $session_rol == "cliente" or $session_rol == "proveedor") {
        // Consulta para otros roles verificando el idUsuario
        $sql = "SELECT * FROM proyectos 
                JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto 
                LEFT JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id 
                WHERE proyectosInfo.idProyecto = ? AND proyectosInfo.estado='1' 
                AND proyectosInfo.idUsuario = ?";
    } else {
        // Si no es un rol válido, redirigir o mostrar un mensaje de error
        echo "<script>alert('No tienes permiso para ver esta página.'); window.location.href = '../panel/index.php';</script>";
        exit;
    }

    if ($stmt = $con->prepare($sql)) {
        if ($session_rol == "admin") {
            $stmt->bind_param("i", $idProyecto);
        } else {
            $stmt->bind_param("ii", $idProyecto, $session_id);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "No se encontraron resultados para el ID del proyecto: $idProyecto.";
            exit;
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

    <script>
    $('.modal-close').on('click', function() {
        $('kt_modal_new_user').modal('hide');
    });
    </script>


    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
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
    <script>
    $(document).ready(function() {

        $('#kt_table_users').DataTable({

            dom: 'fBrtip',
            "sScrollX": "100%",
            "sScrollXInner": "110%",
            "bScrollCollapse": true,
            searching: false,
            paging: false, // Desactiva la paginación
            info: false, // Desactiva la información de entradas
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
                {
                    extend: 'excelHtml5',
                    text: '<span class="svg-icon svg-icon-2 opacity-50">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">' +
                        '  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>' +
                        '</svg>' +
                        '</span>Exportar</button>',
                    className: 'btn btn-primary mt-2',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    autoFilter: true,
                    sheetName: 'Reporte - Proyectos'
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
        });
    });
    </script>
</body>
</html>
<?php 
        $stmt->close();
        $con->close();
    } else {
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
        <script src="assets/js/widgets.bundle.js"></script>
        <script src="assets/js/custom/widgets.js"></script>
        <script src="assets/js/custom/apps/chat/chat.js"></script>
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
        <script>
    $(document).ready(function() {

        $('#kt_table_users').DataTable({

            dom: 'fBrtip',
            "sScrollX": "100%",
            "sScrollXInner": "110%",
            "bScrollCollapse": true,
            searching: false,
            paging: false, // Desactiva la paginación
            info: false, // Desactiva la información de entradas
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
                {
                    extend: 'excelHtml5',
                    text: '<span class="svg-icon svg-icon-2 opacity-50">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">' +
                        '  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>' +
                        '</svg>' +
                        '</span>Exportar</button>',
                    className: 'btn btn-primary mt-2',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    },
                    autoFilter: true,
                    sheetName: 'Reporte - Proyectos'
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
        });
    });
    </script>
    </body>
    </html>
    <?php }?>