<?php
include('../config.php');
$sql1 = ("SELECT proyectos.id, proyectos.nombre, proyectos.fechaInicio, proyectos.fechaFin, proyectos.descripcion, proyectos.fechaCreacion, proyectos.estado, proyectosInfo.tipo, proyectosInfo.fechaAdd, proyectosInfo.fechaEstado, proyectosInfo.idProyecto, GROUP_CONCAT(proyectosInfo.idUsuario) AS idUsuarios
FROM proyectos
JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto where proyectos.id= '$idProyecto'
GROUP BY proyectos.id");
$query1 = mysqli_query($con, $sql1);
?>
<div class="content flex-column-fluid" id="kt_content">
    <?php 
    $dataUsuario3Array = array(); // Array para almacenar los datos de $query3
    while ($dataUsuario1 = mysqli_fetch_array($query1)) {
        include('../config.php');
        $sql3 = ("SELECT * FROM proyectos JOIN proyectosInfo ON proyectos.id = proyectosInfo.idProyecto LEFT JOIN usuarios ON proyectosInfo.idUsuario = usuarios.id WHERE proyectosInfo.idProyecto = '$idProyecto' AND proyectosInfo.estado='1';");
        $query3 = mysqli_query($con, $sql3);
        // Almacenar los datos de $query3 en el array
        $dataUsuario3Array[$idProyecto] = array();
        while ($dataUsuario3 = mysqli_fetch_array($query3)) {
            $dataUsuario3Array[$idProyecto][] = $dataUsuario3;
        }
    ?>
    <div class="card mb-6 mb-xl-9">
        <div class="card-body pt-9 pb-0">
            <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-1">
                                <a
                                    class="text-gray-800 text-hover-primary fs-2 fw-bold me-3"><?php echo strtoupper($dataUsuario1['nombre']);?></a>
                                <?php 
									if ($dataUsuario1['estado'] == "1") { ?>
                                <span class="badge badge-light-warning me-auto">En progreso</span>
                                <?php } else { ?>
                                <span class="badge badge-light-success me-auto">Finalizado</span>
                                <?php } ?>
                            </div>
                            <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">
                                <?php 
									if ($dataUsuario1['descripcion'] != "") { ?>
                                <?php echo $dataUsuario1['descripcion']; ?>
                                <?php } else { ?>
                                -
                                <?php } ?>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <button class="btn btn-sm btn-bg-light btn-active-color-primary me-3 modal-trabajo"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_new_user">Agregar tarea</button>
                            <a class="btn btn-sm btn-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_user">Agregar usuario</a>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap justify-content-start">
                        <div class="d-flex flex-wrap">
                            <?php 
                        $fechaInicio = $dataUsuario1['fechaInicio'];
                        $fechaInicioF = date('d/m/Y', strtotime($fechaInicio));
                        $fechaFin = $dataUsuario1['fechaFin'];
                        $fechaFinF = date('d/m/Y', strtotime($fechaFin));
                        ?>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold"><?php echo $fechaInicioF?></div>
                                </div>

                                <div class="fw-semibold fs-6 text-gray-500">Fecha inicio</div>
                            </div>

                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold"><?php echo $fechaFinF?></div>
                                </div>

                                <div class="fw-semibold fs-6 text-gray-500">Fecha límite</div>
                            </div>
                            <?php
                        $totaldocs = 0;
                        $sql15 = "SELECT GROUP_CONCAT(tareasInfo.idUsuario SEPARATOR ',') AS idUsuarios, 
                                        proyectosTareas.id,
                                        proyectosTareas.nombre,
                                        proyectosTareas.estado,
                                        proyectosTareas.fechaFin,
                                        tareasInfo.idTarea, 
                                        proyectosTareas.idProyecto 
                                FROM tareasInfo 
                                JOIN proyectosTareas ON tareasInfo.idTarea = proyectosTareas.id 
                                WHERE proyectosTareas.idProyecto = '$idProyecto'
                                GROUP BY proyectosTareas.id;";
                        $query15 = mysqli_query($con, $sql15);
                        if ($query15) {
                            $totaldocs = mysqli_num_rows($query15); // Contamos el total de registros
                        }
                        ?>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="ki-duotone ki-arrow-down fs-3 text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    <div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="75"
                                        data-kt-initialized="1"><?php echo $totaldocs ?></div>
                                </div>

                                <div class="fw-semibold fs-6 text-gray-500">Documentos adjuntos</div>
                            </div>
                        </div>
                        <div class="symbol-group symbol-hover mb-3">
                            <?php foreach ($dataUsuario3Array[$dataUsuario1['id']] as $dataUsuario3) {
                                if ($dataUsuario3['imagen'] != "blank.png") {
                                    echo '<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            title="' . $dataUsuario3['nombres'] . ' ' . $dataUsuario3['apellidos'] . '">
                                            <img src="assets/media/avatars/' . $dataUsuario3['imagen'] . '" alt="user-image">
                                        </div>';
                                } else {
                                    $iniciales = substr($dataUsuario3['nombres'], 0, 1) . substr($dataUsuario3['apellidos'], 0, 1);
                                    echo '<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                            title="' . $dataUsuario3['nombres'] . ' ' . $dataUsuario3['apellidos'] . '">
                                            <span class="symbol-label bg-dark text-inverse-primary fw-bold">' . $iniciales . '</span>
                                        </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator"></div>
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 "
                        href="/../proyectos/recursos?idProyecto=<?php echo $idProyecto ?>">
                        Información </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 active"
                        href="/../proyectos/tareas?idProyecto=<?php echo $idProyecto ?>">
                        Tareas </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 "
                        href="/../proyectos/miembros?idProyecto=<?php echo $idProyecto ?>">
                        Miembros </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 "
                        href="/../proyectos/archivos?idProyecto=<?php echo $idProyecto ?>">
                        Archivos </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 "
                        href="/../proyectos/actividad?idProyecto=<?php echo $idProyecto ?>">
                        Actividad </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 "
                        href="/../proyectos/configuracion?idProyecto=<?php echo $idProyecto ?>">
                        Configuración </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div id="kt_project_targets_card_pane" class="tab-pane fade show active">
            <div class="row g-9">
                <div class="col-md-4 col-lg-12 col-xl-4">
                    <div class="mb-9">
                        <div class="d-flex flex-stack">
                            <?php
                        include('../config.php');

                        // Variables para contar los diferentes estados
                        $progreso = 0;
                        $finalizados = 0;
                        $retraso = 0;
                        $totalreg = 0;
                        // Fecha actual
                        $fechaActual = new DateTime();
                        $sql14 = "SELECT
                        GROUP_CONCAT(tareasInfo.idUsuario SEPARATOR ',') AS idUsuarios,
                        proyectosTareas.id,
                        proyectosTareas.nombre,
                        proyectosTareas.estado,
                        proyectosTareas.fechaFin,
                        tareasInfo.idTarea,
                        proyectosTareas.idProyecto,
                        CASE
                            WHEN proyectosTareas.fechaFin < CURDATE() THEN 2
                            ELSE 1
                        END AS verificacion
                    FROM
                        tareasInfo
                    JOIN proyectosTareas ON tareasInfo.idTarea = proyectosTareas.id
                    WHERE
                        proyectosTareas.idProyecto = '$idProyecto'
                        AND tareasInfo.idUsuario = '$session_id'
                    GROUP BY proyectosTareas.id;";
                        $query14 = mysqli_query($con, $sql14);
                        if ($query14) {
                            $totalreg = mysqli_num_rows($query14); // Contamos el total de registros
                            while ($tarea = mysqli_fetch_assoc($query14)) {
                                // Incrementamos según el estado
                                if ($tarea['estado'] == '1') {
                                    $progreso++;
                                    // Comparamos la fecha de finalización con la fecha actual para ver si está retrasada
                                    $fechaFin = new DateTime($tarea['fechaFin']);
                                    if ($fechaFin < $fechaActual) {
                                        $retraso++;
                                    }
                                } elseif ($tarea['estado'] == '2') {
                                    $finalizados++;
                                }
                            }
                        }
                        ?>
                            <div class="fw-bolder fs-4">Destiempo
                                <span class="fs-6 text-gray-400 ms-2"><?php echo $retraso; ?></span>
                            </div>

                        </div>
                        <div class="h-3px w-100 bg-danger"></div>
                    </div>
                    <?php
                        include('../config.php');
                        $sql15 = "SELECT *
                        FROM (
                            SELECT
                                tareasInfo.idUsuario,
                                proyectosTareas.id,
                                proyectosTareas.nombre,
                                proyectosTareas.estado,
                                proyectosTareas.fechaFin,
                                tareasInfo.idTarea,
                                proyectosTareas.idProyecto,
                                CASE
                                    WHEN proyectosTareas.fechaFin < CURDATE() THEN 2
                                    ELSE 1
                                END AS verificacion
                            FROM
                                tareasInfo
                            JOIN proyectosTareas ON tareasInfo.idTarea = proyectosTareas.id
                            WHERE
                                proyectosTareas.idProyecto = '$idProyecto'
                                AND tareasInfo.idUsuario = '$session_id'
                            	AND proyectosTareas.estado = 1
                        ) AS subconsulta
                        WHERE
                            verificacion = 2;";
                        $query15 = mysqli_query($con, $sql15);
                        ?>
                    <?php 
												$i = 1;
												while ($dataUsuario15 = mysqli_fetch_array($query15)) { 
                                                    $fecha = $dataUsuario15['fechaFin'];
                                                    setlocale(LC_TIME, 'es_ES'); // Establecer la configuración regional a español
                                                    $fechaFormateada = strftime("%d de %B del %Y", strtotime($fecha));
                                                    if ($dataUsuario15['verificacion'] == '2' AND $dataUsuario16['estado'] != '2') { ?>
                    <div class="card mb-6 mb-xl-9">
                        <div class="card-body">
                            <div class="d-flex flex-stack mb-1">
                                <div class="badge badge-light"><?php echo $fechaFormateada; ?></div>
                                <div>
                                    <button type="button"
                                        class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor">
                                                    </rect>
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor"
                                                        opacity="0.3"></rect>
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor"
                                                        opacity="0.3"></rect>
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor"
                                                        opacity="0.3"></rect>
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">OPCIONES
                                            </div>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Agregar documento</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fs-4 fw-bolder mt-1 mb-1 text-gray-900 text-hover-primary"><?php echo $dataUsuario15['nombre']; ?></div>
                            <div class="d-flex flex-stack flex-wrapr">
                                <div class="d-flex my-1">
                                    <div class="border border-dashed border-gray-300 rounded py-2 px-3">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M4.425 20.525C2.525 18.625 2.525 15.525 4.425 13.525L14.825 3.125C16.325 1.625 18.825 1.625 20.425 3.125C20.825 3.525 20.825 4.12502 20.425 4.52502C20.025 4.92502 19.425 4.92502 19.025 4.52502C18.225 3.72502 17.025 3.72502 16.225 4.52502L5.82499 14.925C4.62499 16.125 4.62499 17.925 5.82499 19.125C7.02499 20.325 8.82501 20.325 10.025 19.125L18.425 10.725C18.825 10.325 19.425 10.325 19.825 10.725C20.225 11.125 20.225 11.725 19.825 12.125L11.425 20.525C9.525 22.425 6.425 22.425 4.425 20.525Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M9.32499 15.625C8.12499 14.425 8.12499 12.625 9.32499 11.425L14.225 6.52498C14.625 6.12498 15.225 6.12498 15.625 6.52498C16.025 6.92498 16.025 7.525 15.625 7.925L10.725 12.8249C10.325 13.2249 10.325 13.8249 10.725 14.2249C11.125 14.6249 11.725 14.6249 12.125 14.2249L19.125 7.22493C19.525 6.82493 19.725 6.425 19.725 5.925C19.725 5.325 19.525 4.825 19.125 4.425C18.725 4.025 18.725 3.42498 19.125 3.02498C19.525 2.62498 20.125 2.62498 20.525 3.02498C21.325 3.82498 21.725 4.825 21.725 5.925C21.725 6.925 21.325 7.82498 20.525 8.52498L13.525 15.525C12.325 16.725 10.525 16.725 9.32499 15.625Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span class="ms-1 fs-7 fw-bolder text-gray-600">DOCUMENTOS ADJUNTOS</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
                </div>
                <div class="col-md-4 col-lg-12 col-xl-4">
                    <div class="mb-9">
                        <div class="d-flex flex-stack">
                            <div class="fw-bolder fs-4">Pendiente
                                <span class="fs-6 text-gray-400 ms-2"><?php echo ($progreso-$retraso); ?></span>
                            </div>
                        </div>
                        <div class="h-3px w-100 bg-warning"></div>
                    </div>
                    <?php
                        include('../config.php');
                        $sql16 = "SELECT *
                        FROM (
                            SELECT
                                tareasInfo.idUsuario,
                                proyectosTareas.id,
                                proyectosTareas.nombre,
                                proyectosTareas.estado,
                                proyectosTareas.fechaFin,
                                tareasInfo.idTarea,
                                proyectosTareas.idProyecto,
                                CASE
                                    WHEN proyectosTareas.fechaFin < CURDATE() THEN 2
                                    ELSE 1
                                END AS verificacion
                            FROM
                                tareasInfo
                            JOIN proyectosTareas ON tareasInfo.idTarea = proyectosTareas.id
                            WHERE
                                proyectosTareas.idProyecto = '$idProyecto'
                                AND tareasInfo.idUsuario = '$session_id'
                        ) AS subconsulta
                        WHERE
                            verificacion = 1;";
                        $query16 = mysqli_query($con, $sql16);
                        ?>
                    <?php 
												$i = 1;
												while ($dataUsuario16 = mysqli_fetch_array($query16)) { 
                                                    $fecha = $dataUsuario16['fechaFin'];
                                                    setlocale(LC_TIME, 'es_ES'); // Establecer la configuración regional a español
                                                    $fechaFormateada = strftime("%d de %B del %Y", strtotime($fecha));
                                                    if ($dataUsuario16['verificacion'] == '1' and $dataUsuario16['estado'] != '2') { ?>
                    <div class="card mb-6 mb-xl-9">
                        <div class="card-body">
                            <div class="d-flex flex-stack mb-1">
                                <div class="badge badge-light"><?php echo $fechaFormateada; ?></div>
                                <div>
                                    <button type="button"
                                        class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor">
                                                    </rect>
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor"
                                                        opacity="0.3"></rect>
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor"
                                                        opacity="0.3"></rect>
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor"
                                                        opacity="0.3"></rect>
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">OPCIONES
                                            </div>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Agregar documento</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fs-4 fw-bolder mt-1 mb-1 text-gray-900 text-hover-primary"><?php echo $dataUsuario16['nombre']; ?></div>
                            <div class="d-flex flex-stack flex-wrapr">
                                <div class="d-flex my-1">
                                    <div class="border border-dashed border-gray-300 rounded py-2 px-3">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M4.425 20.525C2.525 18.625 2.525 15.525 4.425 13.525L14.825 3.125C16.325 1.625 18.825 1.625 20.425 3.125C20.825 3.525 20.825 4.12502 20.425 4.52502C20.025 4.92502 19.425 4.92502 19.025 4.52502C18.225 3.72502 17.025 3.72502 16.225 4.52502L5.82499 14.925C4.62499 16.125 4.62499 17.925 5.82499 19.125C7.02499 20.325 8.82501 20.325 10.025 19.125L18.425 10.725C18.825 10.325 19.425 10.325 19.825 10.725C20.225 11.125 20.225 11.725 19.825 12.125L11.425 20.525C9.525 22.425 6.425 22.425 4.425 20.525Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M9.32499 15.625C8.12499 14.425 8.12499 12.625 9.32499 11.425L14.225 6.52498C14.625 6.12498 15.225 6.12498 15.625 6.52498C16.025 6.92498 16.025 7.525 15.625 7.925L10.725 12.8249C10.325 13.2249 10.325 13.8249 10.725 14.2249C11.125 14.6249 11.725 14.6249 12.125 14.2249L19.125 7.22493C19.525 6.82493 19.725 6.425 19.725 5.925C19.725 5.325 19.525 4.825 19.125 4.425C18.725 4.025 18.725 3.42498 19.125 3.02498C19.525 2.62498 20.125 2.62498 20.525 3.02498C21.325 3.82498 21.725 4.825 21.725 5.925C21.725 6.925 21.325 7.82498 20.525 8.52498L13.525 15.525C12.325 16.725 10.525 16.725 9.32499 15.625Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span class="ms-1 fs-7 fw-bolder text-gray-600">DOCUMENTOS ADJUNTOS</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }}?>
                </div>
                <div class="col-md-4 col-lg-12 col-xl-4">
                    <div class="mb-9">
                        <div class="d-flex flex-stack">
                            <div class="fw-bolder fs-4">Completado
                                <span class="fs-6 text-gray-400 ms-2"><?php echo ($finalizados); ?></span>
                            </div>
                        </div>
                        <div class="h-3px w-100 bg-success"></div>
                    </div>
                    <?php
                        include('../config.php');
                        $sql17 = "SELECT
                                tareasInfo.idUsuario,
                                proyectosTareas.id,
                                proyectosTareas.nombre,
                                proyectosTareas.estado,
                                proyectosTareas.fechaFin,
                                tareasInfo.idTarea,
                                proyectosTareas.idProyecto,
                                CASE
                                    WHEN proyectosTareas.fechaFin < CURDATE() THEN 2
                                    ELSE 1
                                END AS verificacion
                            FROM
                                tareasInfo
                            JOIN proyectosTareas ON tareasInfo.idTarea = proyectosTareas.id
                            WHERE
                                proyectosTareas.idProyecto = '$idProyecto'
                                AND tareasInfo.idUsuario = '$session_id'";
                        $query17 = mysqli_query($con, $sql17);
                        ?>
                    <?php 
												$i = 1;
												while ($dataUsuario17 = mysqli_fetch_array($query17)) { 
                                                    $fecha = $dataUsuario17['fechaFin'];
                                                    setlocale(LC_TIME, 'es_ES'); // Establecer la configuración regional a español
                                                    $fechaFormateada = strftime("%d de %B del %Y", strtotime($fecha));
                                                    if ($dataUsuario17['estado'] == '2') { ?>
                    <div class="card mb-6 mb-xl-9">
                        <div class="card-body">
                            <div class="d-flex flex-stack mb-1">
                                <div class="badge badge-light"><?php echo $fechaFormateada; ?></div>
                                <div>
                                    <button type="button"
                                        class="btn btn-sm btn-icon btn-color-light-dark btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                        <span class="svg-icon svg-icon-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                viewBox="0 0 24 24">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="5" y="5" width="5" height="5" rx="1" fill="currentColor">
                                                    </rect>
                                                    <rect x="14" y="5" width="5" height="5" rx="1" fill="currentColor"
                                                        opacity="0.3"></rect>
                                                    <rect x="5" y="14" width="5" height="5" rx="1" fill="currentColor"
                                                        opacity="0.3"></rect>
                                                    <rect x="14" y="14" width="5" height="5" rx="1" fill="currentColor"
                                                        opacity="0.3"></rect>
                                                </g>
                                            </svg>
                                        </span>
                                    </button>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                        data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">OPCIONES
                                            </div>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Agregar documento</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="fs-4 fw-bolder mt-1 mb-1 text-gray-900 text-hover-primary"><?php echo $dataUsuario17['nombre']; ?></div>
                            <div class="d-flex flex-stack flex-wrapr">
                                <div class="d-flex my-1">
                                    <div class="border border-dashed border-gray-300 rounded py-2 px-3">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M4.425 20.525C2.525 18.625 2.525 15.525 4.425 13.525L14.825 3.125C16.325 1.625 18.825 1.625 20.425 3.125C20.825 3.525 20.825 4.12502 20.425 4.52502C20.025 4.92502 19.425 4.92502 19.025 4.52502C18.225 3.72502 17.025 3.72502 16.225 4.52502L5.82499 14.925C4.62499 16.125 4.62499 17.925 5.82499 19.125C7.02499 20.325 8.82501 20.325 10.025 19.125L18.425 10.725C18.825 10.325 19.425 10.325 19.825 10.725C20.225 11.125 20.225 11.725 19.825 12.125L11.425 20.525C9.525 22.425 6.425 22.425 4.425 20.525Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M9.32499 15.625C8.12499 14.425 8.12499 12.625 9.32499 11.425L14.225 6.52498C14.625 6.12498 15.225 6.12498 15.625 6.52498C16.025 6.92498 16.025 7.525 15.625 7.925L10.725 12.8249C10.325 13.2249 10.325 13.8249 10.725 14.2249C11.125 14.6249 11.725 14.6249 12.125 14.2249L19.125 7.22493C19.525 6.82493 19.725 6.425 19.725 5.925C19.725 5.325 19.525 4.825 19.125 4.425C18.725 4.025 18.725 3.42498 19.125 3.02498C19.525 2.62498 20.125 2.62498 20.525 3.02498C21.325 3.82498 21.725 4.825 21.725 5.925C21.725 6.925 21.325 7.82498 20.525 8.52498L13.525 15.525C12.325 16.725 10.525 16.725 9.32499 15.625Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <span class="ms-1 fs-7 fw-bolder text-gray-600">DOCUMENTOS ADJUNTOS</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }}?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>