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
    if (!empty($_POST['regId']) and !empty($_POST['regFechaInicio']) and !empty($_POST['regFechaFin'])) {
        $regId = $_POST['regId'];
        $regFechaInicio = date($_POST['FechaInicio']);
        $regFechaFin = date($_POST['FechaFin']);
        
            $consulta5 = "UPDATE `contratos` SET `fechaInicio`='$regFechaInicio' , `FechaFin`='$regFechaFin' where id='$regId'";
            $resultado5 = mysqli_query($con, $consulta5);
            header("location: index.php");
    }
}
?>