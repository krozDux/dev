<!DOCTYPE html>
<?php  if ($session_rol != "invitado" and $session_rol != "cliente" and $session_rol != "proveedor" ) {?>
<html lang="es">
<?php include_once '../assets/controlador/sesion.php'?>
<?php include_once '../assets/vista/proyectos/head-proyectos.php'?>

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
    <?php include_once '../assets/vista/proyectos/body-proyectos.php'?>
    <script>
    var hostUrl = "assets/";
    </script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <?php
    include('../config.php');
    $sqlproy1 = ("SELECT * FROM usuarios INNER JOIN contratos ON usuarios.id = contratos.idUsuario WHERE contratos.fechaFin < CURDATE() and usuarios.rol='proveedor';");
    $queryproy1 = mysqli_query($con, $sqlproy1);
    ?>
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
                    className: 'btn btn-primary',
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
                    className: 'btn btn-primary',
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

    // Espera a que el documento esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    // Obtiene el elemento con el ID "kt_table_users"
    var ktTableUsers = document.getElementById("kt_table_users");

    // Oculta el elemento estableciendo el atributo "hidden"
    ktTableUsers.setAttribute("hidden", "true");
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
<?php } else{
header("location: ../panel/index.php");
} ?>