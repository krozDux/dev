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
                        <div class="d-flex mb-4">
                            <button class="btn btn-sm btn-bg-light btn-active-color-primary me-3 modal-trabajo"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_new_user">Agregar miembro</button>
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
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Table header-->
            <div class="d-flex flex-stack">
                <!--begin::Folder path-->
                <div class="badge badge-lg badge-light-primary">
                    <div class="d-flex align-items-center flex-wrap">
                        <i class="ki-duotone ki-abstract-32 fs-2 text-primary me-3"><span class="path1"></span><span
                                class="path2"></span></i> <a href="/../proyectos/recursos?idProyecto=<?php echo $idProyecto ?>"><?php echo strtoupper($nombreProyecto);?></a>
                        <i class="fas fa-angle-right fs-2 text-primary mx-1"></i> <a href="/../proyectos/tareas?idProyecto=<?php echo $idProyecto ?>">TAREAS</a>
                    </div>
                </div>

                <div class="badge badge-lg badge-primary">
                    <span id="kt_file_manager_items_counter">82 items</span>
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
                                                style="width: 628.188px;">Name</th>
                                            <th class="min-w-10px sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 144.391px;">Size</th>
                                            <th class="min-w-125px sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 381.281px;">Last Modified</th>
                                            <th class="w-125px sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 125px;"></th>
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
                                        <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 29.8906px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                        data-kt-check-target="#kt_file_manager_list .form-check-input"
                                                        value="1">
                                                </div>
                                            </div>
                                        </th>
                                        <th class="min-w-250px sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 628.188px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Name
                                            </div>
                                        </th>
                                        <th class="min-w-10px sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 144.391px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Size
                                            </div>
                                        </th>
                                        <th class="min-w-125px sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 381.281px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Last
                                                Modified</div>
                                        </th>
                                        <th class="w-125px sorting_disabled" rowspan="1" colspan="1"
                                            style="width: 125px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                            <div class="dataTables_sizing" style="height: 0px; overflow: hidden;"></div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="fw-semibold text-gray-600">
                                    <tr class="odd">
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="1">
                                            </div>
                                        </td>
                                        <td data-order="account">
                                            <div class="d-flex align-items-center">
                                                <span class="icon-wrapper"><i
                                                        class="fas fa-folder-open fs-2x text-primary me-4"><span
                                                            class="path1"></span><span class="path2"></span></i></span>
                                                <a href="/metronic8/demo14/?page=apps/file-manager/files/"
                                                    class="text-gray-800 text-hover-primary">account</a>
                                            </div>
                                        </td>
                                        <td>-</td>
                                        <td data-order="Invalid date">-</td>
                                        <td class="text-end" data-kt-filemanager-table="action_dropdown">
                                            <div class="d-flex justify-content-end">
                                                <!--begin::Share link-->
                                                <div class="ms-2" data-kt-filemanger-table="copy_link">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">
                                                        <i class="ki-duotone ki-fasten fs-5 m-0"><span
                                                                class="path1"></span><span class="path2"></span></i>
                                                    </button>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-300px"
                                                        data-kt-menu="true">
                                                        <!--begin::Card-->
                                                        <div class="card card-flush">
                                                            <div class="card-body p-5">
                                                                <!--begin::Loader-->
                                                                <div class="d-flex"
                                                                    data-kt-filemanger-table="copy_link_generator">
                                                                    <!--begin::Spinner-->
                                                                    <div class="me-5" data-kt-indicator="on">
                                                                        <span class="indicator-progress">
                                                                            <span
                                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                                        </span>
                                                                    </div>
                                                                    <!--end::Spinner-->

                                                                    <!--begin::Label-->
                                                                    <div class="fs-6 text-gray-900">Generating Share
                                                                        Link...</div>
                                                                    <!--end::Label-->
                                                                </div>
                                                                <!--end::Loader-->

                                                                <!--begin::Link-->
                                                                <div class="d-flex flex-column text-start d-none"
                                                                    data-kt-filemanger-table="copy_link_result">
                                                                    <div class="d-flex mb-3">
                                                                        <i
                                                                            class="ki-duotone ki-check fs-2 text-success me-3"></i>
                                                                        <div class="fs-6 text-gray-900">Share Link
                                                                            Generated</div>
                                                                    </div>
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        value="https://path/to/file/or/folder/">
                                                                    <div class="text-muted fw-normal mt-2 fs-8 px-3">
                                                                        Read only. <a
                                                                            href="/metronic8/demo14/?page=apps/file-manager/settings/"
                                                                            class="ms-2">Change permissions</a></div>
                                                                </div>
                                                                <!--end::Link-->
                                                            </div>
                                                        </div>
                                                        <!--end::Card-->
                                                    </div>
                                                    <!--end::Menu-->
                                                    <!--end::Share link-->
                                                </div>

                                                <!--begin::More-->
                                                <div class="ms-2">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">
                                                        <i class="ki-duotone ki-dots-square fs-5 m-0"><span
                                                                class="path1"></span><span class="path2"></span><span
                                                                class="path3"></span><span class="path4"></span></i>
                                                    </button>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                                        data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="/metronic8/demo14/?page=apps/file-manager/files"
                                                                class="menu-link px-3">
                                                                View
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"
                                                                data-kt-filemanager-table="rename">
                                                                Rename
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3">
                                                                Download Folder
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link px-3"
                                                                data-kt-filemanager-table-filter="move_row"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_move_to_folder">
                                                                Move to folder
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->

                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="#" class="menu-link text-danger px-3"
                                                                data-kt-filemanager-table-filter="delete_row">
                                                                Delete
                                                            </a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                    </div>
                                                    <!--end::Menu-->
                                                    <!--end::More-->
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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