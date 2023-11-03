<?php
include('../config.php');
// $inactivityTimeout = 5000 * 60; // 5 minutos
// ini_set('session.gc_maxlifetime', $inactivityTimeout);
// session_set_cookie_params($inactivityTimeout);
session_start();
// // Verificar si la sesión ha expirado por inactividad
// if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactivityTimeout) {
//     // La sesión ha expirado por inactividad, destruye la sesión y redirige al usuario
//     session_unset();
//     session_destroy();
//     header('Location: ../login/index.php');
//     exit();
// }

// // Actualiza el tiempo de actividad
// $_SESSION['last_activity'] = time();

if (!isset($_SESSION['email'])) {
    header('Location: ../login/index.php');
    exit();
} else {
	$session_email = $_SESSION['email'];
    $sqlUser= ("SELECT * FROM `usuarios` where email = '$session_email'");
    $queryUser = mysqli_query($con, $sqlUser);
    while ($dataUser = mysqli_fetch_array($queryUser)) {
        $session_id = $dataUser['id']; 
        $session_nombres = $dataUser['nombres']; 
        $session_apellidos = $dataUser['apellidos'];
        $session_imagen = $dataUser['imagen'];
        $session_rol = $dataUser['rol'];
    }
}

if (!empty($_POST['unlogin'])) {
    session_unset();
    session_destroy();
    header('Location: ../login/index.php');
    exit();
}
?>