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
        $nombreProyecto = $dataUsuario1['nombre'];
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
                        $sqlArchivosT = ("SELECT proyectosTareas.nombre,proyectosDocumentos.fechaAdd,proyectosDocumentos.documento,proyectosDocumentos.extension,proyectosDocumentos.link FROM `proyectosTareas` INNER JOIN proyectosDocumentos ON proyectosTareas.id = proyectosDocumentos.idProyectoTarea  WHERE proyectosTareas.idProyecto = '$idProyecto';");
                        $queryArchivosT = mysqli_query($con, $sqlArchivosT);
                        if ($queryArchivosT) {
                            $totalArchivosT = mysqli_num_rows($queryArchivosT); // Contamos el total de registros
                        }?>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="ki-duotone ki-arrow-down fs-3 text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    <div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="75"
                                        data-kt-initialized="1"><?php echo $totalArchivosT ?></div>
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
                            }}
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator"></div>
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6"
                        href="/../proyectos/recursos?idProyecto=<?php echo $idProyecto ?>">
                        Información </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6"
                        href="/../proyectos/tareas?idProyecto=<?php echo $idProyecto ?>">
                        Tareas </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6"
                        href="/../proyectos/miembros?idProyecto=<?php echo $idProyecto ?>">
                        Miembros </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 active"
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
    <div class="card card-flush">
        <div class="card-body">
            <div class="d-flex flex-stack">
                <div class="badge badge-lg badge-light-primary">
                    <div class="d-flex align-items-center flex-wrap">
                        <i class="ki-duotone ki-abstract-32 fs-2 text-primary me-3"><span class="path1"></span><span
                                class="path2"></span></i> <a
                            href="/../proyectos/recursos?idProyecto=<?php echo $idProyecto ?>"><?php echo strtoupper($nombreProyecto);?></a>
                        <i class="fas fa-angle-right fs-2 text-primary mx-1"></i> <a
                            href="/../proyectos/tareas?idProyecto=<?php echo $idProyecto ?>">TAREAS</a>
                    </div>
                </div>
                <?php
                        include('../config.php');
                        $sqlArchivosS = ("SELECT * FROM proyectosTareas WHERE idProyecto = '$idProyecto';");
                        $queryArchivosS = mysqli_query($con, $sqlArchivosS);
                        if ($queryArchivosS) {
                            $totalArchivosS = mysqli_num_rows($queryArchivosS); // Contamos el total de registros
                        }?>
                <div class="badge badge-lg badge-primary">
                    <span id="kt_file_manager_items_counter"><?php echo $totalArchivosS; ?> carpetas</span>
                </div>
            </div>

            <div id="kt_file_manager_list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <div class="dataTables_scroll">
                        <div class="dataTables_scrollHead"
                            style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                            <div class="dataTables_scrollHeadInner"
                                style="box-sizing: content-box; width: 1383.5px; padding-right: 5px;">
                                <table data-kt-filemanager-table="folders"
                                    class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                    style="margin-left: 0px; width: 1383.5px;">
                                    <thead>
                                        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-250px sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 628.188px;">NOMBRE</th>
                                            <th class="min-w-10px sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 200.391px;">CREACIÓN</th>
                                            <th class="min-w-125px sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 200.391px;">ULTIMA MODIFICACIÓN</th>
                                            <th class="w-125px sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 130px;">OPCIONES</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="dataTables_scrollBody"
                            style="position: relative; overflow: auto; max-height: 700px; width: 100%;">
                            <table id="kt_file_manager_list" data-kt-filemanager-table="folders"
                                class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                style="width: 100%;">
                                <thead>
                                    <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0"
                                        style="height: 0px;">
                                        <th class="min-w-250px sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 628.188px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">NOMBRE
                                            </div>
                                        </th>
                                        <th class="min-w-10px sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 200.391px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                CREACIÓN
                                            </div>
                                        </th>
                                        <th class="min-w-125px sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 200.391px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">ULTIMA
                                                MODIFICACIÓN</div>
                                        </th>
                                        <th class="w-125px sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 200.391px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                OPCIONES</div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="fw-semibold text-gray-600">
                                    <?php
                                include('../config.php');
                                $sqlLTareas = ("SELECT 
                                pt.id, 
                                pt.nombre, 
                                pt.fechaAdd, 
                                pd.fechaAdd AS fechaMod, 
                                pd.documento, 
                                pd.extension, 
                                pd.link 
                            FROM 
                                `proyectosTareas` pt 
                            LEFT JOIN 
                                `proyectosDocumentos` pd ON pt.id = pd.idProyectoTarea 
                            LEFT JOIN 
                                (SELECT 
                                     idProyectoTarea, 
                                     MAX(fechaAdd) AS MaxFechaAdd 
                                 FROM 
                                     `proyectosDocumentos` 
                                 GROUP BY 
                                     idProyectoTarea) AS subconsulta 
                            ON 
                                pd.idProyectoTarea = subconsulta.idProyectoTarea 
                                AND pd.fechaAdd = subconsulta.MaxFechaAdd 
                            WHERE 
                                pt.idProyecto = 1 
                            GROUP BY 
                                pt.id;");
                                $queryLTareas = mysqli_query($con, $sqlLTareas);?>
                                    <?php while ($DataLTareas = mysqli_fetch_assoc($queryLTareas)) {    
                                $fecha1 = $DataLTareas['fechaAdd'];
                                $fecha2 = $DataLTareas['fechaMod'];
                                setlocale(LC_TIME, 'es_ES'); // Establecer la configuración regional a español
                                $fechaFormateada1 = strftime("%d de %B del %Y", strtotime($fecha1));
                                $fechaFormateada2 = strftime("%d de %B del %Y", strtotime($fecha2));?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="icon-wrapper"><i
                                                        class="fas fa-folder fs-2x text-primary me-4"><span
                                                            class="path1"></span><span class="path2"></span></i></span>
                                                <a
                                                    class="text-gray-800 text-hover-primary"><?php echo $DataLTareas['nombre'];?></a>
                                            </div>
                                        </td>
                                        <td><?php echo $DataLTareas['fechaAdd'];?></td>
                                        <td><?php echo $DataLTareas['fechaMod'];?></td>
                                        <td>
                                            <div class="justify-content-center">
                                                <form class="form" method="POST" enctype="multipart/form-data">
                                                    <div>
                                                    <input type="text" value="<?php echo $DataLTareas['nombre'];?>" name="nombreTarea" hidden />
                                                        <button type="submit"
                                                            class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end" name="btndescargarArchivos" value="<?php echo $DataLTareas['id'];?>">
                                                            <i class="fas fa-download fs-5 m-0"><span
                                                                    class="path1"></span><span
                                                                    class="path2"></span><span
                                                                    class="path3"></span><span class="path4"></span></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div
                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                    </div>
                    <div
                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                    </div>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
</div>