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
        $regFechaInicio = $_POST['FechaInicio'];
        $regFechaFin = $_POST['FechaFin'];
        
            $consulta5 = "UPDATE `contratos` SET `fechaInicio`=date($regFechaInicio) , `FechaFin`='$regFechaFin' where id='$regId'";
            $resultado5 = mysqli_query($con, $consulta5);
            echo '<div class="toast show position-fixed bottom-0 end-0 p-2 " role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="ki-duotone ki-abstract-39 fs-2 text-primary "><span class="path1"></span><span class="path2"></span></i>
                        <strong class="me-auto">Alerta</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">'+
                    $regFechaInicio+
                    '</div>
                    </div>';
            // header("location: index.php");
    }
}
?>