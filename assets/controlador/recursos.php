<?php
include('../config.php');
$sqlFechaFin = "SELECT fechaFin FROM proyectos WHERE id='$idProyecto'";
$queryFechaFin = mysqli_query($con, $sqlFechaFin);
$resultFechaFin = mysqli_fetch_assoc($queryFechaFin);
if (!empty($_POST['btnreg'])) {
    if (!empty($_POST['idProyecto'])) {
        if (!empty($_POST['nombreTarea'])) {
            if (!empty($_POST['fechaFin'])) {
                    $idProyecto = $_POST['idProyecto'];
                    $nombreTarea = $_POST['nombreTarea'];
                    $fechaFin = $_POST['fechaFin'];
                    $tags1 = $_POST['tags1'];
                    $fechaAdd = date('Y-m-d H:i:s');
                    $consulta5 = "INSERT `proyectosTareas` (`fechaAdd`,`fechaFin`,`nombre`,`idProyecto`,`estado`) VALUES ('$fechaAdd','$fechaFin','$nombreTarea','$idProyecto','1')";
                    $resultado5 = mysqli_query($con, $consulta5);
                    $idTarea = mysqli_insert_id($con);
                    $jsonData = $_POST['tags1'];
                    $data = json_decode($jsonData);
    
                        if ($data) {
                            foreach ($data as $item) {
                                // Expresiones regulares para extraer los valores entre corchetes
                                $matches = [];
                                preg_match('/\[(\d+)\]/', $item->value, $matches);
    
                                if (isset($matches[1])) {
                                    $value = $matches[1];
                                    
                                    // Inserta el valor en la tabla MySQL
                                    $consulta7 = "INSERT `tareasInfo` (`idUsuario`,`idTarea`) VALUES ('$value','$idTarea')";
                                    $resultado7 = mysqli_query($con, $consulta7);
                                    if (!$resultado7) {
                                        echo "Error al insertar el valor '$value'. Error: " . mysqli_error($con);
                                    }
                                }
                            }
                        } 
                    header("location: recursos.php?idProyecto=$idProyecto");
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


if (!empty($_POST['btnregTarea'])) {
    if (!empty($_POST['idProyecto'])) {
        if (!empty($_POST['nombreTarea'])) {
            if (!empty($_POST['fechaFin'])) {
                    $idProyecto = $_POST['idProyecto'];
                    $nombreTarea = $_POST['nombreTarea'];
                    $fechaFin = $_POST['fechaFin'];
                    $tags1 = $_POST['tags1'];
                    $fechaAdd = date('Y-m-d H:i:s');
                    $consulta5 = "INSERT `proyectosTareas` (`fechaAdd`,`fechaFin`,`nombre`,`idProyecto`,`estado`) VALUES ('$fechaAdd','$fechaFin','$nombreTarea','$idProyecto','1')";
                    $resultado5 = mysqli_query($con, $consulta5);
                    $idTarea = mysqli_insert_id($con);
                    $jsonData = $_POST['tags1'];
                    $data = json_decode($jsonData);
    
                        if ($data) {
                            foreach ($data as $item) {
                                // Expresiones regulares para extraer los valores entre corchetes
                                $matches = [];
                                preg_match('/\[(\d+)\]/', $item->value, $matches);
    
                                if (isset($matches[1])) {
                                    $value = $matches[1];
                                    
                                    // Inserta el valor en la tabla MySQL
                                    $consulta7 = "INSERT `tareasInfo` (`idUsuario`,`idTarea`) VALUES ('$value','$idTarea')";
                                    $resultado7 = mysqli_query($con, $consulta7);
                                    if (!$resultado7) {
                                        echo "Error al insertar el valor '$value'. Error: " . mysqli_error($con);
                                    }
                                }
                            }
                        } 
                    header("location: tareas.php?idProyecto=$idProyecto");
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



if (!empty($_POST['btnregMiembro'])) {
    if (!empty($_POST['idProyecto'])) {
        $idProyecto = $_POST['idProyecto']; // Asegúrate de asignar esta variable correctamente
        $fechaAdd = date('Y-m-d H:i:s');
        $jsonData = $_POST['tags1'];
        $data = json_decode($jsonData);

        if ($data) {
            foreach ($data as $item) {
                $matches = [];
                preg_match('/\[(\d+)\]/', $item->value, $matches);

                if (isset($matches[1])) {
                    $value = $matches[1];
                    
                    // Verifica si ya existe un registro con el idUsuario e idProyecto
                    $consultaVerificacion = "SELECT * FROM `proyectosInfo` WHERE `idUsuario` = '$value' AND `idProyecto` = '$idProyecto'";
                    $resultadoVerificacion = mysqli_query($con, $consultaVerificacion);
                    
                    if (mysqli_num_rows($resultadoVerificacion) > 0) {
                    } else {
                        // Si no existe, inserta el valor en la tabla MySQL
                        $consulta7 = "INSERT INTO `proyectosInfo` (`tipo`,`estado`,`fechaAdd`,`idUsuario`,`idProyecto`) VALUES ('1','1','$fechaAdd','$value','$idProyecto')";
                        $resultado7 = mysqli_query($con, $consulta7);
                        header("location: miembros.php?idProyecto=$idProyecto");
                        if (!$resultado7) {
                            echo "Error al insertar el valor '$value'. Error: " . mysqli_error($con);
                        }
                    }
                }
            }
        } 
    } else {
        echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 1050;">
            <div class="toast-header bg-danger">
                <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                <strong class="me-auto text-white">Alerta</strong>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body text-white">
                Tiene que existir un identificador del proyecto.
            </div>
        </div>';
    }
}




if (!empty($_POST['btnregArchivo'])) {
    if (!empty($_POST['idTarea'])) {
        if (!empty($_POST['idUsuario'])) {
            if (!empty($_POST['estado'])) {
                    $idTarea = $_POST['idTarea'];
                    $idUsuario = $_POST['idUsuario'];
                    $estado = $_POST['estado'];
                    $idProyecto = $_POST['idProyecto'];
                    $archivo = $_FILES['archivo']['name'];
                    $fechaAdd = date('Y-m-d H:i:s');
                    if (isset($archivo) and $archivo!=""){
                        $tipo = $_FILES['archivo']['type'];
                        $temp = $_FILES['archivo']['tmp_name'];
                        $extension = pathinfo($archivo,PATHINFO_EXTENSION);
                    if (!((strpos($tipo, 'pdf')) or (strpos($tipo, 'doc')) or (strpos($tipo, 'docx')) or (strpos($tipo, 'zip')) or (strpos($tipo, 'rar')))){
                        echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true" style="z-index: 1050;">
                                <div class="toast-header bg-danger">
                                    <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                                    <strong class="me-auto text-white">Alerta</strong>
                                    <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body text-white">
                                    Solo se permiten archivos con extensión pdf, doc, docx, zip o rar.
                                </div>
                            </div>';
                    }else {
                        $consulta = "INSERT proyectosDocumentos (`fechaAdd`,`documento`,`nombre`,`extension`,`link`,`estado`,`idUsuario`,`idProyectoTarea`) VALUES ('$fechaAdd','-','-','-','link','$estado','$idUsuario','$idTarea')";
                        $resultado = mysqli_query($con, $consulta);
                        $id_tareaDoc = mysqli_insert_id($con);
                        $nuevo_nombre_archivo = $id_tareaDoc . '[' . $idTarea . '].' . $extension;
                        $ruta_archivo = '../assets/documentos/' . $nuevo_nombre_archivo;
                        move_uploaded_file($temp, $ruta_archivo);

                        echo "Archivo enviado por correo electrónico con éxito.";
                        $consulta33 = "UPDATE `proyectosDocumentos` SET `documento`='$nuevo_nombre_archivo', `nombre`='$archivo', `extension`='$extension' where id='$id_tareaDoc'";
                        $resultado2 = mysqli_query($con, $consulta33);
                        $consulta35 = "UPDATE `proyectosTareas` SET `estado`='$estado' where id='$idTarea'";
                        $resultado23 = mysqli_query($con, $consulta35);
                        header("location: tareas.php?idProyecto=$idProyecto");
                    }
                }
            } 
        }
    }
}

if (!empty($_POST['btndescargarArchivos'])) {
    $con = mysqli_connect("localhost", "u537253387_almidon", "Carloshack1.", "u537253387_almidon");

if (!$con) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

    if (!empty($_POST['btndescargarArchivos'])) {
        $idTarea = $_POST['btndescargarArchivos'];
        
        // Verifica si hay archivos relacionados con el idTarea
        $consulta = "SELECT * FROM proyectosDocumentos WHERE idProyectoTarea = '$idTarea'";
        $resultado = mysqli_query($con, $consulta);
        
        if (mysqli_num_rows($resultado) > 0) {
            // Crear un nuevo archivo ZIP
            $zip = new ZipArchive();
            $nombreZip = "archivos_$idTarea.zip";
            
            if ($zip->open($nombreZip, ZipArchive::CREATE) === TRUE) {
                // Añadir archivos al ZIP
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $path = '/assets/documentos/' . $fila['documento']; // Asegúrate de tener la ruta correcta al archivo
                    if (file_exists($path)) {
                        $zip->addFile($path, $fila['documento']);
                    }
                }
                // Finalizar ZIP
                $zip->close();
                
                // Forzar la descarga del archivo ZIP
                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename="'.basename($nombreZip).'"');
                header('Content-Length: ' . filesize($nombreZip));
                flush();
                readfile($nombreZip);
                // Eliminar archivo ZIP después de la descarga
                unlink($nombreZip);
                exit;
            }
        } else {
            echo "No hay archivos para descargar.";
        }
    }
    }
?>