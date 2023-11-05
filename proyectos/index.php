<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    if ($session_rol != "invitado" && $session_rol != "cliente" && $session_rol != "proveedor") {
        include_once '../assets/controlador/sesion.php';
    ?>
    <?php include_once '../assets/vista/proyectos/head-proyectos.php'; ?>
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed">
    <?php include_once '../assets/vista/proyectos/body-proyectos.php'; ?>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <?php
    include('../config.php');
    $sqlproy1 = ("SELECT * FROM usuarios INNER JOIN contratos ON usuarios.id = contratos.idUsuario WHERE contratos.fechaFin < CURDATE();");
    $queryproy1 = mysqli_query($con, $sqlproy1);
    ?>
    <script>
        $(document).ready(function() {
            // Inicializar DataTable
            var table = $('#kt_table_users').DataTable({
                dom: 'fBrtip',
                "sScrollX": "100%",
                "sScrollXInner": "110%",
                "bScrollCollapse": true,
                buttons: [
                    {
                        text: '<span class="svg-icon svg-icon-2 opacity-50">' +
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">' +
                            '<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>' +
                            '<path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>' +
                            '</svg>' +
                            '</span>Registrar',
                        className: 'btn btn-primary',
                        action: function(e, dt, node, config) {
                            $('#kt_modal_new_target').modal('show');
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<span class="svg-icon svg-icon-2 opacity-50">' +
                            '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-down-fill" viewBox="0 0 16 16">' +
                            '  <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.60-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm2.354 6.854-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 9.293V5.5a.5.5 0 0 1 1 0v3.793l1.146-1.147a.5.5 0 0 1 .708.708z"/>' +
                            '</svg>' +
                            '</span>Exportar',
                        className: 'btn btn-primary ',
                        exportOptions: {
                            columns: [1, 2, 3, 4, 5, 6, 7]
                        },
                        autoFilter: true,
                        sheetName: 'Reporte - Proyectos'
                    }
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

            // Inicializar Tagify
            var input = document.querySelector('input[name="tags1"]');
            var tagify = new Tagify(input, {
                whitelist: [
                    <?php while ($dataproy1 = mysqli_fetch_array($queryproy1)) { ?>
                        "<?php echo $dataproy1['nombres']; ?> <?php echo $dataproy1['apellidos']; ?> [<?php echo $dataproy1['id']; ?>]",
                    <?php } ?>
                ],
                maxTags: 10,
                dropdown: {
                    maxItems: 20,
                    classname: "tags-look",
                    enabled: 0,
                    closeOnSelect: true
                }
            });
        });
    </script>
    <script>
        // Resto de tus funciones JavaScript aquí
    </script>
</body>
</html>
<?php } else {
    header("location: ../panel/index.php");
} ?>