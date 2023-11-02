<?php
include('../config.php');
if (!empty($_POST['btningresar'])) {
    session_start();
    $_SESSION['email'] = $session_email;
    $sqlUser= ("SELECT * FROM `usuarios` where email = '$session_email'");
    $queryUser = mysqli_query($con, $sqlUser);
    while ($dataUser = mysqli_fetch_array($queryUser)) {
        $session_id = $dataUser['id']; 
        $session_nombres = $dataUser['nombres']; 
        $session_apellidos = $dataUser['apellidos'];
        $session_imagen = $dataUser['imagen'];
        $session_rol = $dataUser['rol'];
    }
    header('Location: ../panel/index.php');
    exit();
}
?>