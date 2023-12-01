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
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <?php
    include('../config.php');
    $sqlproy1 = ("SELECT proyectosInfo.id,proyectosInfo.idUsuario, proyectosInfo.idProyecto, proyectosInfo.estado,usuarios.nombres, usuarios.apellidos FROM proyectosInfo INNER JOIN proyectos ON proyectosInfo.idProyecto = proyectos.id INNER JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id WHERE proyectosInfo.idProyecto='$idProyecto' AND proyectosInfo.estado = '1' AND usuarios.rol != 'cliente';");
    $queryproy1 = mysqli_query($con, $sqlproy1);
    ?>
    <script>
        var dataTable;
    $(document).ready(function() {
        var input = document.querySelector('input[name="tags1"]'),
        tagify = new Tagify(input, {
        whitelist: [ <?php while ($dataproy1 = mysqli_fetch_array($queryproy1)) { ?>"<?php echo $dataproy1['nombres']; ?> <?php echo $dataproy1['apellidos']; ?> [<?php echo $dataproy1['idUsuario']; ?>]",<?php } ?>],        maxTags: 10,
        enforceWhitelist: true,
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
                {
                    text: '<span class="svg-icon svg-icon-2 opacity-50">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">' +
                        '<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>' +
                        '<path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>' +
                        '</svg>' +
                        '</span>Registrar',
                    className: 'btn btn-primary mt-2',
                    action: function(e, dt, node, config) {
                        $('#kt_modal_new_target').modal('show');
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
        $('#exportar-btn').on('click', function() {
            // Extiende la funcionalidad de DataTables para exportar
            dataTable.buttons.exportData({
                modifier: {
                    columns: [1, 2, 3, 4, 5, 6, 7]
                }
            });
        });
    });
// Agrega el evento de clic al botón "Exportar"
    </script>

    <script>
    $('.del-usuario').on('click', function() {
        var id = $(this).data('id');
        var nombres = $(this).data('nombres');
        var apellidos = $(this).data('apellidos');
        var rol = $(this).data('rol');
        const rolM = rol.charAt(0).toUpperCase() + rol.slice(1);
        $('#delId').val(id);
        $('#delNombres').val(nombres + " " + apellidos);
        $('#delRol').val(rolM);
        $('#kt_modal_remove_user').modal('show');
    });
    </script>

    <script>
    $('.ver-contrato').on('click', function() {
        var id1 = $(this).data('id1');
        var email1 = $(this).data('email1');
        var nombres1 = $(this).data('nombres1');
        var apellidos1 = $(this).data('apellidos1');
        var rol1 = $(this).data('rol1');
        var direccion1 = $(this).data('direccion1');
        var numero1 = $(this).data('numero1');
        var observacion1 = $(this).data('observacion1');
        var recomendacion1 = $(this).data('recomendacion1');
        var fechainicio1 = $(this).data('fechainicio1');
        var fechafin1 = $(this).data('fechafin1');
        $('#viewId').val(id1);
        $('#viewNombres').val(nombres1 + " " + apellidos1);
        $('#viewEmail').val(email1);
        $('#viewDireccion').val(direccion1);
        $('#viewNumero').val(numero1);
        $('#viewRol').val(rol1);
        $('#viewFechaInicio').val(fechainicio1);
        $('#viewFechaFin').val(fechafin1);
        $('#viewObservacion').val(observacion1);
        $('#viewRecomendacion').val(recomendacion1);
        $('#kt_modal_view_user').modal('show');
    });
    </script>
    <script>
    $('.add-proyecto').on('click', function() {
        $('#kt_modal_new_target').modal('show');
    });
    </script>
    <script>
    $('.reg-contrato').on('click', function() {
        var id = $(this).data('id');
        var email = $(this).data('email');
        var nombres = $(this).data('nombres');
        var apellidos = $(this).data('apellidos');
        var rol = $(this).data('rol');
        var direccion = $(this).data('direccion');
        var numero = $(this).data('numero');
        var observacion = $(this).data('observacion');
        var recomendacion = $(this).data('recomendacion');
        var fechainicio = $(this).data('fechainicio');
        var fechafin = $(this).data('fechafin');
        $('#regId').val(id);
        $('#resetId').val(id);
        $('#resetNombres').val(nombres + " " + apellidos);
        $('#regEmail').val(email);
        $('#regNombres').val(nombres + " " + apellidos);
        $('#regDireccion').val(direccion);
        $('#regNumero').val(numero);
        $('#regRol').val(rol);
        $('#regObservacion').val(observacion);
        $('#regRecomendacion').val(recomendacion);
        $('#kt_modal_reg_user').modal('show');

        if (fechainicio != "-") {
            $('#regFechaInicio').val(fechainicio);
        }
        if (fechafin != "-") {
            $('#regFechaFin').val(fechafin);
        }

        // Obtén los elementos de fecha de inicio y fecha de fin
        var fechaInicioInput = document.getElementById("regFechaInicio");
        var fechaFinInput = document.getElementById("regFechaFin");

        // Agrega un evento change a fecha de inicio
        fechaInicioInput.addEventListener("change", function() {
            // Convierte las fechas en objetos Date
            var fechaInicio = new Date(fechaInicioInput.value);
            var fechaFin = new Date(fechaFinInput.value);

            // Valida si fecha de inicio es mayor que fecha de fin
            if (fechaInicio > fechaFin) {
                // Establece la fecha de fin igual a fecha de inicio
                fechaFinInput.value = fechaInicioInput.value;
            }
        });

        // Agrega un evento change a fecha de fin
        fechaFinInput.addEventListener("change", function() {
            // Convierte las fechas en objetos Date
            var fechaInicio = new Date(fechaInicioInput.value);
            var fechaFin = new Date(fechaFinInput.value);

            // Valida si fecha de fin es menor que fecha de inicio
            if (fechaFin < fechaInicio) {
                // Establece la fecha de inicio igual a fecha de fin
                fechaInicioInput.value = fechaFinInput.value;
            }
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
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <?php
    include('../config.php');
    $sqlproy1 = ("SELECT proyectosInfo.id,proyectosInfo.idUsuario, proyectosInfo.idProyecto, proyectosInfo.estado,usuarios.nombres, usuarios.apellidos FROM proyectosInfo INNER JOIN proyectos ON proyectosInfo.idProyecto = proyectos.id INNER JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id WHERE proyectosInfo.idProyecto='$idProyecto' AND proyectosInfo.estado = '1';");
    $queryproy1 = mysqli_query($con, $sqlproy1);
    ?>
    <script>
        var dataTable;
    $(document).ready(function() {
        var input = document.querySelector('input[name="tags1"]'),
        tagify = new Tagify(input, {
        whitelist: [ <?php while ($dataproy1 = mysqli_fetch_array($queryproy1)) { ?>"<?php echo $dataproy1['nombres']; ?> <?php echo $dataproy1['apellidos']; ?> [<?php echo $dataproy1['idUsuario']; ?>]",<?php } ?>],
        maxTags: 10,
        enforceWhitelist: true,
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
                {
                    text: '<span class="svg-icon svg-icon-2 opacity-50">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">' +
                        '<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>' +
                        '<path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>' +
                        '</svg>' +
                        '</span>Registrar',
                    className: 'btn btn-primary mt-2',
                    action: function(e, dt, node, config) {
                        $('#kt_modal_new_target').modal('show');
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
        $('#exportar-btn').on('click', function() {
            // Extiende la funcionalidad de DataTables para exportar
            dataTable.buttons.exportData({
                modifier: {
                    columns: [1, 2, 3, 4, 5, 6, 7]
                }
            });
        });
    });
// Agrega el evento de clic al botón "Exportar"
    </script>

    <script>
    $('.del-usuario').on('click', function() {
        var id = $(this).data('id');
        var nombres = $(this).data('nombres');
        var apellidos = $(this).data('apellidos');
        var rol = $(this).data('rol');
        const rolM = rol.charAt(0).toUpperCase() + rol.slice(1);
        $('#delId').val(id);
        $('#delNombres').val(nombres + " " + apellidos);
        $('#delRol').val(rolM);
        $('#kt_modal_remove_user').modal('show');
    });
    </script>

    <script>
    $('.ver-contrato').on('click', function() {
        var id1 = $(this).data('id1');
        var email1 = $(this).data('email1');
        var nombres1 = $(this).data('nombres1');
        var apellidos1 = $(this).data('apellidos1');
        var rol1 = $(this).data('rol1');
        var direccion1 = $(this).data('direccion1');
        var numero1 = $(this).data('numero1');
        var observacion1 = $(this).data('observacion1');
        var recomendacion1 = $(this).data('recomendacion1');
        var fechainicio1 = $(this).data('fechainicio1');
        var fechafin1 = $(this).data('fechafin1');
        $('#viewId').val(id1);
        $('#viewNombres').val(nombres1 + " " + apellidos1);
        $('#viewEmail').val(email1);
        $('#viewDireccion').val(direccion1);
        $('#viewNumero').val(numero1);
        $('#viewRol').val(rol1);
        $('#viewFechaInicio').val(fechainicio1);
        $('#viewFechaFin').val(fechafin1);
        $('#viewObservacion').val(observacion1);
        $('#viewRecomendacion').val(recomendacion1);
        $('#kt_modal_view_user').modal('show');
    });
    </script>
    <script>
    $('.add-proyecto').on('click', function() {
        $('#kt_modal_new_target').modal('show');
    });
    </script>
    <script>
    $('.reg-contrato').on('click', function() {
        var id = $(this).data('id');
        var email = $(this).data('email');
        var nombres = $(this).data('nombres');
        var apellidos = $(this).data('apellidos');
        var rol = $(this).data('rol');
        var direccion = $(this).data('direccion');
        var numero = $(this).data('numero');
        var observacion = $(this).data('observacion');
        var recomendacion = $(this).data('recomendacion');
        var fechainicio = $(this).data('fechainicio');
        var fechafin = $(this).data('fechafin');
        $('#regId').val(id);
        $('#resetId').val(id);
        $('#resetNombres').val(nombres + " " + apellidos);
        $('#regEmail').val(email);
        $('#regNombres').val(nombres + " " + apellidos);
        $('#regDireccion').val(direccion);
        $('#regNumero').val(numero);
        $('#regRol').val(rol);
        $('#regObservacion').val(observacion);
        $('#regRecomendacion').val(recomendacion);
        $('#kt_modal_reg_user').modal('show');

        if (fechainicio != "-") {
            $('#regFechaInicio').val(fechainicio);
        }
        if (fechafin != "-") {
            $('#regFechaFin').val(fechafin);
        }

        // Obtén los elementos de fecha de inicio y fecha de fin
        var fechaInicioInput = document.getElementById("regFechaInicio");
        var fechaFinInput = document.getElementById("regFechaFin");

        // Agrega un evento change a fecha de inicio
        fechaInicioInput.addEventListener("change", function() {
            // Convierte las fechas en objetos Date
            var fechaInicio = new Date(fechaInicioInput.value);
            var fechaFin = new Date(fechaFinInput.value);

            // Valida si fecha de inicio es mayor que fecha de fin
            if (fechaInicio > fechaFin) {
                // Establece la fecha de fin igual a fecha de inicio
                fechaFinInput.value = fechaInicioInput.value;
            }
        });

        // Agrega un evento change a fecha de fin
        fechaFinInput.addEventListener("change", function() {
            // Convierte las fechas en objetos Date
            var fechaInicio = new Date(fechaInicioInput.value);
            var fechaFin = new Date(fechaFinInput.value);

            // Valida si fecha de fin es menor que fecha de inicio
            if (fechaFin < fechaInicio) {
                // Establece la fecha de inicio igual a fecha de fin
                fechaInicioInput.value = fechaFinInput.value;
            }
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
    <?php }?>