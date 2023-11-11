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
    $sqlad = "SELECT * FROM proyectos 
    JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto 
    LEFT JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id 
    WHERE proyectosInfo.idProyecto = ? AND proyectosInfo.estado='1'";
    // Prepara el statement para la consulta
    if ($stmt = $con->prepare($sql)) {
        // Vincula los parámetros y ejecuta
        $stmt->bind_param("ii", $idProyecto, $session_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            echo "$idProyecto, $session_id";
           
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