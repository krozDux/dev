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
	$i = 1;
	while ($dataUsuario1 = mysqli_fetch_array($query1)) { ?>
    <div class="card mb-6 mb-xl-9">
        <div class="card-body pt-9 pb-0">
            <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                <div
                    class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                    <img class="mw-50px mw-lg-75px" src="/assets/media/svg/brand-logos/volicity-9.svg" alt="image">
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-1">
                                <a class="text-gray-800 text-hover-primary fs-2 fw-bold me-3"><?php echo strtoupper($dataUsuario1['nombre']);?></a>
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
                            <a href="#" class="btn btn-sm btn-bg-light btn-active-color-primary me-3"
                                data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Add User</a>

                            <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_target">Add Target</a>

                          
                            <!--end::Menu-->
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Head-->

                    <!--begin::Info-->
                    <div class="d-flex flex-wrap justify-content-start">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">
                        <?php 
                        $fechaInicio = $dataUsuario1['fechaInicio'];
                        $fechaInicioF = date('d/m/Y', strtotime($fechaInicio));
                        $fechaFin = $dataUsuario1['fechaFin'];
                        $fechaFinF = date('d/m/Y', strtotime($fechaFin));
                        ?>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold"><?php echo $fechaInicioF?></div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Fecha inicio</div>
                                <!--end::Label-->
                            </div>

                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
                                <div class="d-flex align-items-center">
                                    <div class="fs-4 fw-bold"><?php echo $fechaFinF?></div>
                                </div>
                                <!--end::Number-->

                                <!--begin::Label-->
                                <div class="fw-semibold fs-6 text-gray-500">Fecha límite</div>
                                <!--end::Label-->
                            </div>
                            <!--end::Stat-->

                            <!--begin::Stat-->
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <!--begin::Number-->
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
                            <!--begin::User-->
                            <?php
                             $totalUsuarios = count($dataUsuario3Array[$dataUsuario1['id']]);
                             $usuariosMostrados = 0;
                         
                             foreach ($dataUsuario3Array[$dataUsuario1['id']] as $dataUsuario3) {
                                 // Limitar la cantidad de usuarios a mostrar a 5
                                 if ($usuariosMostrados < 5) {
                                     if ($dataUsuario3['imagen'] != "blank.png") {
                                         echo '<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                 title="' . $dataUsuario3['nombres'] . ' ' . $dataUsuario3['apellidos'] . '">
                                                 <img src="ruta/a/tu/carpeta/de/imagenes/' . $dataUsuario3['imagen'] . '" alt="user-image">
                                               </div>';
                                     } else {
                                         $iniciales = substr($dataUsuario3['nombres'], 0, 1) . substr($dataUsuario3['apellidos'], 0, 1);
                                         echo '<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                 title="' . $dataUsuario3['nombres'] . ' ' . $dataUsuario3['apellidos'] . '">
                                                 <span class="symbol-label bg-dark text-inverse-primary fw-bold">' . $iniciales . '</span>
                                               </div>';
                                     }
                                     $usuariosMostrados++;
                                 }
                             }
                         
                             // Si hay más de 5 usuarios, mostrar el círculo adicional
                             if ($totalUsuarios > 5) {
                                 $usuariosExcedentes = $totalUsuarios - 5; // Calcular la cantidad de usuarios no mostrados
                                 echo '<div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                         title="+' . $usuariosExcedentes . ' more">
                                         <span class="symbol-label bg-dark text-inverse-dark fw-bold">+' . $usuariosExcedentes . '</span>
                                       </div>';
                             }
                         
                             echo '</div>';
        ?>
                            <!--end::User-->
                            
                            
                            <!--end::All users-->
                        </div>
                        <!--end::Users-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Details-->

            <div class="separator"></div>

            <!--begin::Nav-->
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 active"
                        href="/../demo14/apps/projects/project.html">
                        Overview </a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/targets.html">
                        Targets </a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/budget.html">
                        Budget </a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/users.html">
                        Users </a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/files.html">
                        Files </a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/activity.html">
                        Activity </a>
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary py-5 me-6 " href="/../demo14/apps/projects/settings.html">
                        Settings </a>
                </li>
                <!--end::Nav item-->
            </ul>
            <!--end::Nav-->
        </div>
    </div>
    <!--end::Navbar-->
    <!--begin::Row-->
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
                        <h3 class="fw-bold mb-1">What's on the road?</h3>

                        <div class="fs-6 text-gray-500">Total 482 participants</div>
                    </div>
                    <!--end::Card title-->

                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Select-->
                        <select name="status" data-control="select2" data-hide-search="true"
                            class="form-select form-select-solid form-select-sm fw-bold w-100px select2-hidden-accessible"
                            data-select2-id="select2-data-12-2kbu" tabindex="-1" aria-hidden="true"
                            data-kt-initialized="1">
                            <option value="1" selected="" data-select2-id="select2-data-14-deve">Options</option>
                            <option value="2">Option 1</option>
                            <option value="3">Option 2</option>
                            <option value="4">Option 3</option>
                        </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr"
                            data-select2-id="select2-data-13-flj0" style="width: 100%;"><span class="selection"><span
                                    class="select2-selection select2-selection--single form-select form-select-solid form-select-sm fw-bold w-100px"
                                    role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                    aria-disabled="false" aria-labelledby="select2-status-ih-container"
                                    aria-controls="select2-status-ih-container"><span
                                        class="select2-selection__rendered" id="select2-status-ih-container"
                                        role="textbox" aria-readonly="true" title="Options">Options</span><span
                                        class="select2-selection__arrow" role="presentation"><b
                                            role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                aria-hidden="true"></span></span>
                        <!--end::Select-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->

                <!--begin::Card body-->
                <div class="card-body p-9 pt-4">
                    <!--begin::Dates-->
                    <ul class="nav nav-pills d-flex flex-nowrap hover-scroll-x py-2" role="tablist">

                        <!--begin::Date-->
                        <li class="nav-item me-1" role="presentation">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary "
                                data-bs-toggle="tab" href="#kt_schedule_day_0" aria-selected="false" tabindex="-1"
                                role="tab">

                                <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                <span class="fs-6 fw-bold">22</span>
                            </a>
                        </li>
                        <!--end::Date-->

                        <!--begin::Date-->
                        <li class="nav-item me-1" role="presentation">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary active"
                                data-bs-toggle="tab" href="#kt_schedule_day_1" aria-selected="true" role="tab">

                                <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                <span class="fs-6 fw-bold">23</span>
                            </a>
                        </li>
                        <!--end::Date-->

                        <!--begin::Date-->
                        <li class="nav-item me-1" role="presentation">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary "
                                data-bs-toggle="tab" href="#kt_schedule_day_2" aria-selected="false" tabindex="-1"
                                role="tab">

                                <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                <span class="fs-6 fw-bold">24</span>
                            </a>
                        </li>
                        <!--end::Date-->

                        <!--begin::Date-->
                        <li class="nav-item me-1" role="presentation">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary "
                                data-bs-toggle="tab" href="#kt_schedule_day_3" aria-selected="false" tabindex="-1"
                                role="tab">

                                <span class="opacity-50 fs-7 fw-semibold">We</span>
                                <span class="fs-6 fw-bold">25</span>
                            </a>
                        </li>
                        <!--end::Date-->

                        <!--begin::Date-->
                        <li class="nav-item me-1" role="presentation">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary "
                                data-bs-toggle="tab" href="#kt_schedule_day_4" aria-selected="false" tabindex="-1"
                                role="tab">

                                <span class="opacity-50 fs-7 fw-semibold">Th</span>
                                <span class="fs-6 fw-bold">26</span>
                            </a>
                        </li>
                        <!--end::Date-->

                        <!--begin::Date-->
                        <li class="nav-item me-1" role="presentation">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary "
                                data-bs-toggle="tab" href="#kt_schedule_day_5" aria-selected="false" tabindex="-1"
                                role="tab">

                                <span class="opacity-50 fs-7 fw-semibold">Fr</span>
                                <span class="fs-6 fw-bold">27</span>
                            </a>
                        </li>
                        <!--end::Date-->

                        <!--begin::Date-->
                        <li class="nav-item me-1" role="presentation">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary "
                                data-bs-toggle="tab" href="#kt_schedule_day_6" aria-selected="false" tabindex="-1"
                                role="tab">

                                <span class="opacity-50 fs-7 fw-semibold">Sa</span>
                                <span class="fs-6 fw-bold">28</span>
                            </a>
                        </li>
                        <!--end::Date-->

                        <!--begin::Date-->
                        <li class="nav-item me-1" role="presentation">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary "
                                data-bs-toggle="tab" href="#kt_schedule_day_7" aria-selected="false" tabindex="-1"
                                role="tab">

                                <span class="opacity-50 fs-7 fw-semibold">Su</span>
                                <span class="fs-6 fw-bold">29</span>
                            </a>
                        </li>
                        <!--end::Date-->

                        <!--begin::Date-->
                        <li class="nav-item me-1" role="presentation">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary "
                                data-bs-toggle="tab" href="#kt_schedule_day_8" aria-selected="false" tabindex="-1"
                                role="tab">

                                <span class="opacity-50 fs-7 fw-semibold">Mo</span>
                                <span class="fs-6 fw-bold">30</span>
                            </a>
                        </li>
                        <!--end::Date-->

                        <!--begin::Date-->
                        <li class="nav-item me-1" role="presentation">
                            <a class="nav-link btn d-flex flex-column flex-center rounded-pill min-w-45px me-2 py-4 px-3 btn-active-primary "
                                data-bs-toggle="tab" href="#kt_schedule_day_9" aria-selected="false" tabindex="-1"
                                role="tab">

                                <span class="opacity-50 fs-7 fw-semibold">Tu</span>
                                <span class="fs-6 fw-bold">31</span>
                            </a>
                        </li>
                        <!--end::Date-->
                    </ul>
                    <!--end::Dates-->

                    <!--begin::Tab Content-->
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
        <!--end::Col-->

        <!--begin::Col-->
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
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Menu-->
                        </div>
                        <!--end::File-->
                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::Icon-->
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="/assets/media/svg/files/doc.svg">
                            </div>
                            <!--end::Icon-->

                            <!--begin::Details-->
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Create FureStibe
                                    branding proposal</a>

                                <div class="text-gray-500">
                                    Due in 1 day <a href="#">Marcus Blake</a>
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
                                id="kt_menu_654ebb3d27882">
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
                                                data-dropdown-parent="#kt_menu_654ebb3d27882" data-allow-clear="true"
                                                data-select2-id="select2-data-17-oo10" tabindex="-1" aria-hidden="true"
                                                data-kt-initialized="1">
                                                <option></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select><span
                                                class="select2 select2-container select2-container--bootstrap5"
                                                dir="ltr" data-select2-id="select2-data-18-hs97"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="-1" aria-disabled="false">
                                                        <ul class="select2-selection__rendered"
                                                            id="select2-igil-container"></ul><span
                                                            class="select2-search select2-search--inline"><textarea
                                                                class="select2-search__field" type="search" tabindex="0"
                                                                autocorrect="off" autocapitalize="none"
                                                                spellcheck="false" role="searchbox"
                                                                aria-autocomplete="list" autocomplete="off"
                                                                aria-label="Search"
                                                                aria-describedby="select2-igil-container"
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
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Menu-->
                        </div>
                        <!--end::File-->
                        <!--begin::File-->
                        <div class="d-flex align-items-center mb-5">
                            <!--begin::Icon-->
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="/assets/media/svg/files/css.svg">
                            </div>
                            <!--end::Icon-->

                            <!--begin::Details-->
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Completed Project
                                    Stylings</a>

                                <div class="text-gray-500">
                                    Due in 1 day <a href="#">Terry Barry</a>
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
                                id="kt_menu_654ebb3d27891">
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
                                                data-dropdown-parent="#kt_menu_654ebb3d27891" data-allow-clear="true"
                                                data-select2-id="select2-data-19-r6se" tabindex="-1" aria-hidden="true"
                                                data-kt-initialized="1">
                                                <option></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select><span
                                                class="select2 select2-container select2-container--bootstrap5"
                                                dir="ltr" data-select2-id="select2-data-20-uwc6"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="-1" aria-disabled="false">
                                                        <ul class="select2-selection__rendered"
                                                            id="select2-rwlo-container"></ul><span
                                                            class="select2-search select2-search--inline"><textarea
                                                                class="select2-search__field" type="search" tabindex="0"
                                                                autocorrect="off" autocapitalize="none"
                                                                spellcheck="false" role="searchbox"
                                                                aria-autocomplete="list" autocomplete="off"
                                                                aria-label="Search"
                                                                aria-describedby="select2-rwlo-container"
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
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Menu-->
                        </div>
                        <!--end::File-->
                        <!--begin::File-->
                        <div class="d-flex align-items-center ">
                            <!--begin::Icon-->
                            <div class="symbol symbol-30px me-5">
                                <img alt="Icon" src="/assets/media/svg/files/ai.svg">
                            </div>
                            <!--end::Icon-->

                            <!--begin::Details-->
                            <div class="fw-semibold">
                                <a class="fs-6 fw-bold text-gray-900 text-hover-primary" href="#">Create Project
                                    Wireframes</a>

                                <div class="text-gray-500">
                                    Due in 3 days <a href="#">Roth Bloom</a>
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
                                id="kt_menu_654ebb3d2789f">
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
                                                data-dropdown-parent="#kt_menu_654ebb3d2789f" data-allow-clear="true"
                                                data-select2-id="select2-data-21-bwna" tabindex="-1" aria-hidden="true"
                                                data-kt-initialized="1">
                                                <option></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select><span
                                                class="select2 select2-container select2-container--bootstrap5"
                                                dir="ltr" data-select2-id="select2-data-22-l51x"
                                                style="width: 100%;"><span class="selection"><span
                                                        class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                        role="combobox" aria-haspopup="true" aria-expanded="false"
                                                        tabindex="-1" aria-disabled="false">
                                                        <ul class="select2-selection__rendered"
                                                            id="select2-0fi5-container"></ul><span
                                                            class="select2-search select2-search--inline"><textarea
                                                                class="select2-search__field" type="search" tabindex="0"
                                                                autocorrect="off" autocapitalize="none"
                                                                spellcheck="false" role="searchbox"
                                                                aria-autocomplete="list" autocomplete="off"
                                                                aria-label="Search"
                                                                aria-describedby="select2-0fi5-container"
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
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Menu-->
                        </div>
                        <!--end::File-->

                    </div>
                    <!--end::Files-->


                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6">
                        <!--begin::Icon-->
                        <i class="ki-duotone ki-svg/files/upload.svg fs-2tx text-primary me-4"></i>
                        <!--end::Icon-->

                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1 ">
                            <!--begin::Content-->
                            <div class=" fw-semibold">
                                <h4 class="text-gray-900 fw-bold">Quick file uploader</h4>

                                <div class="fs-6 text-gray-700 ">Drag &amp; Drop or choose files from computer</div>
                            </div>
                            <!--end::Content-->

                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
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
            <div class="card card-flush h-lg-100">
                <!--begin::Card header-->
                <div class="card-header mt-6">
                    <!--begin::Card title-->
                    <div class="card-title flex-column">
                        <h3 class="fw-bold mb-1">My Tasks</h3>

                        <div class="fs-6 text-gray-500">Total 25 tasks in backlog</div>
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
                <div class="card-body d-flex flex-column mb-9 p-9 pt-3">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center position-relative mb-7">
                        <!--begin::Label-->
                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                        <!--end::Label-->

                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                        <!--end::Checkbox-->

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">Create FureStibe branding
                                logo</a>

                            <!--begin::Info-->
                            <div class="text-gray-500">
                                Due in 1 day <a href="#">Karina Clark</a>
                            </div>
                            <!--end::Info-->
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
                            id="kt_menu_654ebb3d27943">
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
                                            data-dropdown-parent="#kt_menu_654ebb3d27943" data-allow-clear="true"
                                            data-select2-id="select2-data-23-felo" tabindex="-1" aria-hidden="true"
                                            data-kt-initialized="1">
                                            <option></option>
                                            <option value="1">Approved</option>
                                            <option value="2">Pending</option>
                                            <option value="2">In Process</option>
                                            <option value="2">Rejected</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                            dir="ltr" data-select2-id="select2-data-24-f7b5" style="width: 100%;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="-1" aria-disabled="false">
                                                    <ul class="select2-selection__rendered" id="select2-0nj5-container">
                                                    </ul><span class="select2-search select2-search--inline"><textarea
                                                            class="select2-search__field" type="search" tabindex="0"
                                                            autocorrect="off" autocapitalize="none" spellcheck="false"
                                                            role="searchbox" aria-autocomplete="list" autocomplete="off"
                                                            aria-label="Search"
                                                            aria-describedby="select2-0nj5-container"
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
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" value="1">
                                            <span class="form-check-label">
                                                Author
                                            </span>
                                        </label>
                                        <!--end::Options-->

                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2" checked="checked">
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
                                        <input class="form-check-input" type="checkbox" value="" name="notifications"
                                            checked="">
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
                                <!--end::Actions-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center position-relative mb-7">
                        <!--begin::Label-->
                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                        <!--end::Label-->

                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                        <!--end::Checkbox-->

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">Schedule a meeting with
                                FireBear CTO John</a>

                            <!--begin::Info-->
                            <div class="text-gray-500">
                                Due in 3 days <a href="#">Rober Doe</a>
                            </div>
                            <!--end::Info-->
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
                            id="kt_menu_654ebb3d27952">
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
                                            data-dropdown-parent="#kt_menu_654ebb3d27952" data-allow-clear="true"
                                            data-select2-id="select2-data-25-0a0e" tabindex="-1" aria-hidden="true"
                                            data-kt-initialized="1">
                                            <option></option>
                                            <option value="1">Approved</option>
                                            <option value="2">Pending</option>
                                            <option value="2">In Process</option>
                                            <option value="2">Rejected</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                            dir="ltr" data-select2-id="select2-data-26-v6ub" style="width: 100%;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="-1" aria-disabled="false">
                                                    <ul class="select2-selection__rendered" id="select2-k49o-container">
                                                    </ul><span class="select2-search select2-search--inline"><textarea
                                                            class="select2-search__field" type="search" tabindex="0"
                                                            autocorrect="off" autocapitalize="none" spellcheck="false"
                                                            role="searchbox" aria-autocomplete="list" autocomplete="off"
                                                            aria-label="Search"
                                                            aria-describedby="select2-k49o-container"
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
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" value="1">
                                            <span class="form-check-label">
                                                Author
                                            </span>
                                        </label>
                                        <!--end::Options-->

                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2" checked="checked">
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
                                        <input class="form-check-input" type="checkbox" value="" name="notifications"
                                            checked="">
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
                                <!--end::Actions-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center position-relative mb-7">
                        <!--begin::Label-->
                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                        <!--end::Label-->

                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                        <!--end::Checkbox-->

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">9 Degree Porject
                                Estimation</a>

                            <!--begin::Info-->
                            <div class="text-gray-500">
                                Due in 1 week <a href="#">Neil Owen</a>
                            </div>
                            <!--end::Info-->
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
                            id="kt_menu_654ebb3d2795f">
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
                                            data-dropdown-parent="#kt_menu_654ebb3d2795f" data-allow-clear="true"
                                            data-select2-id="select2-data-27-kehr" tabindex="-1" aria-hidden="true"
                                            data-kt-initialized="1">
                                            <option></option>
                                            <option value="1">Approved</option>
                                            <option value="2">Pending</option>
                                            <option value="2">In Process</option>
                                            <option value="2">Rejected</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                            dir="ltr" data-select2-id="select2-data-28-r63e" style="width: 100%;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="-1" aria-disabled="false">
                                                    <ul class="select2-selection__rendered" id="select2-wvp4-container">
                                                    </ul><span class="select2-search select2-search--inline"><textarea
                                                            class="select2-search__field" type="search" tabindex="0"
                                                            autocorrect="off" autocapitalize="none" spellcheck="false"
                                                            role="searchbox" aria-autocomplete="list" autocomplete="off"
                                                            aria-label="Search"
                                                            aria-describedby="select2-wvp4-container"
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
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" value="1">
                                            <span class="form-check-label">
                                                Author
                                            </span>
                                        </label>
                                        <!--end::Options-->

                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2" checked="checked">
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
                                        <input class="form-check-input" type="checkbox" value="" name="notifications"
                                            checked="">
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
                                <!--end::Actions-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center position-relative mb-7">
                        <!--begin::Label-->
                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                        <!--end::Label-->

                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                        <!--end::Checkbox-->

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">Dashgboard UI &amp; UX for
                                Leafr CRM</a>

                            <!--begin::Info-->
                            <div class="text-gray-500">
                                Due in 1 week <a href="#">Olivia Wild</a>
                            </div>
                            <!--end::Info-->
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
                            id="kt_menu_654ebb3d2796c">
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
                                            data-dropdown-parent="#kt_menu_654ebb3d2796c" data-allow-clear="true"
                                            data-select2-id="select2-data-29-av33" tabindex="-1" aria-hidden="true"
                                            data-kt-initialized="1">
                                            <option></option>
                                            <option value="1">Approved</option>
                                            <option value="2">Pending</option>
                                            <option value="2">In Process</option>
                                            <option value="2">Rejected</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                            dir="ltr" data-select2-id="select2-data-30-c0fj" style="width: 100%;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="-1" aria-disabled="false">
                                                    <ul class="select2-selection__rendered" id="select2-sfd6-container">
                                                    </ul><span class="select2-search select2-search--inline"><textarea
                                                            class="select2-search__field" type="search" tabindex="0"
                                                            autocorrect="off" autocapitalize="none" spellcheck="false"
                                                            role="searchbox" aria-autocomplete="list" autocomplete="off"
                                                            aria-label="Search"
                                                            aria-describedby="select2-sfd6-container"
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
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" value="1">
                                            <span class="form-check-label">
                                                Author
                                            </span>
                                        </label>
                                        <!--end::Options-->

                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2" checked="checked">
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
                                        <input class="form-check-input" type="checkbox" value="" name="notifications"
                                            checked="">
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
                                <!--end::Actions-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center position-relative ">
                        <!--begin::Label-->
                        <div class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                        <!--end::Label-->

                        <!--begin::Checkbox-->
                        <div class="form-check form-check-custom form-check-solid ms-6 me-4">
                            <input class="form-check-input" type="checkbox" value="">
                        </div>
                        <!--end::Checkbox-->

                        <!--begin::Details-->
                        <div class="fw-semibold">
                            <a href="#" class="fs-6 fw-bold text-gray-900 text-hover-primary">Mivy App R&amp;D, Meeting
                                with clients</a>

                            <!--begin::Info-->
                            <div class="text-gray-500">
                                Due in 2 weeks <a href="#">Sean Bean</a>
                            </div>
                            <!--end::Info-->
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
                            id="kt_menu_654ebb3d2797a">
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
                                            data-dropdown-parent="#kt_menu_654ebb3d2797a" data-allow-clear="true"
                                            data-select2-id="select2-data-31-lqi8" tabindex="-1" aria-hidden="true"
                                            data-kt-initialized="1">
                                            <option></option>
                                            <option value="1">Approved</option>
                                            <option value="2">Pending</option>
                                            <option value="2">In Process</option>
                                            <option value="2">Rejected</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                            dir="ltr" data-select2-id="select2-data-32-ggce" style="width: 100%;"><span
                                                class="selection"><span
                                                    class="select2-selection select2-selection--multiple form-select form-select-solid"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="-1" aria-disabled="false">
                                                    <ul class="select2-selection__rendered" id="select2-nj1w-container">
                                                    </ul><span class="select2-search select2-search--inline"><textarea
                                                            class="select2-search__field" type="search" tabindex="0"
                                                            autocorrect="off" autocapitalize="none" spellcheck="false"
                                                            role="searchbox" aria-autocomplete="list" autocomplete="off"
                                                            aria-label="Search"
                                                            aria-describedby="select2-nj1w-container"
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
                                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox" value="1">
                                            <span class="form-check-label">
                                                Author
                                            </span>
                                        </label>
                                        <!--end::Options-->

                                        <!--begin::Options-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="2" checked="checked">
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
                                        <input class="form-check-input" type="checkbox" value="" name="notifications"
                                            checked="">
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
                                <!--end::Actions-->
                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Menu-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Tasks-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Table-->
    <div class="card card-flush mt-6 mt-xl-9">
        <!--begin::Card header-->
        <div class="card-header mt-5">
            <!--begin::Card title-->
            <div class="card-title flex-column">
                <h3 class="fw-bold mb-1">Project Spendings</h3>

                <div class="fs-6 text-gray-500">Total $260,300 sepnt so far</div>
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar my-1">
                <!--begin::Select-->
                <div class="me-6 my-1">
                    <select id="kt_filter_year" name="year" data-control="select2" data-hide-search="true"
                        class="w-125px form-select form-select-solid form-select-sm select2-hidden-accessible"
                        data-select2-id="select2-data-kt_filter_year" tabindex="-1" aria-hidden="true"
                        data-kt-initialized="1">
                        <option value="All" selected="" data-select2-id="select2-data-34-22yw">All time</option>
                        <option value="thisyear">This year</option>
                        <option value="thismonth">This month</option>
                        <option value="lastmonth">Last month</option>
                        <option value="last90days">Last 90 days</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr"
                        data-select2-id="select2-data-33-t580" style="width: 100%;"><span class="selection"><span
                                class="select2-selection select2-selection--single w-125px form-select form-select-solid form-select-sm"
                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                aria-disabled="false" aria-labelledby="select2-kt_filter_year-container"
                                aria-controls="select2-kt_filter_year-container"><span
                                    class="select2-selection__rendered" id="select2-kt_filter_year-container"
                                    role="textbox" aria-readonly="true" title="All time">All time</span><span
                                    class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                            aria-hidden="true"></span></span>
                </div>
                <!--end::Select-->

                <!--begin::Select-->
                <div class="me-4 my-1">
                    <select id="kt_filter_orders" name="orders" data-control="select2" data-hide-search="true"
                        class="w-125px form-select form-select-solid form-select-sm select2-hidden-accessible"
                        data-select2-id="select2-data-kt_filter_orders" tabindex="-1" aria-hidden="true"
                        data-kt-initialized="1">
                        <option value="All" selected="" data-select2-id="select2-data-36-m77z">All Orders</option>
                        <option value="Approved">Approved</option>
                        <option value="Declined">Declined</option>
                        <option value="In Progress">In Progress</option>
                        <option value="In Transit">In Transit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr"
                        data-select2-id="select2-data-35-xdm5" style="width: 100%;"><span class="selection"><span
                                class="select2-selection select2-selection--single w-125px form-select form-select-solid form-select-sm"
                                role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0"
                                aria-disabled="false" aria-labelledby="select2-kt_filter_orders-container"
                                aria-controls="select2-kt_filter_orders-container"><span
                                    class="select2-selection__rendered" id="select2-kt_filter_orders-container"
                                    role="textbox" aria-readonly="true" title="All Orders">All Orders</span><span
                                    class="select2-selection__arrow" role="presentation"><b
                                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                            aria-hidden="true"></span></span>
                </div>
                <!--end::Select-->

                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-3"><span class="path1"></span><span
                            class="path2"></span></i> <input type="text" id="kt_filter_search"
                        class="form-control form-control-solid form-select-sm w-150px ps-9" placeholder="Search Order">
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <div id="kt_profile_overview_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table id="kt_profile_overview_table"
                            class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bold dataTable no-footer">
                            <thead class="fs-7 text-gray-500 text-uppercase">
                                <tr>
                                    <th class="min-w-250px sorting" tabindex="0"
                                        aria-controls="kt_profile_overview_table" rowspan="1" colspan="1"
                                        aria-label="Manager: activate to sort column ascending"
                                        style="width: 509.047px;">Manager</th>
                                    <th class="min-w-150px sorting" tabindex="0"
                                        aria-controls="kt_profile_overview_table" rowspan="1" colspan="1"
                                        aria-label="Date: activate to sort column ascending" style="width: 315.531px;">
                                        Date</th>
                                    <th class="min-w-90px sorting" tabindex="0"
                                        aria-controls="kt_profile_overview_table" rowspan="1" colspan="1"
                                        aria-label="Amount: activate to sort column ascending"
                                        style="width: 193.359px;">Amount</th>
                                    <th class="min-w-90px sorting" tabindex="0"
                                        aria-controls="kt_profile_overview_table" rowspan="1" colspan="1"
                                        aria-label="Status: activate to sort column ascending"
                                        style="width: 205.062px;">Status</th>
                                    <th class="min-w-50px text-end sorting" tabindex="0"
                                        aria-controls="kt_profile_overview_table" rowspan="1" colspan="1"
                                        aria-label="Details: activate to sort column ascending" style="width: 126.5px;">
                                        Details</th>
                                </tr>
                            </thead>
                            <tbody class="fs-6">




























































                                <tr class="odd">
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/assets/media/avatars/300-6.jpg">
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">Emma Smith</a>

                                                <div class="fw-semibold text-gray-500">smith@kpmg.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td data-order="2023-09-22T00:00:00-05:00">Sep 22, 2023</td>
                                    <td>$670.00</td>
                                    <td>
                                        <span class="badge badge-light-info fw-bold px-4 py-3">
                                            In progress </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        M </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">Melody Macy</a>

                                                <div class="fw-semibold text-gray-500">melody@altbox.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td data-order="2023-03-10T00:00:00-05:00">Mar 10, 2023</td>
                                    <td>$483.00</td>
                                    <td>
                                        <span class="badge badge-light-danger fw-bold px-4 py-3">
                                            Rejected </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/assets/media/avatars/300-1.jpg">
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">Max Smith</a>

                                                <div class="fw-semibold text-gray-500">max@kt.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td data-order="2023-07-25T00:00:00-05:00">Jul 25, 2023</td>
                                    <td>$439.00</td>
                                    <td>
                                        <span class="badge badge-light-info fw-bold px-4 py-3">
                                            In progress </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/assets/media/avatars/300-5.jpg">
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">Sean Bean</a>

                                                <div class="fw-semibold text-gray-500">sean@dellito.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td data-order="2023-10-25T00:00:00-05:00">Oct 25, 2023</td>
                                    <td>$516.00</td>
                                    <td>
                                        <span class="badge badge-light-success fw-bold px-4 py-3">
                                            Approved </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/assets/media/avatars/300-25.jpg">
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">Brian Cox</a>

                                                <div class="fw-semibold text-gray-500">brian@exchange.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td data-order="2023-09-22T00:00:00-05:00">Sep 22, 2023</td>
                                    <td>$922.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-warning text-warning fw-semibold">
                                                        C </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">Mikaela
                                                    Collins</a>

                                                <div class="fw-semibold text-gray-500">mik@pex.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td data-order="2023-09-22T00:00:00-05:00">Sep 22, 2023</td>
                                    <td>$669.00</td>
                                    <td>
                                        <span class="badge badge-light-info fw-bold px-4 py-3">
                                            In progress </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/assets/media/avatars/300-9.jpg">
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">Francis
                                                    Mitcham</a>

                                                <div class="fw-semibold text-gray-500">f.mit@kpmg.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td data-order="2023-04-15T00:00:00-05:00">Apr 15, 2023</td>
                                    <td>$913.00</td>
                                    <td>
                                        <span class="badge badge-light-warning fw-bold px-4 py-3">
                                            Pending </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                        O </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">Olivia Wild</a>

                                                <div class="fw-semibold text-gray-500">olivia@corpmail.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td data-order="2023-03-10T00:00:00-05:00">Mar 10, 2023</td>
                                    <td>$461.00</td>
                                    <td>
                                        <span class="badge badge-light-success fw-bold px-4 py-3">
                                            Approved </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr class="odd">
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <span
                                                        class="symbol-label bg-light-primary text-primary fw-semibold">
                                                        N </span>
                                                </div>
                                                <!--end::Avatar-->

                                                <!--begin::Online-->
                                                <div
                                                    class="bg-success position-absolute h-8px w-8px rounded-circle translate-middle start-100 top-100 ms-n1 mt-n1">
                                                </div>
                                                <!--end::Online-->
                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">Neil Owen</a>

                                                <div class="fw-semibold text-gray-500">owen.neil@gmail.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td data-order="2023-02-21T00:00:00-05:00">Feb 21, 2023</td>
                                    <td>$541.00</td>
                                    <td>
                                        <span class="badge badge-light-success fw-bold px-4 py-3">
                                            Approved </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
                                <tr class="even">
                                    <td>
                                        <!--begin::User-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Wrapper-->
                                            <div class="me-5 position-relative">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/assets/media/avatars/300-23.jpg">
                                                </div>
                                                <!--end::Avatar-->

                                            </div>
                                            <!--end::Wrapper-->

                                            <!--begin::Info-->
                                            <div class="d-flex flex-column justify-content-center">
                                                <a href="" class="fs-6 text-gray-800 text-hover-primary">Dan Wilson</a>

                                                <div class="fw-semibold text-gray-500">dam@consilting.com</div>
                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::User-->
                                    </td>
                                    <td data-order="2023-08-19T00:00:00-05:00">Aug 19, 2023</td>
                                    <td>$478.00</td>
                                    <td>
                                        <span class="badge badge-light-success fw-bold px-4 py-3">
                                            Approved </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-sm">View</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div
                            class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                            <div class="dataTables_length" id="kt_profile_overview_table_length"><label><select
                                        name="kt_profile_overview_table_length"
                                        aria-controls="kt_profile_overview_table"
                                        class="form-select form-select-sm form-select-solid">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select></label></div>
                        </div>
                        <div
                            class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="dataTables_paginate paging_simple_numbers"
                                id="kt_profile_overview_table_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled"
                                        id="kt_profile_overview_table_previous"><a href="#"
                                            aria-controls="kt_profile_overview_table" data-dt-idx="0" tabindex="0"
                                            class="page-link"><i class="previous"></i></a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="kt_profile_overview_table" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="kt_profile_overview_table" data-dt-idx="2" tabindex="0"
                                            class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="kt_profile_overview_table" data-dt-idx="3" tabindex="0"
                                            class="page-link">3</a></li>
                                    <li class="paginate_button page-item next" id="kt_profile_overview_table_next"><a
                                            href="#" aria-controls="kt_profile_overview_table" data-dt-idx="4"
                                            tabindex="0" class="page-link"><i class="next"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Table container-->
        </div>
        <!--end::Card body-->
    </div>
    <?php } ?>
    <!--end::Card-->
</div>