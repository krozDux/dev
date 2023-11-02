<?php
include('../config.php');

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