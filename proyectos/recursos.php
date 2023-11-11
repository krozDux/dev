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
        $('kt_modal_new_target').modal('hide');
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
        
    </body>
    </html>
    <?php }?>