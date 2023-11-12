<?php
include('../config.php');
$sqlFechaFin = "SELECT fechaFin FROM proyectos WHERE id='$idProyecto'";
$queryFechaFin = mysqli_query($con, $sqlFechaFin);
$resultFechaFin = mysqli_fetch_assoc($queryFechaFin);
if (!empty($_POST['btnreg'])) {
    if (!empty($_POST['idProyecto'])) {
        if (!empty($_POST['nombreTarea'])) {
            if (!empty($_POST['fechaFin'])) {
                if (new DateTime($fechaFin) >= new DateTime($fechaFinProyecto)){
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
                } else{
                    echo '<div class="toast show position-fixed bottom-0 end-0 p-2 bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header bg-danger">
                        <strong class="me-auto text-white">Alerta</strong>
                        <button type="button" class="btn-close bg-white" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body text-white">
                        La fecha limite de la tarea no puede ser anterior a la fecha de finalización del proyecto.
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
                            Tienes que indicar una fecha de fin.
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
                            Tienes que indicar una fecha de inicio.
                        </div>
                    </div>';
        }
        
    }
}
?>