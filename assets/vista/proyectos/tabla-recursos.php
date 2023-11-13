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
                        <button class="btn btn-sm btn-bg-light btn-active-color-primary me-3 modal-trabajo" data-bs-toggle="modal" data-bs-target="#kt_modal_new_user">Add User</button>
                        <a class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_user">Add Target</a>
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

                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="ki-duotone ki-arrow-down fs-3 text-danger"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    <div class="fs-4 fw-bold counted" data-kt-countup="true" data-kt-countup-value="75"
                                        data-kt-initialized="1">75</div>
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
                    <a class="nav-link text-active-primary py-5 me-6 active"
                        href="/../proyectos/recursos?idProyecto='<?php echo $idProyecto ?>'">
                        Información </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/targets.html">
                        Tareas </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/users.html">
                        Miembros </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/files.html">
                        Archivos </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/activity.html">
                        Actividad </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/settings.html">
                        Configuración </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row gx-6 gx-xl-9">
        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Summary-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Tasks Summary</h3>

                        <div class="fs-6 fw-semibold text-gray-500">24 Overdue Tasks</div>
                    </div>
                    <!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-light btn-sm">View Tasks</a>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9 pt-5">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-wrap">
                        <!--begin::Chart-->
                        <div class="position-relative d-flex flex-center h-175px w-175px me-15 mb-7">
                            <div
                                class="position-absolute translate-middle start-50 top-50 d-flex flex-column flex-center">
                                <span class="fs-2qx fw-bold">237</span>
                                <span class="fs-6 fw-semibold text-gray-500">Total Tasks</span>
                            </div>

                            <canvas id="project_overview_chart"
                                style="display: block; box-sizing: border-box; height: 175px; width: 175px;" width="175"
                                height="175"></canvas>
                        </div>
                        <!--end::Chart-->

                        <!--begin::Labels-->
                        <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                            <!--begin::Label-->
                            <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                <div class="bullet bg-primary me-3"></div>
                                <div class="text-gray-500">Active</div>
                                <div class="ms-auto fw-bold text-gray-700">30</div>
                            </div>
                            <!--end::Label-->

                            <!--begin::Label-->
                            <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                <div class="bullet bg-success me-3"></div>
                                <div class="text-gray-500">Completed</div>
                                <div class="ms-auto fw-bold text-gray-700">45</div>
                            </div>
                            <!--end::Label-->

                            <!--begin::Label-->
                            <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                                <div class="bullet bg-danger me-3"></div>
                                <div class="text-gray-500">Overdue</div>
                                <div class="ms-auto fw-bold text-gray-700">0</div>
                            </div>
                            <!--end::Label-->

                            <!--begin::Label-->
                            <div class="d-flex fs-6 fw-semibold align-items-center">
                                <div class="bullet bg-gray-300 me-3"></div>
                                <div class="text-gray-500">Yet to start</div>
                                <div class="ms-auto fw-bold text-gray-700">25</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Labels-->
                    </div>
                    <!--end::Wrapper-->


                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6">

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1 ">
                            <!--begin::Content-->
                            <div class=" fw-semibold">

                                <div class="fs-6 text-gray-700 "><a href="#" class="fw-bold me-1">Invite New .NET
                                        Collaborators</a> to create great outstanding business to business .jsp modutr
                                    class scripts</div>
                            </div>
                            <!--end::Content-->

                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Summary-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Graph-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Tasks Over Time</h3>

                        <!--begin::Labels-->
                        <div class="fs-6 d-flex text-gray-500 fs-6 fw-semibold">
                            <!--begin::Label-->
                            <div class="d-flex align-items-center me-6">
                                <span class="menu-bullet d-flex align-items-center me-2">
                                    <span class="bullet bg-success"></span>
                                </span>
                                Complete
                            </div>
                            <!--end::Label-->

                            <!--begin::Label-->
                            <div class="d-flex align-items-center">
                                <span class="menu-bullet d-flex align-items-center me-2">
                                    <span class="bullet bg-primary"></span>
                                </span>
                                Incomplete
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Labels-->
                    </div>
                    <!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Select-->
                        <select name="status" data-control="select2" data-hide-search="true"
                            class="form-select form-select-solid form-select-sm fw-bold w-100px select2-hidden-accessible"
                            data-select2-id="select2-data-9-7xsy" tabindex="-1" aria-hidden="true"
                            data-kt-initialized="1">
                            <option value="1">2020 Q1</option>
                            <option value="2">2020 Q2</option>
                            <option value="3" selected="" data-select2-id="select2-data-11-gdab">2020 Q3</option>
                            <option value="4">2020 Q4</option>
                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr"
                            data-select2-id="select2-data-10-3rmw" style="width: 100%;"><span class="selection"><span
                                    class="select2-selection select2-selection--single form-select form-select-solid form-select-sm fw-bold w-100px"
                                    role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                    aria-disabled="false" aria-labelledby="select2-status-9y-container"
                                    aria-controls="select2-status-9y-container"><span
                                        class="select2-selection__rendered" id="select2-status-9y-container"
                                        role="textbox" aria-readonly="true" title="2020 Q3">2020 Q3</span><span
                                        class="select2-selection__arrow" role="presentation"><b
                                            role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                aria-hidden="true"></span></span>
                        <!--end::Select-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body pt-10 pb-0 px-5">
                    <!--begin::Chart-->
                    <div id="kt_project_overview_graph" class="card-rounded-bottom"
                        style="height: 300px; min-height: 315px;">
                        <div id="apexchartsny5luw6a" class="apexcharts-canvas apexchartsny5luw6a apexcharts-theme-light"
                            style="width: 331px; height: 300px;"><svg id="SvgjsSvg1265" width="331" height="300"
                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                transform="translate(0, 0)" style="background: transparent;">
                                <foreignObject x="0" y="0" width="331" height="300">
                                    <div class="apexcharts-legend" xmlns="http://www.w3.org/1999/xhtml"
                                        style="max-height: 150px;"></div>
                                </foreignObject>
                                <rect id="SvgjsRect1295" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                    stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                <g id="SvgjsG1322" class="apexcharts-yaxis" rel="0"
                                    transform="translate(12.397705078125, 0)">
                                    <g id="SvgjsG1323" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1325"
                                            font-family="Helvetica, Arial, sans-serif" x="20" y="31.5" text-anchor="end"
                                            dominant-baseline="auto" font-size="12px" font-weight="400" fill="#99a1b7"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1326">84</tspan>
                                            <title>84</title>
                                        </text><text id="SvgjsText1328" font-family="Helvetica, Arial, sans-serif"
                                            x="20" y="77.646" text-anchor="end" dominant-baseline="auto"
                                            font-size="12px" font-weight="400" fill="#99a1b7"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1329">77</tspan>
                                            <title>77</title>
                                        </text><text id="SvgjsText1331" font-family="Helvetica, Arial, sans-serif"
                                            x="20" y="123.792" text-anchor="end" dominant-baseline="auto"
                                            font-size="12px" font-weight="400" fill="#99a1b7"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1332">70</tspan>
                                            <title>70</title>
                                        </text><text id="SvgjsText1334" font-family="Helvetica, Arial, sans-serif"
                                            x="20" y="169.938" text-anchor="end" dominant-baseline="auto"
                                            font-size="12px" font-weight="400" fill="#99a1b7"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1335">63</tspan>
                                            <title>63</title>
                                        </text><text id="SvgjsText1337" font-family="Helvetica, Arial, sans-serif"
                                            x="20" y="216.084" text-anchor="end" dominant-baseline="auto"
                                            font-size="12px" font-weight="400" fill="#99a1b7"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1338">56</tspan>
                                            <title>56</title>
                                        </text><text id="SvgjsText1340" font-family="Helvetica, Arial, sans-serif"
                                            x="20" y="262.23" text-anchor="end" dominant-baseline="auto"
                                            font-size="12px" font-weight="400" fill="#99a1b7"
                                            class="apexcharts-text apexcharts-yaxis-label "
                                            style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1341">49</tspan>
                                            <title>49</title>
                                        </text></g>
                                </g>
                                <g id="SvgjsG1267" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(42.397705078125, 30)">
                                    <defs id="SvgjsDefs1266">
                                        <clipPath id="gridRectMaskny5luw6a">
                                            <rect id="SvgjsRect1270" width="273.399169921875"
                                                height="246.73000000000002" x="-5" y="-8" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskny5luw6a"></clipPath>
                                        <clipPath id="nonForecastMaskny5luw6a"></clipPath>
                                        <clipPath id="gridRectMarkerMaskny5luw6a">
                                            <rect id="SvgjsRect1271" width="270.399169921875"
                                                height="234.73000000000002" x="-2" y="-2" rx="0" ry="0" opacity="1"
                                                stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <g id="SvgjsG1283" class="apexcharts-grid">
                                        <g id="SvgjsG1284" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1288" x1="0" y1="46.146" x2="266.399169921875"
                                                y2="46.146" stroke="#f1f1f4" stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1289" x1="0" y1="92.292" x2="266.399169921875"
                                                y2="92.292" stroke="#f1f1f4" stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1290" x1="0" y1="138.438" x2="266.399169921875"
                                                y2="138.438" stroke="#f1f1f4" stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1291" x1="0" y1="184.584" x2="266.399169921875"
                                                y2="184.584" stroke="#f1f1f4" stroke-dasharray="4" stroke-linecap="butt"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1285" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1294" x1="0" y1="230.73000000000002" x2="266.399169921875"
                                            y2="230.73000000000002" stroke="transparent" stroke-dasharray="0"
                                            stroke-linecap="butt"></line>
                                        <line id="SvgjsLine1293" x1="0" y1="1" x2="0" y2="230.73000000000002"
                                            stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                    </g>
                                    <g id="SvgjsG1286" class="apexcharts-grid-borders">
                                        <line id="SvgjsLine1287" x1="0" y1="0" x2="266.399169921875" y2="0"
                                            stroke="#f1f1f4" stroke-dasharray="4" stroke-linecap="butt"
                                            class="apexcharts-gridline"></line>
                                        <line id="SvgjsLine1292" x1="0" y1="230.73000000000002" x2="266.399169921875"
                                            y2="230.73000000000002" stroke="#f1f1f4" stroke-dasharray="4"
                                            stroke-linecap="butt" class="apexcharts-gridline"></line>
                                    </g>
                                    <g id="SvgjsG1272" class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG1273" class="apexcharts-series" zIndex="0" seriesName="Incomplete"
                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath1276"
                                                d="M 0 230.73000000000002 L 0 92.29199999999997C7.399976942274306, 92.29199999999997, 29.59990776909722, 92.29199999999997, 44.399861653645836, 92.29199999999997S73.99976942274306, 26.369142857142833, 88.79972330729167, 26.369142857142833S118.39963107638889, 26.369142857142833, 133.1995849609375, 26.369142857142833S162.79949273003473, 59.33057142857143, 177.59944661458334, 59.33057142857143S207.19935438368057, 59.33057142857143, 221.99930826822919, 59.33057142857143S258.9991929796007, 59.33057142857143, 266.399169921875, 59.33057142857143 L 266.399169921875 230.73000000000002 L 0 230.73000000000002M 0 92.29199999999997z"
                                                fill="rgba(233,243,255,1)" fill-opacity="1" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-area" index="0" clip-path="url(#gridRectMaskny5luw6a)"
                                                pathTo="M 0 230.73000000000002 L 0 92.29199999999997C7.399976942274306, 92.29199999999997, 29.59990776909722, 92.29199999999997, 44.399861653645836, 92.29199999999997S73.99976942274306, 26.369142857142833, 88.79972330729167, 26.369142857142833S118.39963107638889, 26.369142857142833, 133.1995849609375, 26.369142857142833S162.79949273003473, 59.33057142857143, 177.59944661458334, 59.33057142857143S207.19935438368057, 59.33057142857143, 221.99930826822919, 59.33057142857143S258.9991929796007, 59.33057142857143, 266.399169921875, 59.33057142857143 L 266.399169921875 230.73000000000002 L 0 230.73000000000002M 0 92.29199999999997z"
                                                pathFrom="M -1 553.7520000000001 L -1 553.7520000000001 L 44.399861653645836 553.7520000000001 L 88.79972330729167 553.7520000000001 L 133.1995849609375 553.7520000000001 L 177.59944661458334 553.7520000000001 L 221.99930826822919 553.7520000000001 L 266.399169921875 553.7520000000001">
                                            </path>
                                            <path id="SvgjsPath1277"
                                                d="M 0 92.29199999999997C7.399976942274306, 92.29199999999997, 29.59990776909722, 92.29199999999997, 44.399861653645836, 92.29199999999997S73.99976942274306, 26.369142857142833, 88.79972330729167, 26.369142857142833S118.39963107638889, 26.369142857142833, 133.1995849609375, 26.369142857142833S162.79949273003473, 59.33057142857143, 177.59944661458334, 59.33057142857143S207.19935438368057, 59.33057142857143, 221.99930826822919, 59.33057142857143S258.9991929796007, 59.33057142857143, 266.399169921875, 59.33057142857143"
                                                fill="none" fill-opacity="1" stroke="#1b84ff" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="3" stroke-dasharray="0"
                                                class="apexcharts-area" index="0" clip-path="url(#gridRectMaskny5luw6a)"
                                                pathTo="M 0 92.29199999999997C7.399976942274306, 92.29199999999997, 29.59990776909722, 92.29199999999997, 44.399861653645836, 92.29199999999997S73.99976942274306, 26.369142857142833, 88.79972330729167, 26.369142857142833S118.39963107638889, 26.369142857142833, 133.1995849609375, 26.369142857142833S162.79949273003473, 59.33057142857143, 177.59944661458334, 59.33057142857143S207.19935438368057, 59.33057142857143, 221.99930826822919, 59.33057142857143S258.9991929796007, 59.33057142857143, 266.399169921875, 59.33057142857143"
                                                pathFrom="M -1 553.7520000000001 L -1 553.7520000000001 L 44.399861653645836 553.7520000000001 L 88.79972330729167 553.7520000000001 L 133.1995849609375 553.7520000000001 L 177.59944661458334 553.7520000000001 L 221.99930826822919 553.7520000000001 L 266.399169921875 553.7520000000001"
                                                fill-rule="evenodd"></path>
                                            <g id="SvgjsG1274"
                                                class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1345" r="0" cx="0" cy="0"
                                                        class="apexcharts-marker wcwd6dku9 no-pointer-events"
                                                        stroke="#1b84ff" fill="#e9f3ff" fill-opacity="1"
                                                        stroke-width="3" stroke-opacity="0.9" default-marker-size="0">
                                                    </circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1278" class="apexcharts-series" zIndex="1" seriesName="Complete"
                                            data:longestSeries="true" rel="2" data:realIndex="1">
                                            <path id="SvgjsPath1281"
                                                d="M 0 230.73000000000002 L 0 191.1762857142857C7.399976942274306, 191.1762857142857, 29.59990776909722, 191.1762857142857, 44.399861653645836, 191.1762857142857S73.99976942274306, 158.21485714285717, 88.79972330729167, 158.21485714285717S118.39963107638889, 158.21485714285717, 133.1995849609375, 158.21485714285717S162.79949273003473, 191.1762857142857, 177.59944661458334, 191.1762857142857S207.19935438368057, 191.1762857142857, 221.99930826822919, 191.1762857142857S261.6284488173783, 161.7565299558661, 266.399169921875, 158.21485714285717 L 266.399169921875 230.73000000000002 L 0 230.73000000000002M 0 191.1762857142857z"
                                                fill="rgba(223,255,234,1)" fill-opacity="1" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-area" index="1" clip-path="url(#gridRectMaskny5luw6a)"
                                                pathTo="M 0 230.73000000000002 L 0 191.1762857142857C7.399976942274306, 191.1762857142857, 29.59990776909722, 191.1762857142857, 44.399861653645836, 191.1762857142857S73.99976942274306, 158.21485714285717, 88.79972330729167, 158.21485714285717S118.39963107638889, 158.21485714285717, 133.1995849609375, 158.21485714285717S162.79949273003473, 191.1762857142857, 177.59944661458334, 191.1762857142857S207.19935438368057, 191.1762857142857, 221.99930826822919, 191.1762857142857S261.6284488173783, 161.7565299558661, 266.399169921875, 158.21485714285717 L 266.399169921875 230.73000000000002 L 0 230.73000000000002M 0 191.1762857142857z"
                                                pathFrom="M -1 553.7520000000001 L -1 553.7520000000001 L 44.399861653645836 553.7520000000001 L 88.79972330729167 553.7520000000001 L 133.1995849609375 553.7520000000001 L 177.59944661458334 553.7520000000001 L 221.99930826822919 553.7520000000001 L 266.399169921875 553.7520000000001">
                                            </path>
                                            <path id="SvgjsPath1282"
                                                d="M 0 191.1762857142857C7.399976942274306, 191.1762857142857, 29.59990776909722, 191.1762857142857, 44.399861653645836, 191.1762857142857S73.99976942274306, 158.21485714285717, 88.79972330729167, 158.21485714285717S118.39963107638889, 158.21485714285717, 133.1995849609375, 158.21485714285717S162.79949273003473, 191.1762857142857, 177.59944661458334, 191.1762857142857S207.19935438368057, 191.1762857142857, 221.99930826822919, 191.1762857142857S261.6284488173783, 161.7565299558661, 266.399169921875, 158.21485714285717"
                                                fill="none" fill-opacity="1" stroke="#17c653" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="3" stroke-dasharray="0"
                                                class="apexcharts-area" index="1" clip-path="url(#gridRectMaskny5luw6a)"
                                                pathTo="M 0 191.1762857142857C7.399976942274306, 191.1762857142857, 29.59990776909722, 191.1762857142857, 44.399861653645836, 191.1762857142857S73.99976942274306, 158.21485714285717, 88.79972330729167, 158.21485714285717S118.39963107638889, 158.21485714285717, 133.1995849609375, 158.21485714285717S162.79949273003473, 191.1762857142857, 177.59944661458334, 191.1762857142857S207.19935438368057, 191.1762857142857, 221.99930826822919, 191.1762857142857S261.6284488173783, 161.7565299558661, 266.399169921875, 158.21485714285717"
                                                pathFrom="M -1 553.7520000000001 L -1 553.7520000000001 L 44.399861653645836 553.7520000000001 L 88.79972330729167 553.7520000000001 L 133.1995849609375 553.7520000000001 L 177.59944661458334 553.7520000000001 L 221.99930826822919 553.7520000000001 L 266.399169921875 553.7520000000001"
                                                fill-rule="evenodd"></path>
                                            <g id="SvgjsG1279"
                                                class="apexcharts-series-markers-wrap apexcharts-hidden-element-shown"
                                                data:realIndex="1">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1346" r="0" cx="0" cy="0"
                                                        class="apexcharts-marker wfzatwax7 no-pointer-events"
                                                        stroke="#17c653" fill="#dfffea" fill-opacity="1"
                                                        stroke-width="3" stroke-opacity="0.9" default-marker-size="0">
                                                    </circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1275" class="apexcharts-datalabels" data:realIndex="0"></g>
                                        <g id="SvgjsG1280" class="apexcharts-datalabels" data:realIndex="1"></g>
                                    </g>
                                    <line id="SvgjsLine1296" x1="0" y1="0" x2="0" y2="230.73000000000002"
                                        stroke="#1b84ff" stroke-dasharray="3" stroke-linecap="butt"
                                        class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="230.73000000000002"
                                        fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line>
                                    <line id="SvgjsLine1297" x1="0" y1="0" x2="266.399169921875" y2="0" stroke="#b6b6b6"
                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1298" x1="0" y1="0" x2="266.399169921875" y2="0"
                                        stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1299" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1300" class="apexcharts-xaxis-texts-g"
                                            transform="translate(0, -4)"><text id="SvgjsText1302"
                                                font-family="Helvetica, Arial, sans-serif" x="0" y="259.73"
                                                text-anchor="middle" dominant-baseline="auto" font-size="12px"
                                                font-weight="400" fill="#99a1b7"
                                                class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1303">Feb</tspan>
                                                <title>Feb</title>
                                            </text><text id="SvgjsText1305" font-family="Helvetica, Arial, sans-serif"
                                                x="44.39986165364583" y="259.73" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px" font-weight="400"
                                                fill="#99a1b7" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1306">Mar</tspan>
                                                <title>Mar</title>
                                            </text><text id="SvgjsText1308" font-family="Helvetica, Arial, sans-serif"
                                                x="88.79972330729167" y="259.73" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px" font-weight="400"
                                                fill="#99a1b7" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1309">Apr</tspan>
                                                <title>Apr</title>
                                            </text><text id="SvgjsText1311" font-family="Helvetica, Arial, sans-serif"
                                                x="133.19958496093753" y="259.73" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px" font-weight="400"
                                                fill="#99a1b7" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1312">May</tspan>
                                                <title>May</title>
                                            </text><text id="SvgjsText1314" font-family="Helvetica, Arial, sans-serif"
                                                x="177.59944661458337" y="259.73" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px" font-weight="400"
                                                fill="#99a1b7" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1315">Jun</tspan>
                                                <title>Jun</title>
                                            </text><text id="SvgjsText1317" font-family="Helvetica, Arial, sans-serif"
                                                x="221.9993082682292" y="259.73" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px" font-weight="400"
                                                fill="#99a1b7" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1318">Jul</tspan>
                                                <title>Jul</title>
                                            </text><text id="SvgjsText1320" font-family="Helvetica, Arial, sans-serif"
                                                x="266.399169921875" y="259.73" text-anchor="middle"
                                                dominant-baseline="auto" font-size="12px" font-weight="400"
                                                fill="#99a1b7" class="apexcharts-text apexcharts-xaxis-label "
                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1321">Aug</tspan>
                                                <title>Aug</title>
                                            </text></g>
                                    </g>
                                    <g id="SvgjsG1342" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1343" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1344" class="apexcharts-point-annotations"></g>
                                    <rect id="SvgjsRect1347" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                        stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"
                                        class="apexcharts-zoom-rect"></rect>
                                    <rect id="SvgjsRect1348" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                        stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"
                                        class="apexcharts-selection-rect"></rect>
                                </g>
                            </svg>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(233, 243, 255);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(223, 255, 234);"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label"></span><span
                                                class="apexcharts-tooltip-text-y-value"></span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light">
                                <div class="apexcharts-xaxistooltip-text"
                                    style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div>
                    </div>
                    <!--end::Chart-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Graph-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Calendario de tareas</h3>
                        <?php
                        include('../config.php');
                        $sql1 = "SELECT proyectos.id, proyectos.nombre, proyectos.fechaInicio, proyectos.fechaFin, proyectosTareas.fechaFin as fechaLimite, DATEDIFF(proyectos.fechaFin, proyectos.fechaInicio) AS cantidad_dias FROM proyectos JOIN proyectosTareas ON proyectos.id = proyectosTareas.idProyecto WHERE proyectos.id = '$idProyecto'";
                        $query1 = mysqli_query($con, $sql1);
                        // Verifica que la consulta haya retornado un resultado
                        if($query1 && mysqli_num_rows($query1) > 0) {
                            $result = mysqli_fetch_assoc($query1);
                            $fechaInicio = new DateTime($result['fechaInicio']);
                            $fechaFin = new DateTime($result['fechaFin']);
                            // Incrementar un día porque la fecha final es inclusiva
                            $fechaFin->modify('+1 day'); 
                            echo "<div class='fs-6 text-gray-500'>El proyecto abarca " . $result['cantidad_dias'] . " días.</div>";
                        }
                        ?>
                    </div>
                    
                </div>

                <div class="card-body p-9 pt-4">
                    <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2" role="tablist">
                        
                        <li class='nav-item me-1' role='presentation'>
                                    <a class='nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary'
                                        data-bs-toggle='tab' aria-selected='false' tabindex='-1' role='tab'>
                                        <span class='opacity-50 fs-7 fw-semibold'>Lun</span>
                                        <span class='fs-6 fw-bold'>1</span>
                                    </a>
                                </li>
                     
                    </ul>
                    
                    <div class="tab-content">
                            <div id="kt_schedule_day_0" class="tab-pane fade show" role="tabpanel">
                                <div class="d-flex flex-stack position-relative mt-8">
                                    <!-- Tu contenido para cada tarea aquí -->
                                    <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                    <div class="fw-semibold ms-5 text-gray-600">
                                        <!-- Descripción de la tarea -->
                                        <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                            Nombre tarea
                                        </a>
                                    </div>
                                    <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">Ver</a>
                                </div>
                            </div>
                      
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">

            <!--begin::Card-->
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">Latest Files</h3>

                        <div class="fs-6 text-gray-500">Total 382 fiels, 2,6GB space usage</div>
                    </div>
                    <!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View All</a>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9 pt-3">
                    <!--begin::Files-->
                    <div class="d-flex flex-column mb-9">
                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::Icon-->
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="/assets/media/svg/files/pdf.svg">
                            </div>
                            <!--end::Icon-->

                            <!--begin::Details-->
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Project tech
                                    requirements</a>

                                <div class="text-gray-500">
                                    2 days ago <a href="#">Karina Clark</a>
                                </div>
                            </div>
                            <!--end::Details-->

                            <!--begin::Menu-->
                            <button type="button"
                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                        class="path5"></span></i> </button>



                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                                id="kt_menu_654ebb3d27871">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->

                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->


                                <!--begin::Form-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Status:</label>
                                        <!--end::Label-->

                                        <!--begin::Input-->
                                        <div>
                                            <select class="form-select form-select-solid select2-hidden-accessible"
                                                multiple="" data-kt-select2="true" data-close-on-select="false"
                                                data-placeholder="Select option"
                                                data-dropdown-parent="#kt_menu_654ebb3d27871" data-allow-clear="true"
                                                data-select2-id="select2-data-15-qyzp" tabindex="-1" aria-hidden="true"
                                                data-kt-initialized="1">
                                                <option></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select><span
                                                class="select2 select2-container select2-container--bootstrap5"
                                                dir="ltr" data-select2-id="select2-data-16-63et"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="-1" aria-disabled="false">
                                                        <ul class="select2-selection__rendered"
                                                            id="select2-z37m-container"></ul><span
                                                            class="select2-search select2-search--inline"><textarea
                                                                class="select2-search__field" type="search" tabindex="0"
                                                                autocorrect="off" autocapitalize="none"
                                                                spellcheck="false" role="searchbox"
                                                                aria-autocomplete="list" autocomplete="off"
                                                                aria-label="Search"
                                                                aria-describedby="select2-z37m-container"
                                                                placeholder="Select option"
                                                                style="width: 100%;"></textarea></span>
                                                    </span></span><span class="dropdown-wrapper"
                                                    aria-hidden="true"></span></span>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Member Type:</label>
                                        <!--end::Label-->

                                        <!--begin::Options-->
                                        <div class="d-flex">
                                            <!--begin::Options-->
                                            <label
                                                class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" value="1">
                                                <span class="form-check-label">
                                                    Author
                                                </span>
                                            </label>
                                            <!--end::Options-->

                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="2"
                                                    checked="checked">
                                                <span class="form-check-label">
                                                    Customer
                                                </span>
                                            </label>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Notifications:</label>
                                        <!--end::Label-->

                                        <!--begin::Switch-->
                                        <div
                                            class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value=""
                                                name="notifications" checked="">
                                            <label class="form-check-label">
                                                Enabled
                                            </label>
                                        </div>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->

                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2"
                                            data-kt-menu-dismiss="true">Reset</button>

                                        <button type="submit" class="btn btn-sm btn-primary"
                                            data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="/assets/media/svg/files/doc.svg">
                            </div>
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Create FureStibe
                                    branding proposal</a>

                                <div class="text-gray-500">
                                    Due in 1 day <a href="#">Marcus Blake</a>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                        class="path5"></span></i> </button>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="/assets/media/svg/files/css.svg">
                            </div>
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Completed Project
                                    Stylings</a>
                                <div class="text-gray-500">
                                    Due in 1 day <a href="#">Terry Barry</a>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                        class="path5"></span></i> </button>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="/assets/media/svg/files/ai.svg">
                            </div>
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Create Project
                                    Wireframes</a>

                                <div class="text-gray-500">
                                    Due in 3 days <a href="#">Roth Bloom</a>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                        class="path5"></span></i> </button>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="/assets/media/svg/files/ai.svg">
                            </div>
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Create Project
                                    Wireframes</a>

                                <div class="text-gray-500">
                                    Due in 3 days <a href="#">Roth Bloom</a>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                        class="path5"></span></i> </button>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="/assets/media/svg/files/ai.svg">
                            </div>
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Create Project
                                    Wireframes</a>

                                <div class="text-gray-500">
                                    Due in 3 days <a href="#">Roth Bloom</a>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                        class="path5"></span></i> </button>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="/assets/media/svg/files/ai.svg">
                            </div>
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Create Project
                                    Wireframes</a>

                                <div class="text-gray-500">
                                    Due in 3 days <a href="#">Roth Bloom</a>
                                </div>
                            </div>
                            <button type="button"
                                class="btn btn-clean btn-sm btn-icon btn-icon-primary btn-active-light-primary ms-auto"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

                                <i class="ki-duotone ki-element-plus fs-3"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                        class="path5"></span></i> </button>
                        </div>
                    </div>
                   
                </div>
                <!--end::Card body -->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-lg-6">
            <!--begin::Card-->
            <div class="card  card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">New Contibutors</h3>

                        <div class="fs-6 text-gray-500">From total 482 Participants</div>
                    </div>
                    <!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View All</a>
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card toolbar-->

                <!--begin::Card body-->
                <div class="card-body d-flex flex-column p-9 pt-3 mb-9">

                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Avatar-->
                        <div class="me-5 position-relative">
                            <!--begin::Image-->
                            <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="/assets/media/avatars/300-6.jpg">
                            </div>
                            <!--end::Image-->

                        </div>
                        <!--end::Avatar-->

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Emma Smith</a>

                            <div class="text-gray-500">
                                8 Pending &amp; 97 Completed Tasks </div>
                        </div>
                        <!--end::Details-->

                        <!--begin::Badge-->
                        <div class="badge badge-light ms-auto">5</div>
                        <!--end::Badge-->
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Avatar-->
                        <div class="me-5 position-relative">
                            <!--begin::Image-->
                            <div class="symbol symbol-35px symbol-circle">
                                <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                    M </span>
                            </div>
                            <!--end::Image-->

                            <!--begin::Online-->
                            <div
                                class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                            </div>
                            <!--end::Online-->
                        </div>
                        <!--end::Avatar-->

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Melody Macy</a>

                            <div class="text-gray-500">
                                5 Pending &amp; 84 Completed </div>
                        </div>
                        <!--end::Details-->

                        <!--begin::Badge-->
                        <div class="badge badge-light ms-auto">8</div>
                        <!--end::Badge-->
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Avatar-->
                        <div class="me-5 position-relative">
                            <!--begin::Image-->
                            <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="/assets/media/avatars/300-1.jpg">
                            </div>
                            <!--end::Image-->

                        </div>
                        <!--end::Avatar-->

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Max Smith</a>

                            <div class="text-gray-500">
                                9 Pending &amp; 103 Completed </div>
                        </div>
                        <!--end::Details-->

                        <!--begin::Badge-->
                        <div class="badge badge-light ms-auto">9</div>
                        <!--end::Badge-->
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex align-items-center mb-5">
                        <!--begin::Avatar-->
                        <div class="me-5 position-relative">
                            <!--begin::Image-->
                            <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="/assets/media/avatars/300-5.jpg">
                            </div>
                            <!--end::Image-->

                        </div>
                        <!--end::Avatar-->

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Sean Bean</a>

                            <div class="text-gray-500">
                                3 Pending &amp; 55 Completed </div>
                        </div>
                        <!--end::Details-->

                        <!--begin::Badge-->
                        <div class="badge badge-light ms-auto">3</div>
                        <!--end::Badge-->
                    </div>
                    <!--end::Item-->

                    <!--begin::Item-->
                    <div class="d-flex align-items-center ">
                        <!--begin::Avatar-->
                        <div class="me-5 position-relative">
                            <!--begin::Image-->
                            <div class="symbol symbol-35px symbol-circle">
                                <img alt="Pic" src="/assets/media/avatars/300-25.jpg">
                            </div>
                            <!--end::Image-->

                        </div>
                        <!--end::Avatar-->

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary">Brian Cox</a>

                            <div class="text-gray-500">
                                4 Pending &amp; 115 Completed </div>
                        </div>
                        <!--end::Details-->

                        <!--begin::Badge-->
                        <div class="badge badge-light ms-auto">4</div>
                        <!--end::Badge-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-lg-6">

            <!--begin::Tasks-->
            <div class="col-lg-12">
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">What's on the road?</h3>

                        <div class="fs-6 text-gray-500">Total 482 participants</div>
                    </div>
                </div>

                <div class="card-body p-9 pt-4">
                    
                    <div class="tab-content">
                        <!--begin::Day-->
                        <div id="kt_schedule_day_0" class="tab-pane fade show " role="tabpanel">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        9:00 - 10:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Dashboard UI/UX Design Review </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Terry Robins</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        13:00 - 14:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Marketing Campaign Discussion </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Mark Randall</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        11:00 - 11:45

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Sales Pitch Proposal </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Terry Robins</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                        </div>
                        <!--end::Day-->
                        <!--begin::Day-->
                        <div id="kt_schedule_day_1" class="tab-pane fade show active" role="tabpanel">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        14:30 - 15:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Committee Review Approvals </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Michael Walters</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        16:30 - 17:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Project Review &amp; Testing </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Bob Harris</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        14:30 - 15:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Marketing Campaign Discussion </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Naomi Hayabusa</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                        </div>
                        <!--end::Day-->
                        <!--begin::Day-->
                        <div id="kt_schedule_day_2" class="tab-pane fade show " role="tabpanel">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        16:30 - 17:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Marketing Campaign Discussion </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Walter White</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        14:30 - 15:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Creative Content Initiative </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Michael Walters</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        14:30 - 15:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Sales Pitch Proposal </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Mark Randall</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                        </div>
                        <!--end::Day-->
                        <!--begin::Day-->
                        <div id="kt_schedule_day_3" class="tab-pane fade show " role="tabpanel">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        16:30 - 17:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Weekly Team Stand-Up </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Bob Harris</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        11:00 - 11:45

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Marketing Campaign Discussion </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Mark Randall</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        13:00 - 14:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Dashboard UI/UX Design Review </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">David Stevenson</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                        </div>
                        <!--end::Day-->
                        <!--begin::Day-->
                        <div id="kt_schedule_day_4" class="tab-pane fade show " role="tabpanel">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        16:30 - 17:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Project Review &amp; Testing </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Karina Clarke</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        10:00 - 11:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Development Team Capacity Review </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Bob Harris</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        10:00 - 11:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Lunch &amp; Learn Catch Up </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">David Stevenson</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                        </div>
                        <!--end::Day-->
                        <!--begin::Day-->
                        <div id="kt_schedule_day_5" class="tab-pane fade show " role="tabpanel">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        12:00 - 13:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Dashboard UI/UX Design Review </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Michael Walters</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        12:00 - 13:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Committee Review Approvals </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Kendell Trevor</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        10:00 - 11:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Project Review &amp; Testing </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Yannis Gloverson</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                        </div>
                        <!--end::Day-->
                        <!--begin::Day-->
                        <div id="kt_schedule_day_6" class="tab-pane fade show " role="tabpanel">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        10:00 - 11:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        9 Degree Project Estimation Meeting </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Bob Harris</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        16:30 - 17:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        9 Degree Project Estimation Meeting </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Michael Walters</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        14:30 - 15:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Creative Content Initiative </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">David Stevenson</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                        </div>
                        <!--end::Day-->
                        <!--begin::Day-->
                        <div id="kt_schedule_day_7" class="tab-pane fade show " role="tabpanel">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        16:30 - 17:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Dashboard UI/UX Design Review </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Bob Harris</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        9:00 - 10:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        9 Degree Project Estimation Meeting </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Karina Clarke</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        16:30 - 17:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Development Team Capacity Review </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Peter Marcus</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                        </div>
                        <!--end::Day-->
                        <!--begin::Day-->
                        <div id="kt_schedule_day_8" class="tab-pane fade show " role="tabpanel">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        16:30 - 17:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Marketing Campaign Discussion </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Caleb Donaldson</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        16:30 - 17:30

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Team Backlog Grooming Session </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Mark Randall</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        13:00 - 14:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            pm </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Lunch &amp; Learn Catch Up </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Naomi Hayabusa</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                        </div>
                        <!--end::Day-->
                        <!--begin::Day-->
                        <div id="kt_schedule_day_9" class="tab-pane fade show " role="tabpanel">
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        9:00 - 10:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Lunch &amp; Learn Catch Up </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Naomi Hayabusa</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        10:00 - 11:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Committee Review Approvals </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Kendell Trevor</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                            <!--begin::Time-->
                            <div class="d-flex flex-stack position-relative mt-8">
                                <!--begin::Bar-->
                                <div class="position-absolute h-100 w-4px bg-secondary rounded top-0 start-0"></div>
                                <!--end::Bar-->

                                <!--begin::Info-->
                                <div class="fw-semibold ms-5 text-gray-600">
                                    <!--begin::Time-->
                                    <div class="fs-5">
                                        9:00 - 10:00

                                        <span class="fs-7 text-gray-500 text-uppercase">
                                            am </span>
                                    </div>
                                    <!--end::Time-->

                                    <!--begin::Title-->
                                    <a href="#" class="fs-5 fw-bold text-gray-800 text-hover-primary mb-2">
                                        Weekly Team Stand-Up </a>
                                    <!--end::Title-->

                                    <!--begin::User-->
                                    <div class="text-gray-500">
                                        Lead by <a href="#">Michael Walters</a>
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Info-->

                                <!--begin::Action-->
                                <a href="#" class="btn btn-bg-light btn-active-color-primary btn-sm">View</a>
                                <!--end::Action-->
                            </div>
                            <!--end::Time-->
                        </div>
                        <!--end::Day-->
                    </div>
                    <!--end::Tab Content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        </div>
    </div>
    <?php } ?>
</div>