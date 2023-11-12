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
        if (!empty($_POST['regFechaInicio'])) {
            if (!empty($_POST['regFechaFin'])) {
                $regId = $_POST['regId'];
                $regFechaInicio = $_POST['regFechaInicio'];
                $regFechaFin = $_POST['regFechaFin'];
                $regObservacion = $_POST['regObservacion'];
                $regRecomendacion = $_POST['regRecomendacion'];
                $consulta5 = "UPDATE `contratos` SET `fechaInicio`='$regFechaInicio' , `fechaFin`='$regFechaFin', `observacion`='$regObservacion', `recomendacion`='$regRecomendacion', `nombreContratante`='$session_nombres $session_apellidos' where id='$regId'";
                $resultado5 = mysqli_query($con, $consulta5);
                header("location: index.php");
            } else {
                echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 1050;">
                        <div class="toast-header bg-danger">
                            <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                            <strong class="me-auto text-white">Alerta</strong>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-white">
                            Tienes que indicar una fecha de fin.
                        </div>
                    </div>';
            }
        } else {
            echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 1050;">
                        <div class="toast-header bg-danger">
                            <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                            <strong class="me-auto text-white">Alerta</strong>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-white">
                            Tienes que indicar una fecha de inicio.
                        </div>
                    </div>';
        }
        
    }
}


if (!empty($_POST['btnnew'])) {
        if (!empty($_POST['newNombre'])) {
            $newNombre = $_POST['newNombre'];
            $consulta5 = "INSERT `contratos` (`observacion`,`recomendacion`,`idUsuario`) VALUES ('-','-','$newNombre')";
            $resultado5 = mysqli_query($con, $consulta5);
            header("location: index.php");
        } else {
            echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 1050;">
                        <div class="toast-header bg-danger">
                            <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                            <strong class="me-auto text-white">Alerta</strong>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-white">
                            Tienes que seleccionar un trabajador.
                        </div>
                    </div>';
        }
        
}
?>