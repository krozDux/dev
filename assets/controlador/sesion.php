<?php
session_start();

// Verificar si el usuario no ha iniciado sesión
if (!isset($_SESSION['email'])) {
    // Verificar si estamos en la página de inicio de sesión para evitar un bucle de redirección
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage !== 'index.php') {
        header('Location: ../login/index.php');
        exit();
    }
}
// Verifica si el usuario no ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header('Location: ../login/index.php');
    exit();
}

// Recupera los datos del usuario
include('../config.php');
$session_email = $_SESSION['email'];
$sqlUser = "SELECT * FROM `usuarios` WHERE email = '$session_email'";
$queryUser = mysqli_query($con, $sqlUser);

if ($queryUser && $dataUser = mysqli_fetch_array($queryUser)) {
    $session_id = $dataUser['id']; 
    $session_nombres = $dataUser['nombres']; 
    $session_apellidos = $dataUser['apellidos'];
    $session_imagen = $dataUser['imagen'];
    $session_rol = $dataUser['rol'];
} else {
    // Manejo de error si no se pueden recuperar los datos del usuario
    header('Location: ../login/index.php');
    exit();
}

// Cerrar sesión
if (!empty($_POST['unlogin'])) {
    session_unset();
    session_destroy();
    header('Location: ../login/index.php');
    exit();
}