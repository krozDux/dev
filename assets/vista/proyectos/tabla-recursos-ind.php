<?php if ($session_rol != "admin") { ?>
<?php
// Incluir el archivo de configuración que contiene la conexión a la base de datos
include('../config.php');

// Consulta SQL para seleccionar proyectos junto con información adicional y usuarios asociados al proyecto
$sql1 = "SELECT proyectos.id, proyectos.nombre, proyectos.fechaInicio, proyectos.fechaFin, proyectos.descripcion, proyectos.fechaCreacion, proyectos.estado, proyectosInfo.tipo, proyectosInfo.fechaAdd, proyectosInfo.fechaEstado, proyectosInfo.idProyecto, GROUP_CONCAT(proyectosInfo.idUsuario) AS idUsuarios
FROM proyectos
JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto WHERE proyectosInfo.idUsuario = '$session_id'
GROUP BY proyectos.id";

// Ejecutar la consulta en la base de datos y almacenar el resultado
$query2 = mysqli_query($con, $sql1);
?>
<div class="row g-6 g-xl-9 mt-1" id="card_proyectos">
<?php 
// Inicializar un array para almacenar los datos de los usuarios del proyecto
$dataUsuario3Array = array();

// Iterar sobre los resultados de la consulta anterior
while ($dataUsuario2 = mysqli_fetch_array($query2)) {
    $idProyecto = $dataUsuario2['id']; // Almacenar el ID del proyecto
    $hasData = true; // Indicar que hay datos disponibles

    
    // Consulta SQL para seleccionar toda la información de los proyectos y usuarios asociados
    $sql3 = "SELECT * FROM proyectos 
    JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto 
    LEFT JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id 
    WHERE proyectosInfo.idProyecto = '$idProyecto' AND proyectosInfo.estado='1';";
    
    // Ejecutar la consulta y almacenar el resultado
    $query3 = mysqli_query($con, $sql3);
    
    // Almacenar los datos de la consulta en el array, agrupados por ID de proyecto
    $dataUsuario3Array[$idProyecto] = array();
    while ($dataUsuario3 = mysqli_fetch_array($query3)) {
        $dataUsuario3Array[$idProyecto][] = $dataUsuario3;
    }
    ?>

    <div class="col-md-6 col-xl-4 mt-2" style="border-radius: 12px;">
        <a href="proyectos/recursos.php?idProyecto=<?php echo $dataUsuario2['id']; ?>"
            class="card border-hover-primary">
            <div class="card-header border-0 pt-9 pb-0">
                <div class="card-title m-0">
                    <div class="fs-3 fw-bold text-gray-900">
                        <?php echo strtoupper($dataUsuario2['nombre']); ?>
                    </div>
                </div>

                <div class="card-toolbar">
                    <?php if ($dataUsuario2['estado'] == "1") { ?>
                    <span class="badge badge-light-warning fw-bold me-auto px-4 py-3">En progreso</span>
                    <?php } else { ?>
                    <span class="badge badge-light-success fw-bold me-auto px-4 py-3">Finalizado</span>
                    <?php } ?>

                </div>
            </div>
            <?php 
                $fechaInicio = $dataUsuario2['fechaInicio'];
                $fechaInicioF = date('d/m/Y', strtotime($fechaInicio));
                $fechaFin = $dataUsuario2['fechaFin'];
                $fechaFinF = date('d/m/Y', strtotime($fechaFin));
                ?>
            <div class="card-body pt-1">
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    <?php echo $dataUsuario2['descripcion']; ?></p>
                <div class="d-flex flex-wrap mb-5">
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold"><?php echo $fechaInicioF?></div>
                        <div class="fw-semibold text-gray-500">Fecha de Inicio</div>
                    </div>
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold"><?php echo $fechaFinF?></div>
                        <div class="fw-semibold text-gray-500">Fecha limite</div>
                    </div>
                </div>
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 50% completed"
                    data-bs-original-title="This project 50% completed" data-kt-initialized="1">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow=" 50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="symbol-group symbol-hover">
                    <?php 
                        foreach ($dataUsuario3Array[$idProyecto] as $dataUsuario3) { ?>
                    <?php if ($dataUsuario3['imagen'] != "blank.png") { ?>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        aria-label="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                        data-bs-original-title="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                        data-kt-initialized="1">
                        <img alt="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                            src="assets/media/avatars/<?php echo $dataUsuario3['imagen']; ?>">
                    </div>
                    <?php } else { ?>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        aria-label="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                        data-bs-original-title="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                        data-kt-initialized="1">
                        <span
                            class="symbol-label bg-dark text-inverse-primary fw-bold"><?php echo substr($dataUsuario3['nombres'], 0, 1); ?><?php echo substr($dataUsuario3['apellidos'], 0, 1); ?></span>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </a>
    </div>
    <?php }?>
    </div>
    <?php 
    if (!$hasData) {
        ?>
            <!-- Contenido mostrado si no hay proyectos -->
            <div class="row g-6 g-xl-9" id="card_proyectos">
                No tienes proyectos
            </div>
        <?php 
        } // Fin del if
        ?>
<?php } else { 
// Incluir el archivo de configuración que contiene la conexión a la base de datos
include('../config.php');

// Consulta SQL para seleccionar proyectos junto con información adicional y usuarios asociados al proyecto
$sql1 = "SELECT proyectos.id, proyectos.nombre, proyectos.fechaInicio, proyectos.fechaFin, proyectos.descripcion, proyectos.fechaCreacion, proyectos.estado, proyectosInfo.tipo, proyectosInfo.fechaAdd, proyectosInfo.fechaEstado, proyectosInfo.idProyecto, GROUP_CONCAT(proyectosInfo.idUsuario) AS idUsuarios
FROM proyectos
JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto
GROUP BY proyectos.id";

// Ejecutar la consulta en la base de datos y almacenar el resultado
$query2 = mysqli_query($con, $sql1);
?>
<div class="row g-6 g-xl-9 mt-1" id="card_proyectos">
<?php 
// Inicializar un array para almacenar los datos de los usuarios del proyecto
$dataUsuario3Array = array();

// Iterar sobre los resultados de la consulta anterior
while ($dataUsuario2 = mysqli_fetch_array($query2)) {
    $idProyecto = $dataUsuario2['id']; // Almacenar el ID del proyecto
    $hasData = true; // Indicar que hay datos disponibles

    
    // Consulta SQL para seleccionar toda la información de los proyectos y usuarios asociados
    $sql3 = "SELECT * FROM proyectos 
    JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto 
    LEFT JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id 
    WHERE proyectosInfo.idProyecto = '$idProyecto' AND proyectosInfo.estado='1';";
    
    // Ejecutar la consulta y almacenar el resultado
    $query3 = mysqli_query($con, $sql3);
    
    // Almacenar los datos de la consulta en el array, agrupados por ID de proyecto
    $dataUsuario3Array[$idProyecto] = array();
    while ($dataUsuario3 = mysqli_fetch_array($query3)) {
        $dataUsuario3Array[$idProyecto][] = $dataUsuario3;
    }
    ?>

    <div class="col-md-6 col-xl-4 mt-2" style="border-radius: 12px;">
        <a href="proyectos/recursos.php?idProyecto=<?php echo $dataUsuario2['id']; ?>"
            class="card border-hover-primary">
            <div class="card-header border-0 pt-9 pb-0">
                <div class="card-title m-0">
                    <div class="fs-3 fw-bold text-gray-900">
                        <?php echo strtoupper($dataUsuario2['nombre']); ?>
                    </div>
                </div>

                <div class="card-toolbar">
                    <?php if ($dataUsuario2['estado'] == "1") { ?>
                    <span class="badge badge-light-warning fw-bold me-auto px-4 py-3">En progreso</span>
                    <?php } else { ?>
                    <span class="badge badge-light-success fw-bold me-auto px-4 py-3">Finalizado</span>
                    <?php } ?>

                </div>
            </div>
            <?php 
                $fechaInicio = $dataUsuario2['fechaInicio'];
                $fechaInicioF = date('d/m/Y', strtotime($fechaInicio));
                $fechaFin = $dataUsuario2['fechaFin'];
                $fechaFinF = date('d/m/Y', strtotime($fechaFin));
                ?>
            <div class="card-body pt-1">
                <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
                    <?php echo $dataUsuario2['descripcion']; ?></p>
                <div class="d-flex flex-wrap mb-5">
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold"><?php echo $fechaInicioF?></div>
                        <div class="fw-semibold text-gray-500">Fecha de Inicio</div>
                    </div>
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                        <div class="fs-6 text-gray-800 fw-bold"><?php echo $fechaFinF?></div>
                        <div class="fw-semibold text-gray-500">Fecha limite</div>
                    </div>
                </div>
                <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 50% completed"
                    data-bs-original-title="This project 50% completed" data-kt-initialized="1">
                    <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow=" 50"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="symbol-group symbol-hover">
                    <?php 
                        foreach ($dataUsuario3Array[$idProyecto] as $dataUsuario3) { ?>
                    <?php if ($dataUsuario3['imagen'] != "blank.png") { ?>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        aria-label="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                        data-bs-original-title="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                        data-kt-initialized="1">
                        <img alt="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                            src="assets/media/avatars/<?php echo $dataUsuario3['imagen']; ?>">
                    </div>
                    <?php } else { ?>
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                        aria-label="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                        data-bs-original-title="<?php echo $dataUsuario3['nombres']; ?> <?php echo $dataUsuario3['apellidos']; ?>"
                        data-kt-initialized="1">
                        <span
                            class="symbol-label bg-dark text-inverse-primary fw-bold"><?php echo substr($dataUsuario3['nombres'], 0, 1); ?><?php echo substr($dataUsuario3['apellidos'], 0, 1); ?></span>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </a>
    </div>
    
    <?php }?>
    </div>
    <?php 
    if (!$hasData) {
        ?>
            <!-- Contenido mostrado si no hay proyectos -->
            <div class="row g-6 g-xl-9" id="card_proyectos">
                No tienes proyectos
            </div>
        <?php 
        } // Fin del if
        ?>

<?php } ?>