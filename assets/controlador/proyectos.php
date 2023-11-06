<?php
include('../config.php');

if (!empty($_POST['btneliminar'])) {
    if (!empty($_POST['id'])) {
        $id = $_POST['id'];
        $consulta2 = "UPDATE `usuarios` SET `estado`='2' where id='$id'";
        $resultado2 = mysqli_query($con, $consulta2);
        header("location: proyectos.php");
}}


if (!empty($_POST['btnreg'])) {
        if (!empty($_POST['nombre'])) {
            if (!empty($_POST['encargado'])) {
                if (!empty($_POST['fechaInicio'])) {
                    $nombre = $_POST['nombre'];
                    $encargado = $_POST['encargado'];
                    $fechaInicio = $_POST['fechaInicio'];
                    $cliente = $_POST['cliente'];
                    $fechaInicio = $_POST['fechaFin'];
                    $descripcion = $_POST['descripcion'];
                    if ($descripcion == "") {
                        $descripcion = "-";
                    }
                    $tags1 = $_POST['tags1'];
                    $fechaAdd = date('Y-m-d H:i:s');
                    // Creación proyecto
                    $consulta5 = "INSERT `proyectos` (`nombre`,`fechaInicio`,`fechaFin`,`descripcion`,`fechaCreacion`) VALUES ('$nombre','$fechaInicio','$fechaFin','$descripcion','$fechaAdd')";
                    $resultado5 = mysqli_query($con, $consulta5);
                    $idProyecto = mysqli_insert_id($con);
                    // Jefe del grupo
                    $consulta6 = "INSERT `proyectosInfo` (`tipo`,`estado`,`fechaAdd`,`idUsuario`,`idProyecto`) VALUES ('3','1','$fechaAdd','$encargado','$idProyecto')";
                    $resultado6 = mysqli_query($con, $consulta6);
                    // Cliente del grupo
                    $consulta8 = "INSERT `proyectosInfo` (`tipo`,`estado`,`fechaAdd`,`idUsuario`,`idProyecto`) VALUES ('2','1','$fechaAdd','$cliente','$idProyecto')";
                    $resultado8 = mysqli_query($con, $consulta8);
                    // Miembros
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
                                $consulta7 = "INSERT `proyectosInfo` (`tipo`,`estado`,`fechaAdd`,`idUsuario`) VALUES ('1','1','$fechaAdd','$value')";
                                $resultado7 = mysqli_query($con, $consulta7);
                                if (!$resultado7) {
                                    echo "Error al insertar el valor '$value'. Error: " . mysqli_error($con);
                                }
                            }
                        }
                    } 
                    header("location: index.php");
                } else{
                    echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger">
                            <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                            <strong class="me-auto text-white">Alerta</strong>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-white">
                            Tienes que indicar una fecha de inicio del proyecto.
                        </div>
                    </div>';
                }
            } else {
                echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger">
                            <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                            <strong class="me-auto text-white">Alerta</strong>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-white">
                            Tienes que indicar un encargado del proyecto.
                        </div>
                    </div>';
            }
        } else {
            echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header bg-danger">
                            <i class="ki-duotone ki-abstract-39 fs-2 bg-danger"><span class="path1 bg-danger"></span><span class="path2 bg-danger"></span></i>
                            <strong class="me-auto text-white">Alerta</strong>
                            <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body text-white">
                            El proyecto debe tener un nombre.
                        </div>
                    </div>';
        }
}


if (!empty($_POST['btnnew'])) {
        if (!empty($_POST['newNombre'])) {
            $newNombre = $_POST['newNombre'];
            $consulta5 = "INSERT `contratos` (`observacion`,`recomendacion`,`idUsuario`) VALUES ('-','-','$newNombre')";
            $resultado5 = mysqli_query($con, $consulta5);
            header("location: index.php");
        } else {
            echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
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