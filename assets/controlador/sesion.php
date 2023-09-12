<?php
include('../config.php');
$inactivityTimeout = 5000 * 60; // 5 minutos
ini_set('session.gc_maxlifetime', $inactivityTimeout);
session_set_cookie_params($inactivityTimeout);
session_start();
// Verificar si la sesión ha expirado por inactividad
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactivityTimeout) {
    // La sesión ha expirado por inactividad, destruye la sesión y redirige al usuario
    session_unset();
    session_destroy();
    header('Location: ../login/index.php');
    exit();
}

// Actualiza el tiempo de actividad
$_SESSION['last_activity'] = time();

if (!isset($_SESSION['email'])) {
    header('Location: ../login/index.php');
    exit();
} else {
	$email = $_SESSION['email'];
    $sqlUser= ("SELECT * FROM `usuarios` where email = '$email'");
    $queryUser = mysqli_query($con, $sqlUser);
    while ($dataUser = mysqli_fetch_array($queryUser)) {
        $id = $dataUser['id']; 
        $nombres = $dataUser['nombres']; 
        $apellidos = $dataUser['apellidos'];
        $imagen = $dataUser['imagen'];
        $rol = $dataUser['rol'];
    }
}
?>