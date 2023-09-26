<?php
include('../config.php');

if (!empty($_POST['btneliminar'])) {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $consulta2 = "UPDATE `usuarios` SET `estado`='2' where id='$id'";
        $resultado2 = mysqli_query($con, $consulta2);
        header("location: clientes.php");
}}


if (!empty($_POST['btnreg'])) {
    if (!empty($_POST['regId'])) {
        $regId = $_POST['regId'];
        $regFechaInicio = $_POST['FechaInicio'];
        $regFechaFin = $_POST['FechaFin'];
        $forFechaInicio = date('Y-m-d', strtotime($regFechaInicio));
        $forFechaFin = date('Y-m-d', strtotime($regFechaFin));
        $consulta5 = "UPDATE `contratos` SET `fechaInicio`='$forFechaInicio' , `FechaFin`='$forFechaFin' where id='$regId'";
        $resultado5 = mysqli_query($con, $consulta5);
        header("location: index.php");
    }
}
?>